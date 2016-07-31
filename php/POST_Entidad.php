<?php

$sol_insc = json_decode($_POST['crear_entidad'],true);

$servername = "localhost";
$username = "root";
$password = "Godzukison29";
$dbname = "scej";

$lat = "";
$lng = "";

$link = mysql_connect($servername, $username, $password)
    or die('No se pudo conectar: ' . mysql_error());
//echo '(Conexión exitosa)';
mysql_select_db($dbname) or die('No se pudo seleccionar la base de datos'); 
mysql_set_charset("utf8"); 

$query=("CALL Crear_Entidad"
                . "('" . $sol_insc['nombre'] . "', '" . $sol_insc['rut'] . "'," . $sol_insc['tipo_entidad'] . ",'" . $sol_insc['direccion'] ."','" . $sol_insc['nombre_responsable'] ."','" . $sol_insc['apellido1'] ."','" . $sol_insc['apellido2'] ."',' ','" . $sol_insc['telefono'] ."',' ','".$lat."','".$lng."');");  

 $result= mysql_query( $query)
 or die(mysql_error());
 
if($result === FALSE) { 
    die(mysql_error()) ;    
}else{

    $row = mysql_fetch_row($result)  ;  
    
    echo  json_encode(array("data" => $row[0]));   
}
mysql_close($link);
?>


