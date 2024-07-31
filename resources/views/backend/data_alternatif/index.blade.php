@extends('layouts.dashboard.index')

@section('dashboard')
<!-- Blank Start -->

    <div class="row bg-dark justify-content-left">
        <div class="col-md-12 mt-5 mb-4">
           
            <div class="col-12">
                <head><h4>Data Alternatif</h4></head>
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Table Alternatif</h6>
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#TambahData" disabled>
                        <i class="fas fa-plus"></i> Tambah Data
                      </button>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle">Nama Alternatif</th>
                                    <th style="vertical-align: middle">Kode</th>
                                    <th style="vertical-align: middle">Akasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Alternatif as $alternatif)

                                <tr>
                                    <td style="vertical-align: middle">{{ $alternatif->produkBatik->nama_produk }}</td>
                                    <td style="vertical-align: middle">{{$alternatif->kode}}</td>
                                    <td style="vertical-align: middle">
                                        <a href="#" class="btn btn-sm btn-primary " data-toggle="modal" data-target="#EditData{{ $alternatif->id_alternatif }}"><i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('alternatif.hapus', $alternatif->id_alternatif)}}"
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

@include('backend.data_alternatif.create')

@include('backend.data_alternatif.edit')

    
@endsection