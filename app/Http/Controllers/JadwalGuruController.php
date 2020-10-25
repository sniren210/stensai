<?php

namespace App\Http\Controllers;

use App\guru;
use App\jadwal_guru;
use App\mapel;
use Illuminate\Http\Request;

class JadwalGuruController extends Controller
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
        'mapel' => ['required', 'max:255'],
        'guru' => ['required', 'max:255'],
        'jam_ke' => ['required','numeric', 'max:255'],
        // 'foto' => 'required|file|image|mimes:jpeg,png,jpg'
    ];
    
    public function index()
    {
        //
        $data = [
            'guru' => guru::all()
        ];

        return view('jadwal.guru.table',$data);
    }

    public function home()
    {
        $data = [
            'guru' => guru::all()
        ];

        return view('jadwal.guru.guru',$data);    
        
    }

    public function jadwal($jadwal_guru)
    {
        $data = [
            'jadwal' => jadwal_guru::where('guru_id', $jadwal_guru)->get(),
            'guru' => jadwal_guru::where('guru_id', $jadwal_guru)->first()
        ];

        return view('jadwal.guru.detail',$data);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'guru' => guru::all(),
            'mapel' => mapel::all()
        ];
        //
        return view('jadwal.guru.tambah',$data);

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
        
        jadwal_guru::create([
            'mapel_id' => $request->mapel,
            'guru_id' => $request->guru,
            'jam_ke' => $request->jam_ke,
        ]);

        return redirect('jadwal-guru')->with('status', 'Jadwal Guru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jadwal_guru  $jadwal_guru
     * @return \Illuminate\Http\Response
     */
    public function show($jadwal_guru)
    {
        $data = [
            'jadwal' => jadwal_guru::where('guru_id', $jadwal_guru)->get(),
            'guru' => jadwal_guru::where('guru_id', $jadwal_guru)->first()
        ];

        return view('jadwal.guru.jadwal',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jadwal_guru  $jadwal_guru
     * @return \Illuminate\Http\Response
     */
    public function edit(jadwal_guru $jadwal_guru)
    {
        //
        $data = [
            'guru' => guru::all(),
            'mapel' => mapel::all(),
            'jadwal' => $jadwal_guru
        ];

        return view('jadwal.guru.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jadwal_guru  $jadwal_guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jadwal_guru $jadwal_guru)
    {
        $data = $jadwal_guru;

        $request->validate($this->validasi,$this->messages);

        jadwal_guru::where('id',$data->id)->update([
            'mapel_id' => $request->mapel,
            'guru_id' => $request->guru,
            'jam_ke' => $request->jam_ke,
        ]);

        return redirect('jadwal-guru/'.$data->guru_id)->with('status', 'Jadwal Guru berhasil diubah.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jadwal_guru  $jadwal_guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(jadwal_guru $jadwal_guru)
    {
        jadwal_guru::destroy($jadwal_guru->id);

        return redirect('jadwal-guru/'.$jadwal_guru->guru_id)->with('status', 'Jadwal Guru berhasil dihapus.');
    }
}
