<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wisata; // Impor model Wisata

class WisataController extends Controller
{
    //
    public function indexPage(Request $request)
    {
        // return view('admin.pages.wisata.index');
        $wisata = Wisata::get();
        $search = $request->input('search');
        $wisata = Wisata::when($search, function ($query, $search) {
        return $query->where('nama', 'like', "%$search%")
                     ->orWhere('jenis_wisata', 'like', "%$search%")
                     ->orWhere('fasilitas_wisata', 'like', "%$search%");
    })->paginate(10);
        return view('admin.pages.wisata.index', compact('wisata'));
    }
    

    function tambah() {
        return view('admin.pages.wisata.tambah');
    }

    function submit(Request $request) {
        $wisata = new Wisata();
        $wisata->nama = $request->nama;
        // $wisata->jenis_wisata = implode(',', $request->jenis_wisata);
        $wisata->jenis_wisata = is_array($request->jenis_wisata) ? implode(',', $request->jenis_wisata) : '';
        // $wisata->fasilitas_wisata = implode(',', $request->fasilitas_wisata);
        $wisata->fasilitas_wisata = is_array($request->fasilitas_wisata) ? implode(',', $request->fasilitas_wisata) : '';
        $wisata->latitude = $request->latitude;
        $wisata->longitude = $request->longitude;
        $wisata->save();

        return redirect()->route('wisata.index')->with('success', 'Data wisata berhasil ditambahkan.');
    }

    function edit($id) {
        $wisata = Wisata::find($id);
        return view('admin.pages.wisata.edit', compact('wisata'));
    }

    function update(Request $request, $id) {
        $wisata = Wisata::findOrFail($id);
        $wisata->nama = $request->nama;
        // $wisata->jenis_wisata = implode(',', $request->jenis_wisata);
        $wisata->jenis_wisata = is_array($request->jenis_wisata) ? implode(',', $request->jenis_wisata) : '';
        // $wisata->fasilitas_wisata = implode(',', $request->fasilitas_wisata);
        $wisata->fasilitas_wisata = is_array($request->fasilitas_wisata) ? implode(',', $request->fasilitas_wisata) : '';
        $wisata->latitude = $request->latitude;
        $wisata->longitude = $request->longitude;
        $wisata->save();

        return redirect()->route('wisata.index')->with('success', 'Data wisata berhasil diedit.');
    }

    function delete($id) {
        $wisata = Wisata::find($id);
        $wisata->delete();
        return redirect()->route('wisata.index')->with('success', 'Data wisata berhasil dihapus.');
    }

}
