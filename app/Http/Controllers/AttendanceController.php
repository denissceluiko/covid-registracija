<?php

namespace App\Http\Controllers;

use App\Person;
use App\Room;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('saved');
    }

    public function index()
    {
        $attendance = Person::identify()->latestAttendance();
        return view('attendance.index', compact('attendance'));
    }

    public function create(Room $room = null)
    {
        $attendance = Person::identify()->latestAttendance();

        return view('attendance.create', compact('room'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|exists:rooms,code',
        ]);

        $room = Room::byCode($request->code);
        $person = Person::identify();

        $person->rooms()->save($room);

        return redirect()->route('attendance.index');
    }

}
