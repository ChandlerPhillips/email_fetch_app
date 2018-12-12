<?php
   require 'config.php';
   require 'readData.php';
   
   $vunseen = $status->unseen;
   $vseen = $status->messages;
   $v = $vseen-$vunseen;
   $emailcount = mysqli_query($DBconn,"SELECT * FROM building_test");
   $totalemailcount = mysqli_num_rows($emailcount);
   
   if($emails) {
   	rsort($emails);
   	$email_number=$emails[0];
   	$emailoverview = imap_headerinfo($conn,$email_number);
   	$subject = $emailoverview->Subject;
   	if($subject == "IdealSciences Alert") {
   		$body = imap_fetchbody($conn,$email_number,1);
   		$bodyarray = explode(" ", $body);
   		//print_r($bodyarray);
   		$sensorcode = $bodyarray[1336];
   		$degreeslimit = $bodyarray[1339];
   		$degrees = $bodyarray[1341];
   		
   		$sensorid = substr($sensorcode, 0, -1);
   		$region_code = "MSU";
   		$fac_id = '01';
   		$bldg = substr($sensorid, 2, -5);
   		$location_code = substr($sensorid, 6);
   		$current_temp = substr($degrees, 1);
   		$login = 'Ideal Sciences';
   
   								
   		$sql = "INSERT INTO building_test (sensor_code, temp_limit, current_temp, region_code, fac_id, bldg, location_code, login, ent_date) VALUES ('$sensorid', '$degreeslimit', '$current_temp', '$region_code', '$fac_id', '$bldg', '$location_code', '$login', now())";
   		$result = $DBconn->query($sql);
   	} else {
   		imap_delete($conn,$email_number);
   	}
   }

   if ($status) { 
   	echo "Total Emails (Read and Unread): ".$status->messages."<br />\n"; 
   	echo "Unread Emails: ".$status->unseen."<br />\n";
   	$vunseen = $status->unseen;
   	$vseen = $status->messages;
   	$v = $vseen-$vunseen;
	echo "Total emails inside DB: ". $totalemailcount."<br />\n";
	echo "<br />";
   	if ($status->unseen == 0){ echo '<span style="color:#01a000;text-align:center;">Inbox is empty</span><br />'; }
   	elseif ($status->unseen >= 5) {echo '<span style="color:#ff0000;text-align:center;">Inbox has 5 or more email(s)</span><br />';}
   	elseif ($status->unseen <5 ) {echo '<span style="color:#feef00;text-align:center;">Inbox has unread email(s)</span><br />';
   	}
   } else { echo "\nimap_status
   failed: " . imap_last_error() . "\n"; }
   ?>