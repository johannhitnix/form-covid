<?php
	require("../db.php");
	
	$id = $_POST['id'];
	
	$queryDlt = "DELETE FROM tbl_ArchivosViajeroInterior WHERE id_Archivo = ".$id;
	$resDlt = mssql_query($queryDlt);
	
	$queryDlt2 = "DELETE FROM tbl_UsuariosExternos WHERE id_Archivo = ".$id;
	$resDlt2 = mssql_query($queryDlt2);	
?>
