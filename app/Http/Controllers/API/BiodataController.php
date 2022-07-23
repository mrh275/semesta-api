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
        $limit = $request->input('limit');

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

        $biodata = Biodata::with(['kelas']);

        if ($nama) {
            $biodata->where('nama', 'like', '%' . $nama . '%');
        }

        return ResponseFormatter::success(
            $biodata->paginate(($limit) ? $limit : 10),
            "Berhasil mengambil data"
        );
    }
}
