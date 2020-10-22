<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    //
    protected $table = 'event';

    protected $fillable = [
        'nama',
        'deskripsi',
        'foto',
        'tanggal'
    ];

    public function saran()
    {
        return $this->hasMany('App\saran', 'event_id');
    }
}
