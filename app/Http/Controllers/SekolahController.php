<?php

namespace App\Http\Controllers;

use App\guru;
use App\jurusan;
use App\sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SekolahController extends Controller
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
        'numeric' => 'harus di isi angka',
    ];
    protected $validasi = [
        'nama' => ['required', 'string', 'max:255'],
        'nss' => ['required', 'string', 'max:255'],
        'npsn' => ['required', 'string', 'max:255'],
        'prov' => ['required', 'string', 'max:255'],
        'kab' => ['required', 'string', 'max:255'],
        'desa' => ['required', 'string', 'max:255'],
        'jln' => ['required', 'string', 'max:255'],
        'kd_pos' => ['required', 'numeric'],
        'akreditas' => ['required', 'max:255'],
        'th_akreditas' => ['required', 'date', 'max:255'],
        'th_berdiri' => ['required', 'date', 'max:255'],
        'guru' => ['required', 'max:255'],
        'foto' => ['file', 'image', 'mimes:jpeg,png,jpg'],
        // 'foto' => 'required|file|image|mimes:jpeg,png,jpg'
    ];

    public function index()
    {
        $data = [
            'sekolah' => sekolah::find(1),
            'jurusan' => jurusan::all(),
        ];

        return view('buku-induk.sekolah.profile', $data);
    }

    public function show($sekolah = 1)
    {
        //
        $data = [
            'sekolah' => sekolah::find($sekolah),
            'jurusan' => jurusan::all(),
        ];

        return view('buku-induk.sekolah.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit($sekolah = 1)
    {
        $data = [
            'sekolah' => sekolah::find($sekolah),
            'jurusan' => jurusan::all(),
            'guru' => guru::all(),
        ];

        return view('buku-induk.sekolah.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sekolah $sekolah)
    {
        $request->validate($this->validasi, $this->messages);

        if ($request->foto) {
            $request->foto->originalName =
                time() . '_' . $request->foto->getClientOriginalName();

            $request->foto->move('img/', $request->foto->originalName);

            sekolah::where('id', $sekolah->id)->update([
                'nama' => $request->nama,
                'nss' => $request->nss,
                'npsn' => $request->npsn,
                'prov' => $request->prov,
                'kab' => $request->kab,
                'desa' => $request->desa,
                'jln' => $request->jln,
                'kd_pos' => $request->kd_pos,
                'akreditas' => $request->akreditas,
                'th_akreditas' => $request->th_akreditas,
                'th_berdiri' => $request->th_berdiri,
                'guru_id' => $request->guru,
                'foto' => $request->foto->originalName,
            ]);

            return redirect('sekolah/detail')->with(
                'status',
                'Sekolah berhasil diubah.'
            );
        }

        sekolah::where('id', $sekolah->id)->update([
            'nama' => $request->nama,
            'nss' => $request->nss,
            'npsn' => $request->npsn,
            'prov' => $request->prov,
            'kab' => $request->kab,
            'desa' => $request->desa,
            'jln' => $request->jln,
            'kd_pos' => $request->kd_pos,
            'akreditas' => $request->akreditas,
            'th_akreditas' => $request->th_akreditas,
            'th_berdiri' => $request->th_berdiri,
            'guru_id' => $request->guru,
            'foto' => $sekolah->foto,
        ]);
        return redirect('sekolah/detail')->with(
            'status',
            'Sekolah berhasil diubah.'
        );
    }
}
