<?php

namespace App\Http\Controllers;

use App\Room;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('saved');
    }

    public function index()
    {

    }

    public function show(Room $room)
    {
        return redirect()->route('attendance.create', $room->code);
    }

    public function poster(Room $room)
    {
        return view('room.poster', compact('room'));
    }
}
