<?php

namespace Database\Seeders;

use App\Models\Toko;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Toko::create([
            'nama' => 'FDS',
            'alamat' => 'Jember',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Toko::create([
            'nama' => 'Example',
            'alamat' => 'Indonesia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
