@extends('layout.main')
@section('title', 'SMK WIKRAMA 1 GARUT')

@section('content')

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

                    @if($informasi->status == 'diterima')
                        SELAMAT ANDA LOLOS TAHAP AWAL , BERIKUT JADWAL WAWANCARA {{$informasi->tanggal_wawancara}}
                    @elseif ($informasi->status == 'ditolak')
                        MAAF ANDA TIDAK LOLOS DI TAHAP AWAL INI , SILAHKAN CEK  DOKUMEN ANDA SUDAH LENGKAP ATAU BELUM
                    @endif
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>

@endsection
