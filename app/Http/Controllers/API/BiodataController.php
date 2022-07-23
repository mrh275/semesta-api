<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function getAllSiswa(Request $request)
    {
        $nisn = $request->input('nisn');
        $nama = $request->input('nama');

        if ($nisn) {
            $biodata = Biodata::where('nisn', $nisn)->with(['kelas'])->first();
            if ($biodata) {
                return ResponseFormatter::success(
                    $biodata,
                    'Siswa ditemukan'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Siswa tidak ditemukan',
                    404
                );
            }
        }
    }
}
