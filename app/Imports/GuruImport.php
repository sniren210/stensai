<?php

namespace App\Imports;

use App\guru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new guru([
            //
            'nama' => $row['nama'],
            'nip' => $row['nip'],
            'npwp' => $row['npwp'],
            'jk' => $row['jenis_kelamin'],
            'tmp_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $row['tanggal_lahir'],
            'agama' => $row['agama'],
            // 'foto' => $row['foto'],
            'alamat' => $row['alamat'],
        ]);
    }
}
