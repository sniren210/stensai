<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    //
    protected $table = 'mapel';

    protected $fillable = ['nama', 'singkatan','jenis_mapel', 'kkm'];

    // public function siswa()
    // {
    //     return $this->belongsToMany('App\siswa', 'nilai_siswa');
    // }

    // public function guru()
    // {
    //     return $this->belongsToMany('App\guru', 'jadwal_guru');
    // }
    // public function kelas()
    // {
    //     return $this->belongsToMany('App\kelas', 'jadwal_kelas');

    // }
    // public function ruang()
    // {
    //     return $this->belongsToMany('App\ruang', 'jadwal_ruang');
    // }

    public function jadwal_guru()
    {
        return $this->hasMany('App\jadwal_guru', 'mapel_id');
    }
    public function jadwal_ruang()
    {
        return $this->hasMany('App\jadwal_ruang', 'mapel_id');
    }
    public function jadwal_kelas()
    {
        return $this->hasMany('App\jadwal_kelas', 'mapel_id');
    }
    public function nilai_siswa()
    {
        return $this->hasMany('App\nilai_siswa', 'mapel_id');
    }
}
