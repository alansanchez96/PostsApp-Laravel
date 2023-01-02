@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Listado de usuarios</h1>

@stop

@section('content')
    @if (session('create'))
        <div class="alert alert-success">
            <strong>{{ session('create') }}</strong>
        </div>
    @elseif (session('update'))
        <div class="alert alert-warning">
            <strong>{{ session('update') }}</strong>
        </div>
    @elseif (session('delete'))
        <div class="alert alert-danger">
            <strong>{{ session('delete') }}</strong>
        </div>
    @endif

    @livewire('admin.user-index')
@stop
