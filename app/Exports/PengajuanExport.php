<?php

namespace App\Exports;

use App\pengajuan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PengajuanExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('peran.export-pengajuan', [
            'pengajuan' => pengajuan::all(),
        ]);
    }
}
