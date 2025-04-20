<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'tb_pasien';

    public function Kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'pasien_id', 'id');
    }

    public function Wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id', 'id');
    }
}