@extends('admin.layouts.base')
@section('title','About')
@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">About Me</h1>
    
    <!-- Biodata Section -->
    <div class="card shadow-sm">
        <div class="card-body">
            <p class="card-text">
                <strong>Nama:</strong> Agus Dwi Aryanto<br>
                <strong>NIM:</strong> 18.0504.0078<br>
                <strong>Email:</strong> im.agusdwi@gmail.com<br>
            </p>
        </div>
    </div>

    <!-- Foto Profil Section -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <img src="{{asset('/assets/img/undraw_profile_2.svg')}}" class="card-img-top" alt="Foto Profil">
                <div class="card-body text-center">
                    <h5 class="card-title">Foto Profil</h5>
                    <p class="card-text">Ini adalah foto profil saya. Saya senang bisa berbagi informasi lebih banyak dengan Anda!</p>
                </div>
            </div>
        </div>

        <!-- Deskripsi Singkat Section -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tentang Saya</h5>
                    <p class="card-text">
                        Laki-laki sejati tidak bercerita.
                    </p>
                    <p class="card-text">
                        Magelang, 2024
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
