function toggleQuarta() {    
    if ($('.check-disnea-A').prop('checked') || $('.check-disnea-B').prop('checked')){
        $('#quarta_seccion').show();
    } 
    else $('#quarta_seccion').hide();
}
function toggleKinta() {    
    if ($('.check-depresion-A').prop('checked') || $('.check-depresion-B').prop('checked')){
        $('#kinta_seccion').show();
    } 
    else $('#kinta_seccion').hide();
}

function toggleQuarta_old_Buena(obj) {
    var $input = $(obj);
    if ($input.prop('checked')) $('#quarta_seccion').show();
    else $('#quarta_seccion').hide();
}

function toggleDis(){   
    if($('#otros').prop("checked")){
        $('#divDisOtro').show()
    } else{
        $('#divDisOtro').hide()
    }
}

function setCode(){
    let nombre = $('#nombre').val()
    let nombres = nombre.split(' ')
    let apendice = '-001'
    let code = ''

    nombres.forEach(element => {
        let fst = element.charAt(0).toUpperCase()
        code += fst
    })
    code += apendice
    $('#codigo_paciente').val(code)
}

function killerSession(){
    setTimeout("window.open('logout.php', '_top');", 1800000);
}

// ### OLD STUFF ###
function cambiarCiudad(id_departamento, id_ciudad){
    $(id_departamento).each(function(){
        if($(this).val()){
            let search = $(this).val()
            $.ajax({
                url: 'ajax/search.php',
                type: 'POST',
                data: {search},
                success: function(response){
                    let ciudades = JSON.parse(response)
                    $(id_ciudad).empty()
                    ciudades.forEach(ciudad =>{
                        $(id_ciudad).append(`<option value="${ciudad.code}">${ciudad.nombre}</option>`)
                    })
                }
            })
        }
    })
}

function cambiarCiudadCopy(){
    $('#departamento option:selected').each(function(){
        if($(this).val()){
            let search = $(this).val()
            $.ajax({
                url: 'ajax/search.php',
                type: 'POST',
                data: {search},
                success: function(response){
                    let ciudades = JSON.parse(response)
                    $('#ciudad').empty()
                    ciudades.forEach(ciudad =>{
                        $('#ciudad').append(`<option value="${ciudad.code}">${ciudad.nombre}</option>`)
                    })
                }
            })
        }
    })
}

