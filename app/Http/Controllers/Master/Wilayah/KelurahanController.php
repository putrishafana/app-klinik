<?php

namespace App\Http\Controllers\Master\Wilayah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wilayah\Kelurahan;
use App\Models\Wilayah\Kecamatan;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelurahan = Kelurahan::with('Kecamatan')->get();
        $kecamatan = Kecamatan::all();

        return view('section.wilayah.kelurahan.konten', compact('kelurahan', 'kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();

        return view('section.wilayah.kelurahan.konten', compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kelurahan = new Kelurahan();
        $kelurahan->kecamatan_id = $request->kecamatan_id;
        $kelurahan->kelurahan = $request->kelurahan;
        $kelurahan->save();

        return redirect('/kelurahan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kecamatan = Kecamatan::all();

        return view('section.wilayah.kelurahan.konten', compact('kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelurahan = Kelurahan::find($id);
        $kecamatan = Kecamatan::all();

        return view('section.wilayah.kelurahan.konten', compact('kelurahan', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kelurahan = Kelurahan::find($id);
        $kelurahan->kecamatan_id = $request->kecamatan_id;
        $kelurahan->kelurahan = $request->kelurahan;
        $kelurahan->save();

        return redirect('/kelurahan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelurahan = Kelurahan::find($id);
        if($kelurahan){
            $kelurahan->delete();
        }
        return redirect('/kelurahan');
    }
}