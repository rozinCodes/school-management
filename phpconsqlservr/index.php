<?php  

$serverName = "192.168.134.4";  
$connectionInfo = array( "Database"=>"BioStar");  
$conn = sqlsrv_connect( $serverName, $connectionInfo);  
  
if( $conn )  
{  
     echo "Connection established.\n";  
}  
else  
{  
     echo "Connection could not be established.\n";  
     die( print_r( sqlsrv_errors(), true));  
}  
  
  

?>  