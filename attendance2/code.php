<?php
session_start();
require_once 'database.php';

if (!isset($_SESSION['student_session'])) {
    header("Location: index.php");
}

if (isset($_POST['btn-record'])) {
    $code1 = filter_input(INPUT_POST, 'pincode-1');
    $code2= filter_input(INPUT_POST, 'pincode-2');
    $code3 = filter_input(INPUT_POST, 'pincode-3');
    $code4= filter_input(INPUT_POST, 'pincode-4');
    $code5 = filter_input(INPUT_POST, 'pincode-5');
    $code6 = filter_input(INPUT_POST, 'pincode-6');
    
    $code = $code1.$code2.$code3.$code4.$code5.$code6;
    

    try {

        $query = "SELECT * FROM subject WHERE subject_id= :subject_id";
        $statement = $db->prepare($query);
        
        foreach ($_SESSION['current_class'] as $c) :
            
        $statement->bindValue(':subject_id', $c['subject_id']);
        $subject_id = $c['subject_id'];
        endforeach;
        $statement->execute();
        $row = $statement->fetch() ;
        
        
        
        
        $query2 = "SELECT * FROM lecturer WHERE lecturer_id= :lecturer_id";
        $statement2 = $db->prepare($query2);
        $statement2->bindValue(':lecturer_id', $row['lecturer_id']);
        $statement2->execute();
        $row2 = $statement2->fetch();
        
        
        if($code == $row2['lecturer_passcode'])
        {
            
           
            $query3 = "INSERT INTO attendance (attendance_id, status, student_id, subject_id) VALUES (NULL, 1, :student_id, :subject_id)";
            $statement3 = $db->prepare($query3);
            $statement3->bindValue(':student_id', $_SESSION['student_session']);
            $statement3->bindValue(':subject_id', $subject_id);  
            $statement3->execute();
            $statement3->closeCursor();

           
            echo "Attendance recorded";
        }
        else
        {
            echo "Wrong code";
        }
              
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}