<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RekomendasiController extends Controller
{
    public function kirimData(Request $request)
{
    // Ambil data dari form
    $data = [
        'jenis_wisata' => $request->input('jenis_wisata'),
        'fasilitas_wisata' => $request->input('fasilitas_wisata'),
        'latitude' => (float)$request->input('latitude'),  // Pastikan ini float
        'longitude' => (float)$request->input('longitude'),  // Pastikan ini float
    ];

    try {
        // Mengirim request POST ke Flask
        $response = Http::post('http://localhost:5000/rekomendasi', $data);

        // Cek apakah respons sukses
        if ($response->successful()) {
            return $response->json(); // Ambil respons JSON
        } else {
            // Jika tidak sukses, tampilkan body dari response
            Log::error('Flask server error: ' . $response->body());
            return response()->json(['error' => 'Error communicating with Flask server'], 500);
        }
    } catch (\Exception $e) {
        Log::error('Connection error: ' . $e->getMessage());
        return response()->json(['error' => 'Failed to connect to Flask server'], 500);
    }
}
    
    public function getRekomendasi(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'jenis_wisata' => 'required|string',
            'fasilitas_wisata' => 'required|array',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Ambil data dari form
        $data = [
            'jenis_wisata' => $validated['jenis_wisata'],
            'fasilitas_wisata' => $validated['fasilitas_wisata'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
        ];

        // Kirim data ke server Python
        try {
            $response = Http::post('http://localhost:5000/rekomendasi', $data);

            if ($response->successful()) {
                // Berhasil mendapatkan rekomendasi dari Python
                return response()->json($response->json());
            } else {
                // Gagal mendapatkan rekomendasi
                return response()->json(['error' => 'Gagal mendapatkan rekomendasi dari server Python'], 500);
            }
        } catch (\Exception $e) {
            // Jika terjadi kesalahan dalam permintaan ke server Python
            return response()->json(['error' => 'Terjadi kesalahan dalam menghubungi server Python: ' . $e->getMessage()], 500);
        }
    }
}
