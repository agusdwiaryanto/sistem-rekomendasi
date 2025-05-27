import pandas as pd
from sqlalchemy import create_engine
from flask import Flask, request, jsonify
import pymysql
import numpy as np
import math
from sklearn.metrics.pairwise import cosine_similarity

app = Flask(__name__)

# Database configuration
database_name = 'db-wisata'
engine = create_engine(f'mysql+pymysql://root:@localhost/{database_name}')

# Daftar kategori yang ditentukan untuk 'jenis_wisata'
jenis_wisata_categories = [
    'Wisata Alam', 'Wisata Sejarah', 'Wisata Budaya', 'Wisata Kuliner', 
    'Wisata Edukasi', 'Wisata Religi', 'Wisata Air', 'Wisata Rekreasi'
]

# Daftar kategori fasilitas yang ditentukan untuk 'fasilitas_wisata'
fasilitas_wisata_categories = [
    'Tempat Parkir', 'Restoran', 'Kamping', 'Outbond', 'Pemandu', 
    'Toilet', 'Mushola', 'Tempat Bermain'
]

# Fungsi untuk menghitung jarak Haversine
def haversine(lat1, lon1, lat2, lon2):
    r = 6371  # Radius Bumi dalam kilometer
    phi1 = math.radians(lat1)
    phi2 = math.radians(lat2)
    delta_phi = math.radians(lat2 - lat1)
    delta_lambda = math.radians(lon1 - lon2)
    a = math.sin(delta_phi / 2)**2 + math.cos(phi1) * math.cos(phi2) * math.sin(delta_lambda / 2)**2
    c = 2 * math.atan2(math.sqrt(a), math.sqrt(1 - a))
    return r * c  # Jarak dalam kilometer

# Fungsi untuk menghitung cosine similarity manual
def cosine_similarity_manual(A, B):
    dot_product = np.dot(A, B)
    norm_A = np.linalg.norm(A)
    norm_B = np.linalg.norm(B)
    return dot_product / (norm_A * norm_B) if norm_A != 0 and norm_B != 0 else 0

# Fungsi One-Hot Encoding untuk jenis wisata
def one_hot_encode_jenis_wisata(row):
    one_hot = [0] * len(jenis_wisata_categories)
    for idx, category in enumerate(jenis_wisata_categories):
        if category in row:
            one_hot[idx] = 1
    return one_hot

# Fungsi One-Hot Encoding untuk fasilitas wisata
def one_hot_encode_fasilitas_wisata(row):
    one_hot = [0] * len(fasilitas_wisata_categories)
    for idx, category in enumerate(fasilitas_wisata_categories):
        if category in row:
            one_hot[idx] = 1
    return one_hot

