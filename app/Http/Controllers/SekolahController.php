<?php

namespace App\Http\Controllers;

use App\sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'sekolah' => sekolah::find(1)
        ];

        return view('buku-induk.sekolah.profile',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show($sekolah = 1)
    {
        //
        $data = [
            'sekolah' => sekolah::find($sekolah)
        ];

        return view('buku-induk.sekolah.detail',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit($sekolah = 1)
    {
        $data = [
            'sekolah' => sekolah::find($sekolah)
        ];

        return view('buku-induk.sekolah.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sekolah $sekolah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(sekolah $sekolah)
    {
        //
    }
}
