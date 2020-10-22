<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori_post extends Model
{
    //
    protected $table = 'kategori_post';

    protected $fillable = [
        'kategori'
    ];

    public function ajuan()
    {
        return $this->hasMany('App\ajuan', 'kategori_id');
    }
    public function post()
    {
        return $this->hasMany('App\post', 'kategori_id');
    }
}
