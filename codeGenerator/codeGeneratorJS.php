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


            function getCode(){
                            $(document).ready(function () {

                $.ajax({
                    url: 'pushCode.php', //This is the current doc
                    type: "POST",
                    data: ({name: generateCode()}),
                    success: function (data) {
                        console.log(data);
                    }
                });

            });
            }

            function generateCode() {
                var generatedCode = "";
                var varchar = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

                for (var i = 0; i < 6; i++)
                    generatedCode += varchar.charAt(Math.floor(Math.random() * varchar.length));

                return generatedCode;
            }

                setInterval(function () {
                  
                    getCode();
                }, 1000);

           






        </script>

    </head>

    <body>



		<p>You have started the code generator. This will repeat every second unless changed in the javascript</p>
    </body>
</html>
