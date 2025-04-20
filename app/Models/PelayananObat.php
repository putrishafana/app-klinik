<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PelayananObat extends Model
{
    use HasFactory;

    protected $table = 'tb_pelayanan_obat';

    public function Pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id', 'id');
    }

    public function Obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id', 'id');
    }
}