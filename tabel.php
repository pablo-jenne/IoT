
<?php

include "./database_connection.php";

if(isset($_POST["sensoren"]))
{
    if(isset($_POST["waarde"]))
    {
      
          $waarde = $_POST["waarde"];
          $sensor = $_POST["sensoren"];
          if($sensor > 0)
          {
          $stmt = $mysqli->prepare('INSERT INTO Project_IoT_1 ( Value,Sensor_ID) VALUES (?,?);');
          $stmt->bind_param('ss', $waarde, $sensor );

          if($sensor == 1){
          $sql =$mysqli->query ("UPDATE Project_IoT_2  SET Name='temperatuur', last_timestamp = now(), external_IP='$ip', last_value='$waarde'  WHERE ID='$sensor'" );
          }
          if($sensor == 2){
            $sql =$mysqli->query ("UPDATE Project_IoT_2  SET Name='vochtigheid', last_timestamp = now(), external_IP='$ip', last_value='$waarde'  WHERE ID='$sensor'" );
          }
          if($sensor == 3){
            $sql =$mysqli->query ("UPDATE Project_IoT_2  SET Name='temp_api', last_timestamp = now(), external_IP='$ip', last_value='$waarde'  WHERE ID='$sensor'" );
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

if(isset($_GET["sensor"]) && isset($_GET["waarde"]) && isset($_GET["tijd"])){
  $sensor = $_GET["sensor"];
  $waarde = $_GET["waarde"];
  $tijd = $_GET["tijd"];

  if($sensor == 'null'){
    $sensor = null;
  }
  if($waarde == 'null'){
    $waarde = null;
  }
  if($tijd == 'null'){
    $tijd = null;
  }

  // sensor ingevult
  if($sensor !== null && $waarde == null && $tijd == null){
    $query = "SELECT * FROM Project_IoT_1 WHERE Sensor_ID = '$sensor'";
  }
  // waarde ingevult
  if($waarde !== null && $tijd == null && $sensor == null){
    $query = "SELECT * FROM Project_IoT_1 WHERE `Value` = '$waarde'";
  }
  // tijd ingevult
  if($tijd !== null && $sensor == null && $waarde == null){
    $query = "SELECT * FROM Project_IoT_1 WHERE (`Timestamp` BETWEEN '$tijd 00:00:00' AND '$tijd 23:59:59')";
  }
  //-----
  // tijd en sensor ingevult
  if($tijd !== null && $sensor !== null && $waarde == null){
    $query = "SELECT * FROM Project_IoT_1 WHERE Sensor_ID = '$sensor' AND (`Timestamp` BETWEEN '$tijd 00:00:00' AND '$tijd 23:59:59')";
  }
  // tijd en waarde ingevult
  if($tijd !== null && $waarde !== null && $sensor == null){
    $query = "SELECT * FROM Project_IoT_1 WHERE `Value` = '$waarde' AND (`Timestamp` BETWEEN '$tijd 00:00:00' AND '$tijd 23:59:59')";
  }
  // sensor en waarde ingevult
  if($waarde !== null && $sensor !== null && $tijd == null){
    $query = "SELECT * FROM Project_IoT_1 WHERE Sensor_ID = '$sensor' AND `Value` = '$waarde'";
  }
  //-----
  // alles ingevult
  if($tijd !== null && $sensor !== null && $waarde !== null){
    $query = "SELECT * FROM Project_IoT_1 WHERE Sensor_ID = '$sensor' AND `Value` = '$waarde' AND (`Timestamp` BETWEEN '$tijd 00:00:00' AND '$tijd 23:59:59')";
  }
}
else{
    $query = "SELECT * FROM Project_IoT_1";
}
    $result=$mysqli->query($query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pablo Jenne - Tabel</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=94b35d3973d4270f77b2f22463b3c4b8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css?h=b077f3d66f4dd45a76529f02462151f3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="assets/css/scroll.css">
    <link rel="icon" type="image/png" href="assets/favicon/tabel.ico">
</head>

<body id="page-top" style="background-color: rgb(245,246,249);">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="d-md-flex justify-content-md-center align-items-md-center contner_blue_btn"><a class="btn btn-primary btn-sm d-none d-sm-inline-block btn_blue" href="chart"><i class="fa fa-area-chart fa-sm" style="font-size: 20px;"></i>&nbsp;<strong>Chart</strong></a></div>
            </div>
        </div>
    </div>
    <?php require './Sensor_select.php' ?>
    <!-- <div class="container cnter" data-aos="fade" data-aos-duration="250" data-aos-delay="300" data-aos-once="true"> -->
    <div class="container cnter">
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Timestamp</th>
      <th scope="col">Waarde</th>
      <th scope="col">Sensor</th>
    </tr>
  </thead> 
  <tbody>
  <?php 

    for($i = 0; $i < $result->num_rows; $i++){ 
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

    <?php
    if($result->num_rows == 0){
    echo '<tr>
          <td>No data found</td>
          <td>No data found</td>
          <td>No data found</td>
        </tr>';

    }
    ?>
  </tbody>
</table></div>
    <script src="./tabel.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="assets/js/script.min.js?h=18fe68f0705c8406526241782e51b538"></script>
</body>

</html>