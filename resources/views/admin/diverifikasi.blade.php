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
                                <img src="{{asset('image/LOGO KEBANGSAAN.png')}}" width="130" height="130" >
                            </div>
                            <div class="form-group col-md-9 mt-5">
                                <strong>
                                    <h1 class="font">Kumpulan Data Diverifikasi
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
                                        <th>WAWANCARA</th>
                                        <th>DOCUMENT</th>
                                        <th>TANGGAL</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($verifikasi as $usr)
                                        <tr class="text-center">
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
                                                @if ($usr->document)
                                                    <div class="text-success">
                                                        Sudah Melengkapi Dokumen
                                                    </div>
                                                @else
                                                    <div class="text-danger">
                                                        Belum Melengkapi Dokumen
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                {{Date('d, D M Y', strtotime($usr->tanggal_wawancara)) }}
                                            </td>
                                            <td>
                                                @if ($usr->wawancara)
                                                    <a href="/admin/show/{{$usr->id}}" class="btn btn-warning">Detail</a>
                                                    {{-- <a href="/admin/terima/{{$usr->id}}" class="btn btn-success">Terima</a> --}}
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalterima{{$loop->index}}">
                                                        Terima
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$loop->index}}">
                                                        Tolak
                                                    </button>

                                                {{-- modal tolak --}}
                                                    <div class="modal fade" id="exampleModal{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Batalkan</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{url('admin/tolak/' . $usr->id)}}" method="post">
                                                                    @method('patch')
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-row">
                                                                            <label for="inputCity">Catatan</label>
                                                                            <div class="form-group col-md-12">
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
                                                {{-- akhir modal tolak --}}

                                                {{-- awal modal terima --}}
                                                    <div class="modal fade" id="exampleModalterima{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Batalkan</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{url('admin/terima/' . $usr->id)}}" method="post">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-row">
                                                                            Apakah Anda Yakin Menerimanya?
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
                                                {{-- akhir modal terima --}}
                                                @elseif (date('Y-m-d') == $usr->tanggal_wawancara)
                                                    <a href="/admin/wawancara/{{$usr->id}}" class="btn btn-primary">Wawancara</a>
                                                    <a href="/admin/show/{{$usr->id}}" class="btn btn-warning ">Detail</a>
                                                    @else
                                                    <a href="/admin/show/{{$usr->id}}" class="btn btn-warning ">Detail</a>
                                                @endif
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
