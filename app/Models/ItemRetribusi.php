<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRetribusi extends Model
{
    use HasFactory;

    protected $table = 'item_retribusi';
    protected $connection = 'mysql';

    protected $fillable = [
        'retribusi_id',
        'kategori_nama',
        'jenis_tagihan',
        'harga',
    ];


}
