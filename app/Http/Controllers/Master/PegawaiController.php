<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wilayah;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::with('Wilayah.parent')->get();
        $wilayah = Wilayah::where('type', 4)->get();

        return view('section.pegawai.konten', compact('pegawai', 'wilayah'));
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
        $pegawai = new Pegawai();
        $pegawai->nama = $request->nama;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->wilayah_id = $request->wilayah_id;
        $pegawai->alamat = $request->alamat;
        $pegawai->no_telp = $request->no_telp;
        $pegawai->save();

        return redirect('/pegawai');
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
        $pegawai = Pegawai::with('Wilayah.parent')->find($id);
        $wilayah = Wilayah::where('type', 4)->get();

        return view('section.pegawai.edit', compact('pegawai', 'wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->nama = $request->nama;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->wilayah_id = $request->wilayah_id;
        $pegawai->alamat = $request->alamat;
        $pegawai->no_telp = $request->no_telp;
        $pegawai->save();

        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::find($id);

        if($pegawai){
            $pegawai->delete();
        }

        return redirect('/pegawai');
    }
}