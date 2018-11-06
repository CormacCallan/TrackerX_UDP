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
<div class="container ">
    <div class=" center row">
        <div id="currentTime">


            
        </div>
        <div id="timeDisplay" ></div>
    </div>
    <a href="logout.php"><h2>&nbsp;Sign Out</h2></a>
    <div class="upcoming">
        <p class="up-title"> CURRENT CLASS </p>
        <ul class="up-plan">
            <li><div class="roundhead"><i class="material-icons"></i></div>Universal Design Project<span class="secondo">Room : P1159</span><p class="up-date"><a class="btn btn-primary" href="student_SignIn.php" role="button">Sign In Attendance</a></p></li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="upcoming timetable" id="Mon">
        <p class="up-title">MONDAY CLASS </p>
        <ul class="up-plan">
            <li><span class="roundhead"><i class="material-icons"></i></span>C++<span class="secondo">Room : P1080</span><p class="up-date">9.00 am to 10.00 am</p></li>
            <li><span class="roundhead"><i class="fa fa-trophy" aria-hidden="true"></i></span>Web Services<span class="secondo">Room : P1110</span><p class="up-date">12.00 pm to 2.00 pm</p></li>
        </ul>
    </div>
    <div class="upcoming timetable" id="Tue">
        <p class="up-title">TUESDAY CLASS </p>
        <ul class="up-plan">
            <li><span class="roundhead"><i class="material-icons"></i></span>Web Framework<span class="secondo">Room : P1190</span><p class="up-date">9.00 am to 10.00 am</p></li>
            <li><span class="roundhead"><i class="fa fa-trophy" aria-hidden="true"></i></span>Web Services<span class="secondo">Room : P1158</span><p class="up-date">2.00 pm to 3.00 pm</p></li>
            <li><span class="roundhead"><i class="fa fa-trophy" aria-hidden="true"></i></span>C++<span class="secondo">Room : P1107</span><p class="up-date">3.00 pm to 55.00 pm</p></li>
        </ul>
    </div>
    <div class="upcoming timetable" id="Wed">
        <p class="up-title">WEDNESDAY CLASS </p>
        <ul class="up-plan">
            <li><span class="roundhead"><i class="material-icons"></i></span>Programming<span class="secondo">Room : P1105</span><p class="up-date">12.00 am to 2.00 pm</p></li>
            <li><span class="roundhead"><i class="fa fa-trophy" aria-hidden="true"></i></span>Universal Desgin Project<span class="secondo">Room : P1110</span><p class="up-date">2.00 pm to 4.00 pm</p></li>
        </ul>
    </div>
    <div class="upcoming timetable" id="Thu">
        <p class="up-title">THURSDAY CLASS </p>
        <ul class="up-plan">
            <li><span class="roundhead"><i class="material-icons"></i></span>C++<span class="secondo">Room : P1080</span><p class="up-date">9.00 am to 10.00 am</p></li>
            <li><span class="roundhead"><i class="fa fa-trophy" aria-hidden="true"></i></span>Web Services<span class="secondo">Room : P1110</span><p class="up-date">12.00 pm to 2.00 pm</p></li>
        </ul>
    </div>
    <div class="upcoming timetable" id="Fri">
        <p class="up-title">FRIDAY CLASS </p>
        <ul class="up-plan">
            <li><span class="roundhead"><i class="material-icons"></i></span>C++<span class="secondo">Room : P1080</span><p class="up-date">9.00 am to 10.00 am</p></li>
            <li><span class="roundhead"><i class="fa fa-trophy" aria-hidden="true"></i></span>Web Services<span class="secondo">Room : P1110</span><p class="up-date">12.00 pm to 2.00 pm</p></li>
        </ul>
    </div>
</div>

</body>
<script src="folder/js.js" type="text/javascript"></script>
</html>
