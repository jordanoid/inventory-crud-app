<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = DB::select('select * from ruangan where soft_delete = 0');

        return view('ruangan.index')
            ->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangan.add');
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
            'nama_ruangan' => 'required',
            'lantai' => 'required',
            'id_pj' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO ruangan(nama_ruangan, lantai, id_pj) VALUES (:nama_ruangan, :lantai, :id_pj)',
        [
            'nama_ruangan' => $request->nama_ruangan,
            'lantai' => $request->lantai,
            'id_pj' => $request->id_pj,

        ]
        );
        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil disimpan');
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
        $data = DB::table('ruangan')->where('id_ruangan', $id)->first();

        return view('ruangan.edit')->with('data', $data);
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
            'id_ruangan' => 'required',
            'nama_ruangan' => 'required',
            'lantai' => 'required',
            'id_pj' => 'required',
        ]);
        DB::update('UPDATE ruangan SET id_ruangan = :id_ruangan, nama_ruangan = :nama_ruangan, lantai = :lantai, id_pj = :id_pj WHERE id_ruangan = :id',
        [
            'id' => $id,
            'id_ruangan' => $request->id_ruangan,
            'nama_ruangan' => $request->nama_ruangan,
            'lantai' => $request->lantai,
            'id_pj' => $request->id_pj,
        ]
        );
        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::delete('DELETE FROM ruangan WHERE id_ruangan = :id_ruangan', ['id_ruangan' => $id]);
        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil dihapus');
    }

    public function soft($id)
    {
        DB::update('UPDATE ruangan SET soft_delete = 1 WHERE id_ruangan = :id_ruangan', ['id_ruangan' => $id]);

        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil dihapus');
    }
}
