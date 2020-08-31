@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
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
            </div>
        </div>
    </div>
@endsection
