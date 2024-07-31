@extends('layouts.dashboard.index')

@section('dashboard')
<!-- Blank Start -->

    <div class="row bg-dark justify-content-left">
        <div class="col-md-12 mt-5 mb-4">
           
            <div class="col-12">
                <head><h4>Data Kriteria</h4></head>
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Table Kriteria</h6>
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#TambahData">
                        <i class="fas fa-plus"></i> Tambah Data
                      </button>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle">ID Kriteria</th>
                                    <th style="vertical-align: middle">Kriteria</th>
                                    <th style="vertical-align: middle">Kode</th>
                                    <th style="vertical-align: middle">Nilai</th>
                                    <th style="vertical-align: middle">Bobot</th>
                                    <th style="vertical-align: middle">Jenis</th>
                                    <th style="vertical-align: middle">Akasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Kriteria as $kriteria)

                                <tr>
                                    <td style="vertical-align: middle">{{$kriteria->id_kriteria}}</td>
                                    <td style="vertical-align: middle">{{$kriteria->nama_kriteria}}</td>
                                    <td style="vertical-align: middle">{{$kriteria->kode}}</td>
                                    <td style="vertical-align: middle">{{$kriteria->bobot_kriteria}}</td>
                                    <td style="vertical-align: middle">{{$kriteria->bobot_kepentingan}}</td>
                                    <td style="vertical-align: middle">{{$kriteria->jenis}}</td>
                                    <td style="vertical-align: middle">
                                        <a href="#" class="btn btn-sm btn-primary " data-toggle="modal" data-target="#EditData{{ $kriteria->id_kriteria }}"><i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('kriteria.hapus', $kriteria->id_kriteria)}}"
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

@include('backend.data_kriteria.create')

@include('backend.data_kriteria.edit')

    
@endsection