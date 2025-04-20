<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'tb_pegawai';

    public function Wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id', 'id');
    }

    public function User()
    {
        return $this->hasOne(User::class, 'pegawai_id', 'id');
    }
}