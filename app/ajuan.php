<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ajuan extends Model
{
    //
    protected $table = 'ajuan';

    protected $fillable = [
        'nama',
        'judul',
        'deskripsi',
        'thumbnail',
        'tanggal',
        'kategori_id',
    ];

    public function kategori_post()
    {
        return $this->belongsTo('App\kategori_post', 'kategori_id');
    }
}
