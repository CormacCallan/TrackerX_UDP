<?php

session_start();
require "database.php";


$query_getLecturerDetails = "SELECT * FROM lecturer WHERE lecturer_id=:lecture_id";
$statementGLD = $db->prepare($query_getLecturerDetails);
$statementGLD->bindValue(':lecture_id', $_SESSION['lecturer_session']);
$statementGLD->execute();
$lecturers = $statementGLD->fetchAll();
$statementGLD->closeCursor();

foreach ($lecturers as $l) : 
echo $l['lecturer_name'];

endforeach; 
                    
?>
