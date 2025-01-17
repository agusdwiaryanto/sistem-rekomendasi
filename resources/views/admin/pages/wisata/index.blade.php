@extends('admin.layouts.base')
@section('title','Wisata')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Wisata</h1>

<div class="d-flex justify-content-between flex-wrap align-items-center mb-2">
    <h4 class="mb-2">List Wisata</h4>
    
    <!-- Kolom Cari -->
    <form action="{{ route('wisata.index') }}" method="GET" class="d-flex mb-0">
        <div class="input-group">
            <input type="text" name="search" class="form-control bg-light border-0 small"
                   placeholder="Cari wisata..." aria-label="Search" aria-describedby="basic-addon2"
                   value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <a class="btn btn-success ms-auto mb-2" href="{{ route('wisata.tambah') }}">Tambah</a>
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
                <th>Nama</th>
                <th>Jenis Wisata</th>
                <th>Fasilitas Wisata</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($wisata as $no => $data)
            <tr>
                <td>{{ $loop->iteration + ($wisata->currentPage() - 1) * $wisata->perPage() }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->jenis_wisata }}</td>
                <td>{{ $data->fasilitas_wisata }}</td>
                <td>{{ $data->latitude }}</td>
                <td>{{ $data->longitude }}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('wisata.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('wisata.delete', $data->id) }}" method="post" class="d-inline">
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
        {{ $wisata->onEachSide(2)->links('pagination::bootstrap-4') }}
    </nav>
</div>

@endsection
