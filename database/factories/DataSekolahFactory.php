<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataSekolah>
 */
class DataSekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_sekolah' => 'SMAN 1 Rawamerta',
            'jenjang' => 'SMA',
            'nss' => 20217782,
            'npsn' => 69734347,
            'alamat' => 'Jl. Garunggung',
            'desa' => 'Panyingkiran',
            'kecamatan' => 'Rawamerta',
            'kota' => 'Karawang',
            'provinsi' => 'Jawa Barat',
            'phone' => '085155288214',
            'email' => 'sman1rwt@gmail.com',
            'website' => 'https://sman1rawamerta.sch.id',
            'headmaster_name' => 'Epul Saepul, S.Pd.I., M.Pd.',
            'nip_headmaster' => 198202132010011003,
        ];
    }
}
