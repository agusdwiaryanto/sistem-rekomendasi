<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Detailwisata;
use App\Models\Wisata;
use GuzzleHttp\Client;

class DetailwisataController extends Controller
{
    public function indexPage(Request $request)
    {
        $search = $request->input('search');
        $detailWisata = Detailwisata::when($search, function ($query, $search) {
            return $query->where('nama_tempat', 'like', "%$search%")
                         ->orWhere('rating', 'like', "%$search%")
                         ->orWhere('jumlah_ulasan', 'like', "%$search%");
        })->paginate(10);
        
        return view('admin.pages.detailwisata.index', compact('detailWisata'));
    }

    public function tambah() {
        return view('admin.pages.detailwisata.tambah');
    }

    public function submit(Request $request) {
        // Validasi input
        $validated = $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'jumlah_ulasan' => 'nullable|integer',
            'foto_url' => 'nullable|url',
            'deskripsi' => 'nullable|string',
        ]);

        // Menyimpan data ke database
        $detailWisata = new Detailwisata();
        $detailWisata->nama_tempat = $validated['nama_tempat'];
        $detailWisata->rating = $validated['rating'] ?? 0; // Default ke 0 jika null
        $detailWisata->jumlah_ulasan = $validated['jumlah_ulasan'] ?? 0; // Default ke 0 jika null
        $detailWisata->foto_url = $validated['foto_url'] ?? null;
        $detailWisata->deskripsi = $validated['deskripsi'] ?? null;
        $detailWisata->save();

        return redirect()->route('detailwisata.index')->with('success', 'Data detail wisata berhasil ditambahkan.');
    }

    public function edit($id) {
        $detailWisata = Detailwisata::findOrFail($id);
        return view('admin.pages.detailwisata.edit', compact('detailWisata'));
    }

    public function update(Request $request, $id) {
        // Validasi input
        $validated = $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'jumlah_ulasan' => 'nullable|integer',
            'foto_url' => 'nullable|url',
            'deskripsi' => 'nullable|string',
        ]);

        // Menyimpan data ke database
        $detailWisata = Detailwisata::findOrFail($id);
        $detailWisata->nama_tempat = $validated['nama_tempat'];
        $detailWisata->rating = $validated['rating'] ?? 0; // Default ke 0 jika null
        $detailWisata->jumlah_ulasan = $validated['jumlah_ulasan'] ?? 0; // Default ke 0 jika null
        $detailWisata->foto_url = $validated['foto_url'] ?? null;
        $detailWisata->deskripsi = $validated['deskripsi'] ?? null;
        $detailWisata->save();

        return redirect()->route('detailwisata.index')->with('success', 'Data detail wisata berhasil diedit.');
    }

    public function delete($id) {
        $detailWisata = Detailwisata::findOrFail($id);
        $detailWisata->delete();
        return redirect()->route('detailwisata.index')->with('success', 'Data detail wisata berhasil dihapus.');
    }

    public function updateAll()
{
    set_time_limit(120); // Mengatur batas waktu eksekusi menjadi 120 detik
    $apiKey = env('GOOGLE_MAPS_API_KEY');
    $client = new Client(['verify' => false]); // Menonaktifkan SSL verification
    $wisataList = Wisata::all();

    foreach ($wisataList as $wisata) {
        $query = urlencode($wisata->nama);
        $url = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input={$query}&inputtype=textquery&fields=place_id&key={$apiKey}";

        try {
            $response = $client->get($url);
            $data = json_decode($response->getBody()->getContents(), true);

            if (!isset($data['candidates'][0]['place_id'])) {
                continue;
            }

            $placeId = $data['candidates'][0]['place_id'];
            $detailUrl = "https://maps.googleapis.com/maps/api/place/details/json?place_id={$placeId}&key={$apiKey}";
            $detailResponse = $client->get($detailUrl);
            $detailData = json_decode($detailResponse->getBody()->getContents(), true);

            if (!isset($detailData['result'])) {
                continue;
            }

            $result = $detailData['result'];
            $detailWisata = Detailwisata::where('nama_tempat', $result['name'] ?? $wisata->nama)->first();

            // Ambil maksimal 5 URL foto jika tersedia
            $photoUrls = [];
            if (isset($result['photos']) && count($result['photos']) > 0) {
                $maxPhotos = min(5, count($result['photos'])); // Ambil maksimal 5 foto
                for ($i = 0; $i < $maxPhotos; $i++) {
                    $photoReference = $result['photos'][$i]['photo_reference'];
                    $photoUrls[] = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference={$photoReference}&key={$apiKey}";
                }
            }

            if ($detailWisata) {
                // Jika ditemukan, lakukan update
                $detailWisata->update([
                    'rating' => $result['rating'] ?? 0, // Menetapkan default ke 0 jika tidak ada rating
                    'jumlah_ulasan' => $result['user_ratings_total'] ?? 0, // Menetapkan default ke 0 jika tidak ada ulasan
                    'foto_url' => !empty($photoUrls) ? json_encode($photoUrls) : null, // Simpan array foto dalam bentuk JSON
                    'deskripsi' => $result['formatted_address'] ?? null,
                ]);
            } else {
                // Jika tidak ditemukan, buat entri baru
                Detailwisata::create([
                    'nama_tempat' => $result['name'] ?? $wisata->nama,
                    'rating' => $result['rating'] ?? 0, // Menetapkan default ke 0 jika tidak ada rating
                    'jumlah_ulasan' => $result['user_ratings_total'] ?? 0, // Menetapkan default ke 0 jika tidak ada ulasan
                    'foto_url' => !empty($photoUrls) ? json_encode($photoUrls) : null, // Simpan array foto dalam bentuk JSON
                    'deskripsi' => $result['formatted_address'] ?? null,
                ]);
            }
        } catch (\Exception $e) {
            // Menangani error jika gagal memanggil API
            \Log::error('Error fetching data from Google API: ' . $e->getMessage());
        }
    }

    return redirect()->back()->with('success', 'Semua data berhasil diperbarui!');
}

}
