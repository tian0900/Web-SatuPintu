<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kedinasan extends Model
{
    use HasFactory;

    protected $table = 'kedinasan';
    protected $connection = 'mysql';

    protected $fillable = [
        'nama',
        'kepala_dinas',
        'kabupaten_id',
    ];
}
