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
}
