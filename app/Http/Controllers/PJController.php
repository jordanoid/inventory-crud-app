<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PJController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = DB::select('select * from pj where soft_delete = 0');

        return view('pj.index')
            ->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pj.add');
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
            'nama_pj' => 'required',
            'nip_pj' => 'required',
        ]);

        DB::insert('INSERT INTO pj(nama_pj, nip_pj) VALUES (:nama_pj, :nip_pj)',
        [
            'nama_pj' => $request->nama_pj,
            'nip_pj' => $request->nip_pj,

        ]
        );
        return redirect()->route('pj.index')->with('success', 'Data PJ berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('pj')->where('id_pj', $id)->first();
        return view('pj.edit')->with('data', $data);
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
            'id_pj' => 'required',
            'nama_pj' => 'required',
            'nip_pj' => 'required',
        ]);

        DB::update('UPDATE pj SET id_pj = :id_pj, nama_pj = :nama_pj, nip_pj = :nip_pj WHERE id_pj = :id',
        [
            'id' => $id,
            'id_pj' => $request->id_pj,
            'nama_pj' => $request->nama_pj,
            'nip_pj' => $request->nip_pj,
        ]
        );
        return redirect()->route('pj.index')->with('success', 'Data PJ berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::delete('DELETE FROM pj WHERE id_pj = :id_pj', ['id_pj' => $id]);
        return redirect()->route('pj.index')->with('success', 'Data PJ berhasil dihapus');
    }

    public function soft($id)
    {
        DB::update('UPDATE pj SET soft_delete = 1 WHERE id_pj = :id_pj', ['id_pj' => $id]);

        return redirect()->route('pj.index')->with('success', 'Data pj berhasil dihapus');
    }

    public function restore()
    {
        DB::update('UPDATE pj SET soft_delete = 0 WHERE soft_delete = 1');
        return redirect()->route('pj.index')->with('success', 'Data PJ berhasil di-restore');
    }
}
