
<?php

include "./database_connection.php";
 //include "./API.php";

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

if(isset($temp)) // hier komt er data binnen via de API (temperatuur)
{
    $temperatuur = $temp;
    $temperatuur_graden = $temperatuur - 273.15;

    $temperatuur_graden = intval($temperatuur_graden); // van float naar int 
    $sensor_1 = 1;

    $stmt = $mysqli->prepare('INSERT INTO Project_IoT_1 ( Value,Sensor_ID) VALUES (?,?);');
    $stmt->bind_param('ss', $temperatuur_graden, $sensor_1 );

    $sql =$mysqli->query ("UPDATE Project_IoT_2  SET Name='temperatuur', last_timestamp = now(), external_IP='$ip', last_value='$temperatuur_graden'  WHERE ID=1" );



    if(!$stmt->execute()){
        echo $mysqli->error;
        echo "NOK";
        echo "</br>";
        echo "<a href='./tabel_1.php'>Oei er is een foutje, ga terug</a>";
        }

}

if(isset($humidity)) // hier komt er data binnen via de API (luchtvochtigheid)
{
    $vochtigheid = $humidity;
    $sensor_2 = 2;

    $stmt = $mysqli->prepare('INSERT INTO Project_IoT_1 ( Value,Sensor_ID) VALUES (?,?);');
    $stmt->bind_param('ss', $vochtigheid, $sensor_2 );

    $sql =$mysqli->query ("UPDATE Project_IoT_2  SET Name='vochtigheid', last_timestamp = now(), external_IP='$ip', last_value='$vochtigheid'  WHERE ID=2" );

    if(!$stmt->execute()){
        echo $mysqli->error;
        echo "NOK";
        echo "</br>";
        echo "<a href='./tabel_1.php'>Oei er is een foutje, ga terug</a>";
        }

}

if(isset($_POST["sensor"])) // deze input komt van het form om handmatig data in te vullen
{
    if(isset($_POST["waarde"]))
    {
      
          $waarde = $_POST["waarde"];
          $sensor = $_POST["sensor"];
          if($sensor > 0)
          {
          $stmt = $mysqli->prepare('INSERT INTO Project_IoT_1 ( Value,Sensor_ID) VALUES (?,?);');
          $stmt->bind_param('ss', $waarde, $sensor );

          if($sensor == 1){
          $sql =$mysqli->query ("UPDATE Project_IoT_2  SET Name='temperatuur', last_timestamp = now(), external_IP='$ip', last_value='$waarde'  WHERE ID='$sensor'" );
          }
          else{
            $sql =$mysqli->query ("UPDATE Project_IoT_2  SET Name='vochtigheid', last_timestamp = now(), external_IP='$ip', last_value='$waarde'  WHERE ID='$sensor'" );
          }
          if(!$stmt->execute()){
          echo $mysqli->error;
          echo "NOK";
          echo "</br>";
          echo "<a href='./tabel_1.php'>Oei er is een foutje, ga terug</a>";
          }
        }  
    }
}



  if(isset($_GET["value"])){
      $welke_sensor = intval($_GET["value"]);
      $query = "SELECT * FROM Project_IoT_1 WHERE Sensor_ID = '$welke_sensor'";
  }
  if(isset($_GET["waarde"])){

      $q = intval($_GET["waarde"]);
      $query = "SELECT * FROM Project_IoT_1 WHERE `Value` = '$q'";
      
  }
 
  if(isset($_GET["tijd"])){

      $q = intval($_GET["tijd"]);
      var_dump($q);
      $query = "SELECT * FROM Project_IoT_1 WHERE `Timestamp` LIKE '%$q%'";
      
  }
  

else{
    $query = "SELECT * FROM Project_IoT_1";
}
    $result=$mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="600"> 
    <title>Document</title>
</head>
<body>

<script>
function start(){
function ajax(value && waarde || tijd){
 // function ajax2(waarde){
   // function ajax3(tijd){

  if (value.length !== 0 && waarde.length !== 0) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.body.innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","tabel_1.php?waarde=" + waarde + "&value=" + value + "&tijd=" + tijd, true);
    xmlhttp.send();
  }
//}
//}
}
}
</script>

<form>


<select name="users" onchange="ajax(this.value)">
  <option value='' >Select a sensor:</option>
  <option value="1">1 (temperatuur)</option>
  <option value="2">2 (vochtigheid)</option>
  </select>

  Geef een waarde in: <input type="text" name="waarde" onkeyup="ajax(this.waarde)">
  <br>
  Geef timestamp in: <input type="text" name="tijd" onkeyup="ajax(this.tijd)">
  <br>
  <button onclick="start()">Submit</button>
</form>




<table align="right" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="4"><h2> Voorbeeld Meeting sensoren </h2></th> 
		</tr> 
			  <th> Timestamp </th> 
			  <th> waarde </th> 
			  <th> Sensor_ID </th> 
			  
		</tr> 

        <?php 

        for($i = 0; $i < $result->num_rows; $i++)
		{ 
      $rows=mysqli_fetch_assoc($result);
			 ?>
			<tr>  
            
				<td><?php echo $rows['Timestamp']; ?></td> 
				<td><?php echo $rows['Value']; ?></td> 
				<td><?php echo $rows['Sensor_ID']; ?></td>

             </tr>   
		<?php		  
        }
           ?> 
           
	</table>
    
</body>

</html>