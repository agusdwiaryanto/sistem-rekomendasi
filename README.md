<h1>🎯 Sistem Rekomendasi Wisata Berbasis Web</h1>

<p>
Repositori ini berisi implementasi sistem rekomendasi wisata berbasis web yang dikembangkan sebagai bagian dari penelitian skripsi. Sistem ini dirancang untuk membantu pengguna dalam menemukan destinasi wisata yang sesuai dengan preferensi mereka, dengan memanfaatkan teknologi Laravel untuk frontend dan FastAPI untuk backend rekomendasi.
</p>

<h2>📌 Deskripsi Proyek</h2>
<p>
Sistem ini bertujuan untuk memberikan rekomendasi destinasi wisata kepada pengguna berdasarkan preferensi mereka, seperti jenis wisata, lokasi, dan fasilitas yang diinginkan. Dengan mengintegrasikan algoritma rekomendasi dan antarmuka pengguna yang intuitif, sistem ini mempermudah proses perencanaan perjalanan wisata.
</p>

<h2>🧩 Fitur Utama</h2>
<ul>
  <li><strong>Input Preferensi Pengguna:</strong> Pengguna dapat memasukkan preferensi mereka terkait jenis wisata, lokasi, dan fasilitas yang diinginkan.</li>
  <li><strong>Rekomendasi Destinasi:</strong> Sistem memberikan daftar destinasi wisata yang sesuai dengan preferensi pengguna.</li>
  <li><strong>Detail Destinasi:</strong> Informasi lengkap mengenai destinasi wisata, termasuk deskripsi, lokasi, dan fasilitas yang tersedia.</li>
  <li><strong>Antarmuka Pengguna Responsif:</strong> Desain antarmuka yang responsif dan mudah digunakan, dibangun dengan Bootstrap.</li>
</ul>

<h2>🛠️ Teknologi yang Digunakan</h2>
<ul>
  <li><strong>Frontend:</strong> Laravel, Blade Templates, Bootstrap</li>
  <li><strong>Backend:</strong> FastAPI (Python)</li>
  <li><strong>Database:</strong> MySQL</li>
  <li><strong>Lainnya:</strong> Tailwind CSS, Vite</li>
</ul>

<h2>📁 Struktur Folder</h2>
<pre>
├── app/                    # Direktori aplikasi Laravel
├── bootstrap/              # File bootstrap Laravel
├── config/                 # Konfigurasi aplikasi
├── database/               # Migrasi dan seeder database
├── public/                 # Direktori publik untuk aset
├── resources/              # View dan aset frontend
├── routes/                 # Definisi rute aplikasi
├── storage/                # Penyimpanan file sementara
├── tests/                  # Pengujian aplikasi
├── rekomendasi.py          # Skrip rekomendasi dengan FastAPI
├── rekomendasi.ipynb       # Notebook Jupyter untuk analisis
├── db-wisata.sql           # Skrip SQL untuk database wisata
├── .env.example            # Contoh file konfigurasi lingkungan
├── README.md               # Dokumentasi proyek
└── ...
</pre>

<h2>🚀 Cara Menjalankan Proyek</h2>

<h3>1. Clone Repositori</h3>
<pre><code>
git clone https://github.com/agusdwiaryanto/sistem-rekomendasi.git
cd sistem-rekomendasi
</code></pre>

<h3>2. Menjalankan Aplikasi Laravel</h3>

<p><strong>a. Instalasi Dependensi</strong></p>
<pre><code>
composer install
npm install
</code></pre>

<p><strong>b. Konfigurasi Lingkungan</strong></p>
<pre><code>
cp .env.example .env
php artisan key:generate
</code></pre>

<p><strong>c. Migrasi dan Seeder Database</strong></p>
<pre><code>
php artisan migrate --seed
</code></pre>

<p><strong>d. Menjalankan Server</strong></p>
<pre><code>
php artisan serve
</code></pre>

<h3>3. Menjalankan Backend FastAPI</h3>

<p><strong>a. Instalasi Dependensi</strong></p>
<pre><code>
pip install -r requirements.txt
</code></pre>

<p><strong>b. Menjalankan Server FastAPI</strong></p>
<pre><code>
uvicorn rekomendasi:app --reload
</code></pre>

<h2>📷 Screenshot (Opsional)</h2>
<p><em>Tambahkan screenshot antarmuka pengguna di sini untuk memberikan gambaran visual tentang aplikasi.</em></p>

<h2>📄 Lisensi</h2>
<p>Proyek ini dilisensikan di bawah <a href="LICENSE">MIT License</a>.</p>

<h2>🙌 Kontribusi</h2>
<p>
Kontribusi sangat diterima! Silakan fork repositori ini dan ajukan pull request untuk perbaikan atau penambahan fitur.
</p>
