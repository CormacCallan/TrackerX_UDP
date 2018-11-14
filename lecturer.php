<?php
session_start();
require_once "database.php";

if (!isset($_SESSION['lecturer_session'])) {
    header("Location: lecture_login.php");
}

$query = "SELECT * FROM lecturer WHERE lecturer_id=:lecturer_id";
$statement = $db->prepare($query);
$statement->bindValue(':lecturer_id', $_SESSION['lecturer_session']);
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
        <?php
        require_once "database.php";
        ?>
        <div class="center">
            <div class="header">
                <img src="image/dkit_logo.png" alt=""/>
                <img src="image/header.jpeg" alt=""/>
            </div>
        </div>
        <div class="container " id="lecturer">
            <div class="welcome">
                <h2>Welcome <?php echo $row['lecturer_name'];?></h2>
                 <a href="logout2.php">&nbsp;Sign Out</a>
            </div>
            <div class="subject_detail">
                <h2>Current Class : Universal Design Project</h2>
            </div>
        </div> 

    </body>
    <script src="folder/js.js" type="text/javascript"></script>
</html>
