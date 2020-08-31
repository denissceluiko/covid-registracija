@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-text"><code class="display-4">{{ $room->code }}</code></div>
                        <h1 class="display-5">{{ $room->name }}</h1>
                        <div class="card-subtitle">{{ $room->address }}</div>
                    </div>
                    <img class="card-img-bottom" src="{{ $room->qrCode() }}">
                </div>
            </div>
        </div>
    </div>
@endsection
