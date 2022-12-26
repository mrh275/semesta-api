<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Exception;
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

    public function updateDataSiswa(Request $request)
    {
        $data = [
            'nisn' => $request->input('nisn'),
            'nis' => $request->input('nis'),
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tingkat' => $request->input('tingkat'),
            'rombel_id' => $request->input('rombel_id'),
            'ekskul_id' => $request->input('ekskul_id'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'agama' => $request->input('agama'),
            'asal_sekolah' => $request->input('asal_sekolah'),
            'tahun_lulus' => $request->input('tahun_lulus'),
            'diterima_tanggal' => $request->input('diterima_tanggal'),
            'diterima_dikelas' => $request->input('diterima_dikelas'),
            'alamat' => $request->input('alamat'),
            'rt' => $request->input('rt'),
            'rw' => $request->input('rw'),
            'desa' => $request->input('desa'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten' => $request->input('kabupaten'),
            'provinsi' => $request->input('provinsi'),
            'kode_pos' => $request->input('kode_pos'),
            'phone' => $request->input('phone'),
            'status_anak' => $request->input('status_anak'),
            'anak_ke' => $request->input('anak_ke'),
            'is_graduated' => $request->input('is_graduated')
        ];

        try {
            Biodata::where('nisn', $data['nisn'])->update($data);

            return ResponseFormatter::success(200, 'Data berhasil diperbaharui');
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
}
