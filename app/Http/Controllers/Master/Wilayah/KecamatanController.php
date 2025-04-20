<?php

namespace App\Http\Controllers\Master\Wilayah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wilayah\Kecamatan;
use App\Models\Wilayah\Kota;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatan = Kecamatan::with('Kota', 'Kelurahan')->get();
        $kota = Kota::all();

        return view('section.wilayah.kecamatan.konten', compact('kecamatan', 'kota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kota = Kota::all();

        return view('section.wilayah.kecamatan.konten', compact('kota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kecamatan = new Kecamatan();
        $kecamatan->kota_id = $kecamatan->kota_id;
        $kecamatan->kecamatan = $request->kecamatan;
        $kecamatan->save();

        return redirect('/kecamatan');
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
        $kecamatan = Kecamatan::with('Kota', 'Kelurahan')->find($id);
        $kota = Kota::all();

        return view('section.wilayah.kecamatan.konten', compact('kota', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kecamatan = Kecamatan::find($id);
        $kecamatan->kota_id = $kecamatan->kota_id;
        $kecamatan->kecamatan = $request->kecamatan;
        $kecamatan->save();

        return redirect('/kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kecamatan = Kecamatan::find($id);
        if($kecamatan){
            $kecamatan->delete();
        }
        return redirect('/kecamatan');
    }
}