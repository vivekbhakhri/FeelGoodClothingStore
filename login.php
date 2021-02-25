<?php
session_start();

include 'config.php';

$un = $_POST['email'];
$pass = $_POST['pass'];




$sql = "SELECT user_id,email,password,first_name FROM user_info where email='$un' and password='$pass' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

   // fetch data
   $uid = mysqli_fetch_array($result);
   $_SESSION['fname']=$uid['first_name'];
   
   $_SESSION['uid']=$uid['user_id'];
   $_SESSION['id'] = $uid['user_id'];
  $_SESSION["email"] = $un;
  header('Location:home.php');
} else {
  echo "Invalid Details";
}
$conn->close();
?>