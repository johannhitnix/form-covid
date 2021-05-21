<?php
    session_start();
	if ($_SESSION["autenticado"] == "YES") {
		echo "<meta http-equiv='REFRESH' content='0;url=indexEncuesta.php'>";
		exit(); 
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Inicio</title>
</head>
<body>    
    <div class="container tam-form mt-5">
        <div class="card">
            <div class="row card-img-top" style="justify-content:center;">
                <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <img style="height: 10em;" src="images/login.jpeg" alt="banner_encuesta">                                
                    </div>                    
                <div class="col-sm-1"></div>
            </div>
            <div class="card-body">
                <form action="login.php" method="post">
                    <div class="row mt-2 mb-3 justify-content-md-center">
                        <!-- <div class="col-md-3 col-sm-1"></div> -->
                        <div class="col-sm-12">
                            <h3 class="card-title">Inicio de Sesión</h3>
                        </div>
                        <!-- <div class="col-md-3 col-sm-1"></div> -->
                    </div>
                    <div class="mb-3 row">
                        <label for="user" class="col-sm-3 col-form-label">Usuario</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="user" name="user" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-3 col-form-label">Contraseña</label>
                        <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-8">
                            <input type="submit" class="btn btn-outline-dark" value="Enviar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>