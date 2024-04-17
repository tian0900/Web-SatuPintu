<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $table = 'tagihan';
    protected $connection = 'mysql';
    protected $fillable = [
        'kontrak_id',
        'nama',
        'total_harga',
        'status',
        'invoice_id',
        'request_id',
        'virtualAccountId',
        'created_at',
        'updated_at',
        'jatuh_tempo',
    ];

    protected $dates = ['created_at', 'updated_at', 'jatuh_tempo'];
    public function kontrak()
    {
        return $this->belongsTo(Kontrak::class, 'kontrak_id');
    }
    
}
