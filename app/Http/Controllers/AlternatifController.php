<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\ProdukBatik;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    // Fungsi menampilkan halaman data alternatif
    public function index ()
    {
        $Alternatif = Alternatif::with('produkBatik')->get();
        $produkbatik = ProdukBatik::all();


        return view('backend.data_alternatif.index', compact('Alternatif', 'produkbatik'));
    }

    // Fungsi menambahkan data alternatif
    public function tambah(Request $request)
    {
        $request->validate([
            'nama_alternatif' => 'required',
            'kode' => 'required',  
        ]);

        $Alternatif = Alternatif::create($request->all());

        return redirect()->route('alternatif.index')->with('success', 'Data Berhasil Ditambahkan!');

    }

    // Fungsi mengupdate atau merubah data alternatif
    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
           'nama_alternatif' => 'required',
            'kode' => 'required',    
        ]);

        $alternatif->update($request->all());

        return redirect()->route('alternatif.index')->with('success', 'Data Berhasil Diupdate!');

    }

    // Fungsi menghapus data alternatif
    public function hapus(Alternatif $alternatif)
    {
        $alternatif->delete();

        return redirect()->route('alternatif.index')->with('success', 'Data Berhasil Dihapus!');

    }


}
