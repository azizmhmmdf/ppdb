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
        // if(Auth::user()->is_admin == 1)
        // {
        //     return view('admin.index', compact('data'));
        // }
        return view('user.document', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = DB::select('select * from users where id != 1');
        $data = Document::all();
        if(Auth::user()->is_admin == 1){
            return view('admin.index', compact('data', 'user'));
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
        $request->validate([
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

        $document = Document::find($id)->update([
            'kk' => $imgname,
            'akte' => $imgname1,
            'skhun' => $imgname2,
            'ijazah' => $imgname3,
        ]);
        return redirect('/user/document');
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
}
