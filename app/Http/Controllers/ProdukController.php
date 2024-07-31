<?php

namespace App\Http\Controllers;

use App\Models\ProdukBatik;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Fungsi menampilkan halaman produk batik
    public function index()
    {
        $produkbatik = ProdukBatik::all();

        return view('backend.data_produk.index', compact('produkbatik'));
    }

    // Fungsi menambah data produk batik
    public function tambah(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kualitas_kain' => 'nullable|string',
            'harga' => 'required|numeric',
            'warna' => 'nullable|string',
            'teknik_pembuatan' => 'nullable|string',
            'desain_motif' => 'nullable|string',
            'keaslian' => 'nullable|string',    
        ]);

        $produkbatik = ProdukBatik::create($request->all());

        return redirect()->route('produk.index')->with('success', 'Data Berhasil Ditambahkan!');

    }

    // Fungsi mengupdate atau merubah data prroduk batik
    public function update(Request $request, $id_produk)
    {
        $ValdidateData = $request->validate([
            'nama_produk' => 'required',
            'kualitas_kain' => 'nullable|string',
            'harga' => 'required|numeric',
            'warna' => 'nullable|string',
            'teknik_pembuatan' => 'nullable|string',
            'desain_motif' => 'nullable|string',
            'keaslian' => 'nullable|string',    
        ]);

        $produkbatik = ProdukBatik::findOrFail($id_produk);
        $produkbatik->update($ValdidateData);

        return redirect()->route('produk.index')->with('success', 'Data Berhasil Diupdate!');

    }

    // Fungsi menghapus data produkk batik
    public function hapus($id)
    {
        $produkbatik = ProdukBatik::findOrFail($id);
        $produkbatik->delete();

        return redirect()->route('produk.index')->with('success', 'Data Berhasil Dihapus!');

    }
}
