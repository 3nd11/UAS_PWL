<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use DB;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_pengeluaran = DB::table('pengeluaran')
                        ->orderBy('tanggal', 'desc')
                        ->orderBy('keterangan', 'desc')
                        ->orderBy('saldo', 'desc')
                        ->orderBy('foto', 'desc')
                        ->get();

        return view('pengeluaran.index', compact('ar_pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaran.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses upload file
        if(!empty($request->foto)) {
            $request->validate (
                ['foto'=>'image|mimes:png,jpg|max:1024']
            );
            $fileName = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$fileName);
        } else {
            $fileName = '';
        }

        //proses input data
        // 1. tangkap request form
        DB::table('pengeluaran')->insert (
            [
                'tanggal' => $request ->tanggal,
                'keterangan' => $request->keterangan,
                'saldo' => $request->saldo,
                'foto' => $fileName,
            ]
        );

        //2. landing page
        return redirect('/pengeluaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail pengeluaran
        $ar_pengeluaran = DB::table('pengeluaran')->where('pengeluaran.id', $id)->get();

        return view('pengeluaran.show', compact('ar_pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('pengeluaran')->where('id', $id)->get();

        return view('pengeluaran.form_edit', compact('data'));
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
        //mengedit data
        // 1. proses ubah data
        DB::table('pengeluaran')->where('id',$id)->update(
            [
                'tanggal' => $request ->tanggal,
                'keterangan' => $request->keterangan,
                'saldo' => $request->saldo,
                'foto' => $request->foto,
            ]
        );

        //2. landing page
        return redirect('/pengeluaran'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pengeluaran')->where('id',$id)->delete();

        return redirect ('/pengeluaran');
    }
}
