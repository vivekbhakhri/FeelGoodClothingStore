<?php 
  // Database
  include('config.php');
  
  // Set session
  session_start();
  if(isset($_POST['records-limit'])){
      $_SESSION['records-limit'] = $_POST['records-limit'];
  }
  
  $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 10;
  $page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
  $paginationStart = ($page - 1) * $limit;
  $authors = $connection->query("SELECT * FROM `payment` JOIN user_info on payment.uid=user_info.user_id LIMIT $paginationStart, $limit")->fetchAll();

  // Get total records
  $sql = $connection->query("SELECT count(pid) AS id FROM payment")->fetchAll();
  $allRecrods = $sql[0]['id'];
  
  // Calculate total pages
  $totoalPages = ceil($allRecrods / $limit);

  // Prev + Next
  $prev = $page - 1;
  $next = $page + 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="#" type="image/ico" />

  <title>Feel Good Clothing Store </title>

  <!-- Bootstrap -->
  <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="build/css/custom.min.css" rel="stylesheet">
  
    
  
    <style>
        .left_col {
    background: #004a99;
}

.nav-md ul.nav.child_menu li:before {
    background: #ffffff;
    bottom: auto;
    content: "";
    height: 8px;
    left: 23px;
    margin-top: 15px;
    position: absolute;
    right: auto;
    width: 8px;
    z-index: 1;
    border-radius: 50%;
}

.nav_title {
    width: 230px;
    float: left;
    background: #004a99;
    border-radius: 0;
    height: 57px;
    padding: 0px;
}

.table-success, .table-success>td, .table-success>th {
    background-color: #004a99;
}

.table th{
  
    color: #ffffff;
}

.page-link {
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #6e2c8d;
    background-color: #fff;
    border: 1px solid #dee2e6;
}
.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #743193;
    border-color: #733192;
    f: ;
}

.custom-select {
    display: inline-block;
    width: 100%;
    height: calc(1.1em + .75rem + 2px);
    padding: .375rem 1.75rem .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.0;
    color: #495057;
    vertical-align: middle;
    background: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e) no-repeat right .75rem center/8px 10px;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.table td, .table th {
    padding: .5rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.table th :hover {
   background-color: #6e2c8d;
}

    </style>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-home"></i> <span>Clothing Store</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h1 style="color: white;">Admin </h1>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="index.php">Dashboard</a></li>

                  </ul>
                </li>
                <li><a><i class="fa fa-users"></i> Add <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <?php 
                    include 'roles_menu.php';
                    ?>
                  </ul>
                </li>
                <li><a><i class="fa fa-dashboard"></i> Reports <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a href="orders.php">Customer  Orders</a></li>
                  <li><a href="payments.php">Payments</a></li>
                  </ul>
                </li>

              </ul>

            </div>
            <div class="menu_section">

            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                  data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">Admin
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
               
                  <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>

              <li role="presentation" class="nav-item dropdown open">

               
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row" style="display: inline-block;">
          <div class="tile_count">
           
           
            
          </div>
        </div>
        <!-- /top tiles -->

        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">

              <div class="row x_title">
                <div class="col-md-12">
                  <h3 style="padding:10px">Customer Order Information </h3>
                </div>
               
              </div>

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
                    <th scope="col">#Payment ID</th>
              
                    <th scope="col">User ID</th>
                    <th scope="col">User Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Card No</th>
                    <th scope="col">Exp</th>
                    <th scope="col">CVV</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php foreach($authors as $author): ?>
                <tr>
                    <!-- <td scope="row"><?php echo $author['cat_id ']; ?></td> -->
                    <td><?php echo $author['pid']; ?></td>
                    <td><?php echo $author['uid']; ?></td>
                    <td><?php echo $author['email']; ?></td>
                    <td><?php echo $author['fullname']; ?></td>
                    <td><?php echo $author['mobile']; ?></td>
                    <td><?php echo $author['address1']; ?></td>
                    <td><?php echo $author['cardno']; ?></td>
                    <td><?php echo $author['exp']; ?></td>
                    <td><?php echo $author['cvv']; ?></td>
                
                    
                    
                    <!--Edit Modal -->
                      <div class="modal fade" id="a<?php echo $author['id']; ?>" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              
                              <h4 class="modal-title">Update Order Status : <?php echo $author['id']; ?></h4>
                            </div>
                            <div class="modal-body">
                              <form  action='edit_status.php' method='GET'>
                                            <!-- <div class='form-group'>
                                          
                                           
                                           <div class="form-group row">
                                               <label class="col-form-label col-md-4 col-sm-4" style="text-align:left" for='lname'><h2 style="margin-top: 0px;text-align:left">Category Name</h2></label>
										
											    <div class="col-md-8 col-sm-8 ">
											
    											<input type="text" class="form-control has-feedback-left"  value="<?php echo $author['p_status']; ?>" name='lname<?php echo $author['id']; ?>' id='lname<?php echo $author['id']; ?>'  placeholder="Category Name">
    										
                            
                          


                          
    											</div>
										    </div>
										  
                    
                                             
                        <button type='submit' class='form-control btn btn-success'>EDIT</button>
                                           
                                           
                                              </div> -->

                                              <div class='form-group'>
                                                <label for='branch'><b>Branch</b></label>
                                                <input type='text' value="<?php echo $author['id']; ?>" name='id' id='id' class='form-control'>
                                                </div>
                                              <div class='form-group'>
                                                <label for='section'><b>Status</b></label>
                                                <!-- <input type='text' value="<?php echo $author['p_status']; ?>" name='lname' id='lname' class='form-control'> -->
                                               
                                               <select name='lname' id='lname' class='form-control'>
                                                  <option>CONFIRMED</option>
                                                  <option>ON HOLD</option>
                                                  <option>DECLINED</option>
                                               </select>
                                               
                                               
                                                </div>
                   
                                                <button type='submit' class='form-control btn btn-success'>EDIT</button>




                                        </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

                      


        <!-- Pagination -->
        <nav aria-label="Page navigation example mt-5">
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
        </nav>
              </div>
             

              <div class="clearfix"></div>
            </div>
          </div>

        </div>
        <br />

      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
     Admin Panel 
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="vendors/Flot/jquery.flot.js"></script>
  <script src="vendors/Flot/jquery.flot.pie.js"></script>
  <script src="vendors/Flot/jquery.flot.time.js"></script>
  <script src="vendors/Flot/jquery.flot.stack.js"></script>
  <script src="vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="vendors/moment/min/moment.min.js"></script>
  <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="build/js/custom.min.js"></script>

 

    <script>
        $(document).ready(function () {
            $('#records-limit').change(function () {
                $('form').submit();
            })
        });
    </script>
</body>

</html>