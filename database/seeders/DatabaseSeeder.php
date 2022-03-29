<?php

namespace Database\Seeders;

use App\Models\Formulir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dokter;
use App\Models\Pasien;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Formulir::factory(20)->create();
        Dokter::create([
            'name' => 'Naruto Sheepudeng',
        ]);
        Dokter::create([
            'name' => 'Sasuke Uzumaking',
        ]);
        Dokter::create([
            'name' => 'Sakura Cang',
        ]);
        Pasien::create([
            'name' => 'Monkey D. Luffy',
        ]);
        Pasien::create([
            'name' => 'Roronoa Zoro',
        ]);
        Pasien::create([
            'name' => 'Bon Clay',
        ]);
    }
}
