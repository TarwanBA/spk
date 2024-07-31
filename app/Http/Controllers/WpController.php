<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BobotProdukWP;
use App\Models\KriteriaPenilaian;
use App\Models\Alternatif;
use App\Models\ProdukBatik;


class WpController extends Controller
{
    public function index()
    {
        $kriterias = KriteriaPenilaian::all();
        $alternatifs = Alternatif::all();
        $produkBatiks = ProdukBatik::with('alternatif')->get();
        $bobot = KriteriaPenilaian::pluck('bobot_kepentingan', 'kode')->toArray();
        $bobotProdukWP = BobotProdukWP::with('produkBatik', 'alternatif')->get();
        // dd($bobotProdukWP);;

        return view('backend.wp.index', compact('kriterias', 'bobot', 'produkBatiks', 'alternatifs'));
    }

}
