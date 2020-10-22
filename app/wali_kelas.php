<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wali_kelas extends Model
{
    //
    protected $table = 'wali_kelas';

    protected $fillable = ['guru_id', 'kelas_id'];
}
