<?php
$id=$_GET["id"];
$lname=$_GET["lname"];


include 'config.php';
            $usertable = "categories";
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
$query = "update categories set cat_title='$lname' where cat_id=".$id;
$retval = mysqli_query($con,$query);

//echo 'Data is updated successfully.';
header("Location: category.php");
?>
                                       