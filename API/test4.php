<html>
    
    <head>
        
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
	$(function (){
	$('#btnshow').off().on({
		click: function(){
			$('#show_pdf').prop('src','pdf.php');
		}
	});
	});
	</script>
	
	<body>
        <input type="button" id="btnshow" value="View PDF"/>
		<iframe id="show_pdf" style="width:500px;height:550px">
			</iframe>
    </body>
</html>