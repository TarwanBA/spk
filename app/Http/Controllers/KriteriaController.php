<?php

namespace App\Http\Controllers;

use App\Models\KriteriaPenilaian;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    // Fungsi menampilkan halaman kriteria
    public function index()
    {
        $Kriteria = KriteriaPenilaian::all();

        return view('backend.data_kriteria.index', compact('Kriteria'));
    }

    // Fungsi menambah data kriteria
    public function tambah(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required',
            'kode' => 'required',
            'jenis' => 'required',
            'bobot_kepentingan' => 'required',
        ]);

        $Kriteria = KriteriaPenilaian::create($request->all());

        return redirect()->route('kriteria.index')->with('success', 'Data Berhasil Ditambahkan!');

    }

    // Fungsi mengupdate atau merubah data kriteria
    public function update(Request $request, KriteriaPenilaian $kriteria)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required',
            'kode' => 'required',
            'jenis' => 'required',
            'bobot_kepentingan' => 'required',
        ]);

        $kriteria->update($request->all());

        return redirect()->route('kriteria.index')->with('success', 'Data Berhasil Diupdate!');

    }

    // Fungsi menghapus data kriteria
    public function hapus(KriteriaPenilaian $kriteria)
    {
        $kriteria->delete();

        return redirect()->route('kriteria.index')->with('success', 'Data Berhasil Dihapus!');

    }
}
