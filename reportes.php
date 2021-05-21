<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once '../db.php';
    require_once 'valida.php';
    date_default_timezone_set('America/Bogota');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/main.css">
    <title>Home</title>
</head>
<body onload="killerSession()">    
        <div class="container p-4">
            <div class="row"></div>
            <div class="row">
                <div class="col-sm-12">
                    <!-- <form action="" id="form_ins"> -->
                         <!-- ### PRIMERA SECCION ### -->
                        <div class="card my-2" style="display: block;">
                            <!-- <img src="images/image1.png" alt="cabezote" class="card-img-top"> -->
                            <div class="row card-img-top" style="justify-content:center;">                                
                                <div class="col-sm-12">
                                    <img src="images/Banner.jpg" alt="banner-encuesta" style="width: 100%;">
                                </div>                                                                
                            </div>
                            <nav aria-label="breadcrumb" class="float-right">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="indexEncuesta.php">Encuesta</a></li>
                                    <li class="breadcrumb-item active">Reportes</li>
                                    <li class="breadcrumb-item"><a href="logout.php">Cerrar Sesión</a></li>
                                </ol>
                            </nav>
                            <div class="card-body">
                                <div class="row centrar">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4"><h3 class="card-title"></h3></div>
                                    <div class="col-sm-4"></div>                                    
                                </div>    
                                <legend>Reporte Encuesta COVID-19</legend>
                                 <!-- fila -->
                                 <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label for="fechai1">Fecha inicial</label>
                                        <input placeholder="Seleccione una fecha" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="fechai1" name="fechai1" required/>
                                    </div>  
                                    <div class="form-group col-sm-4">
                                        <label for="fechaf1">Fecha final</label>
                                        <input placeholder="Seleccione una fecha" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="fechaf1" name="fechaf1" required/>
                                    </div>  
                                    <div class="form-group col-sm-3">
                                        <button class="btn btn-primary btn-block text-center mt-5" onclick="exporta1()">Descargar Reporte</button>                                        
                                    </div>  
                                 </div>
                                 <!-- fin fila -->                                
                                                                 
                        <!-- ### FIN PRIMERA SECCION ### -->
                        
                        
                </div>
            </div>
        </div>
    

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="js/app.js"></script>
</body>
</html>