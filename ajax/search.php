<?php
    require_once '../db.php';
    $search = $_POST['search'];

    if(!empty($search)){
        $qry = "SELECT * FROM cat_Municipios WHERE id_CodeDepartamento = $search";
        $resp = mssql_query($qry);
        $json = array();

        while($row = mssql_fetch_object($resp)){
            $json[] = array(
                'nombre' => $row->st_NombreMunicipio,
                'code' => $row->id_CodeMunicipio,
                'id' => $row->id_Municipios
            );
        }
        $json_string = json_encode($json);
        echo $json_string;
    }