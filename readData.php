<?php
require 'config.php';

$DBconn = new mysqli($servername, $DBusername, $DBpassword, $db);
if ($DBconn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>