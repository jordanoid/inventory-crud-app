<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::select('select * from barang where soft_delete = 0 ');

        return view('barang.index')
            ->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barang.add');
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
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'id_ruangan' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO barang(nama_barang, jumlah, id_ruangan) VALUES (:nama_barang, :jumlah, :id_ruangan)',
        [
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'id_ruangan' => $request->id_ruangan,

        ]
        );
        return redirect()->route('barang.index')->with('success', 'Data Barang berhasil disimpan');
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
        $data = DB::table('barang')->where('id_barang', $id)->first();

        return view('barang.edit')->with('data', $data);
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
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'id_ruangan' => 'required',
        ]);
        DB::update('UPDATE barang SET id_barang = :id_barang, nama_barang = :nama_barang, jumlah = :jumlah, id_ruangan = :id_ruangan WHERE id_barang = :id',
        [
            'id' => $id,
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'id_ruangan' => $request->id_ruangan,
        ]
        );
        return redirect()->route('barang.index')->with('success', 'Data Barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::delete('DELETE FROM barang WHERE id_barang = :id_barang', ['id_barang' => $id]);
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus');
    }

    public function soft($id)
    {
        DB::update('UPDATE barang SET soft_delete = 1 WHERE id_barang = :id_barang', ['id_barang' => $id]);
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus');
    }

    public function restore()
    {
        DB::update('UPDATE barang SET soft_delete = 0 WHERE soft_delete = 1');
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil di-restore');
    }
}
