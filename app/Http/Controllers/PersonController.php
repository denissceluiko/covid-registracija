<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PersonController extends Controller
{
    public function create()
    {
        if (Session::get('person') !== null)
        {
            return redirect()->route('attendance.create');
        }

        return view('person.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'code' => 'required|unique:people,code',
            'phone' => 'required',
        ]);

        $person = Person::firstOrCreate(
            ['code' => $request->code],
            $request->all()
        );

        Session::put('person', $person->code);

        return redirect()->route('attendance.create');
    }

    public function forget()
    {
        Session::forget('person');
        return redirect()->route('home');
    }
}
