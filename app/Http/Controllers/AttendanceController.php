<?php

namespace App\Http\Controllers;

use App\Person;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('person');
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
        $person = Person::byCode(Session::get('person'));

        $person->attended()->save($room);

        return view('attendance.current');
    }

    public function current()
    {
        return view('attendance.current');
    }
}
