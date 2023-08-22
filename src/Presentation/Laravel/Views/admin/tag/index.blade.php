@extends('adminlte::page')

@section('title', 'Etiquetas')

@section('content_header')
    <h1>Etiquetas</h1>
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

    <div class="card">
        @can('admin.tag.create')
            <div class="card-header">
                <a href="{{ route('admin.tag.create') }}" class="btn btn-success">Crear nueva etiqueta</a>
            </div>
        @endcan
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Color</th>
                    @can('admin.tag.edit')
                        <th colspan="2">Acciones</th>
                    @endcan
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->color }}</td>
                            @can('admin.tag.edit')
                                <td width="10">
                                    <a href="{{ route('admin.tag.edit', $tag->slug) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td width="10">
                                    <form method="post" action="{{ route('admin.tag.destroy', $tag->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
