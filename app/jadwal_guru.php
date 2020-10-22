<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal_guru extends Model
{
    //
    protected $table = 'jadwal_guru';

    protected $fillable = [
        'guru_id',
        'mapel_id',
        'jam_ke',
    ];

    public function guru()
    {
        return $this->belongsTo('App\guru', 'guru_id');
    }
    public function mapel()
    {
        return $this->belongsTo('App\mapel', 'mapel_id');
    }
}
