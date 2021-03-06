<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ajuan;
use App\event;
use App\Exports\TryExport;
use App\Imports\TryImport;
use App\guru;
use App\jadwal_guru;
use App\jadwal_kelas;
use App\jadwal_ruang;
use App\kelas;
use App\mapel;
use App\nilai_siswa;
use App\saran;
use App\sekolah;
use App\siswa;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\ServiceProvider as SP;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TryController extends Controller
{
    //
    public function index()
    {
        $data = [
            'siswa' => siswa::all(),
            'ajuan' => ajuan::all(),
            'event' => event::all(),
            'guru' => guru::all(),
            'jadwal_guru' => jadwal_guru::all(),
            'jadwal_kelas' => jadwal_kelas::all(),
            'jadwal_ruang' => jadwal_ruang::all(),
            'nilai_siswa' => nilai_siswa::where('mapel_id', 2)->get(),
            'saran' => saran::all(),
            'kelas' => kelas::all(),
            'mapel' => mapel::all(),
            'sekolah' => sekolah::all(),
            'saran' => saran::all(),
        ];
        $saran = saran::all();
        dump($saran);
        foreach ($saran as $dat) {
            // dump($dat->siswa);
        }
        dump($dat->siswa);
        $join = DB::table('saran')
            ->join('siswa', 'siswa.id', '=', 'saran.siswa_id')
            ->join('event', 'event.id', '=', 'saran.event_id')
            ->get();
        dump($join);
        die();
        return view('try', $data);
    }

    public function siswa()
    {
        $data = [
            'example' => 'example',
        ];

        return view('try-siswa', $data);
    }

    public function guru()
    {
        return view('try-guru');
    }

    public function export()
    {
        $date = date('Y-m-d,s');

        return Excel::download(new TryExport(), 'try' . $date . '.xlsx');
    }

    public function import()
    {
        Excel::import(new TryImport(), request()->file('file'));

        return back();
    }

    // Generate PDF
    public function pdf()
    {
        $date = date('Y-m-d');

        // retreive all records from db
        $data = siswa::all();

        // share data to view
        view()->share('siswa', $data);

        $pdf = PDF::loadView('try-pdf', $data)
            ->setPaper('a4', 'landscape')
            ->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setWarnings(false)
            ->save('myfile.pdf');

        // $pdf = PDF::loadView('try-pdf', $data);
        // download PDF file with download method
        return $pdf->download('try' . $date . '.pdf');
    }
}
