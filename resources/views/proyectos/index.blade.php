@extends('home')

@section('content')
<style>
    body {
        background-color: #222;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="border-radius: 20px;background-color: #000; color: #fff;display:grid; align-items:center; margin:-15px" class="card-header">{{ __('Panel de proyectos') }}
                    <button style="margin:0 0 5px 0" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#createProject">
                        Crear nuevo proyecto
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <br><br>
        <div style="background-color: #333; border-radius: 20px; padding: 20px;">
            <h3 style="color: #fff">Lista de proyectos</h3>
            <br>
            <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                @foreach ($proyectos as $proyecto)
                <div class="card" style="width: 18rem; margin: 15px; background-color: #222; color: #fff; border: none; border-radius: 15px; text-align: center;">
                    <img style="width: 200px; height: 200px; object-fit: cover; margin: 15px auto 0 auto;" class="card-img-top" alt="Card image cap" src="data:image/jpg;base64,{{ $proyecto->imagen_proyecto }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $proyecto->nombre_proyecto }}</h5>
                        <p class="card-text">{{ $proyecto->descripcion_proyecto }}</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <a style="margin: 5px; color: #000; background-color: #fff; border-color: #fff; width: 100%;" href="{{ route('matrizriesgo.show', $proyecto->id_proyecto) }}" target="_self" class="btn btn-primary">Abrir Riesgos</a>
                            <div style="display: flex;">
                                <button style="margin: 5px; color: #000; background-color: #ffc107; border-color: #ffc107; width: 50%;" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$proyecto->id_proyecto}}">
                                    Editar
                                </button>
                                <button style="margin: 5px; color: #000; background-color: #dc3545; border-color: #dc3545; width: 50%;" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$proyecto->id_proyecto}}">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                    @include('proyectos.info')
                </div>
                @endforeach
                @include('proyectos.create')
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
@endsection
