<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function all(Request $request)
    {
        $nisn = $request->input('nisn');
        $nama = $request->input('nama');
    }
}
