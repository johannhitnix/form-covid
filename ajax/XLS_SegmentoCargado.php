<?php
	$archivo = $_GET['archivo'];
	$id = $_GET['id'];
	
	$archivo = str_replace(".xls","", $archivo);

	date_default_timezone_set('America/Bogota');		
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=".$archivo."_".date('Y_m_d_H_i_s').".xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	require("../db.php");
	
	ini_set('max_execution_time','0');	

	$query = "SELECT st_Nombre, st_Email, st_Parametro2, st_Parametro3, st_Parametro4, dt_FechaRegistro
				FROM tbl_UsuariosExternos WHERE id_Archivo = " . $id;
	
	$res = mssql_query($query);
?>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<table border="1">
	<tr style="color:#FFFFFF; text-align:center">
		<?
			for($i=0;$i<mssql_num_fields($res);$i++){
				echo "<td style='background-color:#1c2e89;'>".mssql_field_name($res,$i)."</td>";
			}
		?>
	</tr>
		<?
			while($row = mssql_fetch_array($res)){
		?>
	<tr>
		<?
			for($i=0;$i<mssql_num_fields($res);$i++){
				echo "<td>".$row[mssql_field_name($res,$i)]."</td>";
			}
		?>
	</tr>
	<?
		}
	?>
</table>
<?
	mssql_close();
?>

