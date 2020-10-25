<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    //
    protected $table = 'jurusan';

    protected $fillable = ['nama','singkatan'];

    public function siswa()
    {
        return $this->hasMany('App\siswa', 'jurusan_id');
    }
    
    // public function jurusan()
    // {
    //     return $this->hasMany('App\jurusan', 'jurusan_id');
    // }

}
