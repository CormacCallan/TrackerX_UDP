<?php
//$id = ltrim(rtrim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT)));

/* Include "configuration.php" file */
require_once "database.php";

/* Perform query */

$subject_id = ltrim(rtrim(filter_input(INPUT_POST, "subject_id", FILTER_SANITIZE_NUMBER_INT)));
if(!isset($subject_id) || !(filter_var($subject_id, FILTER_VALIDATE_INT) !== false))
{
  //  header("location: error.php"); // deal with invalid input
    exit();
}
$query = "SELECT * FROM attendance INNER JOIN student ON attendance.student_id = student.student_id INNER JOIN subject ON attendance.subject_id = student.subject_id WHERE subject_id = :subject_id";
$statement = $db->prepare($query);
$statement->bindParam(":subject_id", $subject_id, PDO::PARAM_INT);
$statement->execute();

/* Manipulate the query result */
$json = "[";
if ($statement->rowCount() > 0)
{
    /* Get field information for all fields */
    $isFirstRecord = true;
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    foreach ($result as $row)
    {
        if(!$isFirstRecord)
        {
            $json .= ",";
        }
        
        /* NOTE: json strings MUST have double quotes around the attribute names, as shown below */
        $json .= '{"student_id":"' . $row->student_id .'","subject_id":"' . $row->subject_id . '","student_name":"' . $row->student_name  . '","d_number":"' . $row->d_number  . '","subject_name":"' . $row->subject_name  . '","subject_time":"' . $row->subject_time  .'","status":"' . $row->status  . '","subject_date":"' . $row->subject_date . '","lecturer_password":"' . $row->lecturer_password .'"}';
        
        $isFirstRecord = false;
    }
}
$json .= "]";

/* Send the $json string back to the webpage that sent the AJAX request */
echo $json;


/* Provide a link for the user to proceed to a new webpage or automatically redirect to a new webpage */
/* This webpage never actually displays. Instead, it runs in the background on the server. */
/* The data contained in the line of code "echo $json;" is automatically sent back inside the "http_request.responseText" of the calling function. */
/* Therefore, no feedback or way to proceed is necessary. */
?>