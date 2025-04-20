<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PemeriksaanTindakan extends Model
{
    use HasFactory;

    protected $table = 'tb_pemeriksaan_tindakan';

    public function Pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id', 'id');
    }

    public function Tindakan()
    {
        return $this->belongsTo(Tindakan::class, 'tindakan_id', 'id');
    }
}