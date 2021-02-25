<?php
session_start();

if($_SESSION["email"] =="")
{
  header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Feel Good Clothing Store</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script>
					function myFunction() {
					var x = document.getElementById("cat").value;
					//document.getElementById("demo").innerHTML = "You selected: " + x;
					//alert(x);

					window.location.href="home.php?cat="+x;
					}
					</script>
 
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an text logo -->
        <!-- <h1><a href="index.html">NewBiz</a></h1> -->
        <a href="home.php" style="font-size:30px">Feel Good Clothing Store</a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="home.php">Home</a></li>
          <li><a href="shopping.php">Shop</a></li>
          <li><a href="myorders.php">My order</a></li>
          <li><a href="ViewCart.php">Cart</a></li>
          <li><a href="logout.php">Logout</a></li>
      
        </ul>
      </nav><!-- .main-nav -->

    </div>
  </header><!-- #header -->

  <!-- ======= Intro Section ======= -->
  <section id="intro" class="clearfix">
    <div class="container" data-aos="fade-up">

      <div class="intro-img" data-aos="zoom-out" data-aos-delay="200">
       
      <h2 style="color:white">SEARCH NOW</h2>
            <form method="GET" action="searching.php">
                    <div class="form-group">
                      <label for="cat" style="color:white">Select Category</label>
                      <select class="form-control" id="cat" name="cat" onchange="myFunction()" style="width:250px">

                                              
                                    <?php
                                   
                                   include 'config.php';
                              

                                    // Create connection
                                  //  $conn = new mysqli($servername, $username, $password, $dbname);
                                    // Check connection
                                    // if ($conn->connect_error) {
                                    // die("Connection failed: " . $conn->connect_error);
                                    // }

                                    $sql = "SELECT * FROM categories";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                      //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

                                      if($_GET['cat']==$row["cat_id"])
                                      {
                                        //echo "<option selected value=$row['cat_id']>$row["cat_title"]</option>";
                                      
                                        echo "<option selected value=".$row["cat_id"].">" . $row["cat_title"]. "</option>";
                                      }
                                      else{
                                        echo "<option value=".$row["cat_id"].">" . $row["cat_title"]. "</option>";
                                      }
                                    }
                                    } else {
                                    echo "0 results";
                                    }
                                    $conn->close();
                                    ?>

                                      
                                      <!-- <option>sample 1</option>
                                      <option>Sample 2</option>
                                      <option>Sample 3</option> -->
                                    </select>
                
                    </div>

                  <div class="form-group">
                  <label for="item" style="color:white">What your Looking For?</label>
                  <select class="form-control" id="item" name="item" style="width:250px">
                      <?php
                     
                     include 'config.php';
                      $id=0;
                      if(isset($_GET['cat']))

                      $id=$_GET['cat'];
                      $sql = "SELECT * FROM products where product_cat=$id";
                      echo $sql;
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

                      echo "<option value=".$row["product_title"].">" . $row["product_title"]. "</option>";

                      }
                      } else {
                      echo "0 results";
                      }
                      $conn->close();
                      ?>

                        
                        <!-- <option>sample 1</option>
                        <option>Sample 2</option>
                        <option>Sample 3</option> -->
                      </select>
                
                
                
                    </div>



