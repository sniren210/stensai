<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruang extends Model
{
    //
    protected $table = 'ruang';

    protected $fillable = ['nmr_ruang', 'jenis_ruang'];

    // public function mapel()
    // {
    //     return $this->belongsToMany('App\mapel', 'jadwal_guru');
    // }

    public function jadwal_ruang()
    {
        return $this->hasMany('App\jadwal_ruang', 'ruang_id');
    }
}
