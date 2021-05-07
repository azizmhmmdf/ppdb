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
                                    <h1 class="font">SESI WAWANCARA PESERTA DIDIK
                                        <br>
                                        SMK WIKRAMA 1 GARUT 2021
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

                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.wawancara.store')}}" method="post">
                                @csrf
                                <div class="text-center font">
                                    <h4> Form Wawancara Anak</h4>
                                </div>
                                <br>
                                {{-- card wawancara anak --}}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <label for="pertanyaan1" class="font">1. Tau sekolah SMK WIKRAMA dari mana ?</label>
                                                <select id="pertanyaan1" type="text" class="form-control @error('pertanyaan1') is-invalid @enderror" name="pertanyaan1" value="{{ old('pertanyaan1') }}" required autocomplete="pertanyaan1" autofocus>
                                                    <option>Pilih</option>
                                                    <option value="Guru/Staf/Laboran/Pegawai Wikrama">Guru/Staf/Laboran/Pegawai Wikrama</option>
                                                    <option value="Siswa SMK WIKRAMA">Siswa SMK WIKRAMA</option>
                                                    <option value="Alumni SMK WIKRAMA">Alumni SMK WIKRAMA</option>
                                                    <option value="Guru SMP">Guru SMP</option>
                                                    <option value="Sosial Media">Sosial Media</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="pertanyaan2" class="font">6. Apakah anda meroko ? </label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Pernah - " name="pertanyaan2" id="pernah1" required>
                                                    <label class="form-check-label" for="pernah1">
                                                        Pernah
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Tidak Pernah" name="pertanyaan2" id="tidak1" required>
                                                    <label class="form-check-label" for="tidak1">
                                                        Tidak Pernah
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="pertanyaan3" class="font">2. Apakah Anda Pernah Pacaran ?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Pernah - " name="pertanyaan3" id="pernah2" required>
                                                    <label class="form-check-label" for="pernah2">
                                                        Pernah
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Tidak Pernah" name="pertanyaan3" id="tidak2" required>
                                                    <label class="form-check-label" for="tidak2">
                                                        Tidak Pernah
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="pertanyaan4" class="font">7. Apakah Anda Ingin Mengikuti Program Unggulan ? </label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Unggulan" name="pertanyaan4" id="unggulan1" required>
                                                    <label class="form-check-label" for="unggulan1">
                                                        Unggulan
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Reguler" name="pertanyaan4" id="reguler1" required>
                                                    <label class="form-check-label" for="reguler1">
                                                        Reguler
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="pertanyaan5" class="font">3. Kenapa Anda Memilih SMK WIKRAMA ?</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="pertanyaan5" name="pertanyaan5" placeholder="Jawaban...">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="pertanyaan6" class="font">8. Apakah Anda Pernah Mengkonsumsi Narkoba Sebelumnya ? </label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Pernah" name="pertanyaan6" id="pernah3" required>
                                                    <label class="form-check-label" for="pernah3">
                                                        Pernah
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Tidak Pernah" name="pertanyaan6" id="tidak3" required>
                                                    <label class="form-check-label" for="tidak3">
                                                        Tidak Pernah
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="pertanyaan7" class="font">4. Tes Matematika</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Lancar" name="pertanyaan7" id="lancar1" required>
                                                    <label class="form-check-label" for="lancar1">
                                                        Lancar
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Kurang Lancar" name="pertanyaan7" id="kuranglancar1" required>
                                                    <label class="form-check-label" for="kuranglancar1">
                                                        Kurang Lancar
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Tidak Lancar" name="pertanyaan7" id="tidaklancar1" required>
                                                    <label class="form-check-label" for="tidaklancar1">
                                                        Tidak Lancar
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="pertanyaan8" class="font">9. Jurusan yang diminati </label>
                                                <select id="pertanyaan8" type="text" class="form-control @error('pertanyaan8') is-invalid @enderror" name="pertanyaan8" value="{{ old('pertanyaan8') }}" required autocomplete="pertanyaan1" autofocus>
                                                    <option>Pilih</option>
                                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                    <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                                    <option value="Perhotelan">Perhotelan</option>
                                                    <option value="Bisnis Daring Dan Pemasaran">Bisnis Daring Dan Pemasaran</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="pertanyaan9" class="font">5. Tes Baca Al-qur'an</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Lancar" name="pertanyaan9" id="lancar2" required>
                                                    <label class="form-check-label" for="lancar2">
                                                        Lancar
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Kurang Lancar" name="pertanyaan9" id="kuranglancar2" required>
                                                    <label class="form-check-label" for="kuranglancar2">
                                                        Kurang Lancar
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Tidak Lancar" name="pertanyaan9" id="tidaklancar2" required>
                                                    <label class="form-check-label" for="tidaklancar2">
                                                        Tidak Lancar
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="pertanyaan10" class="font">10. Alasan Mengambil Jurusan Tersebut </label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="pertanyaan10" name="pertanyaan10" placeholder="Jawaban...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- akhir card wawancara anak --}}
                                <br>
                                <div class="text-center font">
                                    <h4> Form Wawancara Orang Tua</h4>
                                </div>
                                <br>
                                {{-- card wawancara orang tua --}}
                                <div class="card">
                                    <div class="card-body">
                                        This is some text within a card body.
                                    </div>
                                </div>
                                {{-- akhir card wawancara orang tua --}}
                                <br>

                                <button type="submit" class="btn btn-primary">
                                    Kirim
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection






