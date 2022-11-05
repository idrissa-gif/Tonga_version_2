<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ofsmsaid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {

    $ofsmsaid = $_SESSION['ofsmsaid'];
    $tourptitle = $_POST['tourtitle'];
    $tourprice = $_POST['price'];
    $operatorname = $_POST['operatorname'];
    $Country = $_POST['Country'];
    $Rate = $_POST['Rate'];
    $availability = $_POST['availability'];
    $description = $_POST['description'];
    $Image = $_POST['Image'];
    
    //Tour Image
    $pic = $_FILES["image"]["name"];
    $extension = substr($pic, strlen($pic) - 4, strlen($pic));
    //Tour  Image 1
    $pic1 = $_FILES["image1"]["name"];
    $extension1 = substr($pic1, strlen($pic1) - 4, strlen($pic1));
    //Tour  Image 2
    $pic2 = $_FILES["image2"]["name"];
    $extension2 = substr($pic2, strlen($pic2) - 4, strlen($pic2));
    //Tour  Image 3
    $pic3 = $_FILES["image3"]["name"];
    $extension3 = substr($pic3, strlen($pic3) - 4, strlen($pic3));
    // allowed extensions
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
    //check the existence of the country
    $sql3 = "SELECT * from tblcountries where country_name=:country";
    $query3 = $dbh->prepare($sql3);
    $query3->bindParam(':country', $Country, PDO::PARAM_STR);
    $query3->execute();
    $result3 = $query3->fetchAll(PDO::FETCH_OBJ);
    if (!$result3) {
      echo '<script>alert("The country is not presence in the valid countries. Please try again")</script>';
    }
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    else if (!in_array($extension, $allowed_extensions)) {
      echo "<script>alert('Tour image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }
    else if (!in_array($extension1, $allowed_extensions)) {
      echo "<script>alert('Tour image1 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }
    else if (!in_array($extension2, $allowed_extensions)) {
      echo "<script>alert('Tour image2 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }
    else if (!in_array($extension3, $allowed_extensions)) {
      echo "<script>alert('Tour image3 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else {

     
      //rename tour images
      $propic = md5($pic) . time() . $extension;
      $propic1 = md5($pic1) . time() . $extension1;
      $propic2 = md5($pic2) . time() . $extension2;
      $propic3 = md5($pic3) . time() . $extension3;
      move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $propic);
      move_uploaded_file($_FILES["image1"]["tmp_name"], "images/" . $propic1);
      move_uploaded_file($_FILES["image2"]["tmp_name"], "images/" . $propic2);
      move_uploaded_file($_FILES["image3"]["tmp_name"], "images/" . $propic3);

      $sql = "insert into tbltours(TourTitle,Price,OperatorName,Country,Rate,Availability,Image,Image1,Image2,Image3,description) values(:tourtitle,:tourprice,:operatorname,:Country,:Rate,:availability,:img,:img1,:img2,:img3,:description)";
      $query = $dbh->prepare($sql);
      $query->bindParam(':tourtitle', $tourptitle, PDO::PARAM_STR);
      $query->bindParam(':tourprice', $price, PDO::PARAM_STR);
      $query->bindParam(':operatorname', $operatorname, PDO::PARAM_STR);
      $query->bindParam(':Country', $Country, PDO::PARAM_STR);
      $query->bindParam(':Rate', $Rate, PDO::PARAM_STR);
      $query->bindParam(':description', $description, PDO::PARAM_STR);
      $query->bindParam(':availability', $availability, PDO::PARAM_STR);
      $query->bindParam(':img', $propic, PDO::PARAM_STR);
      $query->bindParam(':img1', $propic1, PDO::PARAM_STR);
      $query->bindParam(':img2', $propic2, PDO::PARAM_STR);
      $query->bindParam(':img3', $propic3, PDO::PARAM_STR);
      $query->execute();

      $LastInsertId = $dbh->lastInsertId();
      if ($LastInsertId > 0) {
        echo '<script>alert("Tour detail has been added.")</script>';
        echo "<script>window.location.href ='add-tour.php'</script>";
      } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
      }
    }
  }
?>
  <!doctype html>
  <html class="no-js" lang="en">

  <head>

    <title>ADD TOUR | Tonga Management System</title>

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
    <div class="all-content-wrapper" >
      <?php include_once('includes/header.php'); ?>

      <!-- Basic Form Start -->
      <div class="single-product-tab-area mg-tb-15">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
          <div class="container-fluid">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-tab-pro-inner">
                    <ul id="myTab3" class="tab-review-design">
                      <li class="active"><a href="add-tour.php"><i class="fa fa-pencil" aria-hidden="true"></i> Add Tour</a></li>
                    </ul>
                    <form action="#" method="post" enctype="multipart/form-data">
                      <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                          <div class="row">
                            <form action="#" method="post" enctype="multipart/form-data">
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="review-content-section">

                                  <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="Tour Title" name='tourtitle' id="tourtitle" required="true">
                                  </div>
                                  <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="Price" name="price" id="price" required="true">
                                  </div>
                                  <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                                    <select name="operatorname" id="operatorname" required="true" class="form-control pro-edt-select form-control-primary">
                                      <option value="opt1">Select Tour Operator</option>
                                      <?php

                                      $sql2 = "SELECT * from tbloperator";
                                      $query2 = $dbh->prepare($sql2);
                                      $query2->execute();
                                      $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($result2 as $row1) {
                                      ?>
                                        <option value="<?php echo htmlentities($row1->OperatorName); ?>"><?php echo htmlentities($row1->OperatorName); ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                  <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                                    <select name="availability" id="availability" required="true" class="form-control pro-edt-select form-control-primary">
                                      <option value="">Select Availability</option>
                                      <option value="avalaible">Availabe</option>
                                      <option value="Not Available">Not Available</option>
                                    </select>
                                  </div>
                                  <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-ticket" aria-hidden="true"></i></span>
                                    <textarea type="text" class="form-control" placeholder="Tour Description" name="description" id="description" required="true"></textarea>
                                  </div>

                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="review-content-section">


                                  <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                                    <input type="file" name="image" value="" class="form-control" id="image" required="true">
                                  </div>
                                  <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                                    <input type="file" name="image1" value="" class="form-control" id="image1" required="true">
                                  </div>
                                  <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                                    <input type="file" name="image2" value="" class="form-control" id="image2" required="true">
                                  </div>
                                  <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                                    <input type="file" name="image3" value="" class="form-control" id="image3" required="true">
                                  </div>
                                  <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fas fa-globe-africa"></i></span>
                                    <input type="text" class="form-control" placeholder="Country" name="Country" id="Country" required="true">
                                  </div>
                                  <div class="input-group mg-b-pro-edt">
                                    <span class="input-group-addon"><i class="fas fa-globe-africa"></i></span>
                                    <input type="text" class="form-control" placeholder="Rate" name="Rate" id="Rate" required="true">
                                  </div>
                                </div>


                              </div>

                              <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary waves-effect waves-light m-r-10">Add
                                    </button>
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
    <!-- morrisjs JS
    ============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
    ============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- tab JS
    ============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
    ============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
    ============================================ -->
    <script src="js/main.js"></script>
  </body>

  </html>
<?php }  ?>