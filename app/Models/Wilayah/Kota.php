<?php

namespace App\Models\Wilayah;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table = 'tb_kota';

    public function Kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'kota_id', 'id');
    }

    public function Provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id');
    }
}