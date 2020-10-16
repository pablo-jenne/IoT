
<?php

include "./database_connection.php";

if(isset($_POST["sensor"]))
{
    if(isset($_POST["waarde"]))
    {
        $waarde = $_POST["waarde"];
        $sensor = $_POST["sensor"];

        $stmt = $mysqli->prepare('INSERT INTO Project_IoT_1 ( Value,Sensor_ID) VALUES (?,?);');
        $stmt->bind_param('ss', $waarde, $sensor );

        if(!$stmt->execute()){
        echo $mysqli -> error;
        echo "NOK";
        echo "</br>";
        echo "<a href='./tabel_1.php'>Oei er is een foutje, ga terug</a>";
        }
            
    }
}






?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./tabel_1.php" method="post">

    Sensor1 of Sensor2? <input type="text" name="sensor"><br><br>
    waarde              <input type="text" name="waarde"><br><br>

    <input type="submit" name="submit" >



    </form>
</body>
</html>