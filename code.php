<?php
session_start();
require_once 'database.php';

if (isset($_POST['btn-record'])) {
    $code = filter_input(INPUT_POST, 'code');
    

    try {

        $query = "SELECT * FROM lecturer WHERE lecturer_id= 1";
        $statement = $db->prepare($query);
        $statement->execute();
        $row = $statement->fetch();
        
        if($code == $row['lecturer_passcode'])
        {
            echo "Attendance recorded";
            
            $query2 = "UPDATE student SET attendance = 1 WHERE student_id= :student_id";
            $statement2 = $db->prepare($query2);
            $statement2->bindValue(':student_id', $_SESSION['student_session']);
            $statement2->execute();
           
        }
        else
        {
            echo "Wrong code";
        }
              
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}