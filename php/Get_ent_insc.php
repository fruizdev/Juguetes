
<?php
    include 'conexion.php' ;

      //  $q = "CALL Listar(1, 2016)"; 
$q = "select Id,Nombre from entidad where cerrado=0 order by id desc;"; 
       //ESTE ARRAY ALMACENARA LOS REGISTROS
       $datos = array();     
        //REALIZA CONSULTA
        if($result = $mysqli->query($q)){
           
            //ITERAMOS TODOS LOS REGISTROS DEVUELTOS Y LLENAMOS EL ARRAY
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                $datos[] = $row;
            }            
           echo  json_encode(array("data"=>$datos));                       
        }
        $result->close();
        $mysqli->close();
?>