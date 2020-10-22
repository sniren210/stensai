<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    //
    protected $table = 'kelas';

    protected $fillable = ['kelas','sub_kelas'];

    public function siswa()
    {
        return $this->hasMany('App\siswa', 'kelas_id');
    }

    public function guru()
    {
        return $this->belongsToMany('App\guru', 'wali_kelas');
    }

    // public function mapel()
    // {
    //     return $this->belongsToMany('App\mapel', 'jadwal_kelas');
    // }

    public function jadwal_kelas()
    {
        return $this->hasMany('App\jadwal_kelas', 'kelas_id');
    }
}
