<?php

include '../database.php';



$passcode = $_POST['name']; 




try {



	$stmt = $db->prepare("UPDATE lecturer SET lecturer_passcode = :lecturer_passcode WHERE lecturer_id =1");
	$stmt->bindParam(":lecturer_passcode", $passcode);
	$stmt->execute();
        $test=$stmt->fetchAll();

	echo $test;
} catch (PDOException $e) {
	echo $e->getMessage();
}
?>