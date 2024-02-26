<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Post extends Model
{
    protected $connection = 'mongodb'; // Menentukan koneksi MongoDB

    protected $collection = 'jenis'; // Menentukan nama koleksi MongoDB

    protected $fillable = [
        'Username',
        'Identifier',
        'First_name',
        'Last_name',
    ];

    // Jika Anda tidak ingin menggunakan timestamp default Laravel
    public $timestamps = false;
}
