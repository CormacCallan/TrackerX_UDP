<?php

function setAttendance() {

    include_once 'database.php';

    $attendance = filter_input(INPUT_POST, 'attendance');
    $query = "UPDATE student SET attendance = :attendance";
    $statement = $db->prepare($query);
    $statement->bindValue(':attendance', $attendance);
    $statement->execute();
}

// call the search function with the data sent from Ajax
setAttendance();
