<?php
$serverName = "192.168.134.78,1433"; //serverName\instanceName, portNumber (default is 1433)
$connectionInfo = array( "Database"=>"AASFF", "UID"=>"sa", "PWD"=>"12345678");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}


$sql = "SELECT TOP 1000 [clock_id]
      ,[card_id]
      ,[emp_id]
      ,[KqDate]
      ,[KqTime]
      ,[mark]
      ,[flag]
      ,[sign_cause]
      ,[ID]
  FROM [AASFF].[dbo].[tmpTRecords]";
$result=$conn->query($sql); //somethingiswronghere
//$numRows=$result->num_rows;

if($result->num_rows) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["clock_id"]. " - Name: " . $row["card_id"]. " " . $row["emp_id"]. "<br>";
  }
} else {
  echo "0 results";
}


/**
if ($result = mysqli_query($conn,"SELECT TOP 1000 [clock_id]
      ,[card_id]
      ,[emp_id]
      ,[KqDate]
      ,[KqTime]
      ,[mark]
      ,[flag]
      ,[sign_cause]
      ,[ID]
  FROM [AASFF].[dbo].[tmpTRecords]")) {
    printf("Select returned %d rows.\n", mysqli_num_rows($result));

    /* free result set */
   // mysqli_free_result($result);
	
	
//}
$conn->close();
?>