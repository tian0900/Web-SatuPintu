<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use MongoDB\Client;


class Test extends Model
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
