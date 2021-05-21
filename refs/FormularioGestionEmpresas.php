<?php

require_once '../../db.php';
$valor = $_REQUEST['valor'];

?>


    <div class="container p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1>FORMULARIO GESTIÓN EMPRESAS</h1>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form id="task-form" onsubmit="enviarFormulario(event)">
                    <div class="card">
                        <div class="card-body">
                            <div style="display:none;">
                                <input type="text" name="idProspecto" id="idProspecto" value="0">
                                <input type="text" name="edit" id="edit" value="<?=$valor?>">
                            </div>
                            <!-- ### PRIMERA SECCION ### -->
                            <!-- primera fila -->
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="zonaVol">Zona Vol.</label>
                                    <select class="form-control" id="zonaVol" name="zonaVol" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="0">0</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="empresa">Empresa</label>
                                    <input type="text" onkeypress="return soloLetrasYNumeros(event)" class="form-control" id="empresa" name="empresa" placeholder="Ingrese el nombre de la empresa aquí" required >
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="nit">Nit</label>
                                    <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="nit" name="nit" placeholder="Ingrese el nit aquí" required >
                                    <small>* el nit debe ir sin dígito de chequeo</small>
                                </div>
                                <div class="form-group col-md-2">                                    
                                    <!-- <button class="btn btn-primary btn-block text-center mt-4" onclick="searchEmpresa()">Consultar</button> -->
                                    <input type="button" onclick="searchEmpresa()" class="btn btn-primary btn-block text-center mt-4" value="Consultar">
                                </div>
                            </div>
                            <!-- fin primera fila -->

                            <!-- segunda fila -->
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" onkeypress="return soloLetrasYNumeros(event)" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la direccion aquí" required >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="complementoDireccion">Complemento de Dirección</label>
                                    <input type="text" onkeypress="return soloLetrasYNumeros(event)" class="form-control" id="complementoDireccion" name="complementoDireccion" placeholder="torre, casa, apartamento, etapa, piso, oficina (opcional)">
                                </div>
                            </div>
                            <!-- fin segunda fila -->

                            <!-- tercera fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-4">
                                    <label for="pais">País</label>
                                    <select class="form-control" id="pais" name="pais" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_Paises";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_Pais'].'">'.$row['st_NombrePais'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>                                
                                <div class="form-group col-lg-4">
                                    <label for="departamento">Departamento</label>
                                    <select class="form-control" id="departamento" name="departamento" onchange="cambiarCiudad()" required>
                                        <option value="0" selected>Seleccione...</option>                                        
                                        <?php
                                            $qry = "SELECT * FROM cat_Departamentos";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_CodeDepartamento'].'">'.utf8_encode($row['st_Departamento']).'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>                                
                                <div class="form-group col-lg-4">
                                    <label for="ciudad">Ciudad</label>
                                    <select class="form-control" id="ciudad" name="ciudad" required>
                                        <option value="0" selected>Seleccione...</option>                                        
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
                            <h3>PERSONA DE CONTACTO</h3>
                            <!-- x fila -->
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="tipoDocumentoContacto">Tipo de Documento</label>
                                    <select class="form-control" id="tipoDocumentoContacto" name="tipoDocumentoContacto" required>
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
                                    <label for="documentoContacto">Documento</label>
                                    <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="documentoContacto" name="documentoContacto" placeholder="Ingrese aquí el numero de documento" required>
                                </div>
                            </div>
                            <!-- fin x fila -->

                            <!-- primera fila -->
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="nombresContacto">Nombres</label>
                                    <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="nombresContacto" name="nombresContacto" placeholder="Ingrese aquí los nombres" required >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="apellidosContacto">Apellidos</label>
                                    <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="apellidosContacto" name="apellidosContacto" placeholder="Ingrese aquí los apellidos" required>
                                </div>
                            </div>
                            <!-- fin primera fila -->

                            <!-- segunda fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-4">
                                    <label for="generoContacto">Genero</label>
                                    <select class="form-control" id="generoContacto" name="generoContacto" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_Genero";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_Genero'].'">'.$row['st_DescripcionGenero'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>                                
                                <div class="form-group col-lg-4">
                                    <label for="cargoContacto">Cargo</label>
                                    <select class="form-control" id="cargoContacto" name="cargoContacto" onchange="toggleOtroCargoContacto()" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_Cargo";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_Cargo'].'">'.$row['st_NombreCargo'].'</option>';
                                            }
                                        ?>
                                        <option value="3">otro</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-lg-4" id="otroDivContacto" style="display:none;">
                                    <label for="otroCargoContacto">Otro Cargo?</label>
                                    <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="otroCargoContacto" name="otroCargoContacto" placeholder="Indique cuál" >
                                </div>                            
                            </div>    
                            <!-- fin segunda fila --> 

                            <!-- tercera fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-3">
                                        <label for="telefonoContacto">Telefono Fijo</label>
                                        <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="telefonoContacto" name="telefonoContacto" placeholder="Ingrese aquí el telefono" >
                                </div>                                
                                <div class="form-group col-lg-2">
                                        <label for="extensionContacto">Extension</label>
                                        <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="extensionContacto" name="extensionContacto" >
                                </div>                                
                                <div class="form-group col-lg-3">
                                        <label for="celularContacto">Celular</label>
                                        <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="celularContacto" name="celularContacto" placeholder="Ingrese aquí el celular" required >
                                </div>                                
                                <div class="form-group col-lg-4">
                                        <label for="emailContacto">Email</label>
                                        <input type="email" class="form-control" id="emailContacto" name="emailContacto" placeholder="Ingrese aquí el email" required >
                                </div>                                
                            </div>    
                            <!-- fin tercera fila --> 
                        </div>
                    </div>
                    <!-- ### FIN SEGUNDA SECCION ### -->

                    <!-- ### TERCERA SECCION ### -->
                    <div class="card my-2">
                        <div class="card-body">
                            <h3>DATOS DEL REFERIDO</h3>
                            <!-- x fila -->
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="tipoDocumentoReferido">Tipo de Documento</label>
                                    <select class="form-control" id="tipoDocumentoReferido" name="tipoDocumentoReferido" required>
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
                                    <label for="documentoReferido">Documento</label>
                                    <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="documentoReferido" name="documentoReferido" placeholder="Ingrese aquí el numero de documento" required>
                                </div>
                            </div>
                            <!-- fin x fila -->

                            <!-- primera fila -->
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="nombresReferido">Nombres</label>
                                    <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="nombresReferido" name="nombresReferido" placeholder="Ingrese aquí los nombres" required >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="apellidosReferido">Apellidos</label>
                                    <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="apellidosReferido" name="apellidosReferido" placeholder="Ingrese aquí los apellidos" required>
                                </div>
                            </div>
                            <!-- fin primera fila -->                            

                            <!-- segunda fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-4">
                                    <label for="generoReferido">Genero</label>
                                    <select class="form-control" id="generoReferido" name="generoReferido" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_Genero";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_Genero'].'">'.$row['st_DescripcionGenero'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>                                
                                <div class="form-group col-lg-4">
                                    <label for="cargoReferido">Cargo</label>
                                    <select class="form-control" id="cargoReferido" name="cargoReferido" onchange="toggleOtroCargoReferido()" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_Cargo";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_Cargo'].'">'.$row['st_NombreCargo'].'</option>';
                                            }
                                        ?>
                                        <option value="3">otro</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-lg-4" id="otroDivReferido" style="display:none;">
                                    <label for="otroCargoReferido">Otro Cargo?</label>
                                    <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="otroCargoReferido" name="otroCargoReferido" placeholder="Indique cuál" >
                                </div>                            
                            </div>    
                            <!-- fin segunda fila --> 

                            <!-- tercera fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-3">
                                    <label for="telefonoReferido">Telefono Fijo</label>
                                    <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="telefonoReferido" name="telefonoReferido" placeholder="Ingrese aquí el telefono" >
                                </div>                                
                                <div class="form-group col-lg-2">
                                    <label for="extensionReferido">Extension</label>
                                    <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="extensionReferido" name="extensionReferido" >
                                </div>                                
                                <div class="form-group col-lg-3">
                                    <label for="celularReferido">Celular</label>
                                    <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="celularReferido" name="celularReferido" placeholder="Ingrese aquí el celular" required >
                                </div>                                
                                <div class="form-group col-lg-4">
                                    <label for="emailReferido">Email</label>
                                    <input type="email" class="form-control" id="emailReferido" name="emailReferido" placeholder="Ingrese aquí el email" required >
                                </div>                                
                            </div>    
                            <!-- fin tercera fila --> 
                        </div>
                    </div>
                    <!-- ### FIN TERCERA SECCION ### -->

                    <!-- ### CUARTA SECCION ### -->
                    <div class="card">
                        <div class="card-body">
                            <h3>ESTADO</h3> 
                            <!-- primera fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-6">
                                    <label for="porVisitar">Por Visitar</label>
                                    <!-- <input type="date" class="form-control" id="porVisitar" name="porVisitar" placeholder="Escoja una fecha" > -->
                                    <input placeholder="Seleccione una fecha" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="porVisitar" name="porVisitar" required/>
                                </div>                                                                
                                <div class="form-group col-lg-6">
                                    <label for="visitaEfectuada">Visita Efectuada</label>
                                    <!-- <input type="date" class="form-control" id="visitaEfectuada" name="visitaEfectuada" placeholder="Escoja una fecha" > -->
                                    <input placeholder="Seleccione una fecha" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="visitaEfectuada" name="visitaEfectuada" required/>
                                </div>                                                             
                            </div>
                            <!-- fin segunda fila -->

                            <!-- segunda fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-4">
                                    <label for="presentacionInformacion">Presenta Información</label>
                                    <select class="form-control" id="presentacionInformacion" name="presentacionInformacion" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_VolanteoExterior";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_VolanteoExterior'].'">'.$row['st_DescripcionVolanteoExterior'].'</option>';
                                            }
                                        ?>
                                    </select>   
                                </div>                                
                                <div class="form-group col-lg-4">
                                    <label for="emailCarta">Correo (Email) / Carta con Pieza Física</label>
                                    <input placeholder="Seleccione una fecha" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="emailCarta" name="emailCarta" required/>
                                </div>                                
                                <div class="form-group col-lg-4">
                                    <label for="volanteoExterior">Volanteo Exterior</label>
                                    <select class="form-control" id="volanteoExterior" name="volanteoExterior" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            $qry = "SELECT * FROM cat_VolanteoExterior";
                                            $res=mssql_query($qry);                                        
                                            while ($row = mssql_fetch_assoc($res)) {
                                                echo '<option value="'.$row['id_VolanteoExterior'].'">'.$row['st_DescripcionVolanteoExterior'].'</option>';
                                            }
                                        ?>
                                    </select>                                   
                                </div>                                                             
                            </div>
                            <!-- fin segunda fila -->
                            
                            <!-- tercera fila -->
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="observaciones1">Observaciones Seguimiento 1</label>
                                    <textarea name="observaciones1" onkeypress="return soloLetrasYNumeros(event)" id="observaciones1" cols="30" rows="5" class="form-control" placeholder="Ingrese aquí sus Observaciones"></textarea>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="seguimiento1">Seguimiento 1</label>
                                    <input placeholder="Seleccione una fecha" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="seguimiento1" name="seguimiento1"/>
                                </div>                                
                            </div>
                            <!-- fin tercera fila -->

                            <!-- cuarta fila -->
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="observaciones2">Observaciones Seguimiento 2</label>
                                    <textarea name="observaciones2" onkeypress="return soloLetrasYNumeros(event)" id="observaciones2" cols="30" rows="5" class="form-control" placeholder="Ingrese aquí sus Observaciones"></textarea>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="seguimiento2">Seguimiento 2</label>
                                    <input placeholder="Seleccione una fecha" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="seguimiento2" name="seguimiento2"/>
                                </div>                                
                            </div>
                            <!-- fin cuarta fila -->
                            <button type="submit" class="btn btn-primary btn-block text-center">Guardar Registro</button>
                        </div>
                    </div>
                    <!-- ### FIN CUARTA SECCION ### -->
                </form>
            </div>
        </div>
    </div>    
