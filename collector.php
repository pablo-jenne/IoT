<?php
include "./database_connection.php";


function get_ip(){
    if(isset($_SERVER['HTTP_CLIENT_IP'])){
      return $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
      return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      return(isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] :'');
    }
  }
  
  $ip = get_ip();

  
  if(!empty($_POST['status']))
  {
    $waarde_sensor_1 = $_POST['waarde'];
    echo "$waarde_sensor_1";

    $sensor_1 = 1;

    $stmt = $mysqli->prepare('INSERT INTO Project_IoT_1 ( Value,Sensor_ID) VALUES (?,?);');
    $stmt->bind_param('ss', $waarde_sensor_1, $sensor_1 );

     $sql =$mysqli->query ("UPDATE Project_IoT_2  SET Name='temperatuur', last_timestamp = now(), external_IP='$ip', last_value='$waarde_sensor_1'  WHERE ID=1" );
     
     if(!$stmt->execute()){
        echo $mysqli->error;
        echo "NOK";
        echo "</br>";
        echo "<a href='./tabel_1.php'>Oei er is een foutje, ga terug</a>";
        }
        
    }
  
?>  