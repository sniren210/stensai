<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai_siswa extends Model
{
    //
    protected $table = 'nilai_siswa';

    protected $fillable = ['nilai', 'siswa_id', 'mapel_id'];

    public function siswa()
    {
        return $this->belongsTo('App\siswa', 'siswa_id');
    }
    public function mapel()
    {
        return $this->belongsTo('App\mapel', 'mapel_id');
    }
}
