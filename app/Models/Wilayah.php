<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = 'sub_wilayah';
    protected $connection = 'mysql';

    // Properti $fillable untuk menentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'retribusi_id',
       // Menambahkan _token ke properti fillable
    ];
}
