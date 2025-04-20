<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::with('Pemeriksaan.Kunjungan.Pasien')->get();

        return view('section.pemeriksaan.pembayaran.konten', compact('pembayaran'));
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
        $pembayaran = new Pembayaran;
        $pembayaran->pemeriksaan_id = $request->pemeriksaan_id;
        $pembayaran->total_tagihan = $request->total_tagihan;
        $pembayaran->save();

        return redirect('/pemeriksaan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pembayaran = Pembayaran::with('Pemeriksaan.Kunjungan.Pasien')->find($id);

        return view('section.pemeriksaan.pembayaran.show', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pembayaran = Pembayaran::with('Pemeriksaan.Kunjungan.Pasien')->find($id);

        return view('section.pemeriksaan.pembayaran.edit', compact('pembayaran'));
    }

    public function invoice(string $id)
    {
        $pembayaran = Pembayaran::with('Pemeriksaan.Kunjungan.Pasien', 'Kasir')->find($id);

        return view('section.pemeriksaan.pembayaran.invoice', compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->pemeriksaan_id = $request->pemeriksaan_id;
        $pembayaran->tanggal_bayar = $request->tanggal_bayar;
        $pembayaran->total_tagihan = $request->total_tagihan;
        $pembayaran->dibayar = $request->dibayar;
        $pembayaran->kembali = $request->kembali;
        $pembayaran->kasir_id = $request->kasir_id;
        $pembayaran->catatan = $request->catatan;
        $pembayaran->save();

        return redirect('/pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}