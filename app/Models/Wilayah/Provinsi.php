<?php

namespace App\Models\Wilayah;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'tb_provinsi';

    public function Kota(){
        return $this->hasMany(Kota::class, 'provinsi_id', 'id');
    }
}