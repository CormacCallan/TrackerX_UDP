<?php
session_start();
require_once "database.php";

if (isset($_SESSION['student_session'])) {
    header("Location: student.php");
}
        
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="folder/main.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
        
        <script type="text/javascript" src="validation.min.js"></script>
<script type="text/javascript" src="login_script.js"></script>

        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="container" id="login">



            <div class="login">
                <div class="login-header">
                    <div id="pedometer">
                        <div id="loader"></div>
                        <img src="image/dkit_logo.png" alt=""/>
                    </div>
                </div>

                <form class="form-signin" method="post" id="login-form" action="login_process.php">

                    <div id="error">
                        <!-- error will be shown here ! -->
                    </div>


                    <div class="login-form">
                        <h3>Username:</h3>
                        <input type="text" placeholder="Username" name="username"/><br>
                        <h3>Password:</h3>
                        <input type="password" placeholder="Password" name="password"/>
                        <br>
                        <input type="submit" value="Login" class="login-button" name="btn-login" id="btn-login">
                        <br>
                    </div>
                </form>
            </div>
        </div> 

    </body>
    <script src="folder/js.js" type="text/javascript"></script>
</html>

