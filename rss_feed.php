<?php 

include "./database_connection.php";

header( "Content-type: application/xml");
 
echo "<?xml version='1.0' encoding='UTF-8'?>

<rss version='2.0'>
<channel>
<title>RSS Feed</title>
<description>RSS Feed IOT</description>
<link>https://11902918.pxl-ea-ict.be</link>
<category>Resultaten meetingen</category>";

// stuk voor min en max value 
$query = "SELECT `Sensor_ID` FROM Project_IoT_1";
$result=$mysqli->query($query);



	$string1 = "1";
	$string2 = "2";

		$query_2 = "SELECT MAX(cast(`Value` as unsigned) ) AS maximum_1, MIN(cast(`Value` as unsigned)) AS minimum_1 FROM Project_IoT_1 WHERE Sensor_ID = '$string1'";
		$result_2=$mysqli->query($query_2);

		while($merker_1 = mysqli_fetch_assoc($result_2))
		{
			$maximum_1 = $merker_1['maximum_1'];
			$minimum_1= $merker_1['minimum_1'];

			echo "<item>
			
			<title> Maximum temperatuur sensor 1</title>
			<description> --> $maximum_1 °c </description>
			</item>";
			
			echo "<item>
			
			<title> Minimum temperatuur sensor 1</title>
			<description> --> $minimum_1 °c </description>
			</item>";
			
		}
		
	
		$query_3 = "SELECT MAX(cast(`Value` as unsigned)) AS maximum_2, MIN(cast(`Value` as unsigned)) AS minimum_2 FROM Project_IoT_1 WHERE Sensor_ID = '$string2'";
		$result_3=$mysqli->query($query_3);

		while($merker_2 = mysqli_fetch_assoc($result_3))
		{
			$maximum_2 = $merker_2['maximum_2'];
			$minimum_2 = $merker_2['minimum_2'];

			echo "<item>
			
			<title> Maximum vochtigheid sensor 2</title>
			<description> --> $maximum_2 % </description>
			</item>";
			
			echo "<item>
			
			<title> Minimum vochtigheid sensor 2</title>
			<description> --> $minimum_2 % </description>
			</item>";
		}


//stuk voor last timestamp en laatste waarde

$query_4 = "SELECT last_timestamp, last_value FROM Project_IoT_2 WHERE ID = '$string1'";
$result_4=$mysqli->query($query_4);

while($merker_3 = mysqli_fetch_assoc($result_4))
{
	$last_timestamp_1 = $merker_3['last_timestamp'];
	$last_value_1 = $merker_3['last_value'];
	$last_timestamp_1 = date('D, d M Y H:i:s O', strtotime($last_timestamp_1));

	echo "<item>
			
			<title> Laatste waarde sensor 1</title>
			<description> --> $last_value_1 °c </description>
			</item>";
			
			echo "<item>
			
			<title> Laatste timestamp sensor 1</title>
			<pubDate>  $last_timestamp_1 </pubDate>
			</item>";
}

$query_5 = "SELECT last_timestamp, last_value FROM Project_IoT_2 WHERE ID = '$string2'";
$result_5=$mysqli->query($query_5);

while($merker_4 = mysqli_fetch_assoc($result_5))
{
	$last_timestamp_2 = $merker_4['last_timestamp'];
	$last_value_2 = $merker_4['last_value'];
	$last_timestamp_2 = date('D, d M Y H:i:s O', strtotime($last_timestamp_2));

	echo "<item>
			
			<title> Laatste waarde sensor 1</title>
			<description> --> $last_value_2 % </description>
			</item>";
			
			echo "<item>
			
			<title> Laatste timestamp sensor 1</title>
			<pubDate>  $last_timestamp_2  </pubDate>
			</item>";

}




echo "</channel>";
echo "</rss>";


?>
