<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'tb_pembayaran';

    public function Pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id', 'id');
    }

    public function Kasir()
    {
        return $this->belongsTo(User::class, 'kasir_id', 'id');
    }

}