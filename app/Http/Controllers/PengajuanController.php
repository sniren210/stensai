<?php

namespace App\Http\Controllers;

use App\Exports\PengajuanExport;
use App\pengajuan;
use App\siswa;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PengajuanController extends Controller
{
    protected $messages = [
        'required' => 'Form harus di isi',
        'email' => 'Harus di isi email',
        'image' => 'file harus gambar',
        'mimes' => 'file harus jpeg,jpg,png',
        'file' => 'harus input file',
        'confirmed' => 'password tidak cocok',
        'unique' => 'sudah ada',
    ];
    protected $validasi = [
        'nama' => ['required', 'string', 'max:255'],
        'nis' => ['required', 'string', 'max:255'],
        'pengajuan' => ['required', 'string', 'max:255'],
        'deskripsi' => ['required', 'string', 'min:8'],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'pengajuan' => pengajuan::all(),
        ];

        return view('peran.table-pengajuan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peran.pengajuan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = siswa::all();

        $request->validate($this->validasi, $this->messages);

        foreach ($data as $item) {
            if ($item->nis == $request->nis) {
                $siswa = $item;
                $siswa_b = true;
            } else {
                $siswa_b = false;
            }
        }

        pengajuan::create([
            'siswa_id' => $siswa_b ? $siswa->id : false,
            'pengajuan' => $request->pengajuan,
            'deskripsi' => $request->deskripsi,
            'siswa_b' => $siswa_b,
        ]);
        return redirect('peran/pengajuan')->with(
            'status',
            'Pengajuan berhasil ditambahkan.'
        );
    }

    public function delete(pengajuan $pengajuan)
    {
        if ($pengajuan->siswa_b) {
            return redirect('pengajuan/table')->with(
                'gagal',
                'pengajuan Gagal dihapus.'
            );
        }

        pengajuan::destroy($pengajuan->id);

        return redirect('pengajuan/table')->with(
            'status',
            'pengajuan berhasil dihapus.'
        );
    }

    public function export()
    {
        $date = date('Y-m-d,s');

        return Excel::download(
            new PengajuanExport(),
            'Pengajuan ' . $date . '.xlsx'
        );
    }

    public function pdf()
    {
        $date = date('Y-m-d');

        // retreive all records from db
        $data = pengajuan::all();

        // share data to view
        view()->share('pengajuan', $data);

        return PDF::loadView('peran.pdf-pengajuan', $data)
            ->setPaper('a4', 'landscape')
            ->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setWarnings(false)
            ->download('saran' . $date . '.pdf');
    }
}
