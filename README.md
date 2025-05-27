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

<h2>📷 Screenshot</h2>

<p>Berikut adalah beberapa tampilan antarmuka dari sistem rekomendasi wisata:</p>

<img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhuOZeQBUh5xnCjb3zIwXS3Gkmf2AIwygmGT-kv4EIdLBPG3_Dlej64dJ_7htJkVzDTkVC4IDSoRFVuOCjQxk1WEuFTydJQzGYKzZgWSCrkAnNtsEVDTOJfGb84xFIRLfI5pnPV6tCCFo1OhmEkdh34bh2a2VyvEtmVfVz6zGYr3vshIfZmwcr4mLx8fd9I/w400-h290/1.png" alt="Tampilan Halaman Depan" width="400">
<br><br>
<img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi5RJM86r2HuwQpkNahmj0__jY6p7rAlD60MPXWFQ7QGBaBhERrGU0x7qWevN0IfiVb0KoDTHrXVy1w2VbuYrM22ei8DPtOUDZwr0uVJJr7PQH6hzLI2LJCrlcur3pI_x_3epIgAeUI8u0W-YPrBfAjJxKzrQS8F-NfGBv2UQW01aDY3yO2KpKeW6YiL0yV/w400-h240/5.png" alt="Form Preferensi">
<br><br>
<img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg7edIHQHHttDAcFJGqxJyhgXDuKxI0McTDUd_CPJK7KoA0mOmixU5ECym6v0WfRjArYTF3qdCsJCsi0Zwg5-UnLDWo1_0oVgenY0slQoyjBu0uqMM3a_P16R5oC4ftaa3q9VeUnnE0LpK3At3RXKtjUfpVYE17nhOl1Dg60GbTIIF8f60kUoX86fOp4FVN/w400-h260/8.png" alt="Hasil Rekomendasi">
<br><br>
<img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgntd_AY_TqNhspWGFa06LtoYa3LlHOgP4PGzBQx-Ndq75OeFzvcat4wXRJS3AG5pEdJy_zO2rS7OW8glBTY7iaQy98d8y7ESfM1pRiM6MuJwEyAq92GWaJN_R0iS6Jvl1YsPLx7mai0Kabu2ByeiIpVQuqrAGTUgLUKXL5zaHphrlZza5MmdAVM9R7LlTU/w400-h263/9.png" alt="Detail Tempat Wisata">
<br><br>
<img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhTXadCc7wZsnz0MTImsouB2ZRpr3ry3g4AJy38qvyqFWGBfMttqw5qVmS6xpwbwF4Vhh-PC_s0gQoxoYOlCH7S7Evgu8sNkV79HXo88LJFqdWRBRh2bRUVbwJQ2lq4sAMB_EQCYTXIbpHZrEJ0cP8qEOM8iXuZ_SSb2SwnLCd_g94t3TncBWK-vTBCK9pw/w400-h166/10.png" alt="Admin Panel">
<br><br>
<img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg1EE81WOSQuAgbNvCbov17itLQJWRsP9w7F3Vq58Oc10pfmHtEH21pTCHQft9L307yP-5wWhL_VC61ND-_vBNYWPxvH73n5am5kKE4Dl4VtF7jCYmrv5G9L0_OhuzS4hxWGjAIC2iOgewi1DPHrSEAQfKKHSx2SWJFeBd04haMSvNIy2InzggJ1wmcJHm5/w400-h223/11.png" alt="Halaman Login">
<br><br>

<h2>📄 Lisensi</h2>
<p>Proyek ini dilisensikan di bawah <a href="LICENSE">MIT License</a>.</p>

<h2>🙌 Kontribusi</h2>
<p>
Kontribusi sangat diterima! Silakan fork repositori ini dan ajukan pull request untuk perbaikan atau penambahan fitur.
</p>
