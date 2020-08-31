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

    public function create()
    {
        return view('attendance.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|exists:rooms,code',
        ]);

        $room = Room::byCode($request->code);
        $person = Person::identify();

        $person->attended()->save($room);

        return view('attendance.current');
    }

    public function current()
    {
        return view('attendance.current');
    }
}
