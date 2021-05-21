<?php

    require_once 'db.php';
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
    <title>Evaluacion Servicio</title>
</head>
<body>
    <form id="mainForm2" onsubmit="registraEncuesta2(event)">
        <div class="container p-4">
            <div class="row"></div>
            <div class="row">
                <div class="col-sm-12">
                    <!-- <form action="" id="form_ins"> -->
                         <!-- ### PRIMERA SECCION ### -->
                        <div class="card my-2">
                            <!-- <img src="images/image1.png" alt="cabezote" class="card-img-top"> -->
                            <div class="row card-img-top">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <img src="images/image3.png" alt="taller_camino_del_viajero" class="logo-taller">
                                </div>
                                <div class="col-sm-2"></div>                                
                            </div>
                            <div class="card-body">
                                <div class="row centrar">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4"><h1 class="card-title">EVALUACIÓN DEL SERVICIO</h1></div>
                                    <div class="col-sm-4"></div>                                    
                                </div>    

                                 <!-- quarta fila -->
                                <div class="row justifica">                                                               
                                    <div class="form-group col-sm-12">
                                        <p>Para la Corporación Satsangui son muy importantes sus opiniones, por favor diligencie la siguiente encuesta, la cual tiene como propósito, enriquecer la calidad de nuestro </p>
                                    </div>                                
                                </div>                                
                                <!-- fin quarta fila -->         

                                <!-- segunda fila -->
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="nombreYCargo">Nombre del participante y cargo: </label>
                                        <input type="text" onkeypress="return soloLetrasYNumeros(event)" class="form-control" id="nombreYCargo" name="nombreYCargo" placeholder="" required >
                                    </div>                                
                                </div>
                                <!-- fin segunda fila -->                     
                                <!-- segunda fila -->
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="nombreEmpresa">Nombre  de la empresa donde trabaja:	</label>
                                        <input type="text" onkeypress="return soloLetrasYNumeros(event)" class="form-control" id="nombreEmpresa" name="nombreEmpresa" placeholder="" required >
                                    </div>                                
                                </div>
                                <!-- fin segunda fila -->                     
                                <!-- segunda fila -->
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="mail">Correo electronico:	</label>
                                        <input type="email" class="form-control" id="mail" name="mail" placeholder="" required >
                                    </div>                                
                                </div>
                                <!-- fin segunda fila -->    

                                <!-- segunda fila -->
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="telefono">Teléfono celular:	</label>
                                        <input type="text" onkeypress="return soloLetrasYNumeros(event)" class="form-control" id="telefono" name="telefono" placeholder="" required >
                                    </div>                                
                                </div>
                                <!-- fin segunda fila -->    

                                <!-- segunda fila -->
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="taller">Nombre del taller o proceso al que asistió:	</label>
                                        <input type="text" onkeypress="return soloLetrasYNumeros(event)" class="form-control" id="taller" name="taller" placeholder="" required >
                                    </div>                                
                                </div>
                                <!-- fin segunda fila -->                  

                                <!-- segunda fila -->
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="nombreFacilitador">Nombre del facilitador:	</label>
                                        <input type="text" onkeypress="return soloLetrasYNumeros(event)" class="form-control" id="nombreFacilitador" name="nombreFacilitador" placeholder="" required >
                                    </div>                                
                                </div>
                                <!-- fin segunda fila -->                  
                                
                                <!-- tercera fila -->
                                <div class="row mt-5">                                
                                    <div class="form-group col-sm-4">
                                        <label for="fechaEntrevista">Fecha</label>
                                        <input placeholder="Seleccione una fecha" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="fechaEntrevista" name="fechaEntrevista" required/>
                                    </div>                                                          
                                    <div class="form-group col-sm-4">
                                        <label for="departamento">Departamento</label>
                                        <select class="form-control" id="departamento" name="departamento" onchange="cambiarCiudad('#departamento option:selected', '#ciudad')" required>
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <?php
                                                $qry = "SELECT * FROM cat_Departamentos";
                                                $res=mssql_query($qry);                                        
                                                while ($row = mssql_fetch_assoc($res)) {
                                                    echo '<option value="'.$row['id_CodeDepartamento'].'">'. utf8_encode($row['st_NombreDepartamento']).'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>                                
                                    <div class="form-group col-sm-4">
                                        <label for="ciudad">Ciudad</label>
                                        <select class="form-control" id="ciudad" name="ciudad" required>
                                            <option value="0" selected>Seleccione...</option>                                        
                                        </select>
                                    </div>                                
                                </div>    
                                <!-- fin tercera fila -->   

                                 <!-- quarta fila -->
                                 <div class="row justifica">                                                               
                                    <div class="form-group col-sm-12">
                                        <p>Elija la calificación que considere adecuada, de acuerdo a la percepción que obtuvo durante el taller o proceso.		</p>
                                    </div>                                
                                </div>                                
                                <!-- fin quarta fila --> 

                                <div class="row centrar">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4"><h5 class="card-title">TALLER</h5></div>
                                    <div class="col-sm-4"></div>                                    
                                </div>    
                                
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta1">1. Claridad en la explicación del objetivo del taller</label>
                                        <select class="form-control" id="pregunta1" name="pregunta1">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->   
                                
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta2">2. Claridad en la  Introducción a los temas del taller  </label>
                                        <select class="form-control" id="pregunta2" name="pregunta2">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->    
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta3">3. Metodología utilizada en las charlas</label>
                                        <select class="form-control" id="pregunta3" name="pregunta3">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->    
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta4">4. Metodología utilizada en los ejercicio y dinámicas </label>
                                        <select class="form-control" id="pregunta4" name="pregunta4">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->    
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta5">5. Lenguaje utilizado para la explicación de los temas </label>
                                        <select class="form-control" id="pregunta5" name="pregunta5">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->    
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta6">6. Aplicabilidad del taller a la vida personal, familiar y laboral </label>
                                        <select class="form-control" id="pregunta6" name="pregunta6">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->    
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta7">7. Distribución del tiempo entre charlas, descansos y comidas (Refrigerios, almuerzo) </label>
                                        <select class="form-control" id="pregunta7" name="pregunta7">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->    
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta8">8. Puntualidad para iniciar y cerrar el taller</label>
                                        <select class="form-control" id="pregunta8" name="pregunta8">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->    
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta9">9. Calidad del material de apoyo utilizado en el taller</label>
                                        <select class="form-control" id="pregunta9" name="pregunta9">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->    
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta10">10. Calidad del material entregado a los participantes</label>
                                        <select class="form-control" id="pregunta10" name="pregunta10">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->   

                                 <div class="row centrar mt-5">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4"><h5 class="card-title">FACILITADOR</h5></div>
                                    <div class="col-sm-4"></div>                                    
                                </div>  

                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta11">11. Dominio de los temas </label>
                                        <select class="form-control" id="pregunta11" name="pregunta11">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->   
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta12">12. Creatividad en la explicación de los temas </label>
                                        <select class="form-control" id="pregunta12" name="pregunta12">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->   
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta13">13. Claridad para comunicar </label>
                                        <select class="form-control" id="pregunta13" name="pregunta13">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->   
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta14">14. Escucha hacia el grupo  </label>
                                        <select class="form-control" id="pregunta14" name="pregunta14">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->   
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta15">15. Motivación al grupo  </label>
                                        <select class="form-control" id="pregunta15" name="pregunta15">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->   
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta16">16. Atención y apoyo brindado al grupo cuando lo solicitó  </label>
                                        <select class="form-control" id="pregunta16" name="pregunta16">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->   
                                <!-- fila t -->
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta17">17. Tiempo utilizado por el facilitador para exponer los temas  </label>
                                        <select class="form-control" id="pregunta17" name="pregunta17">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->   

                                <div class="row centrar mt-5">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4"><h5 class="card-title">GRUPO DE APOYO</h5></div>
                                    <div class="col-sm-4"></div>                                    
                                </div>  

                                 <!-- fila t -->
                                 <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta18">18. Atención y apoyo brindado a los participantes   </label>
                                        <select class="form-control" id="pregunta18" name="pregunta18">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->  
                                 <!-- fila t -->
                                 <div class="row">
                                    <div class="col-sm-8">
                                        <label for="pregunta19">19. Calidad de la logística del Taller </label>
                                        <select class="form-control" id="pregunta19" name="pregunta19">
                                            <option value="0" selected>Seleccione...</option>                                        
                                            <option value="Excelente">Excelente</option>
                                            <option value="Bueno">Bueno</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Malo">Malo</option>
                                            <option value="No_Aplica">No Aplica</option>
                                        </select>     
                                    </div>                                    
                                </div>
                                <!-- fin fila t -->  

                                 <!-- quarta fila -->
                                 <div class="row justifica pt-3">                                                               
                                    <div class="form-group col-sm-12">
                                        <p>Si su calificacion en cualquier item fue de menor o igual a Regular, por favor especifique el motivo de esta calificacion, sus sugerencias y comentarios nos ayudan a mejorar.</p>
                                    </div>                                
                                </div>                                
                                <!-- fin quarta fila -->  

                                <!-- fila c -->
                                <div class="row mt-3">
                                    <div class="form-group col-sm-12">
                                        <label for="observaciones"><p>Observaciones:</p></label>
                                        <textarea required name="observaciones" onkeypress="return soloLetrasYNumeros(event)" id="observaciones" cols="30" rows="5" class="form-control" placeholder=""></textarea>
                                    </div>                                
                                </div>
                                <!-- fin fila c -->

                                 <!-- quarta fila -->
                                 <div class="row justifica">                                                               
                                    <div class="form-group col-sm-12">
                                        <p><strong>¡Gracias por su colaboración!</strong></p>
                                    </div>                                
                                </div>                                
                                <!-- fin quarta fila -->  

                                <!-- boton -->
                                <button type="submit" class="btn btn-primary btn-block text-center mt-5">Guardar Registro</button>
                                                                                                                                                            
                            </div>
                        </div>
                        <!-- ### FIN PRIMERA SECCION ### -->
                        
                        
                </div>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="js/app.js"></script>
</body>
</html>