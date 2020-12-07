<?php
include "./database_connection.php";

function getsensor3data($mysqli){
    $query = "SELECT * FROM Project_IoT_1 WHERE Sensor_ID = '3'";
    $result=$mysqli->query($query);
    return $result;
  }

function db_data($mysqli){
    $query = "SELECT * FROM Project_IoT_1";
    $result=$mysqli->query($query);
    return $result;
  }

$date_array = array();
$Sensor_ID = array();
$Value = array();

$resultdata3 = array();
$sensor_3_data = array();

$resultdata3 = getsensor3data($mysqli);
$resultalldata = db_data($mysqli);

while ($rows=mysqli_fetch_assoc($resultalldata)) {
  $date_array[] = $rows['Timestamp'];
  $Sensor_ID[] = $rows['Sensor_ID'];
  $Value[] = $rows['Value']; 
}
  $date_array = implode(',', $date_array);
  $Sensor_ID = implode(',', $Sensor_ID);
  $Value = implode(',', $Value);

  while ($row_sensor_3=mysqli_fetch_assoc($resultdata3)) {
    $sensor_3_data[] = $row_sensor_3['Value'];
  }

  $sensor_3_data = implode(',', $sensor_3_data);
?>