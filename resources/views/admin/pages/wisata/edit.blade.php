@extends('admin.layouts.base')
@section('title','Edit')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit</h1>

<form action="{{ route('wisata.update', $wisata->id) }}" method="post">
    @csrf

    <label>Nama Wisata</label>
    <input type="text" name="nama" value="{{ $wisata->nama }}" class="form-control mb-2">

    <label>Jenis Wisata</label>
    <div class="mb-2">
        @php
            $jenisWisataSelected = explode(',', $wisata->jenis_wisata); // Konversi string ke array
        @endphp
        <label><input type="checkbox" name="jenis_wisata[]" value="Wisata Alam" {{ in_array('Wisata Alam', $jenisWisataSelected) ? 'checked' : '' }}> Wisata Alam</label><br>
        <label><input type="checkbox" name="jenis_wisata[]" value="Wisata Sejarah" {{ in_array('Wisata Sejarah', $jenisWisataSelected) ? 'checked' : '' }}> Wisata Sejarah</label><br>
        <label><input type="checkbox" name="jenis_wisata[]" value="Wisata Budaya" {{ in_array('Wisata Budaya', $jenisWisataSelected) ? 'checked' : '' }}> Wisata Budaya</label>
        <label><input type="checkbox" name="jenis_wisata[]" value="Wisata Kuliner" {{ in_array('Wisata Kuliner', $jenisWisataSelected) ? 'checked' : '' }}> Wisata Kuliner</label><br>
        <label><input type="checkbox" name="jenis_wisata[]" value="Wisata Edukasi" {{ in_array('Wisata Edukasi', $jenisWisataSelected) ? 'checked' : '' }}> Wisata Edukasi</label><br>
        <label><input type="checkbox" name="jenis_wisata[]" value="Wisata Religi" {{ in_array('Wisata Religi', $jenisWisataSelected) ? 'checked' : '' }}> Wisata Religi</label>
        <label><input type="checkbox" name="jenis_wisata[]" value="Wisata Air" {{ in_array('Wisata Air', $jenisWisataSelected) ? 'checked' : '' }}> Wisata Air</label><br>
        <label><input type="checkbox" name="jenis_wisata[]" value="Wisata Rekrasi" {{ in_array('Wisata Rekrasi', $jenisWisataSelected) ? 'checked' : '' }}> Wisata Rekrasi</label>
    </div>

    <label>Fasilitas Wisata</label>
    <div class="mb-2">
        @php
            $fasilitasWisataSelected = explode(',', $wisata->fasilitas_wisata); // Konversi string ke array
        @endphp
        <label><input type="checkbox" name="fasilitas_wisata[]" value="Tempat Parkir" {{ in_array('Tempat Parkir', $fasilitasWisataSelected) ? 'checked' : '' }}> Tempat Parkir</label><br>
        <label><input type="checkbox" name="fasilitas_wisata[]" value="Restoran" {{ in_array('Restoran', $fasilitasWisataSelected) ? 'checked' : '' }}> Restoran</label><br>
        <label><input type="checkbox" name="fasilitas_wisata[]" value="Kamping" {{ in_array('Kamping', $fasilitasWisataSelected) ? 'checked' : '' }}> Kamping</label>
        <label><input type="checkbox" name="fasilitas_wisata[]" value="Outbond" {{ in_array('Outbond', $fasilitasWisataSelected) ? 'checked' : '' }}> Outbond</label><br>
        <label><input type="checkbox" name="fasilitas_wisata[]" value="Pemandu" {{ in_array('Pemandu', $fasilitasWisataSelected) ? 'checked' : '' }}> Pemandu</label><br>
        <label><input type="checkbox" name="fasilitas_wisata[]" value="Toilet" {{ in_array('Toilet', $fasilitasWisataSelected) ? 'checked' : '' }}> Toilet</label>
        <label><input type="checkbox" name="fasilitas_wisata[]" value="Mushola" {{ in_array('Mushola', $fasilitasWisataSelected) ? 'checked' : '' }}> Mushola</label><br>
        <label><input type="checkbox" name="fasilitas_wisata[]" value="Tempat Bermain" {{ in_array('Tempat Bermain', $fasilitasWisataSelected) ? 'checked' : '' }}> Tempat Bermain</label><br>
    </div>

    <label>Latitude</label>
    <input type="number" step="any" name="latitude" value="{{ $wisata->latitude }}" class="form-control mb-2">

    <label>Longitude</label>
    <input type="number" step="any" name="longitude" value="{{ $wisata->longitude }}" class="form-control mb-2">

    <button class="btn btn-primary">Edit Wisata</button>
</form>



@endsection