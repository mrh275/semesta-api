<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function getKelas()
    {
        $kelas = Kelas::all();

        return ResponseFormatter::success(
            $kelas,
            'Data kelas berhasil diambil'
        );
    }

    public function store(Request $request)
    {
        $newKelas = $request->input('kelas');

        $addKelas = Kelas::create([
            'nama_kelas' => $newKelas
        ]);

        return ResponseFormatter::success(
            $addKelas->all(),
            'Kelas berhasil ditambahkan'
        );
    }
}
