<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('foreign')->except(['forget', 'me']);
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
            'target_url' => 'nullable',
        ]);

        $person = Person::firstOrCreate(
            ['code' => $request->code],
            $request->all()
        );

        Person::implant($person->code);

        return $request->has('target_url') ? redirect()->to($request->target_url) : back();
    }

    public function forget()
    {
        Person::extract();
        return redirect()->route('home');
    }

    public function me()
    {
        $person = Person::identify();
        $attendances = $person->attendances;
        return view('person.me', compact('attendances', 'person'));
    }
}
