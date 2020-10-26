<?php

namespace App\Exports;

use App\siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

// class TryExport implements FromCollection
class TryExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('try-export', [
            'siswa' => siswa::all(),
        ]);
    }
}
