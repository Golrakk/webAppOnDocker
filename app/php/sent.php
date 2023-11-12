<?php
	$name = $_POST['object'] . '.csv';
	$fp = fopen('../messages/'. $name, 'w');
	$message = array(array($_POST['todaydate'], $_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['genre'], $_POST['birthdate'], $_POST['job'],$_POST['object'], $_POST['emailcontent']));
	foreach ($message as $fields) {
		fputcsv($fp, $fields, ";");
	}
	fclose($fp);
	header("location: ../index.php?page=Contact+Us&message=Sent");
	exit;
?>