<!-- 
                              <div class="form-group">
                
                                  <label for="date" style="color:white">Select Date</label>
                                  <input type="date" id="date" name="date" class="form-control" style="width:200px" required>
                    
                              </div> -->
                  
                  
                  
                  
                    <button class="btn btn-success form-control" type="submit" name="submit" style="width:300px">Search</button>
                  &nbsp;
                

            </form>

      </div>

      <div class="intro-info" data-aos="zoom-in" data-aos-delay="100">
        <h2>Welcome<br><span></span><br><?php echo $_SESSION["fname"] ?></h2>
        <div>
          <!--<a href="#about" class="btn-get-started scrollto">Get Started</a>-->
          <a href="shopping.php" class="btn-services scrollto">Shop Now</a>
        </div>
      </div>

    </div>
  </section><!-- End Intro Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
               </header>

        <div class="row about-container">

          <!-- <div class="col-lg-4 content order-lg-1 order-2">
           

          <form method="GET" action="search.php">
					<div class="row">
          <h2>Filters By price</h2>
          <hr/>
						<div class="col-md-12">
							<label for="f_name">Price range</label>
							
              <div class="radio">
                <label><input type="radio" name="price" checked>&nbsp;&nbsp;0$-50$</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="price">&nbsp;&nbsp;50$-100$</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="price">&nbsp;&nbsp;100$-200$</label>
              </div>
						</div>
						<div class="col-md-12">
							<label for="date">Select Date</label>
							<input type="text" id="l_name" name="l_name" class="form-control">
						</div>
					</div>


          </div> -->

          <div class="col-lg-12 background order-lg-2" data-aos="zoom-in">
        
          <h1>Categories</h1>
          <hr/>
          <br/>
        <div class="row">

                                  
                        <?php


                        // $un = $_SESSION["un"];
                        //echo $_SESSION["un"];

                        include 'config.php';


                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM categories";
                        $result = $conn->query($sql);

                        if ($result) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                        echo  '


                          <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200" style="margin-bottom:0px">
                          <div class="" style="margin-bottom: 10px;">
                            <div class="icon"> <a href="products1.php?cid=' . $row['cat_id'] . '"><img src="images/' . $row['cat_image'] . '" alt="restaurant" style="width:200px;height:150px"></a></div>
                            <h2 class="title"><a href="" style="font-size: 20px;">' . $row['cat_title'] . '</a></h2>
                           
                          
                          </div>
                        </div>

                        ';
                        }
                        } else {
                        echo "0 results";
                        }
                        $conn->close();
                        ?>








              </div>


          </div>
        </div>

       

      </div>
    </section><!-- End About Section -->

    
<!-- ======= Intro Section ======= -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
               </header>

        <div class="row about-container">

      

          <div class="col-lg-12 background order-lg-2" data-aos="zoom-in">
           
           

          <!-- <h1>Products</h1>
          <hr/>
          <br/>
        <div class="row">

                                  
                        <?php


                        // $un = $_SESSION["un"];
                        //echo $_SESSION["un"];

                        include 'config.php';


                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);

                        if ($result) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                        echo  '


                          <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200" style="margin-bottom:40px">
                          <div class="icon-box" style="margin-bottom: 10px;">
                            <div class="icon"> <a href="#"><img src="images/' . $row['product_image'] . '" alt="restaurant" style="width:90px;"></a></div>
                            <h2 class="title"><a href="" style="font-size: 20px;">' . $row['product_title'] . '</a></h2>
                            <h4 class="title"><a href="" style="font-size: 14px;">' . $row['product_price'] . '$</a></h4>
                            <p class="description"> ' . $row['product_desc'] . '</p>
                          
                          </div>
                        </div>

                        ';
                        }
                        } else {
                        echo "0 results";
                        }
                        $conn->close();
                        ?>








              </div>


          </div>
        </div>

        -->

      </div>
    </section><!-- End About Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">
  
            <div class="col-lg-4 col-md-6 footer-info">
              <h3>ClothingStore</h3>
              <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
            </div>
  
            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Terms of service</a></li>
                <li><a href="#">Privacy policy</a></li>
              </ul>
            </div>
  
            <div class="col-lg-3 col-md-6 footer-contact" style="color:white">
             
                  <h4>Contact Us</h4>
                  <ul>
                      <li><i class="fa fa-map-marker" aria-hidden="true" style="color:white"></i><a href="#" style="color:white">257 Rue Milton,<br>
                              H2X1V7</a></li>
                      <li><i class="fa fa-phone-square" aria-hidden="true"></i><a href="#" style="color:white">&nbsp;807-777-7777</a></li>
                      <li><a href="#" style="color:white"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;working time: Mon - Sat<br> 9AM -
                              5PM</a></li>
                      <li><a href="#" style="color:white"><i class="fa fa-envelope" aria-hidden="true"></i> Info @ gmail.com</a></li>
                  </ul>
            
  
              <div class="social-links">
                <a href="https://twitter.com/LOGIN" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="https://www.linkedin.com/login" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div>
  
            </div>
  
            <div class="col-lg-3 col-md-6 footer-newsletter">
              <h4>Our Newsletter</h4>
              <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
              <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
              </form>
            </div>
  
          </div>
        </div>
      </div>
  
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong>Feel Good Clothing Store</strong>. All Rights Reserved
        </div>
        <div class="credits">
         
          Designed by <a href="https://bootstrapmade.com/">FeelGoodClothingStore</a>
        </div>
      </div>
    </footer><!-- End Footer -->
  
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>