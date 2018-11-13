



<?php

function randomCode($length = 6) {


        $possibleCharacters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $charactersLength = strlen($possibleCharacters);
        $randomString = '';

        for ($i = 0; $i < $length; $i ++) {

            $randomString .= $possibleCharacters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
}







for($x = 0; $x < 1; $x++)
{
    echo randomCode() . "<br>";

    
}
?>


<html>

    <body>

    <p>This example calls a function which performs a calculation and returns the result:</p>
    <button >Try it</button>
    <p id="demo"></p>
<p id="demoz"></p>
    <script>
        var x = myFunction(4, 3);
//        document.getElementById("demo").innerHTML = x;

        function myFunction1() {
            var y=<?php echo randomCode(); ?>;
            document.getElementById("demo").innerHTML = z;
        }
        
                function myFunction2() {
            var y=<?php echo randomCode(); ?>;
            document.getElementById("demoz").innerHTML = y;
        }

            setInterval(myFunction1(),myFunction2(), 3000);


    </script>

    </body>




</html>