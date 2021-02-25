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

 
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an text logo -->
        <!-- <h1><a href="index.html">NewBiz</a></h1> -->
        <a href="index.html" style="font-size:30px">Feel Good Clothing Store</a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
        <li class="active"><a href="home.php">Home</a></li>
          <li><a href="shopping.php">Shop</a></li>
          <li><a href="myorders.php">My order</a></li>
          <li><a href="Viewcart.php">Cart</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav><!-- .main-nav -->

    </div>
  </header><!-- #header -->

  <!-- ======= Intro Section ======= -->
 
  <main id="main">

    <!-- ======= About Section ======= -->
  
<!-- ======= Intro Section ======= -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" style="margin-top:100px">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
               </header>

        <div class="row about-container">

         

                <div class="col-lg-12 background order-lg-2" data-aos="zoom-in">
                
                
                                    <h4 class="modal-title">Payment Information</h4>
                                 
                                                <form method="get" action="payment.php">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <label for="f_name">Full Name</label>
                                                        <input type="text" id="f_name" name="f_name" class="form-control" required> 
                                                    </div>
                                                    <!-- <div class="col-md-6">
                                                        <label for="f_name">Last Name</label>
                                                        <input type="text" id="l_name" name="l_name" class="form-control">
                                                    </div> -->
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="cno">Card Number</label>
                                                        <input type="text" id="cno" name="cno" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exp">Exp</label>
                                                        <input type="date" id="exp" name="exp" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="cvv">CVV</label>
                                                        <input type="password" id="cvv" name="cvv" maxlength="3" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                <br/>
                                                <input type="submit" class="btn btn-primary form-control" value="Submit" name="submit" id="submit" required>
                                                </div>
                                                </div>
                                                </form>
                                    </div>
                                    
                                    </div>
                                    
                                </div>
                                </div>




                </div>

        </div?

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