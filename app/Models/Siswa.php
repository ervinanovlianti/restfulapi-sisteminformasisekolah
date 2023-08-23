<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Siswa extends Eloquent
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = [
        'nama_siswa',
        'id_kelas'
    ];
}
