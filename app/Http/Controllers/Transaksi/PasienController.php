<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Wilayah;

class PasienController extends Controller
{

    public function edit(string $id)
    {
        $pasien = Pasien::with('Kunjungan.Pemeriksaan')->find($id);
        $wilayah = Wilayah::where('type', 4)->get();

        return view('section.pendaftaran-pasien.pasien.edit', compact('pasien', 'wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pasien = Pasien::find($id);
        $pasien->nama = $request->nama;
        $pasien->nik = $request->nik;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->alamat = $request->alamat;
        $pasien->wilayah_id = $request->wilayah_id;
        $pasien->no_telp = $request->no_telp;
        $pasien->save();

        return redirect('/pendaftaran-pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::find($id);
        if($pasien){
            $pasien->delete();
        }
        return redirect('/pendaftaran-pasien');
    }
}