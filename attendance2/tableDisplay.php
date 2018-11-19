<?php
session_start();
require "database.php";
include "header.php";

if (!isset($_SESSION['lecturer_session'])) {
    header("Location: index.php");
}
//get current subject
$query = "SELECT * FROM subject WHERE lecturer_id=:lecturer_id AND day = DAYNAME(CURDATE()) AND start_time <= CURTIME() AND end_time >= CURTIME()";
$statement = $db->prepare($query);
$statement->bindValue(':lecturer_id', $_SESSION['lecturer_session']);
$statement->execute();
$row = $statement->fetch();

$studentCount = 1;

//get subject group associated with current class that lecture is teaching
$query2 = 'SELECT * FROM subject_group WHERE subject_id = :subject_id ORDER BY group_id';
$statement2 = $db->prepare($query2);
$statement2->bindValue(':subject_id', $row['subject_id']);
$statement2->execute();
$sub_groups = $statement2->fetchAll();


foreach ($sub_groups as $sub_group) :

//get students who have the group id
$query3 = 'SELECT * FROM student WHERE group_id = :group_id ORDER BY student_id';
$statement3 = $db->prepare($query3);
$statement3->bindValue(':group_id', $sub_group['group_id']);
$statement3->execute();
$students[] = $statement3->fetchAll();
$statement3->closeCursor();
endforeach;

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title></title>
    </head>
    <body>
       
        <div class="subject_detail">
            <h2> <?php echo $row['subject_name']?></h2>
        </div>  
        
   <div id="btns"> <center> <button class="btn btn-primary" id="mark-all-btn">Mark all as Present</button> 
         
   
        
        <button class="btn btn-primary"  id="submitAtt">Submit    </button>  </center></div>
        
        
        
        <table class="greenTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th><span class="date"><?php echo   $row['day']?> </span><span class="time"><?php echo  $row['start_time']." - ". $row['end_time'] ?></span></th>
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
                <?php foreach ($students as $student) : ?>
               
                                <?php foreach ($student as $s) : ?>
                <tr>
                    
                      <td><?php echo $studentCount++ ?></td> 
                      <td><?php                                                         
                      echo $s['d_number']; ?></td> 
            
            <td>   <div class="links"><a class="active"href="studentInfo.php?student_id=<?php echo $s['student_id'];?>"><?php echo $s['student_name']; ?></a></div></td>
            
                            <td class="attendanceCell"><div class="redx"><img src="image/x-png-35402.png" alt="red x"/></div>
                                <div class="greenTick" style="display: none"><img src="image/green.png" alt="green tick"/></div></td>  
                           
                                 <?php endforeach; ?>
                
                 <?php endforeach; ?>

                            
                            
            </tbody>
        </table>             
    
        

        

          
          
          
          
          <div id="attendance_recorded" style="display: none">
            <div class="container space_left">
    <div class="row">
        <div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
            <div class="icon">
                <span class="glyphicon glyphicon-ok"></span>
            </div>
            <h1>Success!</h1>
            <p>Attendance Has Been submitted!!!</p>
             <a href="lecturer.php" style="text-decoration: none"><button type="button" class="redo btn">   Ok</button></a>
        </div>
    </div>
</div>
            
                    </div>
    </body>
</html>
