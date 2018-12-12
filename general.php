<?php
   require 'config.php';
   require 'readData.php';
   $result1 = mysqli_query($DBconn,"SELECT sensor_code, COUNT(sensor_code) AS sensorCount
   FROM building_test GROUP BY sensor_code ORDER BY sensorCount DESC");
   
   echo 
   '<table style="width:50%">
   <tr>
   	<th>Sensors</th>
   	<th>Count</th>
   </tr>';
   
   while($row1 = mysqli_fetch_array($result1))
   {
   	echo 
   	'<tr>';
   	echo 
   	'<td align="center">' . $row1['sensor_code'] . '</td>' .
   	'<td align="center">' . $row1['sensorCount']  . '</td>' .
   	'</tr>';
   }
   echo 
   '</table>';
   
   mysqli_close($DBconn);
   ?>