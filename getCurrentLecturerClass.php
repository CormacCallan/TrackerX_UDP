<?php
session_start();
include 'database.php';

if (!isset($_SESSION['lecturer_session'])) {
header("Location: index.php");
}

$query = "SELECT * FROM subject WHERE lecturer_id=:lecturer_id AND day = DAYNAME(CURDATE()) AND start_time <= CURTIME() AND end_time >= CURTIME()";
$statement = $db->prepare($query);
$statement->bindValue(':lecturer_id', $_SESSION['lecturer_session']);
$statement->execute();
$current = $statement->fetchAll();
$statement->closeCursor();

foreach ($current as $c) :
echo '<li><div class="roundhead"><i class="material-icons"></i></div>'.$c['subject_name'].'<span class="secondo">Room :';

$queryRoom = "SELECT * FROM rooms WHERE room_id =:room_id";
$stmnt = $db->prepare($queryRoom);
$stmnt->bindValue(':room_id', $c['room_id']);
$stmnt->execute();
$room = $stmnt->fetch();
echo $room['room_number'];
echo '</span> <p class="up-date">'. $c['start_time'] . " to " . $c['end_time'] .'</p><p></p>';

endforeach;

