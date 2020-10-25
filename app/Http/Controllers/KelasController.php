<?php

namespace App\Http\Controllers;

use App\jurusan;
use App\kelas;
use App\siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
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
        'kelas' => ['required', 'string', 'max:255'],
        'sub_kelas' => ['required', 'string', 'max:255'],
        'jurusan' => ['required', 'string', 'max:255'],
    ];

    public function index()
    {
        $data = [
            'kelas' => kelas::all()
        ];
        //
        return view('buku-induk.kelas.kelas',$data);
    }

    public function kelas_jurusan()
    {
        $data = [
            'kelas' => kelas::all(),
        ];

        return view('buku-induk.kelas.kelas-jurusan',$data);
    }

    public function lihat_siswa($kelas)
    {
        $data = [
            'siswa' => siswa::where('kelas_id',$kelas)->get()
        ];

        return view('buku-induk.kelas.lihat-siswa',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'jurusan' => jurusan::all()
        ];

        return view('buku-induk.kelas.tambah',$data);
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

        kelas::create([
            'kelas' => $request->kelas,
            'sub_kelas' => $request->sub_kelas,
            'jurusan_id' => $request->jurusan
        ]);

        return redirect('kelas')->with('status', 'Kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($kelas)
    {
        $data = [
            'siswa' => siswa::where('kelas_id',$kelas)->get()
        ];

        return view('buku-induk.kelas.detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($kelas)
    {
        $data = [
            'kelas' => kelas::find($kelas),
            'jurusan' => jurusan::all()
        ];

        return view('buku-induk.kelas.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$kelas)
    {
        $data = kelas::find($kelas);
        //
        $request->validate($this->validasi,$this->messages);

        kelas::where('id',$data->id)->update([
            'kelas' => $request->kelas,
            'sub_kelas' => $request->sub_kelas,
            'jurusan_id' => $request->jurusan
        ]);

        return redirect('kelas')->with('status', 'Kelas berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($kelas)
    {
        kelas::destroy($kelas);

        return redirect('kelas')->with('status', 'Kelas berhasil dihapus.');
    }
}
