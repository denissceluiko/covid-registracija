@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Pievienoties</h3>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['route' => 'person.store']) }}
                        {{ Form::hidden('target_url', back()->getTargetUrl()) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Vārds') }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('surname', 'Uzvārds') }}
                            {{ Form::text('surname', null, ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('code', 'Apliecības numurs') }}
                            {{ Form::text('code', null, ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('phone', 'Telefona nr.') }}
                            {{ Form::text('phone', null, ['class' => 'form-control', 'required']) }}
                        </div>
                        {{ Form::submit('Saglabāt', ['class' => 'btn btn-primary btn-block']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
