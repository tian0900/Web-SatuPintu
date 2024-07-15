<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    protected $connection = 'mysql';

    protected $fillable = [
        'user_id',
        'kabupaten_id',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function retribusi()
    {
        return $this->belongsTo(Retribusi::class, 'retribusi_id');
    }
}

