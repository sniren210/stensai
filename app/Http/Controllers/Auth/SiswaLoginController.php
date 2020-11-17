<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class SiswaLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:siswa')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login-siswa');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt to log the user in
        if (
            Auth::guard('siswa')->attempt(
                ['email' => $request->email, 'password' => $request->password],
                $request->remember
            )
        ) {
            return redirect()->intended(route('home'));
        }

        // if unsuccessful
        return redirect()
            ->back()
            ->with(
                'status',
                'Password atau email salah.'
            );
    }
}