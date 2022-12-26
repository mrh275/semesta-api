<?php

namespace App\Http\Controllers\API;

use App\Models\DataSekolah;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class DataSekolahController extends Controller
{
    public function getDataSekolah()
    {
        $data = DataSekolah::all();

        return ResponseFormatter::success(
            $data,
            "Berhasil mengambil data"
        );
    }

    public function updateDataSekolah(Request $request)
    {
        $data = [
            'nama_sekolah' => $request->input('nama_sekolah'),
            'jenjang' => $request->input('jenjang'),
            'nss' => $request->input('nss'),
            'npsn' => $request->input('npsn'),
            'alamat' => $request->input('alamat'),
            'desa' => $request->input('desa'),
            'kecamatan' => $request->input('kecamatan'),
            'kota' => $request->input('kota'),
            'provinsi' => $request->input('provinsi'),
            'pos' => $request->input('pos'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'headmaster_name' => $request->input('headmaster_name'),
            'nip_headmaster' => $request->input('nip_headmaster'),
        ];

        DataSekolah::where('id', 1)->update($data);

        return ResponseFormatter::success(
            200,
            'Data berhasil diperbaharui'
        );
    }
}
