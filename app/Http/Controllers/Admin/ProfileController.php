<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    
    public function index()
    {
        return view('profile.edit');
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);

        $messages = [
            'required' => 'Form harus di isi',
            'email' => 'Harus di isi email',
            'image' => 'file harus gambar',
            'mimes' => 'file harus jpeg,jpg,png',
            'file' => 'harus input file',
            'confirmed' => 'password tidak cocok',
            'unique' => 'sudah ada'
        ];
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'foto' => 'file|image|mimes:jpeg,png,jpg'
        ],$messages);

        if ($request->foto) {
            // if (!$request->foto->originalName == 'default.png') {
            //     $request->foto->originalName = time().'_'.$request->foto->getClientOriginalName();
                
            //     File::delete('img/'.$data->foto);
            // }
            $request->foto->originalName = time().'_'.$request->foto->getClientOriginalName();
            
            $request->foto->move('img',$request->foto->originalName);

            User::where('id', $data->id)->update( [
                'name' => $request['name'],
                'email' => $request['email'],
                // 'password' => Hash::make($request['password']),
                'foto' => $request->foto->originalName,
            ]);

            // User::where()->get();
    
            return redirect('profile')->with('status', 'Akun Anda berhasil diubah.');
        }
        
        User::where('id', $data->id)->update( [
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request->password),
        ]);

        return redirect('/profile')->with('status', 'akun Anda berhasil diubah.');
    }

    public function ubah()
    {
        return view('profile.change-password');
    }

    public function change(Request $request, $id)
    {
        $data = User::find($id);

        $messages = [
            'required' => 'Form harus di isi',
            'email' => 'Harus di isi email',
            'image' => 'file harus gambar',
            'mimes' => 'file harus jpeg,jpg,png',
            'file' => 'harus input file',
            'confirmed' => 'password tidak cocok',
            'unique' => 'sudah ada',
            'min' => 'Karakter harus lebih dari 8 karakter'
        ];
        //
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'old_password' => ['required', 'string', 'min:8'],
        ],$messages);

        if (!password_verify($request->old_password,$data->password)) {

            return redirect('/profile/change-password')->with('gagal', 'Password Lama salah.');
        }
        User::where('id', $data->id)->update( [
            'password' => Hash::make($request->password),
        ]);

        return redirect('/profile/change-password')->with('status', 'Password Anda berhasil diubah.');
    }
}
