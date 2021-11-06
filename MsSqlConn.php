<?php 

$serverName = "192.168.134.4";
$dbConnConnectionInfo = array("UID" => "admin", "PWD" => "admin", "Database" => "BioStar");
$dbConn = sqlsrv_connect($serverName, $dbConnConnectionInfo);

if ($dbConn){
    echo "Connection established.\n";
    
} else {
	echo "Connection not working.\n<br><br>";
    // echo json_encode(sqlsrv_errors());
    // echo sqlsrv_errors();
    die (print_r(sqlsrv_errors(), true));
}

?>