@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p> {{ $person->name }} {{ $person->surname }} ({{ $person->code }}), {{ $person->phone }}</p>
                    </div>
                    <div class="card-body">
                        <h3>Apmeklējumu vēsture</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Nr. / nosaukums</th>
                                <th>Adrese</th>
                                <th>Reģ. laiks</th>
                            </tr>
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{ $attendance->room->name }}</td>
                                    <td>{{ $attendance->room->address }}</td>
                                    <td>{{ $attendance->room->created_at->format('d.m.Y. H:i') }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
