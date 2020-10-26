<?php

namespace App\Imports;

use App\siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TryImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new siswa([
            //
            'nama' => $row['nama'],
            'nis' => $row['nis'],
            'nisn' => $row['nisn'],
            'jk' => $row['jk'],
            'tmp_lahir' => $row['tmp_lahir'],
            'tgl_lahir' => $row['tgl_lahir'],
            'agama' => $row['agama'],
            'anak_ke' => $row['anak_ke'],
            'foto' => $row['foto'],
            'alamat' => $row['alamat'],
            'nama_ayah' => $row['nama_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'kelas_id' => $row['kelas_id'],
        ]);
    }
}
