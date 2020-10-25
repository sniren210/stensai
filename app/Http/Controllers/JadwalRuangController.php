<?php

namespace App\Http\Controllers;

use App\jadwal_ruang;
use App\mapel;
use App\ruang;
use Illuminate\Http\Request;

class JadwalRuangController extends Controller
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
        'ruang' => ['required', 'max:255'],
        'jam_ke' => ['required','numeric', 'max:255'],
        // 'foto' => 'required|file|image|mimes:jpeg,png,jpg'
    ];
    
    public function index()
    {
        //
        $data = [
            'ruang' => ruang::all()
        ];

        return view('jadwal.ruang.table',$data);
    }

    public function home()
    {
        $data = [
            'ruang' => ruang::all()
        ];

        return view('jadwal.ruang.ruang',$data);    
        
    }

    public function jadwal($jadwal_ruang)
    {
        $data = [
            'jadwal' => jadwal_ruang::where('ruang_id', $jadwal_ruang)->get(),
            'ruang' => jadwal_ruang::where('ruang_id', $jadwal_ruang)->first()
        ];

        return view('jadwal.ruang.detail',$data);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'ruang' => ruang::all(),
            'mapel' => mapel::all()
        ];
        //
        return view('jadwal.ruang.tambah',$data);

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
        
        jadwal_ruang::create([
            'mapel_id' => $request->mapel,
            'ruang_id' => $request->ruang,
            'jam_ke' => $request->jam_ke,
        ]);

        return redirect('jadwal-ruang')->with('status', 'Jadwal ruang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jadwal_ruang  $jadwal_ruang
     * @return \Illuminate\Http\Response
     */
    public function show($jadwal_ruang)
    {
        $data = [
            'jadwal' => jadwal_ruang::where('ruang_id', $jadwal_ruang)->get(),
            'ruang' => jadwal_ruang::where('ruang_id', $jadwal_ruang)->first()
        ];

        return view('jadwal.ruang.jadwal',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jadwal_ruang  $jadwal_ruang
     * @return \Illuminate\Http\Response
     */
    public function edit(jadwal_ruang $jadwal_ruang)
    {
        //
        $data = [
            'ruang' => ruang::all(),
            'mapel' => mapel::all(),
            'jadwal' => $jadwal_ruang
        ];

        return view('jadwal.ruang.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jadwal_ruang  $jadwal_ruang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jadwal_ruang $jadwal_ruang)
    {
        $data = $jadwal_ruang;

        $request->validate($this->validasi,$this->messages);

        jadwal_ruang::where('id',$data->id)->update([
            'mapel_id' => $request->mapel,
            'ruang_id' => $request->ruang,
            'jam_ke' => $request->jam_ke,
        ]);

        return redirect('jadwal-ruang/'.$data->ruang_id)->with('status', 'Jadwal ruang berhasil diubah.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jadwal_ruang  $jadwal_ruang
     * @return \Illuminate\Http\Response
     */
    public function destroy(jadwal_ruang $jadwal_ruang)
    {
        jadwal_ruang::destroy($jadwal_ruang->id);

        return redirect('jadwal-ruang/'.$jadwal_ruang->ruang_id)->with('status', 'Jadwal ruang berhasil dihapus.');
    }
}
