<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    
    public function index()
    {
        $rooms = Room::where('is_available', true)->get();
        return view('rooms.index', compact('rooms'));
    }

    
    public function show($id)
    {
        $room = Room::find($id);
        return view('rooms.show', compact('room'));
    }
}

