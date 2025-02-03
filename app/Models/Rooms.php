<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function floor()
    {
        return $this->belongsTo(Floors::class, 'id_floor');
    }
}
