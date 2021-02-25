<?php

$servername="localhost";
 $username = "root";
 $password = "";
$dbname="feelgoodclothingstore";





$con= new mysqli($servername, $username, $password, $dbname);
 //mysql_select_db($dbname);

if($con->connect_error)
{die("Connection failed" .$con->connect_error);}




$user=$_GET["un"];
$password=$_GET["pass"];


 
$sql=mysqli_query($con,"SELECT * FROM table_admin WHERE name='$user' AND pass= '$password'");



 $rows = mysqli_num_rows($sql);
     
    if($rows>0) { 
        //echo "success"; 
session_start();
  $_SESSION['username'] = $user; // $_SESSION['loggedin'] = true or false would work too
  $_SESSION['mypassword'] = $password;// Why store the password in session data?


header("location:admin/index.php");
    }
    else  {
        echo "Invalid Details"; 
    }

?>