<?php
$servername	= "mysql23.ezhostingserver.com";
$DBusername	= "201880";
$DBpassword	= "csisFall20!8";
$db 		= "fmtempstick";
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'msufmproject@gmail.com';
$password = 'racers123';
$messagestatus = "UNSEEN";

$conn = imap_open($hostname,$username,$password) or die('Cannot connect to Tiriyo: '.imap_last_error());

$emails = imap_search($conn, $messagestatus);

$status=imap_status($conn,$hostname,SA_ALL);
?>