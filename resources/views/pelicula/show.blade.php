@extends('layouts.app')

@section('template_title')
    {{ $pelicula->name ?? "{{ __('Show') Pelicula" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pelicula</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('peliculas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Peliculas:</strong>
                            {{ $pelicula->id }}
                        </div>
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $pelicula->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $pelicula->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $pelicula->genero }}
                        </div>
                        <div class="form-group">
                            <strong>Valoracion:</strong>
                            {{ $pelicula->valoracion }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $pelicula->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Video:</strong>
                            {{ $pelicula->video }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
