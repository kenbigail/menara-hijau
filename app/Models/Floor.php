<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $table = 'floors'; // Jika nama tabel berbeda dari nama model

    protected $guarded = [];

    public function rooms() // Pastikan method ini ada dan pakai plural (rooms)
    {
        return $this->hasMany(Room::class, 'id_floor');
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class, 'id_floor');
    }
}
