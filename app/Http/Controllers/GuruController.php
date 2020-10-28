<?php

namespace App\Http\Controllers;

use App\Exports\GuruExport;
use App\guru;
use App\Imports\GuruImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class GuruController extends Controller
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
        'nip' => ['required', 'string', 'max:255'],
        'npwp' => ['required', 'string', 'max:255'],
        'tmp_lahir' => ['required', 'string', 'max:255'],
        'tgl_lahir' => ['required', 'date', 'max:255'],
        'jk' => ['required', 'max:255'],
        'agama' => ['required', 'string', 'max:255'],
        'alamat' => ['required', 'string', 'min:8'],
        'foto' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
        // 'foto' => 'required|file|image|mimes:jpeg,png,jpg'
    ];

    public function index()
    {
        //
        $data = [
            'guru' => guru::all(),
        ];

        return view('buku-induk.guru.table', $data);
    }

    public function home()
    {
        $data = [
            'guru' => guru::all(),
        ];

        return view('buku-induk.guru.buku-induk', $data);
    }

    public function selengkapnya(guru $guru)
    {
        $data = [
            'guru' => $guru,
        ];

        return view('buku-induk.guru.selengkapnya', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('buku-induk.guru.tambah');
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

        $request->foto->move('img/guru', $request->foto->originalName);

        guru::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'npwp' => $request->npwp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'foto' => $request->foto->originalName,
        ]);

        return redirect('buku-induk/guru')->with(
            'status',
            'Data guru berhasil ditambahkan.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(guru $guru)
    {
        //
        $data = [
            'guru' => $guru,
        ];

        return view('buku-induk.guru.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(guru $guru)
    {
        $data = [
            'guru' => $guru,
        ];
        //
        return view('buku-induk.guru.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, guru $guru)
    {
        $data = $guru;

        $request->validate($this->validasi, $this->messages);

        if ($request->foto->originalName = 'guru-default.png') {
            $request->foto->originalName =
                time() . '_' . $request->foto->getClientOriginalName();
        } else {
            $request->foto->originalName =
                time() . '_' . $request->foto->getClientOriginalName();
            File::delete('img/guru/' . $data->foto);
        }

        $request->foto->move('img/guru', $request->foto->originalName);

        guru::where('id', $data->id)->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'npwp' => $request->npwp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'foto' => $request->foto->originalName,
        ]);

        return redirect('buku-induk/guru')->with(
            'status',
            'Data guru berhasil di ubah.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(guru $guru)
    {
        //
        if (!($guru->foto = 'guru-default.png')) {
            File::delete('img/guru/' . $guru->foto);
        }
        guru::destroy($guru->id);

        return redirect('buku-induk/guru')->with(
            'status',
            'Data guru berhasil dihapus.'
        );
    }

    public function export()
    {
        $date = date('Y-m-d,s');

        return Excel::download(new GuruExport(), 'Guru ' . $date . '.xlsx');
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

        Excel::import(new GuruImport(), request()->file('import'));

        return redirect('buku-induk/guru')->with(
            'status',
            'Import Data guru berhasil.'
        );
    }

    public function pdf()
    {
        $date = date('Y-m-d');

        // retreive all records from db
        $data = guru::all();

        // share data to view
        view()->share('guru', $data);

        $pdf = PDF::loadView('buku-induk.guru.pdf', $data)
            ->setPaper('a4', 'landscape')
            ->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setWarnings(false)
            ->save('myfile.pdf');

        return $pdf->download('siswa' . $date . '.pdf');
    }
}
