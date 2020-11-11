<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengajuan extends Model
{
    //
    protected $table = 'pengajuan';

    protected $fillable = ['siswa_id', 'pengajuan', 'deskripsi', 'siswa_b'];

    public function siswa()
    {
        return $this->belongsTo('App\siswa', 'siswa_id');
    }
}
