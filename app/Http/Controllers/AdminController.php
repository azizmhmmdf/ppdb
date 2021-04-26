<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
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
        //
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

    public function terima($id)
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
        return redirect('/user/create');

    }

    public function tolak($id)
    {
        $data = User::where('id', $id)->first();
        $status = $data->status;
        if($status == 'diterima')
        {
            User::where('id', $id)->update([
                'status' => 'ditolak'
            ]);
        }
        elseif($status == 'diterima')
        {
            User::where('id', $id)->update([
                'status' => 'ditolak'
            ]);
        }
        elseif($status == 'belum')
        {
            User::where('id', $id)->update([
                'status' => 'ditolak'
            ]);
        }
        return redirect('/user/create');

    }

    public function batal(Request $request, $id)
    {



        $catatan = User::where('id', $id)->update([
            'catatan' => $request->catatan
        ]);

        $data = User::where('id', $id)->first();
        $status = $data->status;
        if($status == 'diterima')
        {
            User::where('id', $id)->update([
                'status' => 'ditolak'
            ]);
        }
        elseif($status == 'belum')
        {
            User::where('id', $id)->update([
                'status' => 'ditolak'
            ]);
        }
        return redirect('/user/create');


    }
}
