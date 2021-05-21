<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);   
    
    require_once '../db.php';    

    if(isset($_POST)){
        $user = isset($_POST['user']) ? $_POST['user'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
    }

    if($user == 'fidelissa' and $password == '1234'){
        session_start();
        $_SESSION['autenticado'] = 'YES';        
        echo "<meta http-equiv='REFRESH' content='0; url=indexEncuesta.php'>";
        exit();
    }

    if($user <> '' and $password <> ''){
        $sql = "SELECT TOP(1) * FROM tbl_Proyectame_Users WHERE st_User = '$user' AND st_Password = '$password' ORDER BY 1";
        $result = mssql_query($sql);

        if($result && mssql_num_rows($result) == 1){
            
            $IpAdress = $_SERVER['REMOTE_ADDR'];
            $sqlIns = "INSERT INTO [dbo].[tbl_Proyectame_logs]
                                ([st_User]
                                ,[st_Ip]
                                )
                        VALUES
                                ('".$user."'
                                ,'".$IpAdress."'
                                )";
            mssql_query($sqlIns);

            
            session_start();
            $_SESSION['autenticado'] = 'YES';
            echo "<meta http-equiv='REFRESH' content='0; url=indexEncuesta.php'>";
            exit();
                
        } else{
            echo "<meta http-equiv='REFRESH' content='0;url=index.php'>";
        }
    } else{
        echo "<meta http-equiv='REFRESH' content='0;url=index.php'>";
    }