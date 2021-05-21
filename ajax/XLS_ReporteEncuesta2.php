<?php	
	$filtro="";
	if($_GET['fechai'] && $_GET['fechaf']){
		$fechai= $_GET['fechai'];
		$fechaf= $_GET['fechaf'];
		$filtro=" WHERE dt_FechaRegistro BETWEEN '".$fechai." 00:00' AND '".$fechaf." 23:59'";
	}		
	
	$archivo = 'Reporte_Encuesta_Servicios';
	
	date_default_timezone_set('America/Bogota');		
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=".$archivo."_".date('Y_m_d_H_i_s').".xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	require("../db.php");
	
	ini_set('max_execution_time','0');		
	
	$query = "SELECT * FROM tbl_ViajeroInterior_Encuesta2";	
	$query .= $filtro;
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

