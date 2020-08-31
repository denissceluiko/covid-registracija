@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-primary btn-block my-3" href="{{ route('attendance.create') }}">Nākošā telpa</a>
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-text"><code>{{ $room->code }}</code></div>
                        <h1 class="display-1">{{ $room->name }}</h1>
                        <div class="card-subtitle">{{ $room->address }}</div>
                        <div class="card-subtitle">{{ $room->created_at->format('d.m.y. H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
