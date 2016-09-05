<?php
$sol_log = json_decode($_POST['login_params'],true);
$servername = "localhost";
$username = "root";
$password = "godzuki";
$dbname = "scej";

$link = mysql_connect($servername, $username, $password)
    or die('No se pudo conectar: ' . mysql_error());
//echo '(Conexión exitosa)';
mysql_select_db($dbname) or die('No se pudo seleccionar la base de datos'); 
mysql_set_charset("utf8"); 


$query=("CALL Loguear"
                . "('" . $sol_log['user'] . "', '" . sha1($sol_log['pass']) ."');");  
$token;
 $result= mysql_query( $query)
 or die(mysql_error());

if($result === FALSE) { 
    die(mysql_error()) ;    
}else{
    $row = mysql_fetch_row($result)  ;  
    if($row[0] ==1){
    $token = $sol_log['user'] . " | " . uniqid() . uniqid();  }
    
  echo  json_encode(array("data" => $row[0] , "user" => $sol_log['user'], "token"=>$token));   
}
   // $datos = array(array("Id"=>"0", "Nombre" =>"Todas las entidades"));    

mysql_close($link);

$link2 = mysql_connect($servername, $username, $password);
mysql_select_db($dbname) or die('No se pudo seleccionar la base de datos'); 
mysql_set_charset("utf8"); 
   if($row[0] ==1){
       $q="UPDATE usuario SET Token=" . "' $token'"." , UltimoAcceso= NOW()  WHERE NOMBRE =  " ."'" . $sol_log['user'] . "'";
      // echo   $q; 
       $result2= mysql_query( $q );
       
       if($result2 === FALSE) { 
      die(mysql_error()) ;  }
   }

 mysql_close($link2);
    
    
?>


