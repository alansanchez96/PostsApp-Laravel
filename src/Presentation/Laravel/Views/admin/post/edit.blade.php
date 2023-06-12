@extends('adminlte::page')

@section('title', 'Editar post')

@section('content_header')
    <h1>Editar post</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($post, [
                'route' => ['admin.post.update', $post->id],
                'method' => 'put',
                'autocomplete' => 'off',
                'files' => true,
            ]) !!}

            {!! Form::hidden('user_id', auth()->user()->id) !!}

            @include('admin.post.partials.form')

            {!! Form::submit('Guardar post', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .img-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .img-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready(() => {
            $('#title').stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });

            $('#file').change(e => {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.onload = e => $('#picture').attr('src', e.target.result)
                reader.readAsDataURL(file);
            });
        });

        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    </script>
@stop
