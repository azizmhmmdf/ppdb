<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
use App\Models\wawancara;
use Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Document::all();
        return view('admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan1' => 'required',
            'pertanyaan2' => 'required',
            'pertanyaan3' => 'required',
            'pertanyaan4' => 'required',
            'pertanyaan5' => 'required',
            'pertanyaan6' => 'required',
            'pertanyaan7' => 'required',
            'pertanyaan8' => 'required',
            'pertanyaan9' => 'required',
            'pertanyaan10' => 'required',
            'pertanyaan11' => 'required',
            'pertanyaan12' => 'required',
            'pertanyaan13' => 'required',
            'pertanyaan14' => 'required',
            'pertanyaan15' => 'required',
            'pertanyaan16' => 'required',
            'pertanyaan17' => 'required',
            'pertanyaan18' => 'required',
            'pertanyaan19' => 'required',
            'pertanyaan20' => 'required'
        ]);

        $wawancara = wawancara::create($request->all());
        return redirect('admin/peserta/diverifikasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::where('id_user',$id)->first();
        $admin = User::find($id);

        return view('admin.show', compact('admin', 'document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'tanggal_wawancara' => 'after_or_equal:tomorrow'
        ]);

        $tanggal_wawancara = User::where('id', $id)->update([
            'tanggal_wawancara' => $request->tanggal_wawancara
        ]);

        $data = User::where('id', $id)->first();
        $status = $data->status;
        if($status == 'belum')
        {
            User::where('id', $id)->update([
                'status' => 'diverifikasi'
            ]);
        }
        elseif($status == 'diterima')
        {
            User::where('id', $id)->update([
                'status' => 'diverifikasi'
            ]);
        }
        elseif($status == 'ditolak')
        {
            User::where('id', $id)->update([
                'status' => 'diverifikasi'
            ]);
        }
        return redirect()->route('user.create');

    }

    public function terima(Request $request, $id)
    {

        $data = User::where('id', $id)->first();
        $status = $data->status;
        if($status == 'belum')
        {
            User::where('id', $id)->update([
                'status' => 'diterima'
            ]);
        }
        elseif($status == 'ditolak')
        {
            User::where('id', $id)->update([
                'status' => 'diterima'
            ]);
        }
        elseif($status == 'diverifikasi')
        {
            User::where('id', $id)->update([
                'status' => 'diterima'
            ]);
        }
        return redirect('/admin/peserta/diverifikasi');

    }

    public function tolak(Request $request, $id)
    {
        $request->validate([
            'catatan'=>'required'
        ]);

        $catatan = User::where('id', $id)->update([
            'catatan' => $request->catatan
        ]);

        $data = User::where('id', $id)->first();
        $status = $data->status;
        if($status == 'belum')
        {
            User::where('id', $id)->update([
                'status' => 'ditolak'
            ]);
        }
        elseif($status == 'diverifikasi')
        {
            User::where('id', $id)->update([
                'status' => 'ditolak'
            ]);
        }
        return redirect('/user/create');

    }

    public function batal(Request $request, $id)
    {

        $data = User::where('id', $id)->first();
        $status = $data->status;
        if($status == 'diterima')
        {
            User::where('id', $id)->update([
                'status' => 'belum'
            ]);
        }
        elseif($status == 'belum')
        {
            User::where('id', $id)->update([
                'status' => 'ditolak'
            ]);
        }
        elseif($status == 'diverifikasi')
        {
            User::where('id', $id)->update([
                'status' => 'ditolak'
            ]);
        }
        elseif($status == 'ditolak')
        {
            User::where('id', $id)->update([
                'status' => 'belum'
            ]);
        }

        if($status == 'belum')
        {
            return redirect('/user/create');
        }
        elseif($status == 'diterima')
        {
            return redirect('/admin/peserta/diterima');
        }
        elseif($status == 'ditolak')
        {
            return redirect('/admin/peserta/ditolak');
        }
        elseif($status == 'diverifikasi')
        {
            return redirect('/admin/peserta/diverifikasi');
        }

    }

    public function wawancara($id)
    {
        $user = User::find($id);
        return view('admin.wawancara', compact('user'));
    }
}
