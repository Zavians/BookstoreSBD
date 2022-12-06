<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::select('select * from kasir where is_delete = 0');
        return view('kasir.index')
            ->with('kasir', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("kasir.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
        
        'NamaKasir' => 'required',
        'NoHP' => 'required',
        'Alamat' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named
        DB::insert('INSERT INTO kasir(NamaKasir,NoHP,Alamat) VALUES
        (:NamaKasir, :NoHP, :Alamat)',
        [
        'NamaKasir' => $request->NamaKasir,
        'NoHP' => $request->NoHP,
        'Alamat' => $request->Alamat,
        ]
        );
        return redirect()->route('kasir.index')-> with('success', 'Data Kasir berhasil disimpan');
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
    public function edit($id) {
        $data = DB::table('kasir')->where('id', $id)->first();
        return view('kasir.edit')->with('kasir', $data);
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

            'NamaKasir' => 'required',
            'NoHP' => 'required',
            'Alamat' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named
        DB::update('UPDATE kasir SET NamaKasir = :NamaKasir, NoHP = :NoHP, Alamat = :Alamat where id=:id',
            [
                'id' => $id,
                'NamaKasir' => $request->NamaKasir,
                'NoHP' => $request->NoHP,
                'Alamat' => $request->Alamat,
            ]
        );
        return redirect()->route('kasir.index')->with('success', 'Data Kasir berhasil diubah');
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM kasir WHERE id =:id', ['id' => $id]);

return redirect()->route('kasir.index')-> with('success', 'Data Kasir berhasil dihapus');
    }

    public function soft($id)
    {
        DB::update('UPDATE kasir SET is_delete = 1 WHERE id = :id', ['id' => $id]);

        return redirect()->route('kasir.index')->with('success', 'Data Kasir berhasil dihapus');
    }
}