<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $guarded = [];

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'id_floor');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'id_room');
    }
}
