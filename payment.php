<?php

session_start();
if(!isset($_SESSION['uid'])){
header('Location:index.php');
}

$servername = "localhost";
$dbname = "feelgoodclothingstore";
$username = "root";
$password = "";

$id=$_SESSION['uid'];
$fname=$_GET['f_name'];
$cno=$_GET['cno'];
$exp=$_GET['exp'];
$cvv=$_GET['cvv'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO payment (uid, fullname, cardno, exp, cvv)
VALUES ('$id', '$fname', '$cno','$exp','$cvv')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['status']="success";
    header('location:done.php?s=success');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>