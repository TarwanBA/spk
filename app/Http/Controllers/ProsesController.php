<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\KriteriaPenilaian;
use App\Models\ProdukBatik;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    public function index()
    {
        $kriterias = KriteriaPenilaian::all();
        $alternatifs = Alternatif::all();
        $produkBatiks = ProdukBatik::all();
        $filedkualitaskain = ProdukBatik::pluck('kualitas_kain')->toArray();
        $filedharga = ProdukBatik::pluck('harga')->toArray();
        $filedwarna = ProdukBatik::pluck('warna')->toArray();
        $filedteknikpembuatan = ProdukBatik::pluck('teknik_pembuatan')->toArray();
        $fileddesain = ProdukBatik::pluck('desain_motif')->toArray();
        $filedkeaslian = ProdukBatik::pluck('keaslian')->toArray();
        $bobot = KriteriaPenilaian::pluck('bobot_kepentingan', 'kode')->toArray();
        // dd($bobot);


        return view('backend.proses_data.index',  compact('bobot', 'filedharga', 'filedwarna', 'filedteknikpembuatan', 'fileddesain', 'filedkeaslian', 'kriterias', 'alternatifs', 'produkBatiks', 'filedkualitaskain'));
    }
}
