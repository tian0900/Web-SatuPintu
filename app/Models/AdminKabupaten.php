<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminKabupaten extends Model
{
    use HasFactory;

    protected $table = 'adminkabupaten';
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

    public function kabupaten()
    {
        return $this->belongsTo(Retribusi::class, 'kabupaten_id');
    }
}
