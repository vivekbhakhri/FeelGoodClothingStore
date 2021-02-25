
<?php
session_start();
if(!empty($_GET["quantity"])) {

      $product_id=$_GET['product_id'];
      $product_title=$_GET['product_title'];
      $product_price=$_GET['product_price'];

      $product_image=$_GET['product_image'];

      $quantity=$_GET['quantity'];
      
      $f=$_GET['fdate'];

      $t=$_GET['tdate'];
      
           $start = strtotime($f);
          $end = strtotime($t);

          $days_between = ceil(abs($end - $start) / 86400);

		//$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
		$itemArray = array($product_id=>array('product_title'=>$product_title, 'product_id'=>$product_id, 'quantity'=>$quantity, 'product_price'=>$product_price, 'product_image'=>$product_image, 'start_date'=>$f, 'end_date'=>$t, 'nod'=>$days_between));
		
         if(!empty($_SESSION["cart_item"])) 
         {
            if(in_array($product_id,array_keys($_SESSION["cart_item"]))) 
            {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($product_id == $k) {
							if(empty($_SESSION["cart_item"][$k]["quantity"])) {
								$_SESSION["cart_item"][$k]["quantity"] = 0;
							}
							$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
						}
				}
			} else {
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
			}
        } 
        else {
			$_SESSION["cart_item"] = $itemArray;
		}
   
          print_r($itemArray);
         ?>
           <script>
              
               
                alert('item added successfully');

                window.location="shopping.php";
           </script>
         <?php
    }



    
    ?>