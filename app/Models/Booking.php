<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Room;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'room_id', 'check_in', 'check_out'];

    // A booking belongs to a room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // A booking belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

