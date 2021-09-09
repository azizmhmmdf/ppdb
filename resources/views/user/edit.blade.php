@extends('layout.main')
@section('title', 'SMK WIKRAMA 1 GARUT')

@section('content')
<div class="container-fluid mt-3">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT DOKUMEN PESERTA</h6>
            <div class="float-right">
                <a href="/user/document" class="btn btn-primary"> KEMBALI</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <div class="card" style="width: 18rem; hight: 18rem;">
                            <img class="card-img-top" src="{{asset('image/'. $edit->kk)}}" alt="Card image cap">
                            <div class="card-body">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#kk">
                                    edit
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <div class="card" style="width: 18rem; hight: 18rem;">
                            <img class="card-img-top" src="{{asset('image/'. $edit->akte)}}" alt="Card image cap">
                            <div class="card-body">
                                <button type="button"  class="btn btn-warning" data-toggle="modal" data-target="#akte">
                                    edit
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <div class="card" style="width: 18rem; hight: 18rem;">
                            <img class="card-img-top" src="{{asset('image/'. $edit->skhun)}}" alt="Card image cap">
                            <div class="card-body">
                                <button type="button"  class="btn btn-warning" data-toggle="modal" data-target="#skhun">
                                    edit
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <div class="card" style="width: 18rem; hight: 18rem;">
                            <img class="card-img-top" src="{{asset('image/'. $edit->ijazah)}}" alt="Card image cap">
                            <div class="card-body">
                                <button type="button"  class="btn btn-warning" data-toggle="modal" data-target="#ijazah">
                                    edit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kartu Keluarga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" method="post" action="{{url('/user/update/'.$edit->id)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
                <div class="modal-body">
                    <input id="kk" class="form-control py-1" type="file" name="kk" value="old('kk')" autofocus required/>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="akte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Akte Kelahiran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" method="post" action="{{url('/user/update/'.$edit->id)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
                <div class="modal-body">
                    <input id="akte" class="form-control py-1" type="file" name="akte" value="old('akte')" autofocus required/>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="skhun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit SKHUN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" method="post" action="{{url('/user/update/'.$edit->id)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
                <div class="modal-body">
                    <input id="skhun" class="form-control py-1" type="file" name="skhun" value="old('skhun')" autofocus required/>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ijazah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Ijazah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form   form class="" method="post" action="{{url('/user/update/'.$edit->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <input id="ijazah" class="form-control py-1" type="file" name="ijazah" value="old('ijazah')" autofocus required/>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    <script>document.foo.submit();</script>
</script>
@endsection
