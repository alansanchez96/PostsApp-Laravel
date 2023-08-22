edit user
@extends('adminlte::page')

@section('title', 'Asignacion de rol')

@section('content_header')
    <h1>Asignar rol</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control">{{ $user->name }}</p>

            {!! Form::model($user, ['route' => ['admin.user.update', $user], 'method' => 'put']) !!}

            <p class="h5">Listado de roles</p>
            @foreach ($roles as $rol)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $rol->id, null, ['class' => 'mr-2']) !!}
                        {{ $rol->name }}
                    </label>
                </div>
            @endforeach

            {!! Form::submit('Guardar cambios', ['class' => 'btn btn-success mt-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
