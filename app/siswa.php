<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    //
    protected $table = 'siswa';

    protected $fillable = [
        'nama',
        'nis',
        'nisn',
        'jk',
        'tmp_lahir',
        'tgl_lahir',
        'agama',
        'anak_ke',
        'foto',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'jurusan_id',
        'kelas_id',
    ];

    public function kelas()
    {
        return $this->belongsTo('App\kelas');
    }

    public function jurusan()
    {
        return $this->belongsTo('App\jurusan');
    }

    // public function mapel()
    // {
    //     return $this->belongsToMany('App\mapel', 'nilai_siswa');
    // }

    public function nilai_siswa()
    {
        return $this->hasMany('App\nilai_siswa', 'siswa_id');
    }
    
    public function saran()
    {
        return $this->hasMany('App\saran', 'siswa_id');
    }

    public function pengajuan()
    {
        return $this->hasMany('App\pengajuan', 'siswa_id');
    }
}
