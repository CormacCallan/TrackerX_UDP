<?php

session_start();
require "database.php";


$getCount = 'SELECT * from attendance where status =1 and subject_id = 7';
$countStatement = $db->prepare($getCount);
//$countStatement->bindValue(':subject_id', $row['subject_id']);
$countStatement->execute();
$counts = $countStatement->fetchAll();
$countStatement->closeCursor();

$getAllCount = 'SELECT * from attendance where  subject_id = 7';
$countStatement1 = $db->prepare($getAllCount);
//$countStatement->bindValue(':subject_id', $row['subject_id']);
$countStatement1->execute();
$counts1 = $countStatement1->fetchAll();
$countStatement1->closeCursor();

$attendanceCount = 0;
$studentCount = 0;

foreach ($counts as $count) : 
$attendanceCount+=1;
endforeach; 

foreach ($counts1 as $count1) : 
 $studentCount+=1;
endforeach; 
                    
  echo $attendanceCount. '|' .$studentCount;
  
