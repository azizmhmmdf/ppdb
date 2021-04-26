@extends('layout.tamplate')
@section('title', 'SMK WIKRAMA 1 GARUT')

@section('container')

<div class="row">
        <div class="col-md-12 mt-3">
            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-gradient text-white" id="gradient1">
                        <div class="form-row">
                            <div class="form-group col-md-2 mt-4">
                                <img src="{{asset('image/LOGO KEBANGSAAN.png')}}" width="130" height="130" class="text-center ml-5">
                            </div>
                            <div class="form-group col-md-9 mt-5">
                                <strong>
                                    <h1 class="font">Kumpulan Data Peserta
                                        <br>
                                        PPDB SMK WIKRAMA 1 GARUT 2021
                                    </h1>
                                </strong>
                            </div>
                        </div>
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
                                        <th>CATATAN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $usr)
                                    <tr class="text-center">
                                        <td>{{$usr->nisn}}</td>
                                        <td>{{$usr->name}}</td>
                                        <td>
                                            @if($usr->status == 'diterima')
                                                <span class="badge badge-pill badge-primary">
                                                    Peserta Diterima
                                                </span>
                                            @elseif ($usr->status == 'ditolak')
                                                <span class="badge badge-pill badge-danger">
                                                    Peserta Ditolak
                                                </span>
                                            @else
                                                Belum Diterima
                                            @endif
                                        </td>
                                        <td>
                                            @if ($usr->catatan != null)
                                                {{$usr->catatan}}
                                            @else
                                                Tidak Ada Catatan
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/terima/{{$usr->id}}" class="btn btn-outline-success">Terima</a>
                                            <a href="/admin/tolak/{{$usr->id}}" class="btn btn-outline-danger">Tolak</a>
                                            <a href="/admin/show/{{$usr->id}}" class="btn btn-outline-warning">Detail</a>
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                                                Batalkan
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Batalkan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{url('admin/batal/' . $usr->id)}}" method="post">
                                                            @method('patch')
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="inputCity">Catatan</label>
                                                                        <textarea id="catatan" type="text" class="form-control" name="catatan" value="{{ old('catatan') }}" required autocomplete="catatan" autofocus></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
    </div>
@endsection
