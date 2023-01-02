@extends('adminlte::page')

@section('title', 'Editar categoria')

@section('content_header')
    <h1>Edita la categoria {{ $role->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.role.update', $role->id], 'method' => 'put']) !!}

            @include('admin.role.partials.form')

            {!! Form::submit('Guardar cambios', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(() => {
            $('#name').stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop
