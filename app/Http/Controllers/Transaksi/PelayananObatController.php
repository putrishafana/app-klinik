<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PelayananObat;
use App\Models\Obat;

class PelayananObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $resepObat = new PelayananObat();
        $resepObat->pemeriksaan_id = $request->pemeriksaan_id;
        $resepObat->obat_id = $request->obat_id;
        $resepObat->jumlah = $request->jumlah;
        $resepObat->dosis = $request->dosis;
        $resepObat->catatan = $request->catatan;
        $resepObat->harga_satuan = $request->harga_satuan;
        $resepObat->total_harga = $request->total_harga;
        $resepObat->save();

        $obat = Obat::find($request->obat_id);
        if ($obat) {
            $obat->stok -= $request->jumlah;
            $obat->save();
        }

        return redirect()->back();
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
        $pelayananObat = PelayananObat::with('Pemeriksaan')->find($id);
        $obat = Obat::all();
        return view('section.pemeriksaan.pelayanan-obat.edit', compact('pelayananObat', 'obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resepObat = PelayananObat::find($id);

        $obatLama = Obat::find($resepObat->obat_id);
        if ($obatLama) {
            $obatLama->stok += $resepObat->jumlah;
            $obatLama->save();
        }

        $resepObat->pemeriksaan_id = $request->pemeriksaan_id;
        $resepObat->obat_id = $request->obat_id;
        $resepObat->jumlah = $request->jumlah;
        $resepObat->dosis = $request->dosis;
        $resepObat->catatan = $request->catatan;
        $resepObat->harga_satuan = $request->harga_satuan;
        $resepObat->total_harga = $request->total_harga;
        $resepObat->save();

        $obatBaru = Obat::find($request->obat_id);
        if ($obatBaru) {
            $obatBaru->stok -= $request->jumlah;
            $obatBaru->save();
        }

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resepObat = PelayananObat::find($id);
        if ($resepObat) {
            $obat = Obat::find($resepObat->obat_id);
            if ($obat) {
                $obat->stok += $resepObat->jumlah;
                $obat->save();
            }

            $resepObat->delete();
        }

        return redirect()->back();
    }
}