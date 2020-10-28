<?php

namespace App\Exports;

use App\nilai_siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NilaiSiswaExport implements FromView
{
    public $id;

    public function view(): View
    {
        return view('buku-induk.nilai.export', [
            'nilai_siswa' => nilai_siswa::where('siswa_id', $this->id)->get(),
        ]);
    }
}
