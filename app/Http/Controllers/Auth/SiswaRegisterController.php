<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:siswa');
    }

    public function showRegisterForm()
    {
        return view('auth.register-siswa');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:siswa',
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request['password'] = Hash::make($request->password);
        siswa::create($request->all());

        return redirect()->intended(route('/'));
    }
}
