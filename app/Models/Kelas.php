<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kelas extends Eloquent{
    use HasFactory;
    protected $table = 'kelas';

    protected$fillable = [
        'nama_kelas',
        'tingkat'
    ];
}
