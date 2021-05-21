<?php
// echo str_replace('  ', '&nbsp; ', nl2br(print_r($_POST, true)));
// die();
require '../db.php';

$fechaEntrevista = $_POST['fechaEntrevista'];
$departamento = $_POST['departamento'];
$ciudad = $_POST['ciudad'];

$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$fechaNacimiento = $_POST['fechaNacimiento'];

$departamentoNacimiento = $_POST['departamentoNacimiento'];
$ciudadNacimiento = $_POST['ciudadNacimiento'];
$estadoCivil = $_POST['estadoCivil'];
$tiempoCasado = $_POST['tiempoCasado'];

$ocupacion = $_POST['ocupacion'];
$viveCon = $_POST['viveCon'];
$numHijos = $_POST['numHijos']; // numeroHijos
$edadHijos = $_POST['edadHijos'];
$nombreConyuge = $_POST['nombreConyuge'];

$radioPadre = $_POST['radioPadre']; // padreVive
$radioMadre = $_POST['radioMadre']; // madreVive
$checkSeparados = $_POST['checkSeparados']; // padres_separados
$tiempoSeparados = $_POST['tiempoSeparados']; // tiempo_separados

$numHermanos = $_POST['numHermanos']; // numeroHermanos
$numHermanas = $_POST['numHermanas']; // numeroHermanas
$lugarHermanos = $_POST['lugarHermanos']; // lugarEntreHermanos
$medicinaPrepagada = $_POST['medicinaPrepagada'];
$nCarne = $_POST['nCarne'];
$DireccionResidencia = $_POST['DireccionResidencia'];
$departamentoResidencia = $_POST['departamentoResidencia'];
$ciudadResidencia = $_POST['ciudadResidencia'];

$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$mail = $_POST['mail'];

$nombreEmpresa = $_POST['nombreEmpresa'];
$cargo = $_POST['cargo'];
$direccionEmpresa = $_POST['direccionEmpresa'];
$telefonoEmpresa = $_POST['telefonoEmpresa'];

$estudios = $_POST['estudios'];
$titulo = $_POST['titulo'];
$hobbies = $_POST['hobbies'];

$quienRecomendo = $_POST['quienRecomendo'];
$telefonoRecomendo = $_POST['telefonoRecomendo']; // telefonoQuienRecomendo
$queEsperas = $_POST['queEsperas'];

$autodescripcion = $_POST['autodescripcion'];
$caracteristicaDestacada = $_POST['caracteristicaDestacada']; // caracteristica_mas_destacada
$valoranDeTi = $_POST['valoranDeTi']; // que_valoran_de_ti
$actitudesDisgustos = $_POST['actitudesDisgustos']; // comportamientos_que_causan_disgustos
$comportamientoFueraDeControl = $_POST['comportamientoFueraDeControl']; // comportamiento_cuando_estas_fuera_de_control
$comportamientoMenosToleras = $_POST['comportamientoMenosToleras']; // comportamiento_que_menos_toleras
$relatoPapa = $_POST['relatoPapa'];
$relatoMama = $_POST['relatoMama'];
$comportamientosHaciaPapa = $_POST['comportamientosHaciaPapa']; // comportamientos_hacia_el_padre
$comportamientosHaciaMama = $_POST['comportamientosHaciaMama']; // comportamientos_hacia_la_madre

$tratamiento = $_POST['tratamiento'];
$tiempoTratamiento = $_POST['tiempoTratamiento'];
$fechaTratamiento = $_POST['fechaTratamiento'];
$descripcionTerapia = $_POST['descripcionTerapia'];
$propositoTerapia = $_POST['propositoTerapia'];
$necesitaTerapia = $_POST['necesitaTerapia']; // necesitasTerapia
$consumoMedicamentos = $_POST['consumoMedicamentos']; // consumesMedicamentos
$cualMedicamento = $_POST['cualMedicamento']; // cualesMedicamentos

