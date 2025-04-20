<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::create([
            'nama' => 'Putri Shafa Nadila',
            'jabatan' => 'teknisi',
            'alamat' => 'Jalan Antariksa',
        ]);
    }
}