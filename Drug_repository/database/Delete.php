<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drug_repository";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$drugId = $_POST['drugId'];

$sql= "INSERT INTO trash SELECT * FROM drug_record WHERE Number=$drugId";
$sql2 = "DELETE FROM drug_record WHERE Number=$drugId";

if ($conn->query($sql) === TRUE) {
    $conn->query($sql2);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>