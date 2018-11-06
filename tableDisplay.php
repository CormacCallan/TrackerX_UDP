<?php
session_start();
require "database.php";
include "header.php";

if (!isset($_SESSION['lecturer_session'])) {
    header("Location: lecture_login.php");
}
//get all subjects
$query = "SELECT * FROM subject WHERE lecture_id=:lecture_id AND subject_date = CURDATE() AND subject_finish > CURTIME()";
$statement = $db->prepare($query);
$statement->bindValue(':lecture_id', $_SESSION['lecturer_session']);
$statement->execute();
$row = $statement->fetch();

$studentCount = 1;


$query3 = 'SELECT * FROM attendance WHERE subject_id = :subject_id ORDER BY student_id';
$statement3 = $db->prepare($query3);
$statement3->bindValue(':subject_id', $row['subject_id']);
$statement3->execute();
$attendances = $statement3->fetchAll();
$statement3->closeCursor();



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
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
        <script src="folder/js.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
       
         <a href="logout2.php"><h3>&nbsp;Sign Out</h3></a>
        <div class="subject_detail">
            <h2> <?php echo $row['subject_name']?></h2>
        </div>
        <table class="greenTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th><span class="date"><?php echo   date('D',strtotime($row['subject_date']))." ". $row['subject_date'] ?> </span><span class="time"><?php echo  $row['subject_time']." - ". $row['subject_finish'] ?></span></th>
                    <th>Date</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="5">
                        <div class="links"><a href="#">&laquo;</a> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">&raquo;</a></div>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($attendances as $student) : ?>
                <tr>
                    
                      <td><?php echo $studentCount++ ?></td> 
                      <td><?php 
                      
                        $query4 = 'SELECT * FROM student WHERE student_id = :student_id ORDER BY student_id';
                        $statement4 = $db->prepare($query4);
                        $statement4->bindValue(':student_id', $student['student_id']);
                        $statement4->execute();
                        $row2 = $statement4->fetch();
                                  
                      echo $row2['d_number']; ?></td> 
                            <td><?php echo $row2['student_name']; ?></td>
                            <td><?php 
                                  
                            if($student['status'] === 0)
                            {
                                echo    '<div class="redx"><img src="image/x-png-35402.png"'.'alt="red x"'.'/></div>';
                            }
                            else
                            {
                                 echo    '<img src="image/green.png"'.'alt="green tick"'.'/>';
                            }
                            ?>   
                                <div class="greenTick" style="display: none"><img src="image/green.png" alt="green tick"/></div> </td>        
                 <?php endforeach; ?>

                            
                            
            </tbody>
        </table>   
        <button id="mark-all-btn"><b>Mark all as present</b></button>  
        <input type="submit" value="SUBMIT" id="submitAtt">
          <div id="attendance_recorded" style="display: none">
            <div class="container space_left">
    <div class="row">
        <div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
            <div class="icon">
                <span class="glyphicon glyphicon-ok"></span>
            </div>
            <h1>Success!</h1>
            <p>Your Attendance Has been Signed!!!</p>
            <button type="button" class="redo btn">Ok</button>
        </div>
    </div>
</div>
            
                    </div>
    </body>
</html>
