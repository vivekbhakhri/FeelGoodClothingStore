<?php
session_start();
include 'config.php';


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$uid=$_SESSION['uid'];
//$f=$_GET['fdate'];
//$t=$_GET['tdate'];



//echo $days_between;
foreach ($_SESSION["cart_item"] as $item){

     $total_amount=$item["quantity"]*$item["product_price"];

    $sql="insert into cart(p_id,ip_add,user_id,product_title,product_image,qty,price,total_amount,status) values ('".$item["product_id"]."','192.168.11.1','$uid','".$item["product_title"]."','".$item["product_image"]."','".$item["quantity"]."','".$item["product_price"]."',$total_amount,'Order Processing')";
   
    $sql1="update products set quantity=quantity-".$item["quantity"]." where product_id=".$item["product_id"] ;
     
    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);


    echo "$sql<br>";
}
$_SESSION["cart_item"]=null;
?>

<script>
                           
//alert('Payment done successfully');

window.location="pay.php";
</script>