<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    public function index()
    {
        $data = [
            'user' => User::where('is_admin', null)->get()
        ];

        return view('profile.account-guru', $data);
    }

    public function edit($id)
    {   
        $data = [
            'user' => User::find($id)
        ];
        
        if ($data['user']->is_admin == 1) {
            return redirect('/account-guru');
        }

        return view('profile.account-guru-edit',$data);
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);

        if ($data->is_admin == 1) {
            return redirect('/account-guru');
        }

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'foto' => 'file|image|mimes:jpeg,png,jpg'
        ],$messages);

        if ($request->foto) {
            if ($request->foto->originalName == 'default.png') {
                $request->foto->originalName = time().'_'.$request->foto->getClientOriginalName();
                
            }else{
                
                $request->foto->originalName = time().'_'.$request->foto->getClientOriginalName();
                File::delete('img/'.$data->foto);
            }
            
            
            $request->foto->move('img',$request->foto->originalName);

            User::where('id', $data->id)->update( [
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'foto' => $request->foto->originalName,
            ]);
    
            return redirect('account-guru')->with('status', 'Akun Guru berhasil diubah.');
        }
        
        User::where('id', $data->id)->update( [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/account-guru')->with('status', 'akun guru berhasil diubah.');
    }

    public function create()
    {
        return view('profile.account-guru-tambah');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Form harus di isi',
            'email' => 'Harus di isi email',
            'image' => 'file harus gambar',
            'mimes' => 'file harus jpeg,jpg,png',
            'file' => 'harus input file',
            'confirmed' => 'password tidak cocok'
        ];
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'foto' => 'file|image|mimes:jpeg,png,jpg'
        ],$messages);

        if ($request->foto) {
            $request->foto->originalName = time().'_'.$request->foto->getClientOriginalName();
            
            $request->foto->move('img',$request->foto->originalName);

            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'foto' => $request->foto->originalName,
            ]);
    
            return redirect('account-guru')->with('status', 'Akun Guru berhasil ditambahkan.');
        }

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'foto' => 'default.png'
        ]);

        return redirect('account-guru')->with('status', 'Akun Guru berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('account-guru')->with('status', 'Akun Guru berhasil dihapus.');

    }
}
