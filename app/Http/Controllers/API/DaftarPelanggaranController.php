<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\DaftarPelanggaran;
use Illuminate\Http\Request;

class DaftarPelanggaranController extends Controller
{
    public function addPelanggaran(Request $request)
    {

        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
            'peraturan_id' => 'required',
            'poin' => 'required',
            'is_negative' => 'required'
        ]);

        DaftarPelanggaran::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
            'peraturan_id' => $request->peraturan_id,
            'poin' => $request->poin,
            'is_negative' => ($request->is_negative) ? $request->is_negative : '1'
        ]);

        $result = DaftarPelanggaran::where('nisn', $request->nisn)->first();

        return ResponseFormatter::success([
            'result' => $result
        ], 'Data berhasil ditambahkan');
    }

    public function allPelanggaran(Request $request)
    {
        $nisn = $request->input('nisn');
        $kelas = $request->input('kelas_id');

        $allPelanggaran = DaftarPelanggaran::query();

        if ($nisn) {
            $allPelanggaran->where('nisn', $nisn);
        } else {
            $allPelanggaran->with(['kelas', 'peraturan']);
        }

        return ResponseFormatter::success(
            $allPelanggaran->paginate(10),
            'Data Pelanggaran berhasil diambil'
        );
    }
}
