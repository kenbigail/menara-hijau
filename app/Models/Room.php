<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms'; // Jika nama tabel berbeda dari nama model
    protected $guarded = [];

    protected $fillable = [
        'id_floor', 'name_room', 'images', 'facilities', 'contact',
        'size', 'categories', 'corner', 'availability',
        'grid_col', 'grid_row', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'facilities' => 'array',
    ];

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'id_floor');
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class, 'id_room');
    }
}

