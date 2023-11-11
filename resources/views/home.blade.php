@extends('layouts.app')
<!doctype html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  @section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Panel de proyectos') }}
                     <button style="margin-left:530px">Crear nuevo proyecto</button>
                  </div>
  
                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
  
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
      <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
          <br><br>
          <h3>Lista de proyectos</h3>
          <br>
          <div class="table-responsive">
              <table class="table">
                  <thead class="bg-dark text-white">
                      <tr>
                          <th scope="col">Identificador</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Descripcion</th>
                          <th scope="col">foto</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($proyectos as $proyecto)
                      <tr class="">
                          <td scope="row">{{$proyecto->id_proyecto}}</td>
                          <td>{{$proyecto->nombre_proyecto}}</td>
                          <td>{{$proyecto->descripcion_proyecto}}</td>
                          <td><img height="50px" src="data:image/jpg;base64,{{ $proyecto->imagen_proyecto }}"></td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
          
      </div>
      <div class="col-md-2"></div>
      </div>
  @endsection
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>




