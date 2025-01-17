@extends('admin.layouts.base')
@section('title','Tambah')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah</h1>

<form action="{{ route('wisata.submit') }}" method="post">
        @csrf

        <label>Nama</label>
        <input type="text" name="nama" class="form-control mb-2" required>

        <label>Jenis Wisata</label>
        <div class="mb-2">
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

        <label>Fasilitas Wisata</label>
        <div class="mb-2">
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

        <label>Latitude</label>
        <input type="text" name="latitude" class="form-control mb-2" required>

        <label>Longitude</label>
        <input type="text" name="longitude" class="form-control mb-2" required>

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>


@endsection