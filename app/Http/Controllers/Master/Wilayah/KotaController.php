<?php

namespace App\Http\Controllers\Master\Wilayah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wilayah\Provinsi;
use App\Models\Wilayah\Kota;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kota = Kota::with('Provinsi', 'Kecamatan')->get();
        $provinsi = Provinsi::get();
        return view('section.wilayah.kota.konten', compact('kota', 'provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsi = Provinsi::get();

        return view('section.wilayah.kota.konten', compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kota = new Kota;
        $kota->provinsi_id = $request->provinsi_id;
        $kota->kota = $request->kota;
        $kota->save();

        return redirect('/kota');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kota = Kota::with('Provinsi')->find($id);
        $provinsi = Provinsi::get();

        return view('section.wilayah.kota.konten', compact('provinsi', 'kota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kota = Kota::find($id);
        $kota->provinsi_id = $request->provinsi_id;
        $kota->kota = $request->kota;
        $kota->save();

        return redirect('/kota');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kota = Kota::find($id);
        if($kota){
            $kota->delete();
        }
        return redirect('/kota');
    }
}