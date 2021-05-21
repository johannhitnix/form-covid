<?php	
	require("../db.php");
	ini_set('max_execution_time','0');
	

	$mesesDelAnio = array('NA', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

	$segmento = 1052;

   $destination_path="../files/Segmentos/";  
   
   
   $target_path = $destination_path . basename( $_FILES['myfile']['name']);
	$nombreFile=$_FILES['myfile']['name'];	
		
	$resp="Algo falló, intentalo de nuevo";
	
   if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
	      
		$queryInsert = "INSERT INTO tbl_ArchivosViajeroInterior(st_NombreArchivo) VALUES('".$nombreFile."')";
		$resInsert = mssql_query($queryInsert);
		
		$queryUltArc = "SELECT TOP(1) id_Archivo AS id FROM tbl_ArchivosViajeroInterior ORDER BY dt_FechaRegistro DESC";
		$resUltArc = mssql_query($queryUltArc);
		$rowUltArc = mssql_fetch_object($resUltArc);
		$ultArc = $rowUltArc->id;
		  
		$result = 1;
	   	$ruta=$target_path;
		$resp="Segmento cargado exitosamente!";
   }
   
   sleep(1);
   
   //////////////////
   /////////////////// GENERAMOS   LA INSERCION EN LA BD  DEL NUEVO SEGMENTO
  
  require_once '../Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();

// Set output Encoding.
$data->setOutputEncoding('CP1251');
$data->read($ruta);
$registros = 0;
if($data->sheets[0]['numRows'] > 0){	
	
	for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {		
		
		//insertamos los registros
		$queryIns = "INSERT INTO [dbo].[tbl_UsuariosExternos]
		([st_Nombre]
		,[st_Email]	
		,[st_Parametro2]
		,[st_Parametro3]
		,[id_Segmento]	
		,[st_Parametro4]	
		,[id_Archivo]
		)	
  		VALUES
		('".trim($data->sheets[0]['cells'][$i][3])."'
		,'".trim($data->sheets[0]['cells'][$i][4])."'
		,'".trim($data->sheets[0]['cells'][$i][10])."'
		,'".trim($data->sheets[0]['cells'][$i][11])."'
		,$segmento
		,'".trim($data->sheets[0]['cells'][$i][12])."'
		,$ultArc	
		)";

		if(!mssql_query($queryIns)){
			$resp .= "<br>";
			$resp .= $queryIns;
			$resp .= "<br>";
			$resp .= mssql_get_last_message();
		}
		$registros++;
	}
}
$queryUpd = "UPDATE tbl_ArchivosViajeroInterior SET i_Registros = ".$registros." WHERE id_Archivo = ".$ultArc;
$resUpd = mssql_query($queryUpd);

echo $resp;
// unlink($ruta);