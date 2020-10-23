
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

        $query = "SELECT * FROM Project_IoT_1";
        $result=$mysqli->query($query); 



        if (isset($_POST['Search'])) {
		
            $search_query = $_POST['Search'];
    
            $query = "SELECT * FROM Project_IoT_1 WHERE Name='$search_query'";
            $result=$mysqli->query($query);
            $count = mysqli_num_rows($result);
    
            if ($count == 0) {
                echo "geen resultaat";
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

<form action="tabel_1.php" method="post">
		<input type="text" name="Search" placeholder="Search"><br>
		<input type="submit" name="zoek"><br>
	
</form>


<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="4"><h2> Meeting sensoren </h2></th> 
		</tr> 
			  <th> Timestamp </th> 
			  <th> waarde </th> 
			  <th> Sensor_ID </th> 
			  
		</tr> 

        <?php while($rows=mysqli_fetch_assoc($result)) 
		{ 
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
