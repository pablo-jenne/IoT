<?php

$servername = "localhost";
$username = "student_11901508";
$password = "A41ElR69gqFd";
$database_naam = "student_11901508";
$mysqli = mysqli_connect($servername, $username, $password, $database_naam);


if (!$mysqli) {
    header("Location: ./IP_adress.php?databaseerr");
}

?>