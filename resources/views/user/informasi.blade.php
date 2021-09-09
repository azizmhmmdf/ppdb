@extends('layout.main')
@section('title', 'SMK WIKRAMA 1 GARUT')

@section('content')

<div class="row">
        <div class="col-md-12 mt-3">
            <div class="container-fluid">
                <div class="card-header gradient text-white" id="gradient1">
                    <div class="form-row">
                        <div class="form-group col-md-2 mt-4 ml-3"></div>
                            <div class="form-group col-md-9 mt-4">
                                @if($informasi->status == 'diverifikasi')
                                    <strong>
                                        <h1 class="font text-center">
                                            SELAMAT ANDA LOLOS TAHAP AWAL
                                            <br>
                                            BERIKUT JADWAL WAWANCARA {{ date('d, D M Y', strtotime($informasi->tanggal_wawancara)) }}
                                        </h1>
                                    </strong>
                                @elseif ($informasi->status == 'ditolak')
                                    <strong>
                                        <h1 class="font text-center">
                                            MAAF ANDA TIDAK LOLOS DI TAHAP AWAL INI
                                            <br>
                                            SILAHKAN CEK  DOKUMEN ANDA SUDAH LENGKAP ATAU BELUM
                                        </h1>
                                    </strong>
                                @else
                                    <strong>
                                        <h1 class="font text-center">
                                            BELUM ADA INFORMASI DARI PIHAK SEKOLAH
                                        </h1>
                                    </strong>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>

@endsection
