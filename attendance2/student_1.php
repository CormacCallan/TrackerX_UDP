<?php
session_start();
require_once "database.php";
include "header.php";


if (!isset($_SESSION['student_session'])) {
    header("Location: index.php");
}
  

$query = "SELECT * FROM student WHERE student_id=:student_id";
$statement = $db->prepare($query);
$statement->bindValue(':student_id', $_SESSION['student_session']);
$statement->execute();
$row = $statement->fetch();


        
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
        <script  src="https://code.jquery.com/jquery-3.3.1.js"    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
        
        
        <title></title>
    </head>
    <body>
      <div class="container space_left">
    <div class="row">
        <div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
            <div class="icon">
                <span class="glyphicon glyphicon-ok"></span>
            </div>
            <h1>Success!</h1>
            <p>Your Attendance Has been Signed!!!</p>
            <a href="student.php"> <button type="button" class="redo btn">OK</button></a>
        </div>
    </div>
  
</div>
    </body>
    <script src="folder/js.js" type="text/javascript"></script>
</html>