$aclaracionProblemasDeSalud = $_POST['aclaracionProblemasDeSalud']; // aclaracion_problemas_de_salud
$checkProblemasDeSalud = $_POST['checkProblemasDeSalud']; // problemas_de_salud
$cualesCirugias = $_POST['cualesCirugias']; // cirugias

$problemasRecuperacionAnestesia = $_POST['problemasRecuperacionAnestesia'];
$abortos = $_POST['abortos'];
$provocados = $_POST['provocados'];
$reaccionDrogas = $_POST['reaccionDrogas']; // reaccion_a_Drogas
$estadoSalud = $_POST['estadoSalud'];
$checkProblemasRespiratorios = $_POST['checkProblemasRespiratorios']; // problemasRespiratorios

$creyenteEnDios = $_POST['creyenteEnDios']; // creesEnDios
$religionFilosofia = $_POST['religionFilosofia'];
$algoParecido = $_POST['algoParecido'];
$otrosCursos = $_POST['otrosCursos'];
$crecimientoPersonal = $_POST['crecimientoPersonal'];

$checkMeditacionRegresiones = $_POST['checkMeditacionRegresiones'];  // meditacionRegresiones
$otrosMeditacionRegresiones = $_POST['otrosMeditacionRegresiones']; // otrosMeditacion
$fuma = $_POST['fuma'];
$haceCuantoFuma = $_POST['haceCuantoFuma'];
$toma = $_POST['toma'];
$frecuenciaToma = $_POST['frecuenciaToma'];
$usaSustancias = $_POST['usaSustancias'];
$cualesSustancias = $_POST['cualesSustancias'];
$haceCuantoUsaSustancias = $_POST['haceCuantoUsaSustancias'];

$frecuenciaVidaSocial = $_POST['frecuenciaVidaSocial'];
$recuerdosDesagradablesNinez = $_POST['recuerdosDesagradablesNinez']; // textarea
$experienciasRepetitivasDolorosas = $_POST['experienciasRepetitivasDolorosas']; // textarea

$firmaParticipante = $_POST['firmaParticipante'];
$cedulaParticipante = $_POST['cedulaParticipante'];
$firmaFacilitador = $_POST['firmaFacilitador'];
$cedulaFacilitador = $_POST['cedulaFacilitador'];
$nombreContactoEmergencia = $_POST['nombreContactoEmergencia'];
$telefonosContactoEmergencia = $_POST['telefonosContactoEmergencia'];

