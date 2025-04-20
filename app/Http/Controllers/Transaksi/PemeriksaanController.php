<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemeriksaan;
use App\Models\Kunjungan;
use App\Models\Pegawai;
use App\Models\Tindakan;
use App\Models\Obat;
use App\Models\PemeriksaanTindakan;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemeriksaan = [];
        if (auth()->user()->role == 1) {
            $pemeriksaan = Pemeriksaan::with(
                'Kunjungan.Pasien',
                'Pegawai',
                'PemeriksaanTindakan.Tindakan',
                'PelayananObat.Obat')
                ->get();
        } else if (auth()->user()->role == 3) {
            $pemeriksaan = Pemeriksaan::with(
                'Kunjungan.Pasien',
                'Pegawai',
                'PemeriksaanTindakan.Tindakan',
                'PelayananObat.Obat')
                ->where('pegawai_id', auth()->user()->Pegawai->id)
                ->get();
        }

        return view('section.pemeriksaan.konten', compact('pemeriksaan'));
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
        $pemeriksaan = new Pemeriksaan();
        $pemeriksaan->kunjungan_id = $request->kunjungan_id;
        $pemeriksaan->pegawai_id = $request->pegawai_id;
        $pemeriksaan->waktu_periksa = $request->waktu_periksa;
        $pemeriksaan->diagnosa = $request->diagnosa;
        $pemeriksaan->catatan = $request->catatan;
        $pemeriksaan->save();

        $pemeriksaanTindakan = new PemeriksaanTindakan();
        $pemeriksaanTindakan->pemeriksaan_id = $pemeriksaan->id;
        $pemeriksaanTindakan->tindakan_id = $request->tindakan_id;
        $pemeriksaanTindakan->harga = $request->harga;
        $pemeriksaanTindakan->save();

        return redirect('/pendaftaran-pasien');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemeriksaan = Pemeriksaan::with(
            'Kunjungan.Pasien',
            'Pegawai',
            'PemeriksaanTindakan.Tindakan',
            'PelayananObat.Obat')
            ->find($id);

        $obat = Obat::all();
        return view('section.pemeriksaan.show', compact('pemeriksaan', 'obat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemeriksaan = Pemeriksaan::with(
            'Kunjungan.Pasien',
            'Pegawai',
            'PemeriksaanTindakan.Tindakan',
            'PelayananObat.Obat')
            ->find($id);

        $pegawai = Pegawai::with('User')->get();

        $dokter = $pegawai->filter(function ($item) {
            return $item->user && $item->user->role == 3;
        });

        $tindakan = Tindakan::all();
        return view('section.pemeriksaan.edit', compact('pemeriksaan', 'dokter', 'tindakan'));
    }

    public function resepObat(string $id)
    {
        $pemeriksaan = Pemeriksaan::with('PelayananObat.Obat')->find($id);
        return view('section.pemeriksaan.pelayanan-obat.konten', compact('pemeriksaan'));
    }

    public function pembayaran(string $id)
    {
        $pemeriksaan = Pemeriksaan::with('PemeriksaanTindakan', 'PelayananObat.Obat')->find($id);

        $hargaTindakan = $pemeriksaan->PemeriksaanTindakan->sum('harga');
        $hargaObat = $pemeriksaan->PelayananObat->sum('total_harga');

        $totalTagihan = $hargaTindakan + $hargaObat;

        return view('section.pemeriksaan.pembayaran.create', compact('pemeriksaan', 'hargaTindakan', 'hargaObat', 'totalTagihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemeriksaan = Pemeriksaan::find($id);
        $pemeriksaan->kunjungan_id = $request->kunjungan_id;
        $pemeriksaan->pegawai_id = $request->pegawai_id;
        $pemeriksaan->waktu_periksa = $request->waktu_periksa;
        $pemeriksaan->diagnosa = $request->diagnosa;
        $pemeriksaan->catatan = $request->catatan;
        $pemeriksaan->save();

        return redirect('/pemeriksaan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemeriksaan = Pemeriksaan::find($id);

        if($pemeriksaan){
            $pemeriksaanTindakan = PemeriksaanTindakan::where('pemeriksaan_id', $id)->get();

            foreach($pemeriksaanTindakan as $pt){
                $pt->delete();
            }

            $pemeriksaan->delete();

        }
    }
}