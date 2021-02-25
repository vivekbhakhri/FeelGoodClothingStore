<?php 
  // Database
  include('conn.php');
  
  // Set session
  session_start();
  if(isset($_POST['records-limit'])){
      $_SESSION['records-limit'] = $_POST['records-limit'];
  }
  
  $uid=$_SESSION['uid'];
  $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 10;
  $page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
  $paginationStart = ($page - 1) * $limit;
  $authors = $connection->query("SELECT * FROM cart where user_id='$uid'  LIMIT $paginationStart, $limit")->fetchAll();

  // Get total records
  $sql = $connection->query("SELECT count(id) AS id FROM cart ;")->fetchAll();
  $allRecrods = $sql[0]['id'];
  
  // Calculate total pages
  $totoalPages = ceil($allRecrods / $limit);

  // Prev + Next
  $prev = $page - 1;
  $next = $page + 1;
?>
<!DOCTYPE html>
<html>

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

 
<style>
.table-success tbody+tbody, .table-success td, .table-success th, .table-success thead th {
    border-color: #3b99ff;
}

.table-success, .table-success>td, .table-success>th {
  color:white;
    background-color: #3b99ff;
}

  </style>

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

         
              <div class="col-md-12 col-sm-12 ">
               
                   <!--<button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addagent"><span class="glyphicon glyphicon-plus"> </span> Add Agent</button>-->
                     <!--<span><input class="form-control" id="myInput" type="text" placeholder="Search Agent.."></span>-->
                    <!-- Select dropdown -->
                  
                        <div class="d-flex flex-row bd-highlight mb-3">
                          
                         
                         
                            <!--<form action="agent.php" method="post">-->
                            <!--    <select name="records-limit" id="records-limit" class="custom-select">-->
                            <!--        <option disabled selected>Records Limit</option>-->
                            <!--        <?php foreach([5,7,10,12] as $limit) : ?>-->
                            <!--        <option-->
                            <!--            <?php if(isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?>-->
                            <!--            value="<?= $limit; ?>">-->
                            <!--            <?= $limit; ?>-->
                            <!--        </option>-->
                            <!--        <?php endforeach; ?>-->
                            <!--    </select>-->
                            <!--</form> &nbsp;-->
                         
                        </div>


               
              
                
             
        <!-- Datatable -->
        <table class="table table-bordered table-striped mb-6" id="myTable">
            
            <thead>
                <tr class="table-success">
                <th scope="col">#Order ID</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Status</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach($authors as $author): ?>
                <tr>
                <td><?php echo $author['id']; ?></td>
                    <td><?php echo $author['p_id']; ?></td>
                    <td><?php echo $author['user_id']; ?></td>
                    <td><?php echo $author['product_title']; ?></td>
                    <td><?php echo $author['price'].'$'; ?></td>
                    <td><?php echo $author['qty']; ?></td>
                    <td><?php echo $author['total_amount'].'$'; ?></td>
                    <td><?php echo $author['status']; ?></td>
              
                  
                      
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

                      


        <!-- Pagination -->
        <!-- <nav aria-label="Page navigation example mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
                </li>

                <?php for($i = 1; $i <= $totoalPages; $i++ ): ?>
                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                    <a class="page-link" href="category.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
                <?php endfor; ?>

                <li class="page-item <?php if($page >= $totoalPages) { echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page >= $totoalPages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                </li>
            </ul>
        </nav> -->
              </div>
     
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



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
 

    <script>
        $(document).ready(function () {
            $('#records-limit').change(function () {
                $('form').submit();
            })
        });
    </script>
</body>

</html>