function soloLetras(e){
    tecla = (document.all) ? e.keyCode : e.which;

    if (tecla==8) return true; 
    if (tecla==0) return true; 
    patron =/[A-Za-z\s+\@+\ñ+\.]/; 
    // patron = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    te = String.fromCharCode(tecla); 

    return patron.test(te);        
}
function soloLetrasYNumeros(e){
    tecla = (document.all) ? e.keyCode : e.which;

    if (tecla==8) return true; 
    if (tecla==0) return true; 
    patron =/[A-Za-z0-9\s+\@+\#+\ñ+\,+\.]/; 

    te = String.fromCharCode(tecla); 

    return patron.test(te);        
}

//*** Este Codigo permite Validar que sea un campo Numerico
function Solo_Numerico(variable){
    Numer=parseInt(variable);
    if (isNaN(Numer)){
        return "";
        
    }
    return Numer;
}
function ValNumero(Control){
    Control.value=Solo_Numerico(Control.value);
}
//*** Fin del Codigo para Validar que sea un campo Numerico

function registraEncuesta1(e){
    let error = 0
    if($('#tipo-tratamiento').val() ==0 && error == 0){
        $('#tipo-tratamiento').focus()        
        alert("ERROR: Debe seleccionar una opción!")    
        error = 1
    }

    if(error == 0){
        // var formData = new FormData($("#mainForm")[0])
        let data = getFormData()
        console.log(data)

        $.post("ajax/newEncuesta1.php", data,
            function (response) {
                alert(response)
                console.log(response)
                $('#mainForm').trigger('reset')
            }    
        );
    }
    e.preventDefault()
}

function getFormData(){
    var config = {};
     $('input:text').each(function () {
        config[this.name] = this.value
     })
     $('select').each(function(){
        config[this.name] = this.value
    })
    return config
}
function getFormData3(){
    var config = {};
     $('input:text').each(function () {
        config[this.name] = this.value
     })
     $('input:radio:checked').each(function(){
        config[this.name] = this.value
     })
     $('textarea').each(function(){
         config[this.name] = this.value
     })
     $('select').each(function(){
         config[this.name] = this.value
     })
    //  $('input:email').each(function(){
    //      config[this.name] = this.value
    //  })
    $('#mail').each(function(){
        config[this.name] = this.value
    })

     let selected = ''
     $('input:checkbox[name=checkSeparados]:checked').each(function(){
         if(this.checked){
             config[this.name] = $(this).val()
         }
     })
     $('input:checkbox[name=checkProblemasDeSalud]:checked').each(function(){
         if(this.checked){
             selected += this.value + ', '
         }
         config[this.name] = selected
     })
     selected = ''
     $('input:checkbox[name=checkProblemasRespiratorios]:checked').each(function(){
         if(this.checked){
             selected += this.value + ', '
         }
         config[this.name] = selected
     })
     selected = ''
     $('input:checkbox[name=checkMeditacionRegresiones]:checked').each(function(){
         if(this.checked){
             selected += this.value + ', '
         }
         config[this.name] = selected
     })

    return config
 }
function registraEncuesta2(e){
    let error = 0
    if($('#departamento').val() ==0 && error == 0){
        $('#departamento').focus()        
        alert("ERROR: Debe seleccionar un departamento!")    
        error = 1
    } 
    if($('#ciudad').val() ==0 && error == 0){
        $('#ciudad').focus()        
        alert("ERROR: Debe seleccionar una ciudad!")    
        error = 1
    } 
    if($('#pregunta1').val() ==0 && error == 0){
        $('#pregunta1').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta2').val() ==0 && error == 0){
        $('#pregunta2').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta3').val() ==0 && error == 0){
        $('#pregunta3').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta4').val() ==0 && error == 0){
        $('#pregunta4').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta5').val() ==0 && error == 0){
        $('#pregunta5').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta6').val() ==0 && error == 0){
        $('#pregunta6').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta7').val() ==0 && error == 0){
        $('#pregunta7').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta8').val() ==0 && error == 0){
        $('#pregunta8').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta9').val() ==0 && error == 0){
        $('#pregunta9').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta10').val() ==0 && error == 0){
        $('#pregunta10').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta11').val() ==0 && error == 0){
        $('#pregunta11').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta12').val() ==0 && error == 0){
        $('#pregunta12').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta13').val() ==0 && error == 0){
        $('#pregunta13').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta14').val() ==0 && error == 0){
        $('#pregunta14').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta15').val() ==0 && error == 0){
        $('#pregunta15').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta16').val() ==0 && error == 0){
        $('#pregunta16').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta17').val() ==0 && error == 0){
        $('#pregunta17').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta18').val() ==0 && error == 0){
        $('#pregunta18').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    } 
    if($('#pregunta19').val() ==0 && error == 0){
        $('#pregunta19').focus()        
        alert("ERROR: Debe seleccionar una respuesta!")    
        error = 1
    }     
    if(error == 0){
        // var formData = new FormData($("#mainForm")[0])
        let data = getFormData2()
        console.log(data)

        $.post("ajax/newEncuesta2.php", data,
            function (response) {
                alert(response)
                console.log(response)
                $('#mainForm2').trigger('reset')                
            }    
        );
    }
    e.preventDefault()
}

function getFormData2(){
    var config = {};
     $('input:text').each(function () {
        config[this.name] = this.value
     })     
     $('textarea').each(function(){
         config[this.name] = this.value
     })
     $('select').each(function(){
         config[this.name] = this.value
     })    
    $('#mail').each(function(){
        config[this.name] = this.value
    })     
    return config
 }

 function exporta1(){     
     let fechai = $('#fechai1').val()
     let fechaf = $('#fechaf1').val()
     window.open(`ajax/XLS_ReporteEncuesta1.php?fechai=${fechai}&fechaf=${fechaf}` , "Exporta" ,	"width=620,height=400,fullscreen=yes,scrollbars=NO")
	 parent.opener=top
 }
 function exporta2(){     
     let fechai = $('#fechai2').val()
     let fechaf = $('#fechaf2').val()
     window.open(`ajax/XLS_ReporteEncuesta2.php?fechai=${fechai}&fechaf=${fechaf}` , "Exporta" ,	"width=620,height=400,fullscreen=yes,scrollbars=NO")
	 parent.opener=top
 }

 function subeSegmento(e){
    if($('#myfile').val() ==0){
        $('#myfile').focus()        
        alert("Ningun archivo seleccionado!")
        e.preventDefault()
    } else{
        var formData = new FormData($('.formulario')[0])   
            
                $.ajax({
                    type: "POST",
                    url: "ajax/doSubeSegmento.php",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        alert(response)                        
                        location.reload()    
                    }
                });    
                e.preventDefault()                
    }
}
function eliminaSegmento(id, e){
    if(confirm("¿Eliminar segmento?")){
        $.ajax({
            url:'ajax/doEliminaSegmento.php',
            type:'POST',
            data:'id='+id,
            success:function(data){	
                alert("segmento eliminado")
                location.reload()
            }
        })    
    } else{        
        e.preventDefault()
    }
}
