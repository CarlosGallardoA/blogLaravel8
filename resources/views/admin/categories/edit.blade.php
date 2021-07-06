@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{ session('info') }}</strong>
            </div>
        @endif
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update',$category],'method' => 'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Ingrese el nombre de la categoría']) !!}

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control','placeholder' => 'Ingrese el slug de la categoría']) !!}

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-2.1.0/dist/jquery.stringtoslug.min.js') }}"></script>
    <script>
        $(document).ready( function() {
             $("#name").stringToSlug({
                setEvents: "keyup keydown blur",
                getPut: "#slug",
                space: "-",
             });
        });
    </script>
@endsection
