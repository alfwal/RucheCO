<?php

$nbmaxruche = 5;
$poidsfaible = 12.00;


function checkactif ($rucheid, $txtnotification, $periode){

	$result = mysql_query("SELECT status, LAST_NOTIF_DATE FROM notification WHERE `notification`.`notification` = '$txtnotification' and `notification`.`RUCHEID` = $rucheid LIMIT 1");
	$row = mysql_fetch_assoc($result);
	$status = $row['status'];
	$lastnotifdate = $row['LAST_NOTIF_DATE'];

	$lastnotifdate = new DateTime($lastnotifdate);
	$date = new DateTime();

	$interval =  $lastnotifdate->diff($date)->days;
	echo $interval.'  - ' ;

	if ( $interval < $periode ){
		$status = 0;
	}

	return $status;

}


function updateNotifDate ($rucheid, $txtnotification){

	$date = date_create(); $date = date_format($date,'Y-m-d H:i:s');

	$query = "UPDATE `notification` SET `LAST_NOTIF_DATE` = '$date' WHERE `notification`.`notification` = '$txtnotification' and `notification`.`RUCHEID` = $rucheid;";
	$res = mysql_query($query) or die ('Erreur SQL !'.$query.'<br />'.mysql_error());

}

?>