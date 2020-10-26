<?php

namespace App\Exports;

use App\siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SiswaExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('buku-induk.siswa.export', [
            'siswa' => siswa::all(),
        ]);
    }
}
