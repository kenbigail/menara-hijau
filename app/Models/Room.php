<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function facilities(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => is_array($value) ? json_encode($value) : $value
        );
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'id_floor');
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class, 'id_room');
    }
}

