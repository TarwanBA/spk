@extends('layouts.dashboard.index')

@section('dashboard')

    <div class="row justify-content-center">
        <div class="col-md-9 text-center mt-3">
            <h2>Sistem Pendukung Keputusan Metode WP & SAW</h2>
            <p class="lead">Sistem pendukung keputusaan penentuan prioritas produk unggulan batik dikota Ternate menggunakan metode WP (Weighted Product) dan SAW ( Simple Additive Weighting)</p>
        </div>
    </div>

    {{-- Button Proses Data --}}
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <button id="btnShowKriteria" class="btn-primary">
                <i class="fas fa-calculator"></i> <span id="btnText">Proses Data</span>
                <span id="loadingIcon" style="display: none;"><i class="fas fa-spinner fa spin"></i></span>
            </button>
        </div>
    </div>

    <div class="col-md-12 mt-4 text-center" style="display: none;" id="title">
    <p class="lead">Hasil Perbandingan Metode WP dan SAW</p>
    </div>

    {{-- Hasil Perbandingan Metode WP dan SAW --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-4">

                {{-- Tabel Hasil dan Perengkingan metode WP (Weighted Product) --}}
                <div class="col-md-6" style="display: none;" id="tabelKriteria">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Hasil dan Perengkingan metode WP (Weighted Product)</h3>
                        </div>                      
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                <tr>
                                    <th>Alternatif</th>
                                    <th>Nilai V</th>
                                    <th>Rangking</th>
                                </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    
                                        $v = [];                   
                                    
                                        $total_s = 0;
                                        foreach ($produkBatiks as $produk) {
                                            $total_s += pow($produk->harga, -$bobot['C2']) *
                                                        pow($produk->kualitas_kain, $bobot['C1']) *
                                                        pow($produk->warna, $bobot['C3']) *
                                                        pow($produk->teknik_pembuatan, $bobot['C4']) *
                                                        pow($produk->desain_motif, $bobot['C5']) *
                                                        pow($produk->keaslian, $bobot['C6']);
                                        }                                  
                                   
                                        foreach ($produkBatiks as $produkBatik) {
                                            
                                            $harga = $produkBatik->harga;
                                            $kualitas_kain = $produkBatik->kualitas_kain;
                                            $warna = $produkBatik->warna;
                                            $teknik_pembuatan = $produkBatik->teknik_pembuatan;
                                            $desain_motif = $produkBatik->desain_motif;
                                            $keaslian = $produkBatik->keaslian;
                            
                                            
                                            $nilai_s = pow($harga, -$bobot['C2']) *
                                                        pow($kualitas_kain, $bobot['C1']) *
                                                        pow($warna, $bobot['C3']) *
                                                        pow($teknik_pembuatan, $bobot['C4']) *
                                                        pow($desain_motif, $bobot['C5']) *
                                                        pow($keaslian, $bobot['C6']);
                            
                                        
                                            $v_produk = $nilai_s / $total_s;
                                            
                                           
                                            foreach ($produkBatik->alternatif as $alternatif) {
                                                $v[] = [
                                                    'nama_produk' => $produkBatik->nama_produk,
                                                    'kode' => $alternatif->kode,
                                                    'nilai_v' => $v_produk,
                                                ];
                                            }
                                          
                                        }                             
                            
                                        usort($v, function($a, $b) {
                                            return $b['nilai_v'] <=> $a['nilai_v'];
                                        });
                            
                                        $ranking = 1;
                                    @endphp
                            
                                    @foreach ($v as $index => $item)
                                    <tr>
                                         <td> {{ $item['kode'] }} &bull; {{ $item['nama_produk'] }}</td>
                                         <td style="text-align: center">{{ number_format($item['nilai_v'], 6, ',', '.') }}</td>
                                         <td style="text-align: center">{{ $ranking }}</td>
                                    </tr>
                                    @php
                                        $ranking++;
                                    @endphp
                                    @endforeach                            
                                </tbody>
                                
                            </table>
                        </div>
                        <a href="{{ route('bobot_produk_wp.index') }}" class="nav-link" target="_blank">
                            <i class="fas fa-eye">Lihat Detail</i>
                        
                        </a>
                        
                        <button onclick="downloadTable('example1')" type="button" class="btn btn-dark float-right" style="margin-right: 6px;">
                            <i class="fas fa-download"></i> Download Hasil 
                        </button>
                    </div>
                </div>

                {{-- Tabel Hasil dan Perengkingan metode SAW (Simple Additive Weighting) --}}
                <div class="col-md-6" style="display: none;" id="tabelPerengkingan">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Hasil dan Perengkingan metode SAW (Simple Additive Weighting)</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Alternatif</th>
                                        <th>Nilai SAW</th>
                                        <th>Peringkat</th>
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
                        <a href="{{ route('bobot_produk_saw.index')}}"  class="nav-link" target="_blank">
                            <i class="fas fa-eye">Lihat Detail</i>
                        </a>
                        
                        <button onclick="downloadTable('example2')" type="button" class="btn btn-dark float-right" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Download Hasil 
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
@endsection