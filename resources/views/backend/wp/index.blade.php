@extends('layouts.dashboard.index')

@section('dashboard')

    {{-- Titela WP --}}
    <div class="row justify-content-center">
        <div class="col-md-9 text-center mt-3">
            <h2>Sistem Pendukung Keputusan Metode WP & SAW</h2>
            <p class="lead">Detail Perhitungan metode WP (Weighted Product)</p>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        
            {{-- Tabel Perhitungan nilai bobot awal --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Perhitungan nilai bobot awal</h3>
                            <div class="card-tools">
                                <a href="#" id="btn-hitung" class="btn btn-primary">
                                    <i class="fas fa-calculator"></i> Hitung
                                </a>
                            </div>
                        </div>                  
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Bobot/Kriteria</th>
                                        @foreach ($kriterias as $item)
                                        <th style="text-align: center">{{ $item->kode }}</th>
                                        @endforeach
                                        <th style="text-align: center">Total Bobot Kepentingan</th>
                                    </tr>
                                </thead>
                                <tbody class="h">
                                    <tr>
                                         <td style="text-align: center">Bobot Kepentingan</td>
                                        @foreach ($kriterias as $item)
                                         <td style="text-align: center">{{ $item->bobot_kepentingan }}</td>
                                        @endforeach
                                        <td style="text-align: center" id="total_bobot_kepentingan">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                    
                    </div>               
                </div>         
            </div>
        
            {{-- Tabel Matriks Perbandingan --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Matriks Perbandingan</h3>
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
                                             <td style="text-align: center">{{ number_format($produkBatiks[$index]->harga, 0, ',', '.') }}</td>
                                             <td style="text-align: center">{{ $produkBatiks[$index]->kualitas_kain }}</td>
                                             <td style="text-align: center">{{ $produkBatiks[$index]->warna }}</td>
                                             <td style="text-align: center">{{ $produkBatiks[$index]->teknik_pembuatan }}</td>
                                             <td style="text-align: center">{{ $produkBatiks[$index]->desain_motif }}</td>
                                             <td style="text-align: center">{{ $produkBatiks[$index]->keaslian }}</td>
                                            @php
                                        
                                                $harga = $produkBatiks[$index]->harga;
                                                $kualitas_kain = $produkBatiks[$index]->kualitas_kain;
                                                $warna = $produkBatiks[$index]->warna;
                                                $teknik_pembuatan = $produkBatiks[$index]->teknik_pembuatan;
                                                $desain_motif = $produkBatiks[$index]->desain_motif;
                                                $keaslian = $produkBatiks[$index]->keaslian;
                                
                                            
                                                $bobot = $bobot;
                                
                                            
                                                $nilai_s = pow($harga, $bobot['C2']) *
                                                        pow($kualitas_kain, $bobot['C1']) *
                                                        pow($warna, $bobot['C2']) *
                                                        pow($teknik_pembuatan, $bobot['C3']) *
                                                        pow($desain_motif, $bobot['C4']) *
                                                        pow($keaslian, $bobot['C5']);
                                            @endphp                                       
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>                     
                        </div>                    
                    </div>             
                </div>
            </div>

            {{-- Tabel Perhitungan Nilai Vektor S --}}
            <div class="row" style="display: block;" id="tabelVektorS">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Perhitungan Nilai Vektor S</h3>
                        </div>                
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                            
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Alternatif</th>
                                        <th style="text-align: center">Nilai S</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_s = 0;
                                        $s_values = [];
                                
                                        $bobot = array_map('floatval', $bobot);
                                        
                                        foreach ($produkBatiks as $produkBatik) {
                                            $harga = $produkBatik->harga;
                                            $kualitas_kain = $produkBatik->kualitas_kain;
                                            $warna = $produkBatik->warna;
                                            $teknik_pembuatan = $produkBatik->teknik_pembuatan;
                                            $desain_motif = $produkBatik->desain_motif;
                                            $keaslian = $produkBatik->keaslian;
                                
                                            $nilai_s = pow($kualitas_kain, $bobot['C1']) *
                                                       pow($harga, -$bobot['C2']) *
                                                       pow($warna, $bobot['C3']) *
                                                       pow($teknik_pembuatan, $bobot['C4']) *
                                                       pow($desain_motif, $bobot['C5']) *
                                                       pow($keaslian, $bobot['C6']);
                                
                                            $total_s += $nilai_s;
                                            
                                            $s_values[$produkBatik->nama_produk] = $nilai_s;
                                        }
                                    @endphp
                                
                                    @foreach ($produkBatiks as $produkBatik)
                                    <tr>
                                        @foreach ($produkBatik->alternatif as $alternatif)
                                            <td style="text-align: center">{{ $alternatif->kode }}</td>
                                        @endforeach
                                        
                                        @php
                                            $s_produk = $s_values[$produkBatik->nama_produk] ?? 0;
                                        @endphp
                                        
                                        <td style="text-align: center">{{ number_format($s_produk, 6, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>                                                                                                         
                            </table>
                        </div>                    
                    </div>                
                </div>
            </div>
                    
            {{-- Tabel Perhitungan Nilai Vektor V --}}
            <div class="row"  style="display: block;" id="tabelVektorV">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Perhitungan Nilai Vektor V</h3>                    
                        </div>
                        
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Alternatif</th>
                                        <th style="text-align: center">Nilai V</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $v = [];
                                        $total_s = 0;
                                        
                                        $bobot = array_map('floatval', $bobot);
                                        
                                        foreach ($produkBatiks as $produkBatik) {
                                            $harga = $produkBatik->harga;
                                            $kualitas_kain = $produkBatik->kualitas_kain;
                                            $warna = $produkBatik->warna;
                                            $teknik_pembuatan = $produkBatik->teknik_pembuatan;
                                            $desain_motif = $produkBatik->desain_motif;
                                            $keaslian = $produkBatik->keaslian;
                                    
                                            $nilai_s = pow($kualitas_kain, $bobot['C1']) *
                                                       pow($harga, -$bobot['C2']) *
                                                       pow($warna, $bobot['C3']) *
                                                       pow($teknik_pembuatan, $bobot['C4']) *
                                                       pow($desain_motif, $bobot['C5']) *
                                                       pow($keaslian, $bobot['C6']);                                    
                                      
                                            $total_s += $nilai_s;
                                        }
                                        
                                        foreach ($produkBatiks as $produkBatik) {
                                            $harga = $produkBatik->harga;
                                            $kualitas_kain = $produkBatik->kualitas_kain;
                                            $warna = $produkBatik->warna;
                                            $teknik_pembuatan = $produkBatik->teknik_pembuatan;
                                            $desain_motif = $produkBatik->desain_motif;
                                            $keaslian = $produkBatik->keaslian;
                                    
                                            $nilai_s = pow($kualitas_kain, $bobot['C1']) *
                                                       pow($harga, -$bobot['C2']) *
                                                       pow($warna, $bobot['C3']) *
                                                       pow($teknik_pembuatan, $bobot['C4']) *
                                                       pow($desain_motif, $bobot['C5']) *
                                                       pow($keaslian, $bobot['C6']);
                                    
                                            $v_produk = $total_s ? ($nilai_s / $total_s) : 0; 
                                            $v[$produkBatik->nama_produk] = $v_produk;
                                        }
                                    @endphp
                                
                                    @foreach ($produkBatiks as $produkBatik)
                                    <tr>
                                        @foreach ($produkBatik->alternatif as $alternatif)
                                            <td style="text-align: center">{{ $alternatif->kode }}</td>
                                        @endforeach
                                        
                                        @php
                                            $v_produk = $v[$produkBatik->nama_produk] ?? 0;
                                        @endphp
                                        
                                        <td style="text-align: center">{{ number_format($v_produk, 6, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>                                
                            </table>                    
                        </div>                
                    </div>            
                </div>   
            </div>
            
            {{-- Tabel Hasil dan Perengkingan Alternatif Produk --}}
            <div class="row" style="display: block;" id="tabelhasilWP">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Hasil dan Perengkingan Alternatif Produk</h3>            
                        </div>                
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Alternatif</th>
                                        <th style="text-align: center">Nilai V</th>
                                        <th style="text-align: center">Rangking</th>
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
                    </div>            
                </div>    
            </div>
                    
        </div>
    </section> 
       
@endsection