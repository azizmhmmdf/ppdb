@extends('layout.tamplate')
@section('title', 'SMK WIKRAMA 1 GARUT')

@section('container')
<div class="row">
        <div class="col-md-12 mt-3">
            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Documen Peserta</h6>
                        <a href="/user/create" class="btn btn-primary float-right">Kembali</a>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
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
                                            <td><img src="http://localhost:8000/image/{{$document->kk ? $document->kk : 'not_found.jpg'}}" width="80" height="80"></td>
                                            <td><img src="http://localhost:8000/image/{{$document->akte ? $document->akte : 'not_found.jpg'}}" width="80" height="80"></td>
                                            <td><img src="http://localhost:8000/image/{{$document->skhun ? $document->skhun : 'not_found.jpg'}}" width="80" height="80"></td>
                                            <td><img src="http://localhost:8000/image/{{$document->ijazah ? $document->ijazah : 'not_found.jpg'}}" width="80" height="80"></td>
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





