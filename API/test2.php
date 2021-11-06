
<html>
<body>
    <?php
      //include("db_hrm.php");
	  
	  
   $conn = oci_connect('WEP', 'WEP', '192.168.200.64:1521/hrpos');
   if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
	
	
	   $sql=oci_parse($conn," select * from CLASSES ");
      // $query = mysql_query($sel);
	   oci_execute($sql);
	  while($row =oci_fetch_assoc($sql))
      {
	  echo $row['ID'];
	  echo $row['CLASSES'];
      }
	/*  if($sel!='')
	 {
	 echo "succcess";
	 }
	  */
    ?>
 
  </body>			   
  </html>
