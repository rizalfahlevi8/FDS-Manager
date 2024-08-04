<?php

namespace Database\Seeders;

use App\Models\Kasir;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //superadmin
        User::create([
            'email'=>'superadmin@gmail.com',
            'password'=>Hash::make('superadmin'),
            'level'=>'superadmin',
            'id_toko' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //owner
        User::create([
            'email'=>'owner@gmail.com',
            'password'=>Hash::make('owner'),
            'level'=>'owner',
            'id_toko' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Owner::create([
            'nama'=> 'owner',
            'no_telp'=>'123',
            'id_user'=> 2, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //kasir
        User::create([
            'email'=>'kasir@gmail.com',
            'password'=>Hash::make('kasir'),
            'level'=>'kasir',
            'id_toko' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Kasir::create([
            'nama'=> 'kasir',
            'no_telp'=>'123',
            'id_user'=> 3, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
