<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retribusi extends Model
{
    use HasFactory;

    protected $table = 'retribusi';
    protected $connection = 'mysql';

    // Properti $fillable untuk menentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'kedinasan_id',
       // Menambahkan _token ke properti fillable
    ];

    public function item(){
        return $this->hasMany(ItemRetribusi::class);
    }
}
