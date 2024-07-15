<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Post extends Model
{
    protected $connection = 'mongodb'; // Menentukan koneksi MongoDB

    protected $collection = 'item_retribusi'; // Menentukan nama koleksi MongoDB

    protected $fillable = [
        'kabupaten_id',
        'kedinasan_id',
        'retribusi_id',
        'data',
    ];

    // Jika Anda tidak ingin menggunakan timestamp default Laravel
    public $timestamps = false;
}
