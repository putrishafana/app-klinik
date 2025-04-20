<?php

namespace App\Http\Controllers\Master\Wilayah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wilayah\Provinsi;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinsi = Provinsi::with('Kota')->get();

        return view('section.wilayah.provinsi.konten', compact('provinsi'));
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
        $provinsi = new Provinsi;
        $provinsi->provinsi = $request->provinsi;
        $provinsi->save();

        return redirect('/wilayah');
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
        $provinsi = Provinsi::find($id);
        $provinsi->provinsi = $request->provinsi;
        $provinsi->save();

        return redirect('/provinsi');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $provinsi = Provinsi::find($id);
        if($provinsi){
            $provinsi->delete();
        }

        return redirect('/provinsi');
    }
}