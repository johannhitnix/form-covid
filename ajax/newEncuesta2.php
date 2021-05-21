<?php
// echo str_replace('  ', '&nbsp; ', nl2br(print_r($_POST, true)));
// die();
require '../db.php';
// tbl_ViajeroInterior_Encuesta2
$id_CiudEntrevista = $_POST['ciudad'];
$id_DptoEntrevista = $_POST['departamento'];


$nombreYCargo = $_POST['nombreYCargo'];
$nombreEmpresa = $_POST['nombreEmpresa'];
$telefono = $_POST['telefono'];
$taller = $_POST['taller'];
$mail = $_POST['mail'];

$nombreFacilitador = $_POST['nombreFacilitador'];
$fechaTaller = $_POST['fechaEntrevista'];

$departamento = stringDepartamento($id_DptoEntrevista);
$ciudad = stringCiudad($id_CiudEntrevista, $id_DptoEntrevista);
$observaciones = $_POST['observaciones'];

$pregunta1 = $_POST['pregunta1'];
$pregunta2 = $_POST['pregunta2'];
$pregunta3 = $_POST['pregunta3'];
$pregunta4 = $_POST['pregunta4'];
$pregunta5 = $_POST['pregunta5'];
$pregunta6 = $_POST['pregunta6'];
$pregunta7 = $_POST['pregunta7'];
$pregunta8 = $_POST['pregunta8'];
$pregunta9 = $_POST['pregunta9'];
$pregunta10 = $_POST['pregunta10'];
$pregunta11 = $_POST['pregunta11'];
$pregunta12 = $_POST['pregunta12'];
$pregunta13 = $_POST['pregunta13'];
$pregunta14 = $_POST['pregunta14'];
$pregunta15 = $_POST['pregunta15'];
$pregunta16 = $_POST['pregunta16'];
$pregunta17 = $_POST['pregunta17'];
$pregunta18 = $_POST['pregunta18'];
$pregunta19 = $_POST['pregunta19'];


$query = "INSERT INTO [dbo].[tbl_ViajeroInterior_Encuesta2]
([nombre_y_Cargo]
,[nombreEmpresa]
,[correo_electronico]
,[telefonoCelular]
,[tallerTomado]
,[nombreFacilitador]
,[fechaTaller]
,[departamento]
,[ciudad]
,[pregunta1]
,[pregunta2]
,[pregunta3]
,[pregunta4]
,[pregunta5]
,[pregunta6]
,[pregunta7]
,[pregunta8]
,[pregunta9]
,[pregunta10]
,[pregunta11]
,[pregunta12]
,[pregunta13]
,[pregunta14]
,[pregunta15]
,[pregunta16]
,[pregunta17]
,[pregunta18]
,[pregunta19]
,[observaciones]
)
VALUES
('$nombreYCargo'
,'$nombreEmpresa'
,'$mail'
,'$telefono'
,'$taller'
,'$nombreFacilitador'
,'$fechaTaller'
,'$departamento'
,'$ciudad'
,'$pregunta1'
,'$pregunta2'
,'$pregunta3'
,'$pregunta4'
,'$pregunta5'
,'$pregunta6'
,'$pregunta7'
,'$pregunta8'
,'$pregunta9'
,'$pregunta10'
,'$pregunta11'
,'$pregunta12'
,'$pregunta13'
,'$pregunta14'
,'$pregunta15'
,'$pregunta16'
,'$pregunta17'
,'$pregunta18'
,'$pregunta19'
,'$observaciones'
)";

if (!mssql_query($query)) {
    echo "error en la Inserción. <strong>message code:</strong> ". mssql_get_last_message();
    echo "<br><br>";
    echo $query;
    
} else{    
    echo "inserción exitosa";
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