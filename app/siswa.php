<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class siswa extends Authenticatable
{
    //
    use Notifiable;
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
        'kelas_id',
        'email',
        'password',
    ];

    protected $hidden = ['password', 'remember_token'];

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
