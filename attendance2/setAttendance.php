<?php
session_start();
if (!isset($_SESSION['lecturer_session'])) {
    header("Location: index.php");
}
function setAttendance() {

    include_once 'database.php';

    $query = "SELECT * FROM subject WHERE lecture_id=:lecture_id AND subject_date = CURDATE() AND subject_finish > CURTIME()";
    $statement = $db->prepare($query);
    $statement->bindValue(':lecture_id', $_SESSION['lecturer_session']);
    $statement->execute();
    $row = $statement->fetch();

    $status = filter_input(INPUT_POST, 'status');
    $query2 = "UPDATE attendance SET status = :status WHERE subject_id = :subject_id";
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(':status', $status);
        $statement2->bindValue(':subject_id', $row['subject_id']);

    $statement2->execute();
}

// call the search function with the data sent from Ajax
setAttendance();
