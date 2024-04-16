<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory;
    
    protected $table = 'kontrak';
    protected $connection = 'mysql';
    protected $fillable = [
        'wajib_retribusi_id',
        'item_retribusi_id',
        'sub_wilayah_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    public function wajibRetribusi()
    {
        return $this->belongsTo(WajibRetribusi::class, 'wajib_retribusi_id');
    }

    public function itemRetribusi()
    {
        return $this->belongsTo(ItemRetribusi::class, 'item_retribusi_id');
    }

    public function Wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'sub_wilayah_id');
    }
}
