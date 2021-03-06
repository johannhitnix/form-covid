<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once '../db.php';
    require_once 'valida.php';
    date_default_timezone_set('America/Bogota');

?>
<style>
    .banner-img{
        height: 250px;
    }
    tr td{
        text-align: center;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/main.css">
    <title>proyectame</title>
</head>
<body onload="killerSession()">
    <form id="mainForm" onsubmit="registraEncuesta1(event)">
        <div class="container p-4">
            <div class="row"></div>
            <div class="row">
                <div class="col-sm-12">
                    <!-- <form action="" id="form_ins"> -->
                         <!-- ### PRIMERA SECCION ### -->
                        <div class="card my-2" id="primera_seccion" style="display: block;">
                            <!-- <img src="images/image1.png" alt="cabezote" class="card-img-top"> -->
                            <div class="row card-img-top" style="justify-content:center;">
                                    <div class="col-sm-12">
                                        <img src="images/Banner.jpg" alt="banner_encuesta" style="width: 100%;">                                
                                    </div>
                                    <!-- <img src="images/tecnoquimicas.jpg" alt="satsangui_ser_personal"> -->
                                <!-- <div class="col-sm-4"></div> -->
                            </div>
                            <nav aria-label="breadcrumb" class="float-right">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Encuesta</li>
                                <li class="breadcrumb-item"><a href="reportes.php">Reportes</a></li>
                                <li class="breadcrumb-item"><a href="logout.php">Cerrar Sesi??n</a></li>
                                </ol>
                            </nav>
                            <div class="card-body">
                                <div class="row centrar">
                                    <div class="col-sm-4"></div>
                                    <!-- <div class="col-sm-4"><h1 class="card-title">Entrevista</h1></div> -->
                                    <div class="col-sm-4"></div>                                    
                                </div>                                
                                
                                <h3 class="card-title mt-3">Informaci??n General</h3>
                                <!-- segunda fila -->
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="nombre">Nombres y Apellidos completos del paciente:</label>
                                        <input type="text" style="text-transform: capitalize;" onkeypress="return soloLetrasYNumeros(event)" onblur="setCode()" class="form-control" id="nombre" name="nombre" placeholder="Ingrese aqu?? nombre completo" required >
                                    </div>                                
                                </div>
                                <!-- fin segunda fila --> 

                                <!-- segunda fila -->
                                <div class="row">                                                                        
                                    <div class="form-group col-sm-4">
                                        <label for="codigo_paciente">C??digo del paciente</label>
                                        <input type="text" class="form-control" id="codigo_paciente" name="codigo_paciente" readonly>
                                    </div>                                
                                    <div class="form-group col-sm-4">
                                        <label for="fecha_consulta">Fecha de la consulta</label>                                        
                                        <input placeholder="Seleccione una fecha" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="fecha_consulta" name="fecha_consulta" required/>
                                    </div>          
                                    <div class="form-group col-sm-4">
                                        <label for="edad">Edad</label>
                                        <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="edad" name="edad" placeholder="a??os cumplidos" required >
                                    </div>                                                                                                                              
                                </div>                                
                                <!-- fin segunda fila -->

                                <!-- filaB -->
                                <div class="row">                                                                        
                                    <div class="form-group col-sm-4">
                                        <label for="peso">Peso</label>
                                        <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="peso" name="peso" placeholder="en Kg" required >
                                    </div>                                
                                    <div class="form-group col-sm-4">
                                        <label for="talla">Talla</label>
                                        <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="talla" name="talla" placeholder="en cm" required >
                                    </div>                                                                                                                              
                                    <div class="form-group col-sm-4">
                                        <label for="fecha_diagnostico">Fecha de diagn??stico COVID 19</label>                                        
                                        <input placeholder="Seleccione una fecha" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="fecha_diagnostico" name="fecha_diagnostico" required/>
                                    </div>          
                                </div>                                
                                <!-- fin filaB -->
                                
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="tipo_tratamiento">Tipo de tratamiento</label>
                                        <select class="form-control" id="tipo_tratamiento" name="tipo_tratamiento">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Hospitalizaci??n en unidad de cuidados intensivos">Hospitalizaci??n en unidad de cuidados intensivos</option>
                                            <option value="Hospitalizaci??n en unidad de cuidados intermedios">Hospitalizaci??n en unidad de cuidados intermedios</option>
                                            <option value="Hospitalizaci??n en piso">Hospitalizaci??n en piso</option>
                                            <option value="Hospitalizaci??n domiciliaria">Hospitalizaci??n domiciliaria</option>
                                            <option value="Manejo ambulatorio">Manejo ambulatorio</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->   

                                <!-- fila s -->
                                <div class="row mt-5">
                                    <!-- primera col -->
                                    <div class="col-md-12">
                                        <p class="h5">Posterior al diagn??stico de COVID 19, ??cu??les de los siguientes s??ntomas han persistido o aparecido?</p>
                                        <!-- primeras cuatro -->
                                        <div class="form-check">
                                            <input name="post-covid" value="Cambios en el estado de ??nimo (tristeza, irritabilidad, llanto f??cil)" class="form-check-input check-depresion-A" type="checkbox" id="defaultCheck1" onchange="toggleKinta()">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Cambios en el estado de ??nimo (tristeza, irritabilidad, llanto f??cil)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="post-covid" value="Ansiedad" class="form-check-input check-depresion-B" type="checkbox" id="defaultCheck1" onchange="toggleKinta()">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Ansiedad
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="post-covid" value="Fatiga" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Fatiga
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="post-covid" value="Alteraci??n del sue??o: dificultad para conciliar el sue??o o despertarse frecuentemente durante la noche." class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                            Alteraci??n del sue??o: dificultad para conciliar el sue??o o despertarse frecuentemente durante la noche.
                                            </label>
                                        </div>
                                        
                                        <!-- segundo grupo de cuatro -->
                                        <div class="form-check">
                                            <input name="post-covid" value="Sensaci??n de dificultad para respirar" class="form-check-input check-disnea-A" type="checkbox" id="defaultCheck1" onchange="toggleQuarta(this)">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Sensaci??n de dificultad para respirar
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="post-covid" value="Tos" class="form-check-input check-disnea-B" type="checkbox" id="defaultCheck1" onchange="toggleQuarta(this)">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Tos
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="post-covid" value="Diarrea" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Diarrea
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="post-covid" value="Dolor en el pecho" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Dolor en el pecho
                                            </label>
                                        </div>
                                        
                                        <!-- tercer grupo de cuatro -->
                                        <div class="form-check">
                                            <input name="post-covid" value="Dolor de cabeza" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Dolor de cabeza
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="post-covid" value="Dolor en articulaciones o m??sculos" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Dolor en articulaciones o m??sculos
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="post-covid" value="P??rdida del olfato" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                P??rdida del olfato
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="post-covid" value="P??rdida en percepci??n de los sabores" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                            P??rdida en percepci??n de los sabores
                                            </label>
                                        </div>
                                        
                                        <!-- cuarto grupo de cuatro -->
                                        <div class="form-check">
                                            <input name="post-covid" value="Expectoraci??n" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Expectoraci??n
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="post-covid" value="Sudoraci??n" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Sudoraci??n
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="post-covid" value="Mareo" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Mareo
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="post-covid" value="Escalofr??os" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Escalofr??os
                                            </label>
                                        </div>
                                        
                                        <!-- ultimo grupo -->                                        
                                        <div class="form-check">
                                            <input name="post-covid" value="P??rdida de la audici??n" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                P??rdida de la audici??n
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="post-covid" value="N??useas o v??mitos" class="form-check-input" type="checkbox" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                N??useas o v??mitos
                                            </label>
                                        </div>                                        
                                        
                                        <!-- otros jeje -->
                                        <div class="form-check">
                                            <input name="otros" value="Otros" class="form-check-input" type="checkbox" id="otros" onchange="toggleDis()">
                                            <label class="form-check-label" for="otros">
                                                Otros
                                            </label>
                                        </div>
                                    </div>
                                    <!-- fin primera col -->
                                    <div id="divDisOtro" class="form-group col-lg-6" style="display:none;">                                        
                                        <input type="text" onkeypress="return soloLetrasYNumeros(event)" class="form-control" id="otros-post-covid" name="otros-post-covid" placeholder="&iquest;Cu??les?">
                                    </div>
                                </div>
                                <!-- fila s -->

                                <!-- fila u -->
                                <div class="row mt-3">
                                    <div class="col-sm-8">
                                        <label for="persistencia_sintomas">??Cu??nto tiempo despu??s de la infecci??n por Covid-19 han persistido los s??ntomas?</label>
                                        <select class="form-control" id="persistencia_sintomas" name="persistencia_sintomas">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Hasta 4 semanas despu??s">Hasta 4 semanas despu??s</option>
                                            <option value="De 4 a 12 semanas despu??s">De 4 a 12 semanas despu??s</option>
                                            <option value="M??s de 12 semanas despu??s">M??s de 12 semanas despu??s</option>                                            
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila u -->   
                            </div>
                        </div>
                        <!-- ### FIN PRIMERA SECCION ### -->    
                        <div class="mt-5 mb-5">
                            <p>Vamos a iniciar con el cuestionario llamado: EQ5D-3L. Este eval??a 5 aspectos, y en cada uno de ellos le pido que por favor me indique la respuesta que mejor describe su estado de salud en el d??a de hoy.</p>
                        </div>
                        <!-- ### SEGUNDA SECCION ### -->    
                        <div class="card mb-5" id="segunda_seccion" style="display: block;">
                            <div class="card-body">
                                <!-- fila u -->
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="movilidad" class="h5">1.	En cuanto a la movilidad</label>
                                        <select class="form-control" id="movilidad" name="movilidad">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="No tengo problemas para caminar">No tengo problemas para caminar</option>
                                            <option value="Tengo algunos problemas para caminar">Tengo algunos problemas para caminar</option>
                                            <option value="Tengo que estar en cama">Tengo que estar en cama</option>                                            
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila u -->   
                            </div>
                        </div>
                        <!-- ### FIN SEGUNDA SECCION ### -->    

                        <!-- ### TERCERA SECCION ### -->    
                        <div class="card mb-5" id="tercera_seccion" style="display: block;">
                            <div class="card-body">
                                <h3 class="card-title mt-3">Preguntas generales</h3>
                                <!-- <table class="table table-borderless"> -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="h6">Con estos s??ntomas post Covid-19:</th>
                                            <th scope="col">Ninguna dificultad</th>
                                            <th scope="col">Un poco de dificultad</th>
                                            <th scope="col">Algo de dificultad</th>
                                            <th scope="col">Mucha dificultad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1. ??ha presentado dificultad para realizar actividades b??sicas en el hogar?</th>
                                            <td>
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2. ??ha presentado dificultad para alimentarse?</th>
                                            <td>
                                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2">
                                            </td>
                                        </tr>                                        
                                        <tr>
                                        <th scope="row">3. ??ha tenido dificultad para realizar las actividades diarias de higiene personal?</th>
                                            <td>
                                                <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault3">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault3">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault3">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault3">
                                            </td>
                                        </tr>                                        
                                    </tbody>
                                </table>                                                                    
                            </div>
                        </div>
                        <!-- ### FIN TERCERA SECCION ### -->    

                        <!-- ### QUARTA SECCION ### -->    
                        <div class="card mb-5" id="quarta_seccion" style="display: none;">
                            <div class="card-body">
                                <h3 class="card-title mt-3">Sistema respiratorio: Disnea</h3>

                                <p class="h5">De acuerdo con la intensidad del s??ntoma en la ultima semana, responda las siguientes 9 preguntas:</p>

                                <!-- filaB -->
                                <div class="row mt-4 ml-3">                                     
                                    <div class="col-sm-9">
                                        <label for="disnea1">1. En una escala de 0 a 100, entendiendo 0 como el estado sin ninguna sintomatolog??a y 100 el peor estado imaginable, cuanto calificar??a a la dificultad respiratoria</label>                                        
                                    </div>                                                                      
                                    <div class="form-group col-sm-1">
                                        <input type="number" id="disnea1" name="disnea1" min="0" max="100">
                                    </div>                                                                    
                                </div>                                
                                <!-- fin filaB -->

                                <!-- <table class="table table-borderless"> -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="h6">La sensaci??n de dificultad para respirar: </th>
                                            <th scope="col">Ninguna dificultad</th>
                                            <th scope="col">Un poco de dificultad</th>
                                            <th scope="col">Algo de dificultad</th>
                                            <th scope="col">Mucha dificultad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">2. ??le ha ocasionado inconvenientes para ba??arse o vestirse por s?? mismo?</th>
                                            <td>
                                                <input class="form-check-input" type="radio" name="disnea2" id="disnea2">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="disnea2" id="disnea2">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="disnea2" id="disnea2">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="disnea2" id="disnea2">
                                            </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3. ??ha ocasionado inconvenientes para alzar objetos de peso moderado como bolsas con comida?</th>
                                            <td>
                                                <input class="form-check-input" type="radio" name="disnea3" id="disnea3">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="disnea3" id="disnea3">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="disnea3" id="disnea3">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="disnea3" id="disnea3">
                                            </td>
                                        </tr>                                        
                                        <tr>
                                        <th scope="row">4. La sensaci??n de dificultad para respirar ??ha ocasionado inconvenientes para desplazarse cargando objetos moderadamente pesados como bolsas con comida? </th>
                                            <td>
                                                <input class="form-check-input" type="radio" name="disnea4" id="disnea4">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="disnea4" id="disnea4">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="disnea4" id="disnea4">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="disnea4" id="disnea4">
                                            </td>
                                        </tr>                                        
                                    </tbody>
                                </table>                                                                    
                            </div>
                        </div>
                        <!-- ### FIN QUARTA SECCION ### -->    

                        <!-- ### KINTA SECCION ### -->       
                        <div class="card mb-5" id="kinta_seccion" style="display: none;">
                            <div class="card-body">
                                <h3 class="card-title mt-3">Salud mental: Depresi??n</h3>

                                <p class="h5">En caso de haber presentado alguna dificultad en la ??ltima semana, por cambios de ??nimo (tristeza, irritabilidad, llanto f??cil) conteste las siguientes 10 preguntas</p>

                                <!-- filaB -->
                                <div class="row mt-4 ml-3">                                     
                                    <div class="col-sm-9">
                                        <label for="depresion1">1. En una escala de 0 a 100, entendiendo 0 como el estado sin ninguna sintomatolog??a y 100 el peor estado imaginable, cuanto calificar??a a los cambios de animo</label>                                        
                                    </div>                                                                      
                                    <div class="form-group col-sm-1">
                                        <input type="number" id="depresion1" name="depresion1" min="0" max="100">
                                    </div>                                                                    
                                </div>                                
                                <!-- fin filaB -->

                                <!-- <table class="table table-borderless"> -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="h6">Los cambios de ??nimo: </th>
                                            <th scope="col">Ninguna dificultad</th>
                                            <th scope="col">Un poco de dificultad</th>
                                            <th scope="col">Algo de dificultad</th>
                                            <th scope="col">Mucha dificultad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">2. ??se han acompa??ado de ideas negativas sobre el futuro que conllevan a alguna dificultad en su vida cotidiana?</th>
                                            <td>
                                                <input class="form-check-input" type="radio" name="depresion2" id="depresion2">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="depresion2" id="depresion2">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="depresion2" id="depresion2">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="depresion2" id="depresion2">
                                            </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3. ??se han acompa??ado de alguna autopercepci??n de inutilidad y minusval??a que conlleva a alguna dificultad en su vida cotidiana?</th>
                                            <td>
                                                <input class="form-check-input" type="radio" name="depresion3" id="depresion3">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="depresion3" id="depresion3">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="depresion3" id="depresion3">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="depresion3" id="depresion3">
                                            </td>
                                        </tr>                                        
                                        <tr>
                                        <th scope="row">4. Los cambios de ??nimo ??se han acompa??ado de p??rdida de inter??s o por las cosas que previamente disfrutaba que conlleva a alguna dificultad en su vida cotidiana?</th>
                                            <td>
                                                <input class="form-check-input" type="radio" name="depresion4" id="depresion4">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="depresion4" id="depresion4">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="depresion4" id="depresion4">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="depresion4" id="depresion4">
                                            </td>
                                        </tr>                                        
                                    </tbody>
                                </table>                                                                    
                            </div>
                        </div>
                        <!-- ### FIN KINTA SECCION ### -->                            
                        

                        <!-- ### SECCION FINAL ### -->
                        <div class="card" id="seccion_final" style="display: block;">
                            <div class="card-body"> 

                                <!-- tercera fila -->
                                <div class="row mt-5">
                                    <div class="form-group col-sm-12">
                                        <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis quae delectus culpa fugit reprehenderit fuga? Rem, ad vitae aut, ea expedita debitis modi ipsam assumenda sit temporibus magni ab nesciunt."</p>
                                    </div>                                
                                </div>
                                <!-- fin tercera fila -->
                                
                                <button type="submit" class="btn btn-primary btn-block text-center">Guardar Registro</button>
                            </div>
                        </div>
                        <!-- ### FIN SECCION FINAL ### -->                    
                        
    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="js/app.js"></script>
</body>
</html>