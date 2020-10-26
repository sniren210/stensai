<?php

namespace App\Imports;

use App\siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new siswa([
            //
            'nama' => $row['nama'],
            'nis' => $row['nis'],
            'nisn' => $row['nisn'],
            'jk' => $row['jenis_kelamin'],
            'tmp_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $row['tanggal_lahir'],
            'agama' => $row['agama'],
            'anak_ke' => $row['anak_ke'],
            // 'foto' => $row['foto'],
            'alamat' => $row['alamat'],
            'nama_ayah' => $row['nama_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'kelas_id' => $row['kelas'],
        ]);
    }
}
