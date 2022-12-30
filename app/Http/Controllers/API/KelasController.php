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
        $data = [
            'rombel_type' => $request->input('rombel_type'),
            'kurikulum_type' => $request->input('kurikulum_type'),
            'kurikulum_rombel' => $request->input('kurikulum_rombel'),
            'nama_kelas' => $request->input('nama_kelas'),
            'tingkat' => $request->input('tingkat'),
            'jurusan' => $request->input('jurusan'),
            'wali_kelas_id' => $request->input('wali_kelas_id'),
            'jumlah_siswa' => $request->input('jumlah_siswa')
        ];

        $addKelas = Kelas::create($data);

        return ResponseFormatter::success(
            $addKelas->all(),
            'Kelas berhasil ditambahkan'
        );
    }
}
