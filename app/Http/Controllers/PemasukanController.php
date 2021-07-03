<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use DB;
use Symfony\Contracts\Service\Attribute\Required;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_pemasukan = DB::table('pemasukan')->get();

        return view('pemasukan.index', compact('ar_pemasukan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan ke form
        return view('pemasukan.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses validasi data
        $validated = $request->validate(
            [
                'tanggal' => 'required',
                'keterangan' => 'required',
                'saldo' => 'required|numeric',
                'foto' => 'image|mimes:jpg,png,jpeg,gif|max:1024',
            ],

            [
                'tanggal.required' => 'tanggal Wajib di Isi',
                'keterangan.required' => 'keterangan Wajib di Isi',
                'saldo.numeric' => 'saldo Harus Berupa Angka',
                'saldo.required' => 'saldo Wajib di Isi',
                'foto.image' => 'File ektensi harus jpg,jpeg,png,gif',
                'foto.max' => 'Ukuran File Maksimal 1024 KB',
            ]
        );

        //proses upload file
        if (!empty($request->foto)) {
            $fileName = $request->tanggal . '.' . $request->foto->extension();
            $request->foto->move(public_path('images/pemasukan'), $fileName);
        } else {
            $fileName = '';
        }

        //proses input data
        // 1. tangkap request form
        DB::table('pemasukan')->insert(
            [
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'saldo' => $request->saldo,
                'foto' => $fileName,
            ]
        );

        //2. landing page
        return redirect('/pemasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail
        $ar_pemasukan = DB::table('pemasukan')->where('pemasukan.id', $id)->get();

        return view('pemasukan.show', compact('ar_pemasukan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengarahkan ke halaman form edit
        $data = DB::table('pemasukan')->where('id', $id)->get();

        return view('pemasukan.form_edit', compact('data'));
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
        DB::table('pemasukan')->where('id', $id)->update(
            [
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'saldo' => $request->saldo,
                'foto' => $request->foto,
            ]
        );

        //2. landing page
        return redirect('/pemasukan'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data
        //1. hapus data
        DB::table('pemasukan')->where('id', $id)->delete();

        //2. landing page
        return redirect('/pemasukan');
    }
}