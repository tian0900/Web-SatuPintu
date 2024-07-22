<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasWilayah extends Model
{
    use HasFactory;
    protected $table = 'petugas_sub_wilayah';
    protected $connection = 'mysql';

    protected $fillable = [
        'petugas_id',
        'subwilayah_id',
    ];

    
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wilayah()
    {
        return $this->belongsTo(User::class, 'sub_wilayah_id');
    }
}
