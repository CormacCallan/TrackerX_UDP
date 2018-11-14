<!doctype html>
<html lang="en">


   
    <div id="displayfeed"></div>


		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
   
	
		<script>
			 function loadData() {
$(document).ready(function() {
    $("#displayfeed").load("pullCode.php");  
    
});
 };
 
loadData();
setInterval(loadData, (2 * 1000));


</script>
	
			
		
	</head>
	<body>
		
		    <div class="col-sm-8">
   
    <div id="displayfeed"></div>
   </div>
    <div class="col-sm-4">
     <div id="resultfeed">
        <!-- All data will display here  -->
        </div>
		
		
	</body>
	
</html>