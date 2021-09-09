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
                            <div class="form-group col-md-2 mt-4 ml-5">
                                <img src="{{asset('image/LOGO KEBANGSAAN.png')}}" width="130" height="130">
                            </div>
                            <div class="form-group col-md-9 mt-5">
                                <strong>
                                    <h1 class="font">Kumpulan Data Ditolak
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
                                        <th>NO</th>
                                        <th>NISN</th>
                                        <th>NAMA</th>
                                        <th>WAWANCARA</th>
                                        <th>CATATAN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tolak as $usr)
                                        <tr class="text-center">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$usr->nisn}}</td>
                                            <td>{{$usr->name}}</td>
                                            <td>
                                                @if ($usr->wawancara)
                                                    <div class="text-success">
                                                        Sudah Melakukan Wawancara
                                                    </div>
                                                @else
                                                    <div class="text-danger">
                                                        Belum Melakukan Wawancara
                                                    </div>
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
                                                <a href="/admin/show/{{$usr->id}}" class="btn btn-warning">Detail</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$loop->index}}">
                                                    Batalkan
                                                </button>

                                                {{-- modal batalkan --}}
                                                    <div class="modal fade" id="exampleModal{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                        Apakah anda yakin ingin membatalkan nya ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                {{-- akhir modal batalkan --}}
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
