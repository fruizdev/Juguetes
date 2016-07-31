<?php
include 'conexion.php' ;

//$entidad= $_GET["entidad"];
$periodo= 2016;//$_GET["periodo"];


$q = "SELECT rut,entidad1,fecha1,user1,entidad2,fecha2,user2 FROM scej.reg_duplicado;"; 
       //ESTE ARRAY ALMACENARA LOS REGISTROS


$datos = array();
        //REALIZA CONSULTA
        if($result = $mysqli->query($q)){    
            //ITERAMOS TODOS LOS REGISTROS DEVUELTOS Y LLENAMOS EL ARRAY
            while($row = $result->fetch_array(MYSQLI_NUM)){
                $datos[] = $row;             
            } 
           echo  json_encode(array("data"=>$datos));           
        }
        $result->close();
        $mysqli->close();
?>