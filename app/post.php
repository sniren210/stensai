<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $table = 'post';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'thumbnail',
        'kategori_id',
        'user_id'
    ];

    public function kategori_post()
    {
        return $this->belongsTo('App\kategori_post','kategori_id');
    }
    public function user()
    {
        return $this->belongsTo('App\user','user_id');
    }
}
