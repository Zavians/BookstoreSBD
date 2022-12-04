<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::select('select * from buku where is_delete = 0');
        return view('buku.index')
            ->with('buku', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("buku.create");
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

            'Judul' => 'required',
            'Harga' => 'required',
            'NamaPenerbit' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named
        DB::insert(
            'INSERT INTO buku(Judul,Harga,NamaPenerbit) VALUES
        (:Judul, :Harga, :NamaPenerbit)',
            [
                'Judul' => $request->Judul,
                'Harga' => $request->Harga,
                'NamaPenerbit' => $request->NamaPenerbit,
            ]
        );
        return redirect()->route('buku.index')->with('success', 'Data Admin berhasil disimpan');
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
        return view('buku.edit')->with([
            "buku" => Buku::find($id),
        ]);
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

            'Judul' => 'required',
            'Harga' => 'required',
            'NamaPenerbit' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named
        DB::update('UPDATE buku SET Judul = :Judul, Harga = :Harga, NamaPenerbit = :NamaPenerbit where id=:id',
            [
                'id' => $id,
                'Judul' => $request->Judul,
                'Harga' => $request->Harga,
                'NamaPenerbit' => $request->NamaPenerbit,
            ]
        );
        return redirect()->route('buku.index')->with('success', 'Data Admin berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembeli = Buku::find($id);
        $pembeli->delete();

        return back()->with("Success", "Data Berhasil di Hapus.");
    }

    public function soft($id)
    {
        DB::update('UPDATE buku SET is_delete = 1 WHERE id = :id', ['id' => $id]);

        return redirect()->route('buku.index')->with('success', 'Data Barang berhasil dihapus');
    }
}
