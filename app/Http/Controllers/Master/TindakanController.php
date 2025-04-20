<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tindakan;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tindakan = Tindakan::all();

        return view('section.tindakan.konten', compact('tindakan'));
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
        $tindakan = new Tindakan;
        $tindakan->tindakan = $request->tindakan;
        $tindakan->deskripsi = $request->deskripsi;
        $tindakan->harga = $request->harga;
        $tindakan->save();

        return redirect('/tindakan');
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
        $tindakan = Tindakan::find($id);

        return view('section.tindakan.edit', compact('tindakan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tindakan = Tindakan::find($id);
        $tindakan->tindakan = $request->tindakan;
        $tindakan->deskripsi = $request->deskripsi;
        $tindakan->harga = $request->harga;
        $tindakan->save();

        return redirect('/tindakan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tindakan = Tindakan::find($id);

        if($tindakan){
            $tindakan->delete();
        }

        return redirect('/tindakan');
    }
}