<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ofsmsaid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {

    $ofsmsaid = $_SESSION['ofsmsaid'];
    $opname = $_POST['operatorname'];
    $office = $_POST['operatoroffice'];
    $size = $_POST['operatorsize'];
    $destination = $_POST['destinations'];
    $tourType = $_POST['tourtype'];

    $logo = $_FILES["logo"]["name"];
    $extension = substr($logo, strlen($logo) - 4, strlen($logo));
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
    if (!in_array($extension, $allowed_extensions)) {
      echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else {
      //$logo = md5($logo) . time() . $extension;
      //move_uploaded_file($_FILES["logo"]["tmp_name"], "images/" . $logo);
      $sql = "insert into tbloperator(OperatorName,Logo,OperatorOffice,size,tour_type,destinations) values(:opname,:logo,:operatoroffice,:size,:tour_type,:destination)";

      $query = $dbh->prepare($sql);
      $query->bindParam(':opname', $opname, PDO::PARAM_STR);
      $query->bindParam(':logo', $logo, PDO::PARAM_STR);
      $query->bindParam(':operatoroffice', $office, PDO::PARAM_STR);
      $query->bindParam(':size', $size, PDO::PARAM_STR);
      $query->bindParam(':tour_type', $tourType, PDO::PARAM_STR);
      $query->bindParam(':destination', $destination, PDO::PARAM_STR);

      $query->execute();

      $LastInsertId = $dbh->lastInsertId();
      if ($LastInsertId > 0) {
        echo '<script>alert("Operator has been added.")</script>';
        echo "<script>window.location.href ='add-operator.php'</script>";
      } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
      }
    }
  }
?>
  <!doctype html>
  <html class="no-js" lang="en">

  <head>

    <title>ADD Operator | Tonga Management System</title>

    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="css/modals.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  </head>

  <body>

    <?php include_once('includes/sidebar.php'); ?>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
      <?php include_once('includes/header.php'); ?>

      <!-- Basic Form Start -->
      <div class="basic-form-area mg-tb-15">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="sparkline12-list">
                <div class="sparkline12-hd">
                  <div class="main-sparkline12-hd">
                    <h1>Add Operators</h1>
                  </div>
                </div>
                <div class="sparkline12-graph">
                  <div class="basic-login-form-ad">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="all-form-element-inner">
                          <form action="#" method="post" enctype="multipart/form-data">
                            <div class="form-group-inner">
                              <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label class="login2 pull-right pull-right-pro">Operator Name</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                  <input type="text" name="operatorname" id="operatorname" value="" required="true" class="form-control" />
                                </div>
                              </div>
                            </div>
                            <div class="form-group-inner">
                              <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label class="login2 pull-right pull-right-pro">Operator Office</label>
                                </div>
                                <div class="input-group mg-b-pro-edt">
                              <span class="input-group-addon"><i class="fa fa-flag-o" aria-hidden="true"></i></span>
                              <select name="operatoroffice" id="operatoroffice" required="true" class="form-control pro-edt-select form-control-primary">
                                <option value="opt1">Select Country</option>
                                <?php

                                $sql5 = "SELECT * from tblcountries";
                                $query5 = $dbh->prepare($sql5);
                                $query5->execute();
                                $result5 = $query5->fetchAll(PDO::FETCH_OBJ);

                                foreach ($result5 as $row2) {
                                ?>
                                  <option value="<?php echo htmlentities($row2->country_name); ?>"><?php echo htmlentities($row2->country_name); ?></option>
                                <?php } ?>
                              </select>
                            </div>
                              </div>
                            </div>
                            
                            <div class="form-group-inner">
                              <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label class="login2 pull-right pull-right-pro">Operator Size</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                  <input type="text" name="operatorsize" id="operatorsize" value="" required="true" class="form-control" />
                                </div>
                              </div>
                            </div>

                            <div class="form-group-inner">
                              <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label class="login2 pull-right pull-right-pro">Tour Types</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                  <input type="text" name="tourtype" id="tourtype" value="" required="true" class="form-control" />
                                </div>
                              </div>
                            </div>

                            <div class="form-group-inner">
                              <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label class="login2 pull-right pull-right-pro">Destinations</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                  <input type="text" name="destinations" id="destinations" value="" required="true" class="form-control" />
                                </div>
                              </div>
                            </div>

                            <div class="form-group-inner">
                              <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label class="login2 pull-right pull-right-pro">Operator Logo</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                  <input type="file" name="logo" required="true" id="logo" class="form-control" />
                                </div>
                              </div>
                            </div>

                        </div>

                        <div class="form-group-inner">
                          <div class="login-btn-inner">
                            <div class="row">
                              <div class="col-lg-3"></div>
                              <div class="col-lg-9">
                                <div class="login-horizental cancel-wp pull-left">
                                  <button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="submit" id="submit">Add</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Basic Form End-->
    <?php include_once('includes/footer.php'); ?>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
  </body>

  </html>
<?php }  ?>