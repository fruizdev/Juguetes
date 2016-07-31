<?php
include 'conexion.php' ;
     
if( isset($_GET["entidad"])){
   $entidad= $_GET["entidad"];
}else $entidad='NULL';

if( isset($_GET["tipo_entidad"])){
   $tipo_entidad= $_GET["tipo_entidad"];
}else $tipo_entidad='NULL';

    

$periodo= 2016;//$_GET["periodo"];
$genero= $_GET["genero"];


mysqli_set_charset($mysqli,"utf8");
 
$q = "call Ordenar2($periodo, $entidad,$tipo_entidad, '$genero')"; 
       //ESTE ARRAY ALMACENARA LOS REGISTROS
 

   
$o = array();
//echo $q;
        //REALIZA CONSULTA
        if($result = $mysqli->query($q)){         
            //ITERAMOS TODOS LOS REGISTROS DEVUELTOS Y LLENAMOS EL ARRAY
            while($row = $result->fetch_array(MYSQLI_NUM)){
           
                $o[] = $row;                          
            }
         echo  json_encode(array("data"=>$o));   
        }
        $result->close();
        $mysqli->close();
?>