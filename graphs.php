<?php
require 'config.php';
require 'readData.php';
//query to get data from the table
$query = sprintf("SELECT sensor_code, COUNT(sensor_code) AS sensorCount FROM building_test GROUP BY sensor_code");

//execute query
$result = $DBconn->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}
$result->close();
$DBconn->close();

//now print the data
print json_encode($data);
?>