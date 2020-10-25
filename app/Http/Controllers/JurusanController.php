<?php

namespace App\Http\Controllers;

use App\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    protected $messages = [
        'required' => 'Form harus di isi',
        'email' => 'Harus di isi email',
        'image' => 'file harus gambar',
        'mimes' => 'file harus jpeg,jpg,png',
        'file' => 'harus input file',
        'confirmed' => 'password tidak cocok',
        'unique' => 'sudah ada',
        'date' => 'tanggal  harus format YY/MM/DD',
        'numeric' => 'harus di isi angka'
    ];
    protected $validasi = [
        'jurusan' => ['required', 'string', 'max:255'],
        'singkatan' => ['required', 'string', 'max:255'],
    ];

    public function index()
    {
        $data = [
            'jurusan' => jurusan::all()
        ];
        //
        return view('buku-induk.jurusan.jurusan',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('buku-induk.jurusan.tambah');

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
        $request->validate($this->validasi,$this->messages);
        // dd($request);

        jurusan::create( [
            'nama' => $request->jurusan,
            'singkatan' => $request->singkatan,
        ]);

        return redirect('jurusan')->with('status', 'jurusan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */

    public function edit(jurusan $jurusan)
    {
        //
        $data = [
            'jurusan' => $jurusan
        ];

        return view('buku-induk.jurusan.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jurusan $jurusan)
    {
        $data = $jurusan;

        $request->validate($this->validasi,$this->messages);
        // dd($request);

        jurusan::where('id',$data->id)->update( [
            'nama' => $request->jurusan,
            'singkatan' => $request->singkatan,
        ]);

        return redirect('jurusan')->with('status', 'jurusan berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(jurusan $jurusan)
    {
        //
        jurusan::destroy($jurusan->id);

        return redirect('jurusan')->with('status', 'Jurusan berhasil dihapus.');
    }
}
