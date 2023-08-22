@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <a href="{{ route('admin.post.create') }}" class="float-right btn-success btn">Crear nuevo post</a>
    <h1>Listado de Posts</h1>

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

    @livewire('admin.post-index')
@stop
