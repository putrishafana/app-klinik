<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Pegawai;
use App\Models\Pemeriksaan;
use App\Models\Wilayah;
use App\Models\Tindakan;

class PendaftaranPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasien = Pasien::with('Kunjungan.Pemeriksaan')->get();
        $pendaftaran = Kunjungan::with('Pasien', 'Pegawai', 'Pemeriksaan')->get();
        $wilayah = Wilayah::where('type', 4)->get();

        return view('section.pendaftaran-pasien.konten', compact('pasien', 'wilayah', 'pendaftaran'));
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
        if ($request->filled('nama') && $request->filled('nik')) {
            $pasien = new Pasien();
            $pasien->nama = $request->nama;
            $pasien->nik = $request->nik;
            $pasien->tanggal_lahir = $request->tanggal_lahir;
            $pasien->jenis_kelamin = $request->jenis_kelamin;
            $pasien->alamat = $request->alamat;
            $pasien->wilayah_id = $request->wilayah_id;
            $pasien->no_telp = $request->no_telp;
            $pasien->save();

            $pasienId = $pasien->id;
        } else {
            $pasienId = $request->pasien_id;
        }

        $kunjungan = new Kunjungan();
        $kunjungan->pasien_id = $pasienId;
        $kunjungan->tanggal_kunjungan = $request->tanggal_kunjungan;
        $kunjungan->keluhan = $request->keluhan;
        $kunjungan->pegawai_id = $request->pegawai_id;
        $kunjungan->save();

        return redirect('/pendaftaran-pasien');
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
        $wilayah = Wilayah::all();
        $pendaftaran = Kunjungan::with('Pasien', 'Pegawai')->find($id);
        $pasien = Pasien::all();

        return view('section.pendaftaran-pasien.edit', compact('pendaftaran', 'wilayah', 'pasien'));
    }

    public function createPemeriksaan(string $id)
    {
        $kunjungan = Kunjungan::find($id);
        $pegawai = Pegawai::with('User')->get();

        $dokter = $pegawai->filter(function ($item) {
            return $item->user && $item->user->role == 3;
        });

        $tindakan = Tindakan::all();

        return view('section.pemeriksaan.create', compact('kunjungan', 'dokter', 'tindakan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kunjungan = Kunjungan::find($id);
        $kunjungan->pasien_id = $request->pasien_id;
        $kunjungan->tanggal_kunjungan = $request->tanggal_kunjungan;
        $kunjungan->keluhan = $request->keluhan;
        $kunjungan->pegawai_id = $request->pegawai_id;
        $kunjungan->save();

        return redirect('/pendaftaran-pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::find($id);

        if($pasien){
            $kunjungan = Kunjungan::where('pasien_id', $pasien->id)->first();
            $kunjungan->delete();

            $pasien->delete();
        }
    }
}