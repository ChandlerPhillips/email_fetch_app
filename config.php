<?php
$servername	= "************";
$DBusername	= "*********";
$DBpassword	= "**********";
$db 		= "**********";
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = '***********';
$password = '***********';
$messagestatus = "UNSEEN";

$conn = imap_open($hostname,$username,$password) or die('Cannot connect to Tiriyo: '.imap_last_error());

$emails = imap_search($conn, $messagestatus);

$status=imap_status($conn,$hostname,SA_ALL);
?>
