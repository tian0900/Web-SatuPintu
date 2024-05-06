<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'petugas';
    protected $connection = 'mysql';

    protected $fillable = [
        'user_id',
        'subwilayah_id',
    ];

    
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
