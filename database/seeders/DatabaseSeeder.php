<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Biodata;
use App\Models\DataSekolah;
use App\Models\KisiKisi;
use App\Models\TahunLulus;
use App\Models\ListSekolahAsal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'name' => 'Administrator',
            'username' => 'administrator',
            'password' => Hash::make('dnezast'),
            'role' => 1,
            'created_at' => now(),
        ]);
        User::create([
            'name' => 'Verifikator',
            'username' => 'advisor',
            'password' => Hash::make('smanesta'),
            'role' => 2,
            'created_at' => now(),
        ]);
        User::create([
            'name' => 'Operator',
            'username' => 'operator',
            'password' => Hash::make('operator'),
            'role' => 3,
            'created_at' => now(),
        ]);

        TahunLulus::factory(4)->create();
        ListSekolahAsal::factory(12)->create();
        Biodata::factory(100)->create();
        // KisiKisi::factory(10)->create();
        DataSekolah::factory(1)->create();
    }
}
