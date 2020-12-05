<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

include "./database_connection.php";

$query = "SELECT * FROM Project_IoT_1";
$result=$mysqli->query($query);

$json_array = array();
while($row = mysqli_fetch_assoc($result))
{
   
    $json_array[] = $row;
}
 echo json_encode($json_array);
 
 


    ?>





</body>
</html>