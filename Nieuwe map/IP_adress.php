<?php


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

//echo $ip;

include "./database_connection.php";

if(isset($_POST["naam"])){

$name = $_POST["naam"];

$stmt = $mysqli->prepare('INSERT INTO IP_db ( Name,IP_adress) VALUES (?,?);');
	$stmt->bind_param('ss', $name, $ip );

if(!$stmt->execute()){
  echo $mysqli -> error;
  echo "NOK";
  echo "</br>";
  echo "<a href='./IP_adress.php'>Oei er is een foutje, ga terug</a>";
}
else{
echo "OK";
echo "</br>";
echo "<a href='./IP_adress.php'>Ga terug !</a>";
}


}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
     <form action="./IP_adress.php" method="post">

        <input type="text" name="naam" placeholder="geef uw naam in" >
        <input type="submit" name="submit" >

     </form>
  </body>
</html>