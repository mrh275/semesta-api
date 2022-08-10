<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\CategoryPeraturan;
use App\Models\ListPeraturan;
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
        $allCategory = CategoryPeraturan::with('peraturan')->get();

        return ResponseFormatter::success(
            $allCategory,
            'Kategori Peraturan ditemukan'
        );
    }

    public function addPeraturan(Request $request)
    {
        $request->validate([
            'category_peraturan_id' => 'required',
            'nama_peraturan' => 'required|min:5',
            'bobot_poin' => 'required|numeric|min:1'
        ]);

        ListPeraturan::create([
            'category_peraturan_id' => $request->category_peraturan_id,
            'nama_peraturan' => $request->nama_peraturan,
            'bobot_poin' => $request->bobot_poin
        ]);

        $result = ListPeraturan::where('nama_peraturan', $request->nama_peraturan)->first();

        return ResponseFormatter::success([
            'result' => $result
        ], 'Data added successfully');
    }

    public function allPeraturan()
    {
        $allPeraturan = ListPeraturan::with('categoryPeraturan')->get();

        return ResponseFormatter::success(
            $allPeraturan,
            'Kategori Peraturan ditemukan'
        );
    }
}
