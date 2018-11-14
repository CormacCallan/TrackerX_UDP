<?php
require('database.php');

$studentCount = 1;
// Get all students
$query = 'SELECT * FROM student ORDER BY student_id';
$statement = $db->prepare($query);
$statement->execute();
$students = $statement->fetchAll();
$statement->closeCursor();

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
        <div class="center">
            <div class="header">
                <img src="image/dkit_logo.png" alt=""/>
                <img src="image/header.jpeg" alt=""/>
            </div>
        </div>
        <div class="subject_detail">
            <h2> Universal Design Project</h2>
        </div>
        <table class="greenTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th><span class="date">Wed 3 Oct 2018 </span><span class="time">9AM - 11AM</span></th>
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
                <tr>
                    
                      <td><?php echo $studentCount++ ?></td> 
                      <td><?php echo $student['d_number']; ?></td> 
                            <td><?php echo $student['student_name']; ?></td>
                            <td><?php 
                            
                            
                            
                            if($student['attendance'] === 0)
                            {
                                echo    '<div class="redx"><img src="image/x-png-35402.png"'.'alt="red x"'.'/></div>';
                            }
                            else
                            {
                                 echo    '<img src="image/green.png"'.'alt="green tick"'.'/>';
                            }
                            ?>   
                                <div class="greenTick"><img src="image/green.png" alt="green tick"/></div> </td>        
                 <?php endforeach; ?>
                            
         
               
                            
            </tbody>
        </table>   
        <button id="mark-all-btn"><b>Mark all as present</b></button>  
        <input type="submit" value="SUBMIT" id="submitAtt">
        <div id="attendanceRecordedMessage"><b>Attendance recorded</b></div>
    </body>
</html>
