<?php

include '../database.php';



echo $userAnswer = $_POST['name']; 

json_decode($userAnswer);


//try {
//
//
//
//	$stmt = $db->prepare("UPDATE lecturer SET lecturer_passcode = :lecturer_passcode WHERE lecturer_id =1");
//	$stmt->bindParam(":lecturer_passcode", $passcode);
//	$stmt->execute();
//
//	echo '<div class="alert alert-success">Thanks!<br>
//                </div>';
//} catch (PDOException $e) {
//	echo $e->getMessage();
//}
?>