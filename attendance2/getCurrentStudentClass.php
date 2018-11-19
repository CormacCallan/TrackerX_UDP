<?php
session_start();
include 'database.php';

if (!isset($_SESSION['student_session'])) {
    header("Location: index.php");
}

$query = "SELECT * FROM student WHERE student_id=:student_id";
$statement = $db->prepare($query);
$statement->bindValue(':student_id', $_SESSION['student_session']);
$statement->execute();
$row = $statement->fetch();

$query2 = "SELECT * FROM subject_group WHERE group_id=:group_id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(':group_id', $row['group_id']);
$statement2->execute();
$sub_groups = $statement2->fetchAll();

$current_day = array();


foreach ($sub_groups as $subject) :

    $query13 = "SELECT * FROM subject WHERE subject_id=:subject_id AND day = DAYNAME(CURDATE()) AND start_time <= CURTIME() AND end_time >= CURTIME()";
    $statement13 = $db->prepare($query13);
    $statement13->bindValue(':subject_id', $subject['subject_id']);
    $statement13->execute();

    $current_day [] = $statement13->fetch();
endforeach;

$cur = array_filter($current_day);
$_SESSION['current_class'] = $cur;

$query14 = "SELECT * FROM rooms WHERE room_id =:room_id";
$statement14 = $db->prepare($query14);

foreach ($cur as $c) :
    $statement14->bindValue(':room_id', $c['room_id']);
    $statement14->execute();
    $row14 = $statement14->fetch();
endforeach;

foreach ($cur as $c) :
    echo '<li><div class="roundhead"><i class="material-icons"></i></div>' . $c['subject_name'] .
    '<span class="secondo">Room :' . $row14['room_number'] . '</span><p class="up-date">' .
    $c['start_time'] . " to " . $c['end_time'] . '</p><br>';

    $qry = "SELECT * FROM attendance WHERE student_id=:student_id AND subject_id = :subject_id";
    $stmnt = $db->prepare($qry);
    $stmnt->bindValue(':student_id', $_SESSION['student_session']);
    $stmnt->bindValue(':subject_id', $c['subject_id']);
    $stmnt->execute();
    $status = $stmnt->fetch();

    if ($status['status'] == 1) {
        echo '<div class="icon">.<h4>Attendance Has Been Signed <span class="glyphicon glyphicon-ok"></span></div></h4>';
    } else {
        echo '<p><a class="btn btn-primary" href="student_SignIn.php" role="button">Sign In Attendance</a></p></li>';
    }

endforeach;
