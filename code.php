<?php
session_start();
require_once 'database.php';

if (isset($_POST['btn-record'])) {
    $code1 = filter_input(INPUT_POST, 'pincode-1');
    $code2= filter_input(INPUT_POST, 'pincode-2');
    $code3 = filter_input(INPUT_POST, 'pincode-3');
    $code4= filter_input(INPUT_POST, 'pincode-4');
    $code5 = filter_input(INPUT_POST, 'pincode-5');
    $code6 = filter_input(INPUT_POST, 'pincode-6');
    
    $code = $code1.$code2.$code3.$code4.$code5.$code6;
    

    try {

        $query = "SELECT * FROM lecturer WHERE lecturer_id= 1";
        $statement = $db->prepare($query);
        $statement->execute();
        $row = $statement->fetch();
        
        if($code == $row['lecturer_passcode'])
        {
            echo "Attendance recorded";
            
            $query2 = "UPDATE attendance SET status = 1 WHERE student_id= :student_id";
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