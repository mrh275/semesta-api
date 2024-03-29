<?php

namespace App\Http\Controllers\API;

use App\Models\KisiKisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\File;

class KisiKisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataMapel = KisiKisi::all();
        $jsonMapel = json_encode($dataMapel);
        return $jsonMapel;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('fileMapel');
        $newName = $request->input('slug') . '.pdf';
        $tipeUjian = $request->input('tipe_ujian');
        $tahunPelajaran = date("Y");
        $files->move(public_path('/assets/kisi-kisi/' . strtolower($tipeUjian) . $tahunPelajaran . '/'), $newName);

        try {
            KisiKisi::create([
                'mapel' => $request->input('mapel'),
                'kelas' => $request->input('kelas'),
                'status' => $request->input('status'),
                'slug' => $request->input('slug'),
                'tipe_ujian' => $tipeUjian,
            ]);

            return response()->json([
                'message' => 'Kisi-kisi berhasil ditambahkan',
                'error' => false,
                'data' => $request->all()
            ]);
        } catch (Exception $error) {
            return response()->json([
                'message' => $error->getMessage(),
                'error' => $error->getCode()
            ]);
        }

        // return response()->json([
        //     'file' => $files
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeKisiKisi(Request $request)
    {
        $item = $request->input('slugItem');
        $tipeUjian = $request->input('tipeUjian');
        $data = KisiKisi::where(['slug' => $item])->first();
        try {
            if (File::exists('assets/kisi-kisi/' . strtolower($tipeUjian) . date('Y') . '/' . $item . '.pdf')) {
                File::delete(public_path('assets/kisi-kisi/' . strtolower($tipeUjian) . date('Y') . '/' . $item . '.pdf'));
                $data->delete();
                $itemDelete = 'Kisi-kisi ' . $data->mapel . ' ' . $data->kelas . ' berhasil dihapus';
            }
        } catch (Exception $e) {
            $itemDelete = $e->getMessage();
        }
        return response()->json($itemDelete);
    }

    public function download(Request $request)
    {
        $kisiKisi = $request->input('itemName');
        $tipeUjian = $request->input('tipeUjian');

        $fileName = public_path('/assets/kisi-kisi/' . strtolower($tipeUjian) . date('Y') . '/' . $kisiKisi . '.pdf');

        $headers = array(
            'Content-Type' => 'application/pdf'
        );
        return response()->download($fileName, $kisiKisi . '.pdf', $headers);
    }
}
