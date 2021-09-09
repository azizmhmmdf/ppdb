@extends('layout.tamplate')
@section('title', 'SMK WIKRAMA 1 GARUT')

@section('container')
<div class="row">
        <div class="col-md-12 mt-3">
            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header bg-gradient text-white" id="gradient1">
                            <div class="form-row">
                                <div class="form-group col-md-2 mt-4">
                                    <img src="{{asset('image/LOGO KEBANGSAAN.png')}}" width="130" height="130" class="text-center ml-5">
                                </div>
                                <div class="form-group col-md-9 mt-5">
                                    <strong>
                                        <h1 class="font">Data {{$admin->name}}
                                            <br>
                                            PPDB SMK WIKRAMA 1 GARUT 2021
                                        </h1>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div>
                            @if ($admin->status == 'belum')
                                <a href="/user/create" class="btn btn-primary ml-3 mt-2">Kembali</a>
                            @elseif ($admin->status == 'ditolak')
                                <a href="/admin/peserta/ditolak" class="btn btn-primary ml-3 mt-2">Kembali</a>
                            @elseif ($admin->status == 'diterima')
                                <a href="/admin/peserta/diterima" class="btn btn-primary ml-3 mt-2">Kembali</a>
                            @elseif ($admin->status == 'diverifikasi')
                                <a href="/admin/peserta/diverifikasi" class="btn btn-primary ml-3 mt-2">Kembali</a>
                            @endif
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                        @endif
                    <div class="card-body">
                        <div class="table-responsive mt-2">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>NAMA LENGKAP</th>
                                        <th>NISN</th>
                                        <th>EMAIL</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>TEMPAT LAHIR</th>
                                        <th>TANGGAL LAHIR</th>
                                        <th>ALAMAT</th>
                                        <th>NO HP</th>
                                        <th>ASAL SEKOLAH</th>
                                        <th>TAHUN LULUS</th>
                                        <th>AGAMA</th>
                                        <th>JURUSAN</th>
                                        <th>KARTU KELUARGA</th>
                                        <th>AKTA</th>
                                        <th>SKHUN</th>
                                        <th>IJAZAH</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->nisn}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->jk}}</td>
                                        <td>{{$admin->tempat_lahir}}</td>
                                        <td>{{$admin->tanggal_lahir}}</td>
                                        <td>{{$admin->alamat}}</td>
                                        <td>{{$admin->no_hp}}</td>
                                        <td>{{$admin->asal_sekolah}}</td>
                                        <td>{{$admin->tahun_lulus}}</td>
                                        <td>{{$admin->agama}}</td>
                                        <td>{{$admin->jurusan}}</td>
                                        @if ($document!='')
                                            <td><img src="{{asset('image/'. $document->kk)}}" width="80" height="80"></td>
                                            <td><img src="{{asset('image/'. $document->akte)}}" width="80" height="80"></td>
                                            <td><img src="{{asset('image/'. $document->skhun)}}" width="80" height="80"></td>
                                            <td><img src="{{asset('image/'. $document->ijazah)}}" width="80" height="80"></td>
                                        @else
                                            <td colspan="4">Data Kosong</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
@endsection





