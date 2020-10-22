<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal_ruang extends Model
{
    //
    protected $table = 'jadwal_ruang';

    protected $fillable = [
        'ruang_id',
        'mapel_id',
        'jam_ke',
    ];

    public function ruang()
    {
        return $this->belongsTo('App\ruang', 'ruang_id');
    }
    // public function mapel()
    // {
    //     return $this->belongsTo('App\mapel', 'mapel_id');
    // }

    public function mapel()
    {
        return $this->belongsTo('App\mapel', 'mapel_id');
    }
}
