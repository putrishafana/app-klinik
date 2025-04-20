<?php

namespace App\Models\Wilayah;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'tb_kecamatan';

    public function Kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'kecamatan_id', 'id');
    }

    public function Kota()
    {
        return $this->belongsTo(Kota::class, 'kota_id', 'id');
    }
}