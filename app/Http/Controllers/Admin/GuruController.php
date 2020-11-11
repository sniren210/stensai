<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:guru');
    }

    public function index()
    {
        return view('welcome');
    }
}