@app.route('/rekomendasi', methods=['POST'])
def rekomendasi_wisata():
    data = request.json
    if data is None:
        return jsonify({"error": "Invalid JSON"}), 400

    # Validasi data lat-long
    try:
        latitude_user = float(data['latitude'])
        longitude_user = float(data['longitude'])
    except ValueError:
        return jsonify({"error": "Invalid latitude or longitude"}), 400

    # Ambil preferensi pengguna
    jenis_wisata_user = data.get('jenis_wisata', [])
    fasilitas_wisata_user = data.get('fasilitas_wisata', [])
    
    # Mengambil data wisata dari database
    try:
        data_wisata = pd.read_sql('SELECT * FROM wisata', con=engine)
        print("Data wisata berhasil diambil:")
    except Exception as e:
        return jsonify({"error": f"Error fetching data from database: {e}"}), 500

    # Menerapkan One-Hot Encoding pada 'jenis_wisata'
    data_wisata['jenis_wisata_onhot'] = data_wisata['jenis_wisata'].apply(lambda row: one_hot_encode_jenis_wisata(row))
    # Menerapkan One-Hot Encoding pada 'fasilitas_wisata'
    data_wisata['fasilitas_wisata_onhot'] = data_wisata['fasilitas_wisata'].apply(lambda row: one_hot_encode_fasilitas_wisata(row))

    # Menggabungkan hasil One-Hot Encoding
    data_wisata['jenis_wisata_onhot'] = data_wisata['jenis_wisata_onhot'].apply(lambda x: np.array(x, dtype=np.float64))
    data_wisata['fasilitas_wisata_onhot'] = data_wisata['fasilitas_wisata_onhot'].apply(lambda x: np.array(x, dtype=np.float64))

    # Preferensi pengguna dari JSON
    preferensi_user_jenis = np.array([1 if cat in jenis_wisata_user else 0 for cat in jenis_wisata_categories], dtype=np.float64)
    preferensi_user_fasilitas = np.array([1 if cat in fasilitas_wisata_user else 0 for cat in fasilitas_wisata_categories], dtype=np.float64)

    # Menghitung cosine similarity untuk jenis wisata
    similarity_scores_jenis = []
    for idx, row in data_wisata.iterrows():
        # Cosine similarity untuk jenis wisata
        similarity_score_jenis = cosine_similarity_manual(row['jenis_wisata_onhot'], preferensi_user_jenis)
        similarity_scores_jenis.append(similarity_score_jenis)

    # Menghitung cosine similarity untuk fasilitas wisata
    similarity_scores_fasilitas = []
    for idx, row in data_wisata.iterrows():
        # Cosine similarity untuk fasilitas wisata
        similarity_score_fasilitas = cosine_similarity_manual(row['fasilitas_wisata_onhot'], preferensi_user_fasilitas)
        similarity_scores_fasilitas.append(similarity_score_fasilitas)

    # Menambahkan hasil similarity ke DataFrame
    data_wisata['cosine_similarity_jenis'] = similarity_scores_jenis
    data_wisata['cosine_similarity_fasilitas'] = similarity_scores_fasilitas

    # Perhitungan jarak Haversine dan pembobotan akhir
    recommendations = []
    max_distance = 0  # Inisialisasi max_distance

    # Pertama, hitung jarak maksimum di antara semua data wisata
    for index, row in data_wisata.iterrows():
        distance = haversine(latitude_user, longitude_user, row['latitude'], row['longitude'])
        if distance > max_distance:
            max_distance = distance

    # Kemudian, normalisasi jarak menggunakan max_distance
    for index, row in data_wisata.iterrows():
        distance = haversine(latitude_user, longitude_user, row['latitude'], row['longitude'])
        normalized_distance = 1 - (distance / max_distance)  # Normalisasi menggunakan jarak maksimal

        # Berikan bobot pada setiap komponen
        jenis_similarity_weight = 0.312910284
        fasilitas_similarity_weight = 0.323851204
        distance_weight = 0.363238512

        # Hitung skor akhir dengan pembobotan
        final_score = (
            similarity_scores_jenis[index] * jenis_similarity_weight +
            similarity_scores_fasilitas[index] * fasilitas_similarity_weight +
            normalized_distance * distance_weight
        )

        # Dapatkan nilai jenis dan fasilitas wisata yang terkait dengan data wisata
        jenis_wisata = [col for col, val in zip(jenis_wisata_categories, row['jenis_wisata_onhot']) if val == 1]
        fasilitas_wisata = [col for col, val in zip(fasilitas_wisata_categories, row['fasilitas_wisata_onhot']) if val == 1]

        recommendations.append({
            'nama_wisata': row['nama'],
            'final_score': final_score,
            'jenis_similarity': similarity_scores_jenis[index],
            'fasilitas_similarity': similarity_scores_fasilitas[index],
            'distance': distance,
            'normalized_distance': normalized_distance,
            'jenis_wisata': jenis_wisata,
            'fasilitas_wisata': fasilitas_wisata,
            'latitude': row['latitude'],
            'longitude': row['longitude'],
        })

    # Urutkan rekomendasi berdasarkan skor akhir
    recommendations = sorted(recommendations, key=lambda x: x['final_score'], reverse=True)

    # Kembalikan 10 rekomendasi teratas
    return jsonify(recommendations[:10])

if __name__ == '__main__':
    app.run(debug=True, use_reloader=False)
