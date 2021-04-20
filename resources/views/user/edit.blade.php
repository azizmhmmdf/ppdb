@extends('layout.main')
@section('title', 'SMK WIKRAMA 1 GARUT')

@section('content')
<div class="container-fluid mt-3">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <form method="post" action="{{url('/user/update/'.$edit->id)}}" name="foo" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control invisible @error('nisn') is-invalid @enderror " name="nisn" id="nisn" value="{{ Auth::user()->nisn }}" placeholder="Masukan Nis">
                                    @error('nisn')
                                        <div id="validationCustom03" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Kartu Keluarga</label>
                                            <br>
                                            <img src="http://localhost:8000/image/{{$edit->kk}}" width="80" height="80">
                                            <input type="file" class="form-control-file mt-2 @error('akte') is-invalid @enderror" name="kk">

                                            @error('kk')
                                                <div id="validationCustom03" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Akte Kelahiran</label>
                                            <br>
                                            <img src="http://localhost:8000/image/{{$edit->akte}}" width="80" height="80">
                                            <input type="file" class="form-control-file mt-2 @error('akte') is-invalid @enderror" id="akte" name="akte" value="{{old('akte')}}">

                                            @error('akte')
                                            <div id="validationCustom03" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">SKHUN</label>
                                            <br>
                                            <img src="http://localhost:8000/image/{{$edit->skhun}}" width="80" height="80">
                                            <input type="file" class="form-control-file mt-2 @error('skhun') is-invalid @enderror" id="skhun" name="skhun" value="{{old('skhun')}}">
                                            @error('skhun')
                                            <div id="validationCustom03" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Ijazah</label>
                                            <br>
                                            <img src="http://localhost:8000/image/{{$edit->ijazah}}" width="80" height="80">
                                            <input type="file" class="form-control-file mt-2 @error('ijazah') is-invalid @enderror" id="ijazah" name="ijazah" value="{{old('ijazah')}}">
                                            @error('ijazah')
                                            <div id="validationCustom03" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-2 ml-2 float-right">Submit</button>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    <script>document.foo.submit();</script>
</script>
@endsection
