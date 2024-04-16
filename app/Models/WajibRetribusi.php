<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WajibRetribusi extends Model
{
    use HasFactory;

    protected $table = 'wajib_retribusi';
    protected $connection = 'mysql';

    
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
