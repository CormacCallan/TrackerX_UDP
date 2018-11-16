<?php
session_start();
require_once "database.php";

if (!isset($_SESSION['student_session'])) {
    header("Location: index.php");
}
  


$query = "SELECT * FROM student WHERE student_id=:student_id";
$statement = $db->prepare($query);
$statement->bindValue(':student_id', $_SESSION['student_session']);
$statement->execute();
$row = $statement->fetch();

if($row['attendance'] == 1){
          header("Location: student_1.php");
}


        
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    derek
    <head>
        <link href="folder/main.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <script  src="https://code.jquery.com/jquery-3.3.1.js"    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
         <script type="text/javascript" src="validation.min.js"></script>
<script type="text/javascript" src="code.js"></script>
        
        <title></title>
    </head>
    <body>
        
        <div class="header">
            <img src="image/dkit_logo.png" alt=""/>
            <img src="image/header.jpeg" alt=""/>
        </div>
        <div class="container " id="lecturer">
            <div class="welcome">
                <h2>Hello <?php echo $row['student_name'];?></h2>
                 <a href="logout.php">&nbsp;Sign Out</a>
            </div>
           
        </div> 
        
        <div id="attendance_recorded" style="display: none">
             <center><h2>Attendance Recorded for UDP</h2></center>
            
                    </div>
        <form class="record-form" method="post" id="record-form" action="code.php">
            
            
                    <div id="error">
                        <!-- error will be shown here ! -->
                    </div>
                                    <!-- 5PN6EA ! -->

        <div class="login-form">
            <input type="text" placeholder="Enter Code" name="code"/><br>
            <input type="submit" value="Record" class="record-button" name="btn-record" id="btn-record">
            <br>
            
        </div>
            
            
</form>
    </body>
    <script src="folder/js.js" type="text/javascript"></script>
</html>
