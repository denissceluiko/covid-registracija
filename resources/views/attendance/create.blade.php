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
                    <div>
                        <b>Device has camera: </b>
                        <span id="cam-has-camera"></span>
                        <br>
                        <b>Device has flash: </b>
                        <span id="cam-has-flash"></span>
                        <br>
                        <video id="qr-video"></video>
                        <br>
                        <label>
                            <input id="show-scan-region" type="checkbox">
                            Show scan region
                        </label>
                    </div>
                    <div>
                        <button id="flash-toggle">📸 Flash: <span id="flash-state">off</span></button>
                    </div>
                    <div>
                        <select id="inversion-mode-select">
                            <option value="original">Scan original (dark QR code on bright background)</option>
                            <option value="invert">Scan with inverted colors (bright QR code on dark background)</option>
                            <option value="both">Scan both</option>
                        </select>
                        <br>
                    </div>
                    <b>Detected QR code: </b>
                    <span id="cam-qr-result">None</span>
                    <br>
                    <b>Last detected at: </b>
                    <span id="cam-qr-result-timestamp"></span>
                    <br>
                    <button id="start-button">Start</button>
                    <button id="stop-button">Stop</button>
                    <hr>

                    <h1>Scan from File:</h1>
                    <input type="file" id="file-selector">
                    <b>Detected QR code: </b>
                    <span id="file-qr-result">None</span>
                @endif
            </div>
        </div>
    </div>
@endsection
