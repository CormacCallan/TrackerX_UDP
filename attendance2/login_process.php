<?php
session_start();
require_once 'database.php';

function endsWith($string, $endString) 
{
    $len = strlen($endString);
    if ($len == 0) 
    {
        return true;
    }
    return (substr($string, -$len) === $endString);
}

if (isset($_POST['btn-login'])) {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if (endsWith($email, "@dkit.ie")) 
    {
        try {

            $query = "SELECT * FROM lecturer WHERE lecturer_email=:email";
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
        } 
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
    else
    {
        try {

            $query = "SELECT * FROM student WHERE email=:email";
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
        } 
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
}