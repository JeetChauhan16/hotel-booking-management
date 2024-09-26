<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['hotel_id', 'room_number', 'price', 'is_available'];

    // A room belongs to a hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
