<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Wisata</title>
    <style>
        /* Gaya umum */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #1E90FF;
            color: white;
            text-align: center;
            padding: 1.5rem;
            font-size: 1.8rem;
            font-weight: bold;
            position: relative;
        }

        .login-button {
            position: absolute;
            top: 40%;
            right: 1.5rem;
            transform: translateY(-50%);
            background-color: white;
            color: #1E90FF;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .login-button:hover {
            background-color: #f0f8ff;
        }

        main {
            max-width: 900px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #1E90FF;
        }

        button {
            background-color: #1E90FF;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 1.5rem;
        }

        button:hover {
            background-color: #45a049;
        }

        #locationStatus {
            margin-top: 1rem;
            font-style: italic;
            color: #555;
        }

        

        /* Gaya untuk card */
        .card {
            background-color: #f0f8ff;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            color: #333;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            background-color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .checkbox-item:hover {
            background-color: #e8f5e9;
        }

        .checkbox-item input[type="checkbox"] {
            margin-right: 0.5rem;
        }

        .checkbox-item img {
            width: 20px;
            height: 20px;
            margin-right: 0.5rem;
        }

        .card-content {
    display: grid;
    grid-template-columns: 1fr 1fr; /* Membagi konten menjadi dua kolom */
    gap: 15px; /* Jarak antara kolom */
}

.card-content p {
    margin: 0; /* Menghilangkan margin pada p supaya kolom lebih rapat */
}

        /* Slider Style */
    .slider-container {
        position: relative;
        width: 100%;
        max-width: 600px; /* Ukuran maksimal slider */
        margin: auto;
        overflow: hidden;
        border-radius: 10px;
    }

    .slider {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .slider img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .prev, .next {
        position: absolute;
        top: 50%;
        width: 30px;
        height: 30px;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 1.5rem;
        z-index: 1;
        transform: translateY(-50%);
    }

    .prev {
        left: 10px;
    }

    .next {
        right: 10px;
    }
        


        /* Tabel hasil */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
            text-align: left;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 1rem;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Foto kecil yang ditampilkan dalam urutan */
.photo-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: flex-start; /* Menjaga gambar sejajar ke kiri */
}

.photo {
    width: 100px; /* Ukuran kecil untuk foto */
    height: 100px; /* Tetapkan tinggi agar gambar rapi */
    object-fit: cover; /* Agar gambar tidak terdistorsi */
    cursor: pointer;
    border-radius: 5px;
    transition: transform 0.3s ease;
}

.photo:hover {
    transform: scale(1.1); /* Zoom sedikit saat hover */
}

/* Modal style */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal-content {
    margin: 15% auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    max-width: 80%;
    text-align: center;
}

.modal img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 30px;
    color: #fff;
    cursor: pointer;
}


    </style>
</head>

