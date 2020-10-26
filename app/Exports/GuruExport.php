<?php

namespace App\Exports;

use App\guru;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GuruExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('buku-induk.guru.export', [
            'guru' => guru::all(),
        ]);
    }
}
