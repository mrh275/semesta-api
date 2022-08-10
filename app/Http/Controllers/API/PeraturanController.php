<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\CategoryPeraturan;
use Exception;
use Illuminate\Http\Request;

class PeraturanController extends Controller
{
    public function addCategoryPeraturan(Request $request)
    {
        $request->validate([
            'nama_category' => 'required',
        ]);

        CategoryPeraturan::create([
            'nama_category' => $request->nama_category,
            'tipe_poin' => ($request->tipe_poin) ? $request->tipe_poin : '0'
        ]);

        $result = CategoryPeraturan::where('nama_category', $request->nama_category)->first();

        return ResponseFormatter::success([
            'result' => $result
        ], 'Data added successfully');
    }

    public function allCategory()
    {
        $allCategory = CategoryPeraturan::all();

        return ResponseFormatter::success(
            $allCategory,
            'Kategori Peraturan ditemukan'
        );
    }
}
