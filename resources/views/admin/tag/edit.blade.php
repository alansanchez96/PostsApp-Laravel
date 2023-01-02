@extends('adminlte::page')

@section('title', 'Editar etiqueta')

@section('content_header')
    <h1>Edita la etiqueta {{ $tag->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($tag, ['route' => ['admin.tag.update', $tag->id], 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa un nombre']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, [
                    'class' => 'form-control disabled',
                    'readonly' => 'readonly',
                    'placeholder' => 'Slug de la categoria',
                ]) !!}
                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('color', 'Elige un color') !!}
                {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}
                @error('color')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

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