<body>
    <header>
        Rekomendasi Wisata
        <button class="login-button" onclick="window.location.href='/login'">Login Admin</button>
    </header>
    <main>
        <h2>Masukkan Preferensi Wisata Anda</h2>
        <form id="wisataForm">
            <!-- Card untuk jenis wisata -->
            <div class="card">
                <h3>Jenis Wisata</h3>
                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/fluency/48/mountain.png" alt="Icon">
                        <input type="checkbox" name="jenis_wisata[]" value="Wisata Alam"> Wisata Alam
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/fluency/48/museum.png" alt="Icon">
                        <input type="checkbox" name="jenis_wisata[]" value="Wisata Sejarah"> Wisata Sejarah
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/external-flat-andi-nur-abdillah/64/external-Wayang-indonesia-(flat)-flat-andi-nur-abdillah.png" alt="Icon">
                        <input type="checkbox" name="jenis_wisata[]" value="Wisata Budaya"> Wisata Budaya
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/fluency/48/restaurant.png" alt="Icon">
                        <input type="checkbox" name="jenis_wisata[]" value="Wisata Kuliner"> Wisata Kuliner
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-historical-history-flaticons-lineal-color-flat-icons-3.png" alt="Icon">
                        <input type="checkbox" name="jenis_wisata[]" value="Wisata Edukasi"> Wisata Edukasi
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/color/48/ramadan.png" alt="Icon">
                        <input type="checkbox" name="jenis_wisata[]" value="Wisata Religi"> Wisata Religi
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/color/48/water-polo.png" alt="Icon">
                        <input type="checkbox" name="jenis_wisata[]" value="Wisata Air"> Wisata Air
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/color-glass/48/picnic--v1.png" alt="Icon">
                        <input type="checkbox" name="jenis_wisata[]" value="Wisata Rekrasi"> Wisata Rekrasi
                    </label>
                </div>
            </div>

            <!-- Card untuk fasilitas wisata -->
            <div class="card">
                <h3>Fasilitas Wisata</h3>
                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/fluency/48/parking.png" alt="Icon">
                        <input type="checkbox" name="fasilitas_wisata[]" value="Tempat Parkir"> Tempat Parkir
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/fluency/48/restaurant.png" alt="Icon">
                        <input type="checkbox" name="fasilitas_wisata[]" value="Restoran"> Restoran
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/fluency/48/camping-tent.png" alt="Icon">
                        <input type="checkbox" name="fasilitas_wisata[]" value="Kamping"> Kamping
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/external-xnimrodx-blue-xnimrodx/64/external-outdoor-camping-and-outdoor-xnimrodx-blue-xnimrodx.png" alt="Icon">
                        <input type="checkbox" name="fasilitas_wisata[]" value="Outbond"> Outbond
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/external-flaticons-flat-flat-icons/64/external-tour-guide-hotel-management-flaticons-flat-flat-icons.png" alt="Icon">
                        <input type="checkbox" name="fasilitas_wisata[]" value="Pemandu"> Pemandu
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/tiny-color/16/toilet.png" alt="Icon">
                        <input type="checkbox" name="fasilitas_wisata[]" value="Toilet"> Toilet
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/color-glass/48/mosque.png" alt="Icon">
                        <input type="checkbox" name="fasilitas_wisata[]" value="Mushola"> Mushola
                    </label>
                    <label class="checkbox-item">
                        <img src="https://img.icons8.com/ultraviolet/40/playground.png" alt="Icon">
                        <input type="checkbox" name="fasilitas_wisata[]" value="Tempat Bermain"> Tempat Bermain
                    </label>
                </div>
            </div>

            <button type="button" onclick="getLocation()">Kirim Preferensi dan Lokasi</button>
        </form>

        <p id="locationStatus"></p>

        <!-- Card container untuk menampilkan hasil -->
        <div class="cards-container" id="resultContainer" style="display: none;"></div>
       

    </main>

    <script>
        // Fungsi untuk mendapatkan lokasi pengguna
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                document.getElementById("locationStatus").innerHTML = "Geolocation tidak didukung oleh browser ini.";
            }
        }

        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            const formData = new FormData(document.getElementById('wisataForm'));
            formData.append('latitude', latitude);
            formData.append('longitude', longitude);

            fetch('/kirimData', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    displayResults(data);
                })
                .catch(error => console.error('Error:', error));
        }

        function displayResults(data) {
    const container = document.getElementById("resultContainer");
    container.innerHTML = ""; // Hapus hasil sebelumnya

    data.forEach(item => {
        const card = document.createElement("div");
        card.classList.add("card");

        // Cek jika ada foto, jika tidak gunakan gambar default
        const photos = item.foto_url ? item.foto_url.split(',') : ['https://itbox.id/wp-content/uploads/2022/11/cara-mengatasi-error-404.jpeg']; // Gambar default jika tidak ada foto

        // Foto-foto biasa yang bisa diklik untuk memperbesar
        let photoHTML = `
            <div class="photo-container">
                ${photos.map(photo => `<img src="${photo}" alt="Foto Wisata" class="photo" onclick="openModal('${photo}')">`).join('')}
            </div>
        `;

        card.innerHTML = `
            <h3>${item.nama_wisata}</h3>
            ${photoHTML}
            <div class="card-content">
                <p><strong>Nama Wisata:</strong> ${item.nama_wisata}</p>
                <p><strong>Jenis Wisata:</strong> ${item.jenis_wisata}</p>
                <p><strong>Fasilitas Wisata:</strong> ${item.fasilitas_wisata}</p>
                <p><strong>Rating:</strong> ${item.rating ? item.rating : 'Tidak ada rating'}</p>
                <p><strong>Jumlah Ulasan:</strong> ${item.jumlah_ulasan ? item.jumlah_ulasan : 'Tidak ada ulasan'}</p>
                <p><strong>Latitude:</strong> ${item.latitude}</p>
                <p><strong>Longitude:</strong> ${item.longitude}</p>
                <p><strong>Jenis Similarity:</strong> ${item.jenis_similarity.toFixed(2)}</p>
                <p><strong>Fasilitas Similarity:</strong> ${item.fasilitas_similarity.toFixed(2)}</p>
                <p><strong>Skor Akhir:</strong> ${item.final_score.toFixed(2)}</p>
                <p><strong>Jarak:</strong> ${item.distance.toFixed(2)} km</p>
                <p><strong>Deskripsi:</strong> ${item.deskripsi ? item.deskripsi : 'Deskripsi tidak tersedia'}</p>
            </div>
            <div class="card-footer">
                <button class="button-route" onclick="viewRoute(${item.latitude}, ${item.longitude})">Lihat Rute</button>
            </div>
        `;
        container.appendChild(card);
    });

    container.style.display = "grid"; // Tampilkan hasil dalam grid
}

// Fungsi untuk membuka modal dengan gambar besar
function openModal(imageUrl) {
    const modal = document.getElementById("myModal");
    const modalImg = document.getElementById("modalImage");
    modal.style.display = "block";
    modalImg.src = imageUrl;
}

// Fungsi untuk menutup modal
function closeModal() {
    const modal = document.getElementById("myModal");
    modal.style.display = "none";
}







        function viewRoute(latitude, longitude) {
            const url = `https://www.google.com/maps?q=${latitude},${longitude}`;
            window.open(url, '_blank'); // Membuka Google Maps di tab baru
        }

        function showError(error) {
            const locationStatus = document.getElementById("locationStatus");
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    locationStatus.innerHTML = "Pengguna menolak permintaan Geolocation.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    locationStatus.innerHTML = "Informasi lokasi tidak tersedia.";
                    break;
                case error.TIMEOUT:
                    locationStatus.innerHTML = "Permintaan untuk mendapatkan lokasi pengguna habis waktu.";
                    break;
                default:
                    locationStatus.innerHTML = "Terjadi kesalahan yang tidak diketahui.";
            }
        }
    </script>
</body>

</html>
 <!-- Modal for image enlargement -->
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <div class="modal-content">
        <img id="modalImage" src="" alt="Enlarged Image">
    </div>
</div>
