<?php

namespace App\Http\Controllers;

use App\jadwal_kelas;
use App\kelas;
use App\mapel;
use Illuminate\Http\Request;

class JadwalKelasController extends Controller
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
        'mapel' => ['required', 'max:255'],
        'kelas' => ['required', 'max:255'],
        'jam_ke' => ['required', 'numeric', 'max:255'],
        // 'foto' => 'required|file|image|mimes:jpeg,png,jpg'
    ];

    public function index()
    {
        $data = [
            'kelas' => kelas::all(),
        ];

        return view('jadwal.kelas.table', $data);
    }

    public function kelas()
    {
        return view('jadwal.kelas');
    }

    public function home()
    {
        $data = [
            'kelas' => kelas::all(),
        ];

        return view('jadwal.kelas.kelas', $data);
    }

    public function jadwal($jadwal)
    {
        $data = [
            'jadwal' => jadwal_kelas::where('kelas_id', $jadwal)->get(),
            'kelas' => jadwal_kelas::where('kelas_id', $jadwal)->first(),
        ];

        return view('jadwal.kelas.detail', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'kelas' => kelas::all(),
            'mapel' => mapel::all(),
        ];

        return view('jadwal.kelas.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validasi, $this->messages);

        jadwal_kelas::create([
            'mapel_id' => $request->mapel,
            'kelas_id' => $request->kelas,
            'jam_ke' => $request->jam_ke,
        ]);

        return redirect('jadwal-kelas')->with(
            'status',
            'Jadwal kelas berhasil ditambahkan.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jadwal_kelas  $jadwal_kelas
     * @return \Illuminate\Http\Response
     */
    public function show($jadwal_kelas)
    {
        $data = [
            'jadwal' => jadwal_kelas::where('kelas_id', $jadwal_kelas)->get(),
            'kelas' => jadwal_kelas::where('kelas_id', $jadwal_kelas)->first(),
        ];

        return view('jadwal.kelas.jadwal', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jadwal_kelas  $jadwal_kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($jadwal_kelas)
    {
        $data = [
            'kelas' => kelas::all(),
            'mapel' => mapel::all(),
            'jadwal' => jadwal_kelas::find($jadwal_kelas),
        ];

        return view('jadwal.kelas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jadwal_kelas  $jadwal_kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $jadwal_kelas)
    {
        $data = jadwal_kelas::find($jadwal_kelas);

        $request->validate($this->validasi, $this->messages);

        jadwal_kelas::where('id', $data->id)->update([
            'mapel_id' => $request->mapel,
            'kelas_id' => $request->kelas,
            'jam_ke' => $request->jam_ke,
        ]);

        return redirect('jadwal-kelas/' . $data->kelas_id)->with(
            'status',
            'Jadwal kelas berhasil diubah.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jadwal_kelas  $jadwal_kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($jadwal_kelas)
    {
        $data = jadwal_kelas::find($jadwal_kelas);

        jadwal_kelas::destroy($data->id);

        return redirect('jadwal-kelas/' . $data->kelas_id)->with(
            'status',
            'Jadwal Kelas berhasil dihapus.'
        );
    }
}
