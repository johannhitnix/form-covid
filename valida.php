<? error_reporting (0);
session_start(); 

//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO 
if ($_SESSION['autenticado'] != 'YES') { 
    //si no existe, envio a la p�gina de autentificacion 
	$error=1;

   echo "<meta http-equiv='REFRESH' content='0;url=index.php?iderror=".$error."'>";
    //ademas salgo de este script 
    exit(); 
} 