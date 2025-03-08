<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms'; // Jika nama tabel berbeda dari nama model
    protected $guarded = [];

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'id_floor');
    }
}

