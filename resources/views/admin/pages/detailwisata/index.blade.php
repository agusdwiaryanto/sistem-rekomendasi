@extends('admin.layouts.base')

@section('title', 'Detail Wisata')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Detail Wisata</h1>

<div class="d-flex justify-content-between flex-wrap align-items-center mb-2">
    <a href="{{ route('detailwisata.updateAll') }}" class="btn btn-primary mb-3">Perbarui Semua Data</a>
    <h4 class="mb-2">List Detail Wisata</h4>

    <!-- Kolom Cari -->
    <form action="{{ route('detailwisata.index') }}" method="GET" class="d-flex mb-0">
        <div class="input-group">
            <input type="text" name="search" class="form-control bg-light border-0 small"
                   placeholder="Cari tempat wisata..." aria-label="Search" aria-describedby="basic-addon2"
                   value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <a class="btn btn-success ms-auto mb-2" href="#">Tambah</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Tempat</th>
                <th>Rating</th>
                <th>Jumlah Ulasan</th>
                <th>Foto</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($detailWisata as $no => $data)
            <tr>
                <td>{{ $loop->iteration + ($detailWisata->currentPage() - 1) * $detailWisata->perPage() }}</td>
                <td>{{ $data->nama_tempat }}</td>
                <td>{{ $data->rating }}</td>
                <td>{{ $data->jumlah_ulasan }}</td>
                
                <!-- Menampilkan foto pertama saja -->
        <td>
            @php
                // Cek apakah foto_url tidak null atau kosong
                $fotoUrls = !empty($data->foto_url) ? json_decode($data->foto_url) : [];
                $fotoUrl = !empty($fotoUrls) ? $fotoUrls[0] : null; // Ambil foto pertama jika ada
            @endphp

            @if ($fotoUrl)
                <img src="{{ $fotoUrl }}" alt="Foto Tempat Wisata" width="100">
            @else
                <span>Tidak ada foto</span>
            @endif
        </td>
                <td>{{ $data->deskripsi }}</td>
                <td class="d-flex gap-2">
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <form action="#" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Data tidak ditemukan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Menambahkan Pagination Links -->
<div class="d-flex justify-content-center mt-3">
    <nav aria-label="Page navigation" class="w-100">
        {{ $detailWisata->onEachSide(2)->links('pagination::bootstrap-4') }}
    </nav>
</div>

@endsection
