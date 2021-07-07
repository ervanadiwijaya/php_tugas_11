<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'nama', 'jabatan', 'umur', 'alamat', 'foto'
    ];
}
