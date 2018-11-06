<?php
session_start();
require_once 'database.php';

if (isset($_POST['btn-login'])) {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    try {

        $query = "SELECT * FROM student WHERE d_number=:username";
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        
         //if row exists
            if ($row = $statement->fetch()) 
        {
            //get hashed password 
            $hashed_password = $row['password'];
            
            //verify the password 
            if (password_verify($password, $hashed_password)) 
            {
                echo "ok"; // log in
                 $_SESSION['student_session'] = $row['student_id'];
            } 
            else 
            {
                echo "Invalid login, please try again"; // wrong details 
            }     
        }
         else 
        {
             echo "Invalid login, please try again"; // wrong details 
        }        
        
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}