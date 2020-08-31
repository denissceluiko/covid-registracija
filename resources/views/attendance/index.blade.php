@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-warning btn-block my-3" href="{{ route('attendance.create') }}">Nākošā telpa</a>
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-text"><code>{{ $attendance->room->code }}</code></div>
                        <h1 class="display-5">{{ $attendance->room->name }}</h1>
                        <div class="card-subtitle">{{ $attendance->room->address }}</div>
                        <div class="card-subtitle">{{ $attendance->created_at->format('d.m.y. H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
