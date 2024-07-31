@extends('layouts.dashboard.index')

@section('dashboard')

    <div class="row justify-content-center">
        <div class="col-md-9 text-center mt-3">
            <p class="lead">Detail perhitungan metode <strong> SAW ( Simple Additive Weighting)</strong></p>
        </div>
    </div>

<section class="content">
    <div class="container-fluid">

        {{-- Tabel Nilai Kriteria dan Alternatif --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Nilai Kriteria dan Alternatif</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Alternatif Produk</th>
                                    <th colspan="{{ count($kriterias) }}" class="text-center">Kriteria</th>
                                </tr>
                                <tr>
                                    @foreach ($kriterias as $item)
                                    <th style="text-align: center">{{ $item->kode }}</th>
                                    @endforeach
                            
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatifs as $index => $alternatif)
                                    <tr>
                                        <td style="text-align: center">{{ $alternatif->kode }}</td>
                                        <td style="text-align: center">{{ $produkBatiks[$index]->kualitas_kain }}</td>
                                        <td style="text-align: center">{{ $produkBatiks[$index]->harga }}</td>
                                        <td style="text-align: center">{{ $produkBatiks[$index]->warna }}</td>
                                        <td style="text-align: center">{{ $produkBatiks[$index]->teknik_pembuatan }}</td>
                                        <td style="text-align: center">{{ $produkBatiks[$index]->desain_motif }}</td>
                                        <td style="text-align: center">{{ $produkBatiks[$index]->keaslian }}</td>                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel Normalisasi Kriteria --}}
        <div class="row mt-4" style="display: block;" id="tabelKriteria">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Normalisasi Kriteria</h3>
                    </div>            
                    <div class="card-body" >
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Normalisasi</th>
                                    @foreach ($kriterias as $item)
                                        <th style="text-align: center">{{ $item->kode }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatifs as $index => $alternatif)
                                <tr>
                                    <td style="text-align: center">{{ $alternatif->kode }}</td>
                                    @php
                                    $kualitas_kain = $produkBatiks[$index]->kualitas_kain;
                                    $harga = $produkBatiks[$index]->harga;
                                    $warna = $produkBatiks[$index]->warna;
                                    $teknik_pembuatan = $produkBatiks[$index]->teknik_pembuatan;
                                    $desain_motif = $produkBatiks[$index]->desain_motif;
                                    $keaslian = $produkBatiks[$index]->keaslian;
                            
                                    $data_c1 = $filedkualitaskain;
                                    $data_c2 = $filedharga;
                                    $data_c3 = $filedwarna;
                                    $data_c4 = $filedteknikpembuatan;
                                    $data_c5 = $fileddesain;
                                    $data_c6 = $filedkeaslian;
                            
                                    $max_kualitas_kain = max($data_c1);
                                    $min_harga = min($data_c2);
                                    $max_warna = max($data_c3);
                                    $max_teknik_pembuatan = max($data_c4);
                                    $min_desain_motif = max($data_c5);
                                    $max_keaslian = max($data_c6);
                            
                                    $nilai_kualitas_kain = $kualitas_kain / $max_kualitas_kain;
                                    $nilai_harga = $min_harga / $harga;
                                    $nilai_teknik_pembuatan = $teknik_pembuatan / $max_teknik_pembuatan;
                            
                                    $nilai_warna = $warna / $max_warna;
                                    $nilai_desain_motif = $desain_motif / $min_desain_motif;
                                    $nilai_keaslian = $keaslian / $max_keaslian;
                            
                                    $nilai_normalisasi_c1 = rtrim($nilai_kualitas_kain, '0,');
                                    $nilai_normalisasi_c1 = rtrim($nilai_kualitas_kain, ',');

                                    $nilai_normalisasi_c2 = rtrim($nilai_harga, '0,');
                                    $nilai_normalisasi_c2 = rtrim($nilai_harga, ',');

                                    $nilai_normalisasi_c3 = rtrim($nilai_warna, '0,');
                                    $nilai_normalisasi_c3 = rtrim($nilai_warna, ',');

                                    $nilai_normalisasi_c4 = rtrim($nilai_teknik_pembuatan, '0,');
                                    $nilai_normalisasi_c4 = rtrim($nilai_teknik_pembuatan, ',');

                                    $nilai_normalisasi_c5 = rtrim($nilai_desain_motif, '0,');
                                    $nilai_normalisasi_c5 = rtrim($nilai_desain_motif, ',');

                                    $nilai_normalisasi_c6 = rtrim($nilai_keaslian, '0,');
                                    $nilai_normalisasi_c6 = rtrim($nilai_keaslian, ',');
                                    @endphp
                                    <td style="text-align: center">{{ $nilai_normalisasi_c1 }}</td>
                                    <td style="text-align: center">{{ $nilai_normalisasi_c2 }}</td>
                                    <td style="text-align: center">{{ $nilai_normalisasi_c3 }}</td>
                                    <td style="text-align: center">{{ $nilai_normalisasi_c4 }}</td>
                                    <td style="text-align: center">{{ $nilai_normalisasi_c5 }}</td>
                                    <td style="text-align: center">{{ $nilai_normalisasi_c6 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>           
                </div>               
            </div>           
        </div>     

        {{-- Tabel Hasil dan Perengkingan --}}
        <div class="row mt-4" style="display: block;" id="tabelPerengkingan">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Hasil dan Perengkingan</h3>
                    </div>                   
                    <div class="card-body" >
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Alternatif</th>
                                    <th style="text-align: center">Nilai SAW</th>
                                    <th style="text-align: center">Peringkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $bobot = $bobot;
                            
                                    $data_c1 = $filedkualitaskain; 
                                    $data_c2 = $filedharga; 
                                    $data_c3 = $filedwarna; 
                                    $data_c4 = $filedteknikpembuatan; 
                                    $data_c5 = $fileddesain; 
                                    $data_c6 = $filedkeaslian; 
                            
                                    $max_kualitas_kain = max($data_c1);  
                                    $min_harga = min($data_c2); 
                                    $max_warna = max($data_c3);  
                                    $max_teknik_pembuatan = max($data_c4);  
                                    $min_desain_motif = max($data_c5); 
                                    $max_keaslian = max($data_c6);  
                            
                                    $nilai_saw = [];
                            
                                    foreach ($alternatifs as $index => $alternatif) {
                                        $harga = $produkBatiks[$index]->harga;
                                        $kualitas_kain = $produkBatiks[$index]->kualitas_kain;
                                        $warna = $produkBatiks[$index]->warna;
                                        $teknik_pembuatan = $produkBatiks[$index]->teknik_pembuatan;
                                        $desain_motif = $produkBatiks[$index]->desain_motif;
                                        $keaslian = $produkBatiks[$index]->keaslian;
                            
                                        $nilai_kualitas_kain = $kualitas_kain / $max_kualitas_kain;
                                        $nilai_harga = $min_harga / $harga;
                                        $nilai_teknik_pembuatan = $teknik_pembuatan / $max_teknik_pembuatan;
                                
                                        $nilai_warna = $warna / $max_warna;
                                        $nilai_desain_motif = $desain_motif / $min_desain_motif;
                                        $nilai_keaslian = $keaslian / $max_keaslian;
                                
                                        $nilai_saw_alternatif = 
                                            ($bobot['C1'] * $nilai_kualitas_kain) +
                                            ($bobot['C2'] * $nilai_harga) +
                                            ($bobot['C3'] * $nilai_warna) +
                                            ($bobot['C4'] * $nilai_teknik_pembuatan) +
                                            ($bobot['C5'] * $nilai_desain_motif) +
                                            ($bobot['C6'] * $nilai_keaslian);
                            
                                        $nilai_saw[$index] = $nilai_saw_alternatif;
                                    }
                            
                                    arsort($nilai_saw);
                            
                                    $ranking = 1;
                                @endphp
                            
                                @foreach ($nilai_saw as $index => $nilai)
                                    <tr>
                                        <td>{{ $alternatifs[$index]->kode }} &bull; {{ $alternatifs[$index]->produkBatik->nama_produk }}</td>
                                        <td>{{ number_format($nilai, 6, '.', '.') }}</td>
                                        <td>{{ $ranking }}</td>
                                    </tr>
                                    @php $ranking++; @endphp
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>           
                </div>               
            </div>         
        </div>                   
    </div>       
</section>




    
@endsection