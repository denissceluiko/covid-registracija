@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(!empty($room))
                    <div class="card mt-3">
                        <div class="card-body text-center">
                            <div class="card-text"><code>{{ $room->code }}</code></div>
                            <h1 class="display-5">{{ $room->name }}</h1>
                            <div class="card-subtitle">{{ $room->address }}</div>
                        </div>
                    </div>
                    {{ Form::open(['action' => 'AttendanceController@store']) }}
                    {{ Form::hidden('code', $room->code) }}
                    {{ Form::submit('Reģistrēties', ['class' => 'btn btn-primary btn-block mt-3']) }}
                    {{ Form::close() }}
                @else
                    <div class="card mt-3">
                        <div class="card-body">
                            {{ Form::open(['action' => 'AttendanceController@store']) }}
                            <div class="form-group">
                                {{ Form::label('code', 'Telpas kods') }}
                                {{ Form::text('code', null, ['class' => 'form-control']) }}
                                {{ $errors->first('code') }}
                            </div>
                            {{ Form::submit('Reģistrēties', ['class' => 'btn btn-primary btn-block']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                    @include('snippets.qr-reader')
                @endif
            </div>
        </div>
    </div>
@endsection
