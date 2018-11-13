<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
	
//var tempCode = generateCode();

var tempCode = "Cormac";


$(document).ready(function() { 

$.ajax({
     url: 'result.php', //This is the current doc
     type: "POST",
     dataType:'json', // add json datatype to get json
     data: ({name: 1}),
     success: function(data){
         console.log(data);
     }
});

});





	
			function generateCode() {
				var generatedCode = "";
				var varchar = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

				for (var i = 0; i < 6; i++)
					generatedCode += varchar.charAt(Math.floor(Math.random() * varchar.length));

				return generatedCode;
			}




			function displayCode() {
		
				
				setInterval(function () {
					document.write(generateCode() + "<br>");
					//document.write(tempCode);
				}, 1000);

			}
			
			

			
//return code once with click







		</script>

    </head>

    <body>

		<input type="number" min="0" step="1" placeholder="Custom Time">
		<br>

	<button type="button" id="submitFormData" onclick="Feedback();" class="btn btn-primary">Submit</button>
	<br>
	<br>
		<button onclick="displayCode()">Generate Code</button>

		<p id="display"></p>
    </body>
</html>
