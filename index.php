<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FeelGoodClothingStore</title>
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

					window.location.href="index.php?cat="+x;
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
        <a href="index.php" style="font-size:30px">Feel Good Clothing Store</a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="about.html">About Us</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="login.html">Login</a></li>
          <li><a href="admin.html">Admin</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </nav><!-- .main-nav -->

    </div>
  </header><!-- #header -->

  <!-- ======= Intro Section ======= -->
  <section id="intro" class="clearfix">
    <div class="container" data-aos="fade-up">

      <div class="intro-img" data-aos="zoom-out" data-aos-delay="200">
        <!-- <img src="assets/img/intro-img.svg" alt="" class="img-fluid"> -->

        <h2 style="color:white">SEARCH NOW</h2>
            <form method="GET" action="searching1.php">
                    <div class="form-group">
                      <label for="cat" style="color:white">Select Category</label>
                      <select class="form-control" id="cat" name="cat" onchange="myFunction()" style="width:250px">

                                              
                                    <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "feelgoodclothingstore";

                                    // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    // Check connection
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }

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
                      $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $dbname = "feelgoodclothingstore";


                      // Create connection
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      // Check connection
                      if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                      }
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
                    
                              </div>
                   -->
                  
                  
                  
                    <button class="btn btn-success form-control" type="submit" name="submit" style="width:300px">Search</button>
                  &nbsp;
                

            </form>
      </div>

      <div class="intro-info" data-aos="zoom-in" data-aos-delay="100">
        <h2>We're here to<br><span>solve</span><br>solve everyday Shopping Needs!</h2>
        <div>
          <!--<a href="#about" class="btn-get-started scrollto">Get Started</a>-->
          <a href="shop.php" class="btn-services scrollto">Shop Now</a>
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
                            <div class="icon"> <a href="products.php?cid=' . $row['cat_id'] . '"><img src="images/' . $row['cat_image'] . '" alt="restaurant" style="width:200px;height:150px"></a></div>
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
                          <div class="" style="margin-bottom: 10px;">
                            <div class=""> <a href=""><img src="images/' . $row['product_image'] . '" alt="restaurant" style="width:200px;height:150px"></a>
                            
                            <h2 class="title" style="text-align:center;margin:10px"><a href="" style="font-size: 20px;">' . $row['product_title'] . '</a></h2>
                             
                            </div>
                           
                          </div>
                            <br/>
                          
                          
                        
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
        </div> -->

       

      </div>
    </section><!-- End About Section -->

    <!-- ======= Contact Section ======= -->
    <!-- <section id="contact">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="map mb-4 mb-lg-0">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-5 info">
                <i class="ion-ios-location-outline"></i>
                <p>A108 Adam Street, NY 535022</p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p>info@example.com</p>
              </div>
              <div class="col-md-3 info">
                <i class="ion-ios-telephone-outline"></i>
                <p>+1 5589 55488 55</p>
              </div>
            </div>

            <div class="form">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section>End Contact Section -->

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