@extends('layouts.app')

@section('template_title')
    Pelicula
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pelicula') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('pelicula.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Crear una nueva
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
										<th>Id Peliculas</th>
										<th>Titulo</th>
										<th>Descripcion</th>
										<th>Genero</th>
										<th>Valoracion</th>
										<th>Imagen</th>
										<th>Video</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peliculas as $pelicula)
                                        <tr>
                                            
											<td>{{ $pelicula->id }}</td>
											<td>{{ $pelicula->titulo }}</td>
											<td>{{ $pelicula->descripcion }}</td>
											<td>{{ $pelicula->genero }}</td>
											<td>{{ $pelicula->valoracion }}</td>
											<td>{{ $pelicula->imagen }}</td>
											<td>{{ $pelicula->video }}</td>

                                            <td>
                                                <form action="{{ route('pelicula.destroy',$pelicula->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('pelicula.edit',$pelicula->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $peliculas->links() !!}
            </div>
        </div>
    </div>
@endsection