$query = "INSERT INTO [dbo].[tbl_ViajeroInterior_Encuesta1]
([fechaEntrevista]
,[departamentoEntrevista]
,[ciudadEntrevista]
,[nombre]
,[cedula]
,[fechaNacimiento]
,[departamentoNacimiento]
,[ciudadNacimiento]
,[estadoCivil]
,[tiempoCasado]
,[ocupacion]
,[viveCon]
,[numeroHijos]
,[edadHijos]
,[nombreConyuge]
,[padreVive]
,[madreVive]
,[padres_separados]
,[tiempo_separados]
,[numeroHermanos]
,[numeroHermanas]
,[lugarEntreHermanos]
,[medicinaPrepagada]
,[numeroCarne]
,[DireccionResidencia]
,[departamentoResidencia]
,[ciudadResidencia]
,[telefono]
,[celular]
,[mail]
,[nombreEmpresa]
,[cargo]
,[direccionEmpresa]
,[telefonoEmpresa]
,[estudios]
,[titulo]
,[hobbies]
,[quienRecomendo]
,[telefonoQuienRecomendo]
,[queEsperas]
,[autodescripcion]
,[caracteristica_mas_destacada]
,[que_valoran_de_ti]
,[comportamientos_que_causan_disgustos]
,[comportamiento_cuando_estas_fuera_de_control]
,[comportamiento_que_menos_toleras]
,[relatoPapa]
,[relatoMama]
,[comportamientos_hacia_el_padre]
,[comportamientos_hacia_la_madre]
,[tratamiento]
,[tiempoTratamiento]
,[fechaTratamiento]
,[descripcionTerapia]
,[propositoTerapia]
,[necesitasTerapia]
,[consumesMedicamentos]
,[cualesMedicamentos]
,[aclaracion_problemas_de_salud]
,[problemas_de_salud]
,[cirugias]
,[problemasRecuperacionAnestesia]
,[abortos]
,[provocados]
,[reaccion_a_Drogas]
,[estadoSalud]
,[problemasRespiratorios]
,[creesEnDios]
,[religionFilosofia]
,[algoParecido]
,[otrosCursos]
,[crecimientoPersonal]
,[meditacionRegresiones]
,[otrosMeditacion]
,[fuma]
,[haceCuantoFuma]
,[toma]
,[frecuenciaToma]
,[usaSustancias]
,[cualesSustancias]
,[haceCuantoUsaSustancias]
,[frecuenciaVidaSocial]
,[recuerdosDesagradablesNinez]
,[experienciasRepetitivasDolorosas]
,[firmaParticipante]
,[cedulaParticipante]
,[firmaFacilitador]
,[cedulaFacilitador]
,[nombreContactoEmergencia]
,[telefonosContactoEmergencia]
)
VALUES
('$fechaEntrevista'
,'$departamento'
,'$ciudad'
,'$nombre'
,'$cedula'
,'$fechaNacimiento'
,'$departamentoNacimiento'
,'$ciudadNacimiento'
,'$estadoCivil'
,'$tiempoCasado'
,'$ocupacion'
,'$viveCon'
, $numHijos
,'$edadHijos'
,'$nombreConyuge'
,'$radioPadre'
,'$radioMadre'
,'$checkSeparados'
,'$tiempoSeparados'
, $numHermanos
, $numHermanas
,'$lugarHermanos'
,'$medicinaPrepagada'
,'$nCarne'
,'$DireccionResidencia'
,'$departamentoResidencia'
,'$ciudadResidencia'
,'$telefono'
,'$celular'
,'$mail'
,'$nombreEmpresa'
,'$cargo'
,'$direccionEmpresa'
,'$telefonoEmpresa'
,'$estudios'
,'$titulo'
,'$hobbies'
,'$quienRecomendo'
,'$telefonoRecomendo'
,'$queEsperas'
,'$autodescripcion'
,'$caracteristicaDestacada'
,'$valoranDeTi'
,'$actitudesDisgustos'
,'$comportamientoFueraDeControl'
,'$comportamientoMenosToleras'
,'$relatoPapa'
,'$relatoMama'
,'$comportamientosHaciaPapa'
,'$comportamientosHaciaMama'
,'$tratamiento'
,'$tiempoTratamiento'
,'$fechaTratamiento'
,'$descripcionTerapia'
,'$propositoTerapia'
,'$necesitaTerapia'
,'$consumoMedicamentos'
,'$cualMedicamento'
,'$aclaracionProblemasDeSalud'
,'$checkProblemasDeSalud'
,'$cualesCirugias'
,'$problemasRecuperacionAnestesia'
,'$abortos'
,'$provocados'
,'$reaccionDrogas'
,'$estadoSalud'
,'$checkProblemasRespiratorios'
,'$creyenteEnDios'
,'$religionFilosofia'
,'$algoParecido'
,'$otrosCursos'
,'$crecimientoPersonal'
,'$checkMeditacionRegresiones'
,'$otrosMeditacionRegresiones'
,'$fuma'
,'$haceCuantoFuma'
,'$toma'
,'$frecuenciaToma'
,'$usaSustancias'
,'$cualesSustancias'
,'$haceCuantoUsaSustancias'
,'$frecuenciaVidaSocial'
,'$recuerdosDesagradablesNinez'
,'$experienciasRepetitivasDolorosas'
,'$firmaParticipante'
,'$cedulaParticipante'
,'$firmaFacilitador'
,'$cedulaFacilitador'
,'$nombreContactoEmergencia'
,'$telefonosContactoEmergencia'
)";

if (!mssql_query($query)) {
    echo "error en la Inserción. <strong>message code:</strong> ". mssql_get_last_message();
    echo "<br><br>";
    echo $query;
    
} else{    
    echo "inserción exitosa";
}