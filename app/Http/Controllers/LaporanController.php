<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Tindakan;
use App\Models\PemeriksaanTindakan;
use App\Models\PelayananObat;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        $kunjunganData = Kunjungan::selectRaw('MONTH(tanggal_kunjungan) as bulan, COUNT(*) as jumlah')
            ->groupByRaw('MONTH(tanggal_kunjungan)')
            ->orderByRaw('bulan')
            ->get();

        $bulanLabels = [];
        $jumlahKunjungan = [];

        foreach ($kunjunganData as $item) {
            $bulanLabels[] = date("F", mktime(0, 0, 0, $item->bulan, 1));
            $jumlahKunjungan[] = $item->jumlah;
        }

        $tindakan = PemeriksaanTindakan::join('tb_tindakan', 'tb_tindakan.id', '=', 'tb_pemeriksaan_tindakan.tindakan_id')
            ->select('tb_tindakan.tindakan', DB::raw('COUNT(*) as total'))
            ->groupBy('tb_tindakan.tindakan')
            ->orderByDesc('total')
            ->get();

        $tindakanLabels = $tindakan->pluck('tindakan')->toArray();
        $tindakanData = $tindakan->pluck('total')->toArray();

        $obat = PelayananObat::join('tb_obat', 'tb_obat.id', '=', 'tb_pelayanan_obat.obat_id')
            ->select('tb_obat.obat', DB::raw('SUM(jumlah) as total'))
            ->groupBy('tb_obat.obat')
            ->orderByDesc('total')
            ->get();

        $obatLabels = $obat->pluck('obat')->toArray();
        $obatData = $obat->pluck('total')->toArray();

        return view('section.laporan.konten', compact(
            'bulanLabels', 'jumlahKunjungan',
            'tindakanLabels', 'tindakanData',
            'obatLabels', 'obatData'
        ));
    }

}