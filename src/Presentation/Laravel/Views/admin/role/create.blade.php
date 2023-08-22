@extends('adminlte::page')

@section('title', 'Crear nuevo role')

@section('content_header')
    <h1>Crear nuevo role</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.role.store']) !!}

            @include('admin.role.partials.form')

            {!! Form::submit('Crear role', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
