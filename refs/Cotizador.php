<?php
require_once '../../db.php';
session_start();

date_default_timezone_set('America/Bogota');
?>
    <script>
        function toggleP(){   
            if($('#checkP').prop("checked")){
                $('#divP').show()
            } else{
                $('#divP').hide()
            }
        }
        function toggleMB(){   
            if($('#checkMB').prop("checked")){
                $('#divMB').show()
            } else{
                $('#divMB').hide()
            }
        }
        function toggleD(){   
            if($('#checkD').prop("checked")){
                $('#divD').show()
            } else{
                $('#divD').hide()
            }
        }
        
        

        function calculaTotal(){
            let valorInmueble = parseInt(decodeMonetario($('#valorInmueble').val()))
            
            let otrosParqueadero = parseInt(decodeMonetario($('#valParqueadero').val()))
            let otrosMiniBodega = parseInt(decodeMonetario($('#valMiniBodega').val()))
            let otrosDeposito = parseInt(decodeMonetario($('#valDeposito').val()))

            let descuentos = parseInt(decodeMonetario($('#descuentos').val()))    
            
            
            let areaApto = parseFloat($('#areaTotalCons').val())

            // let porcentajeCI = parseInt($('#porcentajeCI').val())

            isNaN(valorInmueble)?valorInmueble=0:valorInmueble

            isNaN(otrosParqueadero)?otrosParqueadero=0:otrosParqueadero
            isNaN(otrosMiniBodega)?otrosMiniBodega=0:otrosMiniBodega
            isNaN(otrosDeposito)?otrosDeposito=0:otrosDeposito

            isNaN(descuentos)?descuentos=0:descuentos

            let valorTotal = valorInmueble + otrosParqueadero + otrosMiniBodega + otrosDeposito - descuentos
            valorTotalM = encodeMonetario(valorTotal)
            $('#valorTotal').val(valorTotalM)
                
            let valorm2 = valorTotal/areaApto
            isNaN(valorm2)?$('#valorm2').val('Falta el area del apartamento!'):$('#valorm2').val(encodeMonetario(parseFloat(valorm2).toFixed(0)))
             
            // if (!isNaN($('#porcentajeCI').val())) {
            //     calculaPorcentaje()
            // }            
        }

        function calculaPorcentaje(){
            let element = $(this)[0].Numer    
            console.log(element);
            
        }

        function calculaPorcentajeII(){
            let porcentajeCI = $('#porcentajeCI').val()
            let valorTotal = $('#valorTotal').val()
            let valorCI = (valorTotal * porcentajeCI) / 100

            $('#valorCI').val(valorCI)
            
            let porcentajeFin = 100 - porcentajeCI
            $('#porcentajeFin').val(porcentajeFin)

            let valorFin = valorTotal - valorCI
            $('#valorFin').val(valorFin)
        }

        function calculoSaldoCI(){
            let valorCI = $('#valorCI').val()
            let separacion = $('#separacion').val()
            let saldoCI = valorCI - separacion

            $('#saldoCI').val(saldoCI.toFixed(2))    
        }

        function calculoCuotas(){
            let saldoCI = $('#saldoCI').val()
            let numCuotas = $('#numCuotas').val()
            let valorCuotas = saldoCI / numCuotas

            numCuotas!=0?$('#valorCuotas').val(valorCuotas.toFixed(2)):$('#valorCuotas').val(0)
        }
    </script>


    <div class="container p-4">
        <div class="row">            
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form id="form-cotizador" onsubmit="valCotizacion(event)">
                    
                    <!-- ### PRIMERA SECCION ### -->
                    <div class="card my-2">
                        <img src="images/cotizador/NEOLIVING.jpg" alt="cabezote cotizador" class="card-img-top">
                        <div class="card-body">
                            <h1 class="card-title">Cotizador</h1>
                            
                            <!-- segunda fila -->
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <h5>Cotización Número: <span id="serial">AAA115</span></h5>
                                </div>                                
                                <!-- <div class="form-group col-md-3">
                                    <h5>AAA115</h5>
                                </div>                                 -->
                                <div class="form-group col-md-5">
                                    <h5><?=date('Y-m-d H:i:s');?></h5>
                                </div>                                
                            </div>
                            <!-- fin segunda fila -->                            

                            <!-- segunda fila -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="nombre">Nombre – Apellido</label>
                                    <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="nombre" name="nombre" placeholder="Ingrese aquí nombre completo" required >
                                </div>                                
                            </div>
                            <!-- fin segunda fila --> 

                            <!-- segunda fila -->
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="mail">Email</label>
                                    <input type="email" class="form-control" id="mail" name="mail" placeholder="Ingrese aquí el email" required >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="telefono" name="telefono" placeholder="Ingrese aquí el teléfono" required >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cedula">Cédula</label>
                                    <input type="text" onkeyUp="return ValNumero(this);" class="form-control" id="cedula" name="cedula" placeholder="Ingrese aquí la cédula" required >
                                </div>                                
                            </div>
                            <!-- fin segunda fila -->

                            <!-- quarta fila -->
                            <div class="row">                                                               
                                <div class="form-group col-md-12">
                                    <p>Es para nosotros un gusto contar con su interés en nuestro proyecto.  A continuación, encontrará la información y características del inmueble de su interés.</p>
                                </div>                                
                            </div>                                
                            <!-- fin quarta fila --> 
                        </div>
                    </div>
                    <!-- ### FIN PRIMERA SECCION ### -->

                    <!-- ### SEGUNDA SECCION ### -->
                    <div class="card my-2">
                        <div class="card-body">
                            <h3>Información Inmueble</h3>                          
                            <!-- x fila -->
                            <div class="row">                   
                                <div class="form-group col-md-4">
                                    <label for="numInfoInmb">Número</label>
                                    <select class="form-control" id="numInfoInmb" name="numInfoInmb" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            for ($i=1; $i < 6 ; $i++) { 
                                                echo "<option value=$i>$i</option>";
                                            }                                            
                                        ?>
                                        <option value="6">No Aplica</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tipoAcab">Tipo de Acabado</label>
                                    <select class="form-control" id="tipoAcab" name="tipoAcab" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            for ($i=1; $i < 6 ; $i++) { 
                                                echo "<option value=$i>$i</option>";
                                            }                                            
                                        ?>
                                        <option value="6">No Aplica</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="torre">Torre</label>
                                    <select class="form-control" id="torre" name="torre" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            for ($i=1; $i < 6 ; $i++) { 
                                                echo "<option value=$i>$i</option>";
                                            }                                            
                                        ?>
                                        <option value="6">No Aplica</option>
                                    </select>
                                </div>                                
                            </div>
                            <!-- fin x fila -->
                            <!-- primera fila -->
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="areaTotalCons">Área Total Construida m<sup>2</sup> (aprox)</label>
                                    <input type="number" step="any" onchange="calculaTotal()" class="form-control" id="areaTotalCons" name="areaTotalCons" placeholder="Ingrese el dato" required>
                                </div>                                                                                          
                                <div class="form-group col-md-1">                                    
                                </div>  
                                <div class="form-group col-md-4">
                                    <label for="areaTotalPriv">Área Total Privada m<sup>2</sup> (aprox)</label>
                                    <input type="number" step="any" class="form-control" id="areaTotalPriv" name="areaTotalPriv" placeholder="Ingrese el dato">
                                </div>  
                            </div>
                            <!-- fin primera fila -->
                            <!-- segunda fila -->
                            <div class="row">                   
                                <div class="form-group col-md-4">
                                    <label for="numeParqueaderos">Numero de Parqueaderos</label>
                                    <select class="form-control" id="numeParqueaderos" name="numeParqueaderos" onchange="muestraParqueaderos()">
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            for ($i=1; $i < 6 ; $i++) { 
                                                echo "<option value=$i>$i</option>";
                                            }                                            
                                        ?>
                                        <option value="6">No Aplica</option>
                                    </select>
                                </div>                                                             
                                <div class="form-group col-md-1">                                    
                                </div>                                
                            </div>
                            <!-- fin segunda fila -->
                                                        
                            <div id="divParqueaderos" class="my-5"></div>

                            <!-- y fila -->
                            <div class="row">                   
                                <div class="form-group col-md-4">
                                    <label for="miniBodega">Mini-Bodega</label>
                                    <select class="form-control" id="miniBodega" name="miniBodega">
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            for ($i=1; $i < 6 ; $i++) { 
                                                echo "<option value=$i>$i</option>";
                                            }
                                        ?>
                                        <option value="6">No Aplica</option>
                                    </select>
                                </div>                                
                            </div>
                            <!-- fin y fila -->

                            <!-- z fila -->
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="areaTerrazaLibre">Área Terraza libre m<sup>2</sup> (aprox)</label>
                                    <input type="number" step="any" onchange="calculaTotal()" class="form-control" id="areaTerrazaLibre" name="areaTerrazaLibre" placeholder="No Aplica">
                                </div>                                
                            </div>
                            <!-- fin z fila -->

                            <!-- z2 fila -->
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="areaConsBalcon">Área construida Balcón (aproximada) m<sup>2</sup></label>
                                    <input type="number" step="any" class="form-control" id="areaConsBalcon" name="areaConsBalcon" placeholder="No Aplica">
                                </div>                                
                            </div>
                            <!-- fin z2 fila -->

                            <!-- tercera fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-5">
                                    <label for="valorInmueble">Valor Inmueble</label>
                                    <input type="text" onblur="return formatoMonetario(this);" onkeyUp="return ValNumero(this);" onchange="calculaTotal()" class="form-control" id="valorInmueble" name="valorInmueble" placeholder="$0,00" required>
                                </div>                                
                            </div>
                            <!-- fin tercera fila -->
                            <!-- quarta fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-5">
                                    <label for="otros">Otros</label>
                                </div>                                
                            </div>
                            <!-- fin quarta fila -->

                            <!-- fila check 1 -->
                            <div class="row mb-2">
                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input name="otros" class="form-check-input" type="checkbox" value="Parqueadero" id="checkP" onchange="toggleP()">
                                        <label class="form-check-label" for="checkP">
                                            P
                                        </label>
                                    </div>                                    
                                </div>
                                <div id="divP" class="col-md-4" style="display:none;">
                                    <input type="text" onblur="return formatoMonetario(this);" onkeyUp="return ValNumero(this);" onchange="calculaTotal()" class="form-control" id="valParqueadero" name="valParqueadero" placeholder="$0,00">                                    
                                </div>
                            </div>
                            <!-- fin fila check 1 -->
                            <!-- fila check 2 -->
                            <div class="row mb-2">
                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input name="otros" class="form-check-input" type="checkbox" value="Mini-Bodega" id="checkMB" onchange="toggleMB()">
                                        <label class="form-check-label" for="checkMB">
                                            MB
                                        </label>
                                    </div>                                    
                                </div>
                                <div id="divMB" class="col-md-4" style="display:none;">
                                    <input type="text" onblur="return formatoMonetario(this);" onkeyUp="return ValNumero(this);" onchange="calculaTotal()" class="form-control" id="valMiniBodega" name="valMiniBodega" placeholder="$0,00">                                    
                                </div>
                            </div>
                            <!-- fin fila check 2 -->
                            <!-- fila check 3 -->
                            <div class="row mb-2">
                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input name="otros" class="form-check-input" type="checkbox" value="Deposito" id="checkD" onchange="toggleD()">
                                        <label class="form-check-label" for="checkD">
                                            D
                                        </label>
                                    </div>                                    
                                </div>
                                <div id="divD" class="col-md-4" style="display:none;">
                                    <input type="text" onblur="return formatoMonetario(this);" onkeyUp="return ValNumero(this);" onchange="calculaTotal()" class="form-control" id="valDeposito" name="valDeposito" placeholder="$0,00">                                    
                                </div>
                            </div>
                            <!-- fin fila check 3 -->

                            <!-- fila observaciones -->
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="observaciones">Observaciones</label>
                                    <textarea name="observaciones" onkeypress="return soloLetrasYNumeros(event)" id="observaciones" cols="30" rows="5" class="form-control" placeholder="Ingrese aquí sus Observaciones"></textarea>
                                </div>
                            </div>
                            <!-- fin fila observaciones -->
                            
                            <!-- quinta fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-5">
                                    <label for="descuentos">Descuentos</label>
                                    <input type="text" onblur="return formatoMonetario(this);" onkeyUp="return ValNumero(this);" onchange="calculaTotal()" class="form-control" id="descuentos" name="descuentos" placeholder="$0,00">
                                </div>                                
                            </div>
                            <!-- fin quinta fila -->
                            <!-- sexta fila -->
                            <div class="row">                                
                                <div class="form-group col-lg-5">
                                    <label for="valorTotal">Valor Total Inmueble</label>
                                    <input type="text" class="form-control" id="valorTotal" name="valorTotal" placeholder="$0,00" readonly>
                                </div>    
                                <div class="form-group col-md-4">
                                    <label for="valorm2">Valor m<sup>2</sup> (aprox)</label>
                                    <input type="text" class="form-control" id="valorm2" name="valorm2" placeholder="$0,00" readonly>
                                </div>                              
                            </div>
                            <!-- fin sexta fila -->                                                       
                                                      
                        </div>
                    </div>
                    <!-- ### FIN SEGUNDA SECCION ### -->

                    <!-- ### TERCERA SECCION ### -->
                    <div class="card">
                        <div class="card-body"> 
                            <h3>FORMA DE PAGO</h3>                                 
                            
                            <h5 class="mt-5">Separación</h5>
                            <!-- separacion fila -->
                            <div class="row">                                
                                <div class="form-group col-md-2">
                                    <label for="porcentajeSeparacion">Porcentaje</label>
                                    <input type="text" onblur="return formatoPorcentaje(this)" onkeyUp="return ValNumero(this);" onchange="calculaPorcentaje(this)" class="form-control" id="porcentajeSeparacion" name="porcentajeSeparacion" placeholder="%" required>
                                </div>    
                                <div class="form-group col-md-5">
                                    <label for="valorSeparacion">Valor</label>
                                    <input type="text" class="form-control" id="valorSeparacion" name="valorSeparacion" placeholder="$0,00" readonly>
                                </div>                              
                            </div>
                            <!-- fin separacion fila -->

                            <h5 class="mt-5">Confirmación</h5>
                            <!-- confirmacion fila -->
                            <div class="row">                                
                                <div class="form-group col-md-2">
                                    <label for="porcentajeConfirmacion">Porcentaje</label>
                                    <input type="text" onblur="return formatoPorcentaje(this)" onkeyUp="return ValNumero(this);" onchange="calculaPorcentaje()" class="form-control" id="porcentajeConfirmacion" name="porcentajeConfirmacion" placeholder="%" required>
                                </div>    
                                <div class="form-group col-md-5">
                                    <label for="valorConfirmacion">Valor</label>
                                    <input type="text" class="form-control" id="valorConfirmacion" name="valorConfirmacion" placeholder="$0,00" readonly>
                                </div>                              
                            </div>
                            <!-- fin confirmacion fila -->
                            
                            <h5 class="mt-5">Cuotas Extraordinarias</h5>
                            <!-- cuotas extraordinarias fila -->
                            <div class="row">                                
                                <div class="form-group col-md-2">
                                    <label for="porcentajeCE">Porcentaje</label>
                                    <input type="text" onblur="return formatoPorcentaje(this)" onkeyUp="return ValNumero(this);" onchange="calculaPorcentaje()" class="form-control" id="porcentajeCE" name="porcentajeCE" placeholder="%" required>
                                </div>    
                                <div class="form-group col-md-5">
                                    <label for="valorCE">Valor</label>
                                    <input type="text" class="form-control" id="valorCE" name="valorCE" placeholder="$0,00" readonly>
                                </div>                          
                            </div>
                            <!-- fin cuotas extraordinarias inicial fila -->                            
                            <!-- num cuotas extraordinarias fila -->
                            <div class="row">                                  
                                <div class="form-group col-md-4">                                
                                    <label for="numeCuotasExtraordinarias">Número de Cuotas Extraordinarias</label>
                                    <select class="form-control" id="numeCuotasExtraordinarias" name="numeCuotasExtraordinarias">
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            for ($i=1; $i < 6 ; $i++) { 
                                                echo "<option value=$i>$i</option>";
                                            }                                            
                                        ?>
                                        <option value="6">No Aplica</option>
                                    </select>                                
                                </div>                                
                                <div class="form-group col-md-5">
                                    <label for="valorCuotasExtraordinarias">Valor</label>
                                    <input type="text" class="form-control" id="valorCuotasExtraordinarias" name="valorCuotasExtraordinarias" placeholder="$0,00" readonly>
                                </div>                              
                            </div>
                            <!-- fin num cuotas extraordinarias fila -->
                        
                            <h5 class="mt-5">Cuota Inicial</h5>
                            <!-- cuota inicial fila -->
                            <div class="row">                                
                                <div class="form-group col-md-2">
                                    <label for="porcentajeCI">Porcentaje</label>
                                    <input type="text" onblur="return formatoPorcentaje(this)" onkeyUp="return ValNumero(this);" onchange="calculaPorcentaje()" class="form-control" id="porcentajeCI" name="porcentajeCI" placeholder="%" required>
                                </div>    
                                <div class="form-group col-md-5">
                                    <label for="valorCI">Valor</label>
                                    <input type="text" class="form-control" id="valorCI" name="valorCI" placeholder="$0,00" readonly>
                                </div>                          
                            </div>
                            <!-- fin cuota inicial fila -->                            
                            <!-- num cuotas fila -->
                            <div class="row">                                  
                                <div class="form-group col-md-3">                                
                                    <label for="numeCuotas">Número de Cuotas</label>
                                    <select class="form-control" id="numeCuotas" name="numeCuotas" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            for ($i=1; $i < 6 ; $i++) { 
                                                echo "<option value=$i>$i</option>";
                                            }                                            
                                        ?>
                                        <option value="6">No Aplica</option>
                                    </select>                                
                                </div>                                
                                <div class="form-group col-md-5">
                                    <label for="valorCuotas">Valor</label>
                                    <input type="text" class="form-control" id="valorCuotas" name="valorCuotas" placeholder="$0,00" readonly>
                                </div>                              
                            </div>
                            <!-- fin num cuotas fila -->
                            
                            <h5 class="mt-3">Financiación</h5>
                            <!-- porcentaje/valor fila -->
                            <div class="row">                                
                                <div class="form-group col-md-2">
                                    <label for="porcentajeFin">Porcentaje</label>
                                    <input type="text" onblur="return formatoPorcentaje(this)" onkeyUp="return ValNumero(this);" class="form-control" id="porcentajeFin" name="porcentajeFin" placeholder="%">
                                </div>    
                                <div class="form-group col-md-5">
                                    <label for="valorFin">Valor</label>
                                    <input type="text" class="form-control" id="valorFin" name="valorFin" placeholder="$0,00" readonly>
                                </div>                              
                            </div>
                            <!-- fin porcentaje/valor fila -->                           
                            <!-- años financiacion fila -->
                            <div class="row">                                
                                <div class="form-group col-md-4">
                                    <label for="aniosFin">Años de financiación</label>
                                    <select class="form-control" id="aniosFin" name="aniosFin" required>
                                        <option value="0" selected>Seleccione...</option>
                                        <?php
                                            for ($i=1; $i < 21 ; $i++) { 
                                                echo "<option value=$i>$i</option>";
                                            }
                                        ?>
                                        <option value="21">No Aplica</option>
                                    </select>                                    
                                </div>    
                                <div class="form-group col-md-4">
                                    <label for="cuotaCredMens">Cuota del crédito mensual apróximada</label>
                                    <input type="text" class="form-control" id="cuotaCredMens" name="cuotaCredMens" placeholder="$0,00" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ingresosFamiliars">Ingresos Familiares</label>
                                    <input type="text" class="form-control" id="ingresosFamiliars" name="ingresosFamiliars" placeholder="$0,00" readonly>
                                </div>                              
                            </div>
                            <!-- fin años financiacion fila -->                           
                        </div>
                    </div>
                    <!-- ### FIN TERCERA SECCION ### -->

                    <!-- ### QUARTA SECCION ### -->
                    <div class="card mt-2">
                        <div class="card-body"> 
                            <h3>GASTOS ADICIONALES</h3>                                 
                            <!-- primera fila -->
                            <div class="row">                                
                                <div class="form-group col-md-7">
                                    <label for="gastosNotariales">Gastos notariales y de registro aproximados</label>
                                    <input type="text" onblur="return formatoMonetario(this);" onkeyUp="return ValNumero(this);" class="form-control" id="gastosNotariales" name="gastosNotariales" placeholder="$0,00">
                                </div>                                                               
                            </div>
                            <!-- fin primera fila -->
                            <!-- segunda fila -->
                            <div class="row">                                
                                <div class="form-group col-md-7">
                                    <label for="asesor">Asesor</label>
                                    <input type="text" class="form-control" id="asesor" name="asesor" value="<?=$_SESSION['Nombre']?>" readonly required>
                                </div>                                
                            </div>
                            <!-- fin segunda fila -->
                            <!-- x fila -->
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        <a href="https://www.district26.co/">www.district26.co</a><br>
                                        Sala de negocios y apartamento modelo: Carrera 34 no. 25b-36 Sector Corferias, Bogotá.<br>
                                        Llámanos 317 8447436
                                    </p>                                    
                                </div>
                            </div>
                            <!-- fin x fila -->                      
                            <!-- tercera fila -->
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="letra-pequena font-weight-light">"El área construida de cada inmueble, corresponde al área privada construida más ciertos elementos que tienen el carácter de comunes como muros, ductos, buitrones, elementos estructurales y de fachada. Las áreas mencionadas, podrán ser objeto de modificación o cambio, sin necesidad de previo aviso o autorización del cliente, como consecuencia de modificaciones tramitadas ante la entidad competente. Las terrazas son zonas comunes de uso exclusivo y no hacen parte del área total construida del inmueble. La nomenclatura definitiva de cada inmueble será la asignada en el Reglamento de Propiedad Horizontal (R.P.H). Valor estimado de la cuota de administración por metro cuadrado es de $8.285, aproximadamente y calculada para el año 2020, sujeto a cambios conforme a adecuación y modificaciones que se realicen al presupuesto de la propiedad horizontal, el valor estimado de la cuota de administración por metro cuadrado antes enunciada, no constituye un valor fijo garantizado.  El número de las cuotas mensuales disminuyen de acuerdo con el mes en el que se realice la vinculación al proyecto. Los ingresos familiares requeridos, la cuota y la tasa del crédito, dependen exclusivamente de la entidad financiera que escoja el cliente. Esta información no constituye contrato alguno. Lo invitamos a constituir su encargo fiduciario. Los valores definitivos dependen de los pagos que efectue el inversionista y la entidad financiera en el momento del trámite respectivo. Los valores contenidos en esta cotización podrán ser modificados sin previo aviso antes de la separación del inmueble. Cotización válida por un (1) día.</p>                                        
                                </div>
                            </div>
                            <!-- fin tercera fila -->                      
                            <!-- quarta fila -->
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="font-weight-bold font-italic letra-pequena">IMPORTANTE: Después de efectuada la consignación de separación, el cliente cuenta con un plazo máximo de 15 días calendario para el diligenciamiento de formatos y vinculaciones, fima de contrato y entrega de documentos soportes, conforme al check list entregado. Vencido este plazo sin haberse cumplido lo establecido, el desarrollador del proyecto podrá desistir el negocio y cobrar una penalidad equivalente al 20% del valor del valor aportado a la fecha."</p>                            
                                </div>
                            </div>
                            <!-- fin quarta fila -->                      
                            
                            <img src="images/cotizador/cabezote2.jpg" alt="cabezote cotizador" class="card-img-top">

                            <button type="submit" class="btn btn-primary btn-block text-center mt-2">Guardar Registro</button>
                            <!-- <button type="button" class="btn btn-primary btn-block text-center mt-2" onclick="javascript:window.print()">Imprimir!</button> -->
                            
                        </div>
                    </div>
                    <!-- ### FIN QUARTA SECCION ### -->
                </form>
            </div>
        </div>
    </div>    
