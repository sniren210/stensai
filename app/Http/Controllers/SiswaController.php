<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use App\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class SiswaController extends Controller
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
        'nis' => ['required', 'string', 'max:255'],
        'nisn' => ['required', 'string', 'max:255'],
        'tmp_lahir' => ['required', 'string', 'max:255'],
        'tgl_lahir' => ['required', 'date', 'max:255'],
        'jk' => ['required', 'max:255'],
        'agama' => ['required', 'string', 'max:255'],
        'anak_ke' => ['required', 'numeric', 'max:255'],
        'alamat' => ['required', 'string', 'min:8'],
        'nama_ayah' => ['required', 'string', 'max:255'],
        'nama_ibu' => ['required', 'string', 'max:255'],
        'kelas' => ['required', 'max:255'],
        'jurusan' => ['required', 'max:255'],
        'foto' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
        // 'foto' => 'required|file|image|mimes:jpeg,png,jpg'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'siswa' => siswa::all(),
        ];

        return view('buku-induk.siswa.table', $data);
    }

    public function home()
    {
        $data = [
            'siswa' => siswa::all(),
        ];

        return view('buku-induk.siswa.buku-induk', $data);
    }

    public function selengkapnya(siswa $siswa)
    {
        $data = [
            'siswa' => $siswa,
        ];

        return view('buku-induk.siswa.selengkapnya', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('buku-induk.siswa.tambah');
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
        $request->validate($this->validasi, $this->messages);

        $request->foto->originalName =
            time() . '_' . $request->foto->getClientOriginalName();

        $request->foto->move('img/siswa', $request->foto->originalName);

        siswa::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'anak_ke' => $request->anak_ke,
            'alamat' => $request->alamat,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'foto' => $request->foto->originalName,
            'kelas_id' => $request->kelas,
            'jurusan_id' => $request->jurusan,
        ]);

        return redirect('buku-induk/siswa')->with(
            'status',
            'Data siswa berhasil ditambahkan.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
        $data = [
            'siswa' => $siswa,
        ];
        //
        return view('buku-induk.siswa.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(siswa $siswa)
    {
        $data = [
            'siswa' => $siswa,
        ];

        return view('buku-induk.siswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, siswa $siswa)
    {
        $data = $siswa;
        //
        $request->validate($this->validasi, $this->messages);

        if ($request->foto->originalName = 'siswa-default.png') {
            $request->foto->originalName =
                time() . '_' . $request->foto->getClientOriginalName();
        } else {
            $request->foto->originalName =
                time() . '_' . $request->foto->getClientOriginalName();
            File::delete('img/siswa/' . $data->foto);
        }

        $request->foto->move('img/siswa', $request->foto->originalName);

        siswa::where('id', $data->id)->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'anak_ke' => $request->anak_ke,
            'alamat' => $request->alamat,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'foto' => $request->foto->originalName,
            'kelas_id' => $request->kelas,
            'jurusan_id' => $request->jurusan,
        ]);

        return redirect('buku-induk/siswa')->with(
            'status',
            'Data siswa berhasil di ubah.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(siswa $siswa)
    {
        //
        if (!($siswa->foto = 'siswa-default.png')) {
            File::delete('img/siswa/' . $siswa->foto);
        }
        siswa::destroy($siswa->id);

        return redirect('buku-induk/siswa')->with(
            'status',
            'Data siswa berhasil dihapus.'
        );
    }

    public function export()
    {
        $date = date('Y-m-d,s');

        return Excel::download(new SiswaExport(), 'Siswa ' . $date . '.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate(
            [
                'import' => 'required',
                'file',
                'mimes:xlsx,csv',
            ],
            [
                'required' => 'form harus di isi',
                'mimes' => 'file harus csv,xlsx',
                'file' => 'harus input file',
            ]
        );

        Excel::import(new SiswaImport(), request()->file('import'));

        return redirect('buku-induk/siswa')->with(
            'status',
            'Import Data guru berhasil.'
        );
    }

    public function pdf()
    {
        $date = date('Y-m-d');

        $data = siswa::all();

        view()->share('siswa', $data);

        $pdf = PDF::loadView('try-pdf', $data);

        return $pdf->download('try' . $date . '.pdf');
    }
}
