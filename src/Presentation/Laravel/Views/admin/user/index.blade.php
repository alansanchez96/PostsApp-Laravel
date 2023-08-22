@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Listado de usuarios</h1>

@stop

@section('content')
    @if (session('update'))
        <div class="alert alert-warning">
            <strong>{{ session('update') }}</strong>
        </div>
    @endif

    @livewire('admin.user-index')
@stop
