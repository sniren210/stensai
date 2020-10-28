<?php

namespace App\Http\Controllers;

use App\Exports\NilaiSiswaExport;
use App\mapel;
use App\nilai_siswa;
use App\siswa;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NilaiSiswaController extends Controller
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
        'siswa' => ['required', 'max:255'],
        'nilai' => ['required', 'numeric', 'max:255'],
        // 'foto' => 'required|file|image|mimes:jpeg,png,jpg'
    ];

    public function index()
    {
        $data = [
            'siswa' => siswa::all(),
        ];

        return view('buku-induk.nilai.table', $data);
    }

    public function nilai($nilai)
    {
        $data = [
            'nilai' => nilai_siswa::where('siswa_id', $nilai)->get(),
            'siswa' => nilai_siswa::where('siswa_id', $nilai)->first(),
        ];

        return view('buku-induk.nilai.nilai', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'siswa' => siswa::all(),
            'mapel' => mapel::all(),
        ];

        return view('buku-induk.nilai.tambah', $data);
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

        nilai_siswa::create([
            'mapel_id' => $request->mapel,
            'siswa_id' => $request->siswa,
            'nilai' => $request->nilai,
        ]);

        return redirect('buku-induk/nilai-siswa')->with(
            'status',
            'Nilai Siswa berhasil ditambahkan.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nilai_siswa  $nilai_siswa
     * @return \Illuminate\Http\Response
     */
    public function show($nilai_siswa)
    {
        $data = [
            'nilai' => nilai_siswa::where('siswa_id', $nilai_siswa)->get(),
            'siswa' => nilai_siswa::where('siswa_id', $nilai_siswa)->first(),
        ];

        return view('buku-induk.nilai.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\nilai_siswa  $nilai_siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(nilai_siswa $nilai_siswa)
    {
        //
        $data = [
            'nilai' => $nilai_siswa,
            'siswa' => siswa::all(),
            'mapel' => mapel::all(),
        ];

        return view('buku-induk.nilai.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nilai_siswa  $nilai_siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nilai_siswa $nilai_siswa)
    {
        $data = $nilai_siswa;
        //
        $request->validate($this->validasi, $this->messages);

        nilai_siswa::where('id', $data->id)->update([
            'mapel_id' => $request->mapel,
            'siswa_id' => $request->siswa,
            'nilai' => $request->nilai,
        ]);

        return redirect('buku-induk/nilai-siswa/' . $data->siswa_id)->with(
            'status',
            'Nilai Siswa berhasil di ubah.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nilai_siswa  $nilai_siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(nilai_siswa $nilai_siswa)
    {
        nilai_siswa::destroy($nilai_siswa->id);

        return redirect(
            'buku-induk/nilai-siswa/' . $nilai_siswa->guru_id
        )->with('status', 'Jadwal Nilai berhasil dihapus.');
    }

    public function export($id)
    {
        $nilai = new NIlaiSiswaExport();
        $date = date('Y-m-d,s');

        $nilai->id = $id;

        return Excel::download($nilai, 'Nilai Siswa ' . $date . '.xlsx');
    }

    public function pdf($siswa_id)
    {
        $date = date('Y-m-d');

        // retreive all records from db
        $data = nilai_siswa::where('siswa_id', $siswa_id)->get();

        // share data to view
        view()->share('nilai_siswa', $data);

        $pdf = PDF::loadView('buku-induk.nilai.pdf', $data)
            ->setPaper('a4', 'landscape')
            ->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setWarnings(false)
            ->save('myfile.pdf');

        return $pdf->download('Nilai Siswa' . $date . '.pdf');
    }
}
