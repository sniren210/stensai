<?php

namespace App\Http\Controllers;

use App\jadwal_kelas;
use Illuminate\Http\Request;

class JadwalKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('jadwal.kelas.table');

    }

    public function home()
    {
        return view('jadwal.kelas');    
    }

    public function jadwal(jadwal_kelas $jadwal)
    {
        return view('jadwal.detail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jadwal.kelas.tambah');

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
     * @param  \App\jadwal_kelas  $jadwal_kelas
     * @return \Illuminate\Http\Response
     */
    public function show(jadwal_kelas $jadwal_kelas)
    {
        //
        return view('jadwal.kelas.jadwal');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jadwal_kelas  $jadwal_kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(jadwal_kelas $jadwal_kelas)
    {
        //
        return view('jadwal.kelas.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jadwal_kelas  $jadwal_kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jadwal_kelas $jadwal_kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jadwal_kelas  $jadwal_kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(jadwal_kelas $jadwal_kelas)
    {
        //
    }
}
