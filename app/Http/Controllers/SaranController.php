<?php

namespace App\Http\Controllers;

use App\event;
use App\Exports\SaranExport;
use App\saran;
use App\siswa;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SaranController extends Controller
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
        'event' => ['required', 'string', 'max:255'],
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
            'saran' => saran::all(),
        ];

        return view('peran.table-saran', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'event' => event::all(),
        ];

        return view('peran.saran', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = siswa::all();

        $request->validate($this->validasi, $this->messages);

        saran::create([
            'siswa_id' => 1,
            'event_id' => $request->event,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('peran/saran')->with(
            'status',
            'Saran berhasil ditambahkan.'
        );
    }

    public function export()
    {
        $date = date('Y-m-d,s');

        return Excel::download(new SaranExport(), 'Saran ' . $date . '.xlsx');
    }

    public function pdf()
    {
        $date = date('Y-m-d');

        // retreive all records from db
        $data = saran::all();

        // share data to view
        view()->share('saran', $data);

        return PDF::loadView('peran.pdf-saran', $data)
            ->setPaper('a4', 'landscape')
            ->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setWarnings(false)
            ->download('saran' . $date . '.pdf');
    }
}
