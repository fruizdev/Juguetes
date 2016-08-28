<?php
$sol_insc = json_decode($_POST['inscripcion'],true);
$servername = "localhost";
$username = "root";
$password = "Godzukison29";
$dbname = "scej";

$usuario = $sol_insc['user'];
$originalDate= $sol_insc['fecha_nac'];
$newDate = date("Y-m-d", strtotime($originalDate));
if ( ! isset($sol_insc['nombre2'])){
    $sol_insc['nombre2']="";
}
if (! isset($sol_insc['apellido2'])){
    $sol_insc['apellido2']="";
}

$link = mysql_connect($servername, $username, $password)
    or die('No se pudo conectar: ' . mysql_error());
//echo '(Conexión exitosa)';
mysql_select_db($dbname) or die('No se pudo seleccionar la base de datos'); 
mysql_set_charset("utf8"); 

$query=("CALL Inscribir_Beneficiario "
                . "('$newDate ', '" . $sol_insc['nombre1'] . "','" . $sol_insc['nombre2'] . "','" . $sol_insc['apellido1'] ."','" . $sol_insc['apellido2'] ."','" . $sol_insc['rut'] ."','" . $sol_insc['direccion'] ."','" . $sol_insc['genero'] . "'," . $sol_insc['entidad'] ."," . $sol_insc['estado']  . ",".
                $usuario .");");  
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


