<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        Mahasiswa::insert([
            [
                'nim' => '20200001',
                'nama' => 'Andi Wijaya',
                'jurusan' => 'Teknik Informatika',
                'angkatan' => 2020,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '20200002',
                'nama' => 'Siti Nurhaliza',
                'jurusan' => 'Sistem Informasi',
                'angkatan' => 2021,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '20200003',
                'nama' => 'Budi Santoso',
                'jurusan' => 'Teknik Komputer',
                'angkatan' => 2022,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
