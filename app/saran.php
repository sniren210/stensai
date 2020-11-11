<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class saran extends Model
{
    //
    protected $table = 'saran';

    protected $fillable = ['siswa_id', 'event_id', 'deskripsi', 'siswa_b'];

    public function siswa()
    {
        return $this->belongsTo('App\siswa', 'siswa_id');
    }
    public function event()
    {
        return $this->belongsTo('App\event', 'event_id');
    }
}
