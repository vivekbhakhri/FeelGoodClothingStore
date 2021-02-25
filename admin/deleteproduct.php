<?php
$id=$_GET["id"];
include 'config.php';
            $usertable = "products";
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
$query = "delete from products where product_id='$id' ";//,,,
$retval = mysqli_query($con,$query);

//echo 'Data is deleted successfully.';
header('location:product.php');
?>