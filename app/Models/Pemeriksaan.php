<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'tb_pemeriksaan';

    public function Kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'kunjungan_id', 'id');
    }

    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }

    public function PemeriksaanTindakan()
    {
        return $this->hasMany(PemeriksaanTindakan::class, 'pemeriksaan_id', 'id');
    }

    public function PelayananObat()
    {
        return $this->hasMany(PelayananObat::class, 'pemeriksaan_id', 'id');
    }

    public function Pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pemeriksaan_id', 'id');
    }

}