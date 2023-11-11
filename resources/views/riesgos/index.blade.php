@extends('layouts.app')
<!doctype html>
<html lang="en">

<head>
  <title>Matriz</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">

  <!-- Bootstrap CSS v5.2.1 -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
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
                  <div style="border-radius: 20px;background-color:black; color:white;display:grid; align-items:center; margin:-15px" class="card-header">{{ __('Panel de la matriz de riesgos') }}
                    <button style="margin:0 0 5px 0" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#createRisk">
                        Crear nuevo riesgo a la matriz
                      </button>
                  </div>
  
                  
              </div>
          </div>
      </div>
  </div>
      <div class="row" style="margin: -60px 0;">
      <div class="col-md-2"></div>
      <div class="col-md-12">
          <br><br>
          
<div class="table-responsive-xl" style="color:white">
    <table id="matriz" class="table table-dark table-hover">
        <!-- Encabezado de la tabla -->
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col">Riesgo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">TdR</th>
                <th scope="col">TdI</th>
                <th scope="col">Posibilidad de ocurrencia</th>
                <th scope="col">Impacto</th>
                <th scope="col">Zona de riesgo</th>
                <th scope="col">¿Se Acepta?</th>
                <th scope="col">Tipo de control</th>
                <th scope="col">HMC</th>
                <th scope="col">MIPC</th>
                <th scope="col">TCE</th>
                <th scope="col">ERC</th>
                <th scope="col">FEC</th>
                <th scope="col">Calificacion control</th>
                <th scope="col">Promedio controles preventivos</th>
                <th scope="col">Cuadrantes a disminuir probabilidad</th>
                <th scope="col">Promedio controles correctivos</th>
                <th scope="col">Cuadrantes a disminuir impacto</th>
                <th scope="col">Mitigaciones/Soluciones</th>
                <th scope="col">Responsable</th>
                <th scope="col">Acciones</th>


                <!-- Agrega las columnas adicionales aquí -->
            </tr>
        </thead>
        @foreach ($riesgos as $riesgo)
        <tbody>
            <tr style="align-items:center; text-align:center; justify-content:center; color:white">
                <td scope="row">{{ $riesgo->nombre_riesgo }}</td>
                <td>{{ $riesgo->descripcion_riesgo }}</td>
                <td>{{ $riesgo->tipo_de_riesgo }}</td>
                <td>{{ $riesgo->tipo_de_impacto }}</td>
                <?php 
                if($riesgo->prob_ocurrencia == 1){
                    echo '<th style="background-color:green;">Raro</th>';
                }elseif($riesgo->prob_ocurrencia == 2){
                    echo '<th style="background-color:#FFF2CC; color:black !important;">Poco probable</th>';
                }elseif($riesgo->prob_ocurrencia == 3){
                    echo '<th style="background-color:#FFFF00; color:black !important;">Posible</th>';
                }elseif($riesgo->prob_ocurrencia == 4){
                    echo '<th style="background-color:#ED7D31;">Probable</th>';
                }elseif($riesgo->prob_ocurrencia == 5){
                    echo '<th style="background-color:red;">Muy probable</th>';
                }
                ?>
                <?php 
                if($riesgo->impacto == 1){
                    echo '<th style="background-color:green;">Insignificante</th>';
                } elseif ($riesgo->impacto == 2) {
                    echo '<th style="background-color:#FFF2CC; color:black !important;">Menor</th>';
                }elseif($riesgo->impacto == 3){
                    echo '<th style="background-color:#FFFF00; color:black !important;">Moderado</th>';
                }elseif($riesgo->impacto == 4){
                    echo '<th style="background-color:#ED7D31;">Mayor</th>';
                }elseif($riesgo->impacto == 5){
                    echo '<th style="background-color:red;">Catastrofico</th>';
                };
                ?>
                    <?php 
                    if($riesgo->zona_de_riesgo <= 3){
                        echo '<td style="background-color: green;">Baja</td>';                        
                    }elseif ($riesgo->zona_de_riesgo > 3 && $riesgo->zona_de_riesgo <=6) {
                        echo '<td style="background-color: #FFFF00; color:black !important; font-weight:bold;">Moderada</td>';                        
                    
                    }elseif($riesgo->zona_de_riesgo > 6 && $riesgo->zona_de_riesgo <= 12){
                        echo '<td style="background-color: #ED7D31;">Alta</td>';                        
                    
                    } else {
                        echo '<td style="background-color: red;">Extrema</td>';                        
                    };
                    ?>
                <?php 
                    if($riesgo->se_acepta == 'Si'){
                        echo '<td style="background-color: green;">'.$riesgo->se_acepta.'</td>';                        
                    }else {
                        echo '<td style="background-color: red;">'.$riesgo->se_acepta.'</td>';                        
                    }
                    ?>
                <td>{{ $riesgo->tipo_de_control }}</td>
                <td>
                    <?php
                    if($riesgo->hmec == 15){
                        echo 'Si';
                    } else {
                        echo 'No';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if($riesgo->mipc == 15){
                        echo 'Si';
                    } else {
                        echo 'No';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if($riesgo->tce == 30){
                        echo 'Si';
                    } else {
                        echo 'No';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if($riesgo->rec == 15){
                        echo 'Si';
                    } else {
                        echo 'No';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if($riesgo->fec == 25){
                        echo 'Si';
                    } else {
                        echo 'No';
                    }
                    ?>
                </td>
                <?php
                if ($riesgo->calificacion_control > 75) {
                    echo '<td style="background-color: green;">' . $riesgo->calificacion_control . '</td>';
                } else if ($riesgo->calificacion_control > 50 && $riesgo->calificacion_control <= 75) {
                    echo '<td style="background-color: #FFFF00; color:black !important; font-weight:bold;">' . $riesgo->calificacion_control . '</td>';
                } elseif ($riesgo->calificacion_control > 0 && $riesgo->calificacion_control <= 50) {
                    echo '<td style="background-color: #ED7D31;">' . $riesgo->calificacion_control . '</td>';
                } elseif ($riesgo->calificacion_control == 0) {
                    echo '<td style="background-color: red;">' . $riesgo->calificacion_control . '</td>';
                }


                if ($riesgo->pcp > 75) {
                    echo '<td style="background-color: green;">' . $riesgo->pcp . '</td>';
                } else if ($riesgo->pcp > 50 && $riesgo->pcp <= 75) {
                    echo '<td style="background-color: #FFFF00; color:black !important; font-weight:bold;">' . $riesgo->pcp . '</td>';
                } elseif ($riesgo->pcp > 0 && $riesgo->pcp <= 50) {
                    echo '<td style="background-color: #ED7D31;">' . $riesgo->pcp . '</td>';
                } elseif ($riesgo->pcp == 0) {
                    echo '<td style="background-color: red;">' . $riesgo->pcp . '</td>';
                }

                ?>
                <td>{{ $riesgo->cdp }}</td>

                <?php
                if ($riesgo->pcc > 75) {
                    echo '<td style="background-color: green;">' . $riesgo->pcc . '</td>';
                } else if ($riesgo->pcc > 50 && $riesgo->pcc <= 75) {
                    echo '<td style="background-color: #FFFF00; color:black !important; font-weight:bold;">' . $riesgo->pcc . '</td>';
                } elseif ($riesgo->pcc > 0 && $riesgo->pcc <= 50) {
                    echo '<td style="background-color: #ED7D31;">' . $riesgo->pcc . '</td>';
                } elseif ($riesgo->pcc == 0) {
                    echo '<td style="background-color: red;">' . $riesgo->pcc . '</td>';
                }

                ?>
                <td>{{ $riesgo->cdi }}</td>
                <td>{{ $riesgo->mitigaciones }}</td>
                <td>{{ $riesgo->responsable }}</td>

                <td>
                    <button style="margin: 5px 0" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editRisk{{$riesgo->id_riesgo}}">Editar</button>
                    <button style="margin: 5px 0" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRisk{{$riesgo->id_riesgo}}">Eliminar</button>
                      
                </td>

                <!-- Agrega las columnas adicionales aquí -->
            </tr>
            @include('riesgos.info')
        </tbody>
        @endforeach
    </table>
</div>

        <button style="margin: 5px 0" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#siglas">Ver Diccionario de siglas</button>
@include('riesgos.create')

          
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

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function () {
    $('#matriz').DataTable({
        scrollX: true,
        columnDefs: [
            { width: '180px', targets: [0, 1, 2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20] },
            { width: '100px', targets: [21] } // Anchura de la columna 0 y 1
        ]
    });
});

  </script>
</body>
</html>




