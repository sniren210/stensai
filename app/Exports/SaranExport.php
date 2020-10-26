<?php

namespace App\Exports;

use App\saran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SaranExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('peran.export-saran', [
            'saran' => saran::all(),
        ]);
    }
}
