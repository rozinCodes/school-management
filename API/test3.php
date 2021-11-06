
<html>
<body>
<?php
    $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.70)(PORT = 1521)))(CONNECT_DATA=(SID=ditf)))" ;

    if($c = OCILogon("WEP", "WEP", $db))
    {
        echo "Successfully connected to Oracle.\n";
        OCILogoff($c);
    }
    else
    {
        $err = OCIError();
        echo "Connection failed." . $err[text];
    }
?>
 
  </body>			   
  </html>
