<?php

require_once '../../db.php';

?>
    <script>
        function toggleDis(){   
            if($('#disOtro').prop("checked")){
                $('#divDisOtro').show()
            } else{
                $('#divDisOtro').hide()
            }
        }
        
        function toggleGen(){
            if($('#genOtro').prop("checked")){
                $('#divGenOtro').show()
            } else{
                $('#divGenOtro').hide()
            }
        }
    </script>


    <div class="container p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1>VINCULACIÓN AL PROYECTO</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form id="form-vinculacion" onsubmit="valVinculacion(event)">
                    
                    <!-- ### PRIMERA SECCION ### -->
                    <div class="card my-2">
                        <div class="card-body">                            
                            <!-- primera fila -->
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="tipoDoc">Tipo de Documento</label>
                                    <select class="form-control" id="tipoDoc" name="tipoDoc" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_TipoDocumento";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_TipoDocumento'].'">'.$row['st_TipoDocumentoDescripcion'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-5">
                                    <label for="documento">Documento</label>
                                    <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="documento" name="documento" placeholder="Ingrese aquí el numero de documento" required>
                                </div>
                            </div>
                            <!-- fin primera fila -->

                            <!-- segunda fila -->
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="nombres">Nombres</label>
                                    <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="nombres" name="nombres" placeholder="Ingrese aquí los nombres" required >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese aquí los apellidos" required>
                                </div>
                            </div>
                            <!-- fin segunda fila -->                 

                            <!-- tercera fila -->
                            <div class="row">                                                               
                                <div class="form-group col-lg-4">
                                    <label for="celular">Celular</label>
                                    <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="celular" name="celular" placeholder="Ingrese aquí el celular" required >
                                </div>                                
                                <div class="form-group col-lg-4">
                                    <label for="mail">Email</label>
                                    <input type="email" class="form-control" id="mail" name="mail" placeholder="Ingrese aquí el email" required >
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="rangoEdad">Rango de Edad</label>
                                    <select class="form-control" id="rangoEdad" name="rangoEdad" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php                                            
                                            $qry = "SELECT * FROM cat_RangoEdad";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {                                                
                                                echo '<option value="'.$row['id_RangoEdad'].'">'.$row['st_Descripcion'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>                                
                            <!-- fin tercera fila --> 
                        </div>
                    </div>
                    <!-- ### FIN PRIMERA SECCION ### -->

                    <!-- ### SEGUNDA SECCION ### -->
                    <div class="card my-2">
                        <div class="card-body">                            
                            <!-- primera fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-4">
                                    <label for="tipoInteres">Tipo de Interés</label>
                                    <select class="form-control" id="tipoInteres" name="tipoInteres" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_TipoInteres";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_TipoInteres'].'">'.$row['st_Descripcion'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>                                                                
                                <div class="form-group col-lg-4">
                                    <label for="poseeVehiculo">&iquest;Posee Vehículo?</label>
                                    <select class="form-control" id="poseeVehiculo" name="poseeVehiculo" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_SiNo";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_SiNo'].'">'.$row['st_Descripcion'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>                                                             
                            </div>
                            <!-- fin primera fila -->

                            <!-- segunda fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-6">
                                    <label for="barrioVive">Barrio en el que vive</label>
                                    <select class="form-control" id="barrioVive" name="barrioVive" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_Barrio";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_Barrio'].'">'.$row['st_Descripcion'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>                                                                
                                <div class="form-group col-lg-6">
                                    <label for="barrioTrabaja">Barrio en el que Trabaja</label>
                                    <select class="form-control" id="barrioTrabaja" name="barrioTrabaja" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_Barrio";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_Barrio'].'">'.$row['st_Descripcion'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>                                                             
                            </div>
                            <!-- fin segunda fila -->
                                                        
                            <!-- tercera fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-4">
                                    <label for="tieneMascota">&iquest;Tiene mascota?</label>
                                    <select class="form-control" id="tieneMascota" name="tieneMascota" onchange="toggleTipoMascota()" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_SiNo";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_SiNo'].'">'.$row['st_Descripcion'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>                                                                
                                <div class="form-group col-lg-4" id="divTipoMascota" style="display:none;">
                                    <label for="tipoMascota">&iquest;Qué tipo de mascota?</label>
                                    <select class="form-control" id="tipoMascota" name="tipoMascota" onchange="toggleOtroTipoMascota()">
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_Mascota";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_Mascota'].'">'.$row['st_Descripcion'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4" id="divOtraMascota" style="display:none;">
                                    <label for="otraMascota">&iquest;Cuál?</label>
                                    <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="otraMascota" name="otraMascota" placeholder="Indique cual">
                                </div>                            
                            </div>
                            <!-- fin tercera fila -->

                            <!-- quarta fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-6">
                                    <label for="ocupacion">Ocupación</label>
                                    <select class="form-control" id="ocupacion" name="ocupacion" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_Ocupacion";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_Ocupacion'].'">'.$row['st_Descripcion'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>                                                                
                                <div class="form-group col-lg-6">
                                    <label for="haceCuanto">&iquest;Hace cuánto está buscando apartamento?</label>
                                    <select class="form-control" id="haceCuanto" name="haceCuanto" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_HaceCuantoBusca";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_HaceCuantoBusca'].'">'.utf8_encode($row['st_Descripcion']).'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>                                                             
                            </div>
                            <!-- fin quarta fila -->

                            <!-- quinta fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-6">
                                    <label for="tiempoProyeccion">Tiempo de proyección de compra</label>
                                    <select class="form-control" id="tiempoProyeccion" name="tiempoProyeccion" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_ProyeccionCompra";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_ProyeccionCompra'].'">'.utf8_encode($row['st_Descripcion']).'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>                                                                
                                <div class="form-group col-lg-6">
                                    <label for="presupuestoInversion">Presupuesto de Inversión</label>
                                    <select class="form-control" id="presupuestoInversion" name="presupuestoInversion" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_PresupuestoInversion";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_PresupuestoInversion'].'">'.$row['st_Descripcion'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>                                                             
                            </div>
                            <!-- fin quinta fila -->
                        </div>
                    </div>
                    <!-- ### FIN SEGUNDA SECCION ### -->

                    <!-- ### TERCERA SECCION ### -->
                    <div class="card">
                        <div class="card-body"> 
                            <h3>LO QUE MÁS LE GUSTÓ DEL PROYECTO</h3>                                 
                            <h5 class="mt-3">Diseño</h5>
                            <!-- primera fila -->
                            <div class="row">
                                <!-- primera col -->
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input name="diseno" value="Distribucion" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Distribución
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="diseno" value="Zona de Ropas" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Zona de Ropas
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="diseno" value="Parqueadero" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Parqueadero
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="disOtro" value="Otro" class="form-check-input" type="checkbox" id="disOtro" onchange="toggleDis()">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Otro
                                        </label>
                                    </div>
                                </div>
                                <!-- fin primera col -->

                                <!-- segunda col -->
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input name="diseno" value="Amplitud" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Amplitud
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="diseno" value="Cocina" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Cocina
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="diseno" value="Oficinas" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Oficinas
                                        </label>
                                    </div>                                    
                                </div>
                                <!-- fin segunda col -->

                                <!-- tercera col -->
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input name="diseno" value="Espacios" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Espacios
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="diseno" value="Diseno" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Diseño
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="diseno" value="Iluminacion" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Iluminación
                                        </label>
                                    </div>                                    
                                </div>
                                <!-- fin tercera col -->
                            </div>
                            <div id="divDisOtro" class="form-group col-lg-6" style="display:none;">
                                <label for="disenoOtro">&iquest;Cuál?</label>
                                <input type="text" onkeypress="return soloLetrasYNumeros(event)" class="form-control" id="disenoOtro" name="disenoOtro" placeholder="Ingrese cual otro">
                            </div>
                            <!-- fin primera fila -->

                            <h5 class="mt-3">General</h5>
                            <!-- segunda fila -->
                            <div class="row">
                                <!-- primera columna -->
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input name="general" value="Ubicacion" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Ubicación
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="general" value="Proyecto" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Proyecto
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="general" value="Variedad Areas De Aptos" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Variedad Areas De Aptos
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="general" value="Vistas" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Vistas
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="general" value="Buena Atencion" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Buena Atención
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="general" value="Estrato" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Estrato
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="general" value="Fachada" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Fachada
                                        </label>
                                    </div>
                                </div>
                                <!-- fin primera columna -->

                                <!-- segunda columna -->
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input name="general" value="Sector Del Proyecto" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Sector Del Proyecto
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="general" value="Zonas Sociales" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Zonas Sociales
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="general" value="Variedad De Acabados" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Variedad De Acabados
                                        </label>
                                    </div>                                    
                                    <div class="form-check">
                                        <input name="general" value="Respaldo Constructora" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Respaldo Constructora
                                        </label>
                                    </div>                                    
                                    <div class="form-check">
                                        <input name="general" value="Gusta Altura" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Gusta Altura
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="general" value="Fecha De Entrega" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Fecha De Entrega
                                        </label>
                                    </div>                                    
                                    <div class="form-check">
                                        <input name="genOtro" value="Otro" class="form-check-input" type="checkbox" id="genOtro" onchange="toggleGen()">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Otro
                                        </label>
                                    </div>                                    
                                </div>
                                <!-- fin segunda columna -->

                                <!-- tercera columna -->
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input name="general" value="Tiempo Pago Cuota Inicial" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Tiempo Pago Cuota Inicial
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="general" value="Decoracion" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Decoración
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="general" value="Acabados" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Acabados
                                        </label>
                                    </div>                                    
                                    <div class="form-check">
                                        <input name="general" value="Alcobas" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Alcobas
                                        </label>
                                    </div>                                    
                                    <div class="form-check">
                                        <input name="general" value="Completo" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Completo
                                        </label>
                                    </div>                                    
                                    <div class="form-check">
                                        <input name="general" value="Tipo De Construccion" class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Tipo De Construcción
                                        </label>
                                    </div>                                    
                                </div>
                                <!-- fin tercera columna -->
                            </div>
                            <div id="divGenOtro"class="form-group col-lg-6" style="display:none;">
                                <label for="generalOtro">&iquest;Cuál?</label>
                                <input type="text" onkeypress="return soloLetrasYNumeros(event)" class="form-control" id="generalOtro" name="generalOtro" placeholder="Ingrese cual otro">
                            </div>
                            <!-- fin segunda fila -->

                            <!-- tercera fila -->
                            <div class="row mt-5">
                                <div class="form-group col-lg-12">
                                    <label for="observaciones1">Observaciones</label>
                                    <textarea name="observaciones1" onkeypress="return soloLetrasYNumeros(event)" id="observaciones" cols="30" rows="5" class="form-control" placeholder="Ingrese aquí sus Observaciones"></textarea>
                                </div>                                
                            </div>
                            <!-- fin tercera fila -->
                            
                            <button type="submit" class="btn btn-primary btn-block text-center">Guardar Registro</button>
                        </div>
                    </div>
                    <!-- ### FIN TERCERA SECCION ### -->
                </form>
            </div>
        </div>
    </div>    
