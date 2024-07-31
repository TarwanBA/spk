@extends('layouts.dashboard.index')

@section('dashboard')
<!-- Blank Start -->

    <div class="row bg-dark justify-content-left">
        <div class="col-md-12 mt-5 mb-4">
           
            <div class="col-12">
                <head><h4>Data Produk Batik</h4></head>
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Table Produk</h6>
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#TambahData">
                        <i class="fas fa-plus"></i> Tambah Data
                      </button>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle">ID Produk</th>
                                    <th style="vertical-align: middle">Nama Produk</th>
                                    <th style="vertical-align: middle">Nilai Kualitas Kain</th>
                                    <th style="vertical-align: middle">Nilai Harga</th>
                                    <th style="vertical-align: middle">Nilai Warna</th>
                                    <th style="vertical-align: middle">Nilai Teknik Pembuatan</th>
                                    <th style="vertical-align: middle">Nilai Desain Motif</th>
                                    <th style="vertical-align: middle">Nilai Keaslian & Asal</th>
                                    <th style="vertical-align: middle">Akasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produkbatik as $batik)
                                <tr>
                                   
                                    <td style="vertical-align: middle">{{$batik->id_produk}}</td>
                                    <td style="vertical-align: middle">{{$batik->nama_produk}}</td>
                                    <td style="vertical-align: middle">{{$batik->kualitas_kain}}</td>
                                    <td style="vertical-align: middle">{{$batik->harga}}</td>
                                    <td style="vertical-align: middle">{{$batik->warna}}</td>
                                    <td style="vertical-align: middle">{{$batik->teknik_pembuatan}}</td>
                                    <td style="vertical-align: middle">{{$batik->desain_motif}}</td>
                                    <td style="vertical-align: middle">{{$batik->keaslian}}</td>
                                    <td style="vertical-align: middle">
                                        <a href="#" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#EditData{{ $batik->id_produk }}"><i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('produk.hapus', $batik->id_produk)}}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
<!-- Blank End -->



@include('backend.data_produk.create')

@include('backend.data_produk.edit')
    
@endsection