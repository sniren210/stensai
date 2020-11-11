<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class guru extends Authenticatable
{
    //
    use Notifiable;

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
        'email',
        'password',
    ];

    protected $hidden = ['password', 'remember_token'];

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
