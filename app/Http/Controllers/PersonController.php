<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('foreign')->except('forget');
    }

    public function create()
    {
        return view('person.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'code' => 'required',
            'phone' => 'required',
        ]);

        $person = Person::firstOrCreate(
            ['code' => $request->code],
            $request->all()
        );

        Person::implant($person->code);

        return redirect()->route('attendance.create');
    }

    public function forget()
    {
        Person::extract();
        return redirect()->route('home');
    }
}
