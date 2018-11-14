<?php
session_start();
require_once 'database.php';

if (isset($_POST['btn-login'])) {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    try {

        $query = "SELECT * FROM lecturer WHERE email=:email";
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
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
                $_SESSION['lecturer_session'] = $row['lecturer_id'];    
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