<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal_kelas extends Model
{
    //
    protected $table = 'jadwal_kelas';

    protected $fillable = [
        'kelas_id',
        'mapel_id',
        'jam_ke',
    ];

    public function kelas()
    {
        return $this->belongsTo('App\kelas', 'kelas_id');
    }
    public function mapel()
    {
        return $this->belongsTo('App\mapel', 'mapel_id');
    }
}
