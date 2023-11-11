@extends('layouts.app')

<!doctype html>
<html lang="en">

<head>
    <title>Datos de los usuarios</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
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
                    <div style="border-radius: 20px;background-color:black; color:white;display:grid; align-items:center; margin:-15px"
                        class="card-header">{{ __('Datos de los usuarios') }}
                        <div style="display: flex">
                            <p style="display: flex">Bienvenido señor&nbsp;<strong
                                    style="text-transform: capitalize;"> {{$user->name}}</strong></p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <br><br>
    
            <div class="table-responsive">
                <table class="table table-bordered table-dark" style="border: 1px white solid;">
                    <thead>
                        <tr>
                            <th scope="col">Identificador</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
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
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
        crossorigin="anonymous">
    </script>
</body>

</html>
