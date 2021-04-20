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
                                        <th>NISN</th>
                                        <th>NAMA</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($data as $dt) --}}
                                        @foreach ($user as $usr)
                                            <tr class="text-center">
                                                <td>{{$usr->nisn}}</td>
                                                <td>{{$usr->name}}</td>
                                                <td>
                                                    <span class="badge badge-pill badge-primary">
                                                            @if($usr->status == 'diterima')
                                                                Peserta Diterima
                                                            @elseif ($usr->status == 'ditolak')
                                                                Peserta Ditolak
                                                            @else
                                                                Belum
                                                            @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    @if($usr->status == 'belum')
                                                        <a href="/admin/terima/{{$usr->id}}" class="btn btn-success">Terima</a>
                                                        <a href="/admin/tolak/{{$usr->id}}" class="btn btn-danger">Tolak</a>
                                                    @elseif ($usr->status == 'diterima')
                                                        <a href="/admin/tolak/{{$usr->id}}" class="btn btn-danger">Tolak</a>
                                                    @elseif ($usr->status == 'ditolak')
                                                        <a href="/admin/terima/{{$usr->id}}" class="btn btn-success">Terima</a>
                                                    @endif
                                                    <a href="/admin/show/{{$usr->id}}" class="btn btn-warning">Detail</a>
                                                </td>
                                            </tr>
                                            {{-- @endforeach --}}
                                    @endforeach
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
