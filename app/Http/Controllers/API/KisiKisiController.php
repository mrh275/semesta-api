<?php

namespace App\Http\Controllers\API;

use App\Models\KisiKisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

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
        $files[0]->move(public_path('/assets/kisi-kisi/pas2022/'), $newName);

        KisiKisi::create([
            'mapel' => $request->input('mapel'),
            'kelas' => $request->input('kelas'),
            'status' => $request->input('status'),
            'slug' => $request->input('slug')
        ]);

        return 'Kisi-kisi uploaded successfully!';
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
    public function destroy($id)
    {
        //
    }

    public function download(Request $request)
    {
        $kisiKisi = $request->input('itemName');

        $fileName = public_path('/assets/kisi-kisi/pas2022/' . $kisiKisi . '.pdf');

        $headers = array(
            'Content-Type' => 'application/pdf'
        );
        return response()->download($fileName, $kisiKisi . '.pdf', $headers);
    }
}
