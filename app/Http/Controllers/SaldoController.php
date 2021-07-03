<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saldo;
use DB;
use PDF;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_saldo = DB::table('saldo')
            ->join('pemasukan', 'pemasukan.id', '=', 'saldo.idpemasukan')
            ->join('pengeluaran', 'pengeluaran.id', '=', 'saldo.idpengeluaran')
            ->select('saldo.*', 'pemasukan.keterangan AS pem', 'pengeluaran.keterangan AS pen')
            ->get();
            
        return view('saldo.index', compact('ar_saldo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saldo.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate (
            [
                'tanggal' => 'required',
                'keterangan' => 'required',
                'saldo' => 'required|string',

                'foto' => 'image|mimes:jpg,png,jpeg,gif|max:1024',
            ],

            [
                'tanggal.required' => 'Tanggal Wajib di Isi',
                'keterangan.required' => 'Keterangan Wajib di Isi',
                'saldo.required' => 'Saldo Wajib di Isi',
                'saldo.numeric' => 'Saldo Harus Berupa Uang Rupiah',
                'foto.image' => 'File ektensi harus jpg,jpeg,png,gif',
                'foto.max' => 'Ukuran File Maksimal 1024 KB',
            ]);

        //proses upload file
        if (!empty($request->foto)) {
            $fileName = $request->nama . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $fileName);
        } else {
            $fileName = '';
        }

        //proses input data
        // 1. tangkap request form
        DB::table('saldo')->insert(
            [
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'saldo' => $request->saldo,
                'idpemasukan' => $request->idpemasukan,
                'idpengeluaran' => $request->idpengeluaran,
                'foto' => $fileName,
            ]
        );

        //2. landing page
        return redirect('/saldo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail saldo
        $ar_saldo = DB::table('saldo')
            ->join('pemasukan', 'pemasukan.id', '=', 'saldo.idpemasukan')
            ->join('pengeluaran', 'pengeluaran.id', '=', 'saldo.idpengeluaran')
            ->select('saldo.*', 'pemasukan.tanggal AS pem', 'pengeluaran.tanggal AS pen')
            ->get();
            
        return view('saldo.show', compact('ar_saldo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('saldo')->where('id', $id)->get();

        return view('saldo.form_edit', compact('data'));
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
        DB::table('saldo')->where('id',$id)->update(
            [
                'tanggal'=>$request->tanggal,
                'keterangan'=>$request->keterangan,
                'saldo'=>$request->saldo,
                'idpemasukan' => $request->idpemasukan,
                'idpengeluaran' => $request->idpengeluaran,
                'foto'=>$request->foto
                
            ]
        );
        return redirect ('/saldo'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('saldo')->where('id',$id)->delete();

        return redirect ('/saldo');
    }

    public function saldoPDF()
    {
        $ar_saldo=DB::table('saldo')
        ->join('pemasukan', 'pemasukan.id', '=', 'saldo.idpemasukan')
        ->join('pengeluaran', 'pengeluaran.id', '=', 'saldo.idpengeluaran')
        ->select('saldo.*', 'pemasukan.keterangan AS pem', 'pengeluaran.keterangan AS pen')
        ->get();

        $pdf= PDF::loadView('saldo.daftarSaldo', ['$ar_saldo'=>$ar_saldo]);
    
        return $pdf->download('daftarSaldo.pdf');
    }
}
