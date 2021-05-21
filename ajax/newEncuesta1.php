<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// echo str_replace('  ', '&nbsp; ', nl2br(print_r($_POST, true)));
// die();
require '../../db.php';


$nombre = utf8_decode($_POST['nombre']);
$codigo_paciente = $_POST['codigo_paciente'];
$fecha_consulta = $_POST['fecha_consulta'];

$edad = $_POST['edad'];
$peso = $_POST['peso'];
$talla = $_POST['talla'];

$fecha_diagnostico = $_POST['fecha_diagnostico'];
$tipo_tratamiento = utf8_decode($_POST['tipo_tratamiento']);



// if($fechaTratamiento == "No Aplica") $fechaTratamiento = "";

$query = "INSERT INTO [dbo].[tbl_Proyectame_TQ]
([st_Nombre]
,[st_CodigoPaciente]
,[dt_FechaConsulta]
,[i_Edad]
,[i_Peso]
,[i_Talla]
,[dt_FechaDiagnostico]
,[st_TipoTratamiento]
)
VALUES
('$nombre'
,'$codigo_paciente'
,'$fecha_consulta'
,$edad
,$peso
,$talla
,'$fecha_diagnostico'
,'$tipo_tratamiento'
)
";

if (!mssql_query($query)) {
    echo "error en la Inserción. <strong>message code:</strong> ". mssql_get_last_message();
    echo "<br><br>";
    echo $query;
    
} else{    
    echo "Registro Exitoso!";
}

function stringCiudad($id_Ciudad, $id_Dpto){
    $queryCiudad = "SELECT st_NombreMunicipio FROM cat_Municipios WHERE  id_CodeMunicipio = $id_Ciudad AND id_CodeDepartamento = $id_Dpto";
    $resCiudad = mssql_query($queryCiudad);
    $rowCiudad = mssql_fetch_object($resCiudad);
    $st_Ciudad = $rowCiudad->st_NombreMunicipio;
    return $st_Ciudad;
}
function stringDepartamento($id_Dpto){
    $queryDpto = "SELECT st_NombreDepartamento FROM cat_Departamentos WHERE  id_CodeDepartamento = $id_Dpto";
    $resDpto = mssql_query($queryDpto);
    $rowDpto = mssql_fetch_object($resDpto);
    $st_Dpto = $rowDpto->st_NombreDepartamento;
    return $st_Dpto;
}