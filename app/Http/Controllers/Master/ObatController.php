<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat = Obat::all();

        return view('section.obat.konten', compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obat = new Obat;
        $obat->obat = $request->obat;
        $obat->satuan = $request->satuan;
        $obat->stok = $request->stok;
        $obat->harga = $request->harga;
        $obat->save();

        return redirect('/obat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obat = Obat::find($id);

        return view('section.obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obat = Obat::find($id);
        $obat->obat = $request->obat;
        $obat->satuan = $request->satuan;
        $obat->stok = $request->stok;
        $obat->harga = $request->harga;
        $obat->save();

        return redirect('/obat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obat = Obat::find($id);

        if($obat){
            $obat->delete();
        }

        return redirect('/obat');
    }
}