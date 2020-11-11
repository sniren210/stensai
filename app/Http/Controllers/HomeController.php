<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function bukuInduk()
    {
        return view('buku-induk.home');
    }

    function dashboard()
    {
        return view('dashboard');
    }

    public function jadwal()
    {
        return view('jadwal.home');
    }

    public function peran()
    {
        return view('peran.home');
    }
}
