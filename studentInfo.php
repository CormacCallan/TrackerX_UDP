<?php
session_start();
require_once "database.php";
include "header.php";

if (!isset($_SESSION['lecturer_session'])) {
    header("Location: lecture_login.php");
}
//get student_id selected from link in tabledisplay.php

$student_id = filter_input(INPUT_GET, 'student_id');
$query = "SELECT * FROM student WHERE student_id =:student_id";
$statement = $db->prepare($query);
$statement->bindValue(':student_id', $student_id);
$statement->execute();
$row = $statement->fetch();

$query2 = "SELECT * FROM `group` WHERE `group_id` = :group_id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(':group_id', $row['group_id']);
$statement2->execute();
$row2 = $statement2->fetch();

$query3 = "SELECT * FROM subject WHERE lecture_id=:lecture_id AND day = DAYNAME(CURDATE()) AND start_time <= CURTIME() AND end_time >= CURTIME()";
$statement3 = $db->prepare($query3);
$statement3->bindValue(':lecture_id', $_SESSION['lecturer_session']);
$statement3->execute();
$row3 = $statement3->fetch();

$query4 = 'SELECT * FROM attendance WHERE student_id = :student_id AND subject_id = :subject_id';
$statement4 = $db->prepare($query4);
$statement4->bindValue(':student_id', $student_id);
$statement4->bindValue(':subject_id', $row3['subject_id']);
$statement4->execute();
$attendances = $statement4->fetchAll();
$statement4->closeCursor();

$total = 0;
$classesAttended = 0;

 foreach ($attendances as $attendance) :
    $total++; 
 if($attendance['status'] === 1)
 {
     $classesAttended++;

 }
 endforeach;
 
function get_percentage($total, $number)
{
  if ( $total > 0 ) {
   return round($number / ($total / 100),2);
  } else {
    return 0;
  }
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
        <meta charset="UTF-8">
        <title></title>
    </head>
     <a href="logout2.php"><h3>&nbsp;Sign Out</h3></a>
    <body>
        <h1>Name: <?php echo $row['student_name'];?></h1>
        <h1>D Number: <?php echo $row['d_number'];?></h1>
        <h1>Group: <?php echo $row2['group_name'];?></h1>
        <h1>Email: <?php echo $row['email'];?></h1>
        <h1>% of classes attended: <?php echo get_percentage($total,$classesAttended).'%';?></h1>
             
    </body>
</html>
