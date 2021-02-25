<?php
$id=$_GET["id"];
$lname=$_GET["lname"];


include 'config.php';
            $usertable = "products";
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
$query = "update products set quantity='$lname' where product_id=".$id;
$retval = mysqli_query($con,$query);

//echo 'Data is updated successfully.';
header("Location: product.php");
?>
                                       