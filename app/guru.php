<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    //
    protected $table = 'guru';

    protected $fillable = [
        'nama',
        'nip',
        'npwp',
        'tmp_lahir',
        'tgl_lahir',
        'jk',
        'agama',
        'alamat',
        'foto',
    ];

    public function sekolah()
    {
        return $this->hasOne('App\sekolah');
    }

    public function kelas()
    {
        return $this->belongsToMany('App\kelas', 'wali_kelas');
    }
    
    // public function mapel()
    // {
    //     return $this->belongsToMany('App\mapel', 'jadwal_guru');
    // }

    public function jadwal_guru()
    {
        return $this->hasMany('App\jadwal_guru', 'guru_id');
    }
}
