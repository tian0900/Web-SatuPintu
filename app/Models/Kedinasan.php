<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kedinasan extends Model
{
    use HasFactory;

    protected $table = 'kabupaten';
    protected $connection = 'mysql';

    protected $fillable = [
        'nama',
    ];
}
