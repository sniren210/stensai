<?php

namespace App\Http\Controllers;

use App\ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
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
        'nomor' => ['required','numeric', 'max:255'],
        'jenis' => ['required', 'max:255'],
        // 'foto' => 'required|file|image|mimes:jpeg,png,jpg'
    ];

    public function index()
    {
        $data = [
            'ruang' => ruang::all()
        ];

        return view('buku-induk.ruang.table',$data);
    }

    public function home()
    {
        $data = [
            'ruang' => ruang::all()
        ];

        return view('buku-induk.ruang.ruang',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('buku-induk.ruang.tambah');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validasi,$this->messages);

        ruang::create( [
            'nmr_ruang' => $request->nomor,
            'jenis_ruang' => $request->jenis,
        ]);

        return redirect('ruang')->with('status', 'Ruang berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function edit(ruang $ruang)
    {
        $data = [
            'ruang' => $ruang
        ];

        return view('buku-induk.ruang.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ruang $ruang)
    {
       $data =  $ruang;
        $request->validate($this->validasi,$this->messages);

        ruang::where('id',$data->id)->update([
            'nmr_ruang' => $request->nomor,
            'jenis_ruang' => $request->jenis,
        ]);

        return redirect('ruang')->with('status', 'Ruang berhasil Di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function destroy(ruang $ruang)
    {
        ruang::destroy($ruang->id);

        return redirect('ruang')->with('status', 'Ruang berhasil dihapus.');
    }
}
