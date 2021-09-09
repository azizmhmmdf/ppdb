<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
use Auth;
use DB;

class DocumentController extends Controller
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

        $data = Document::where('nisn', Auth::user()->nisn);
        return view('user.document', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->is_admin == 1){
            $user = User::where('status', 'belum')->where('id', '!=', '1')->get();
            return view('admin.index', compact('user'));
        }
        return view('user.create');
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
            'nisn' => 'required',
            'kk' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'akte' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'skhun' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'ijazah' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imgname = $request->kk->getClientOriginalName();
        $request->kk->move(public_path('image'), $imgname);

        $imgname1 = $request->akte->getClientOriginalName();
        $request->akte->move(public_path('image'), $imgname1);

        $imgname2 = $request->skhun->getClientOriginalName();
        $request->skhun->move(public_path('image'), $imgname2);

        $imgname3 = $request->ijazah->getClientOriginalName();
        $request->ijazah->move(public_path('image'), $imgname3);

        $document = new Document();
        $document->nisn = $request->nisn;
        $document->kk = $imgname;
        $document->akte = $imgname1;
        $document->skhun = $imgname2;
        $document->ijazah = $imgname3;
        $document->id_user = Auth::user()->id;
        $document->save();

        return redirect()->route('user.document');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::where('nisn', Auth::user()->nisn )->first();
        $document = Document::where('nisn', Auth::user()->nisn)->first();

        return view('user.document', compact('document', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd(Auth::user()->id);
        $edit = Document::where('id_user', Auth::user()->id)->first();
        // dd($edit);
        return view('user.edit', compact('edit'));
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
        $data = Document::where('nisn', Auth::user()->nisn)->first();
        if ($request->kk != NULL) {
            $imgname = $request->kk->getClientOriginalName();
            $request->kk->move(public_path('image'), $imgname);
        }else{
            $imgname = $data->kk;
        }

        if ($request->akte != NULL) {
            $imgname1 = $request->akte->getClientOriginalName();
            $request->akte->move(public_path('image'), $imgname1);
        }else{
            $imgname1 = $data->akte;
        }

        if ($request->skhun != NULL) {
            $imgname2 = $request->skhun->getClientOriginalName();
            $request->skhun->move(public_path('image'), $imgname2);
        }else{
            $imgname2 = $data->skhun;
        }

        if ($request->ijazah != NULL) {
            $imgname3 = $request->ijazah->getClientOriginalName();
            $request->ijazah->move(public_path('image'), $imgname3);
        }else{
            $imgname3 = $data->ijazah;
        }

        $document = Document::find($id)->update([
            'nisn' => $data->nisn,
            'kk' => $imgname,
            'akte' => $imgname1,
            'skhun' => $imgname2,
            'ijazah' => $imgname3,
        ]);
        return redirect('/user/edit/' . $data->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Document::destroy($id);
        if(Auth::user()->is_admin == 1)
        {
            return redirect('/user/create');
        }
        return redirect('/user/document');
    }

    public function informasi()
    {
        $informasi =  User::where('nisn', Auth::user()->nisn )->first();
        return view('user.informasi', compact('informasi'));
    }
}
