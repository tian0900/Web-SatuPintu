<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $connection = 'mongodb'; // Menentukan koneksi MongoDB

    protected $collection = 'jenis'; // Menentukan nama koleksi MongoDB

    protected $fillable = [
        'Username',
        'Identifier',
        'First name',
        'Last name',
    ];

    // Jika Anda tidak ingin menggunakan timestamp default Laravel
    public $timestamps = false;
}
