@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
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
        @can('admin.category.create')
            <div class="card-header">
                <a href="{{ route('admin.category.create') }}" class="btn btn-success">Crear nueva categoria</a>
            </div>
        @endcan
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    @can('admin.category.edit')
                        <th colspan="2">Acciones</th>
                    @endcan
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>

                            @can('admin.category.edit')
                                <td width="10px">
                                    <a href="{{ route('admin.category.edit', $category->slug) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td width="10px">
                                    <form method="post" action="{{ route('admin.category.destroy', $category->id) }}">
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
