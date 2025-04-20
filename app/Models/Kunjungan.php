<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'tb_kunjungan';

    public function Pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function Pemeriksaan()
    {
        return $this->hasOne(Pemeriksaan::class, 'kunjungan_id', 'id');
    }
}