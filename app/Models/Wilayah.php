<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = 'tb_wilayah';

    public function parent()
    {
        return $this->belongsTo(Wilayah::class, 'parent_id');
    }

    public function child()
    {
        return $this->hasMany(Wilayah::class, 'parent_id');
    }

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}