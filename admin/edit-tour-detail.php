<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ofsmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $ofsmsaid = $_SESSION['ofsmsaid'];
        $eid = $_GET['editid'];
        $tourptitle = $_POST['tourtitle'];
        $tourprice = $_POST['price'];
        $operatorname = $_POST['operatorname'];
        $Country = $_POST['Country'];
        $Rate = $_POST['Rate'];
        $availability = $_POST['availability'];
        $description = $_POST['description'];
        

        $sql = "update tbltours set TourTitle=:tourtitle,Price=:price,OperatorName=:operatorname,Country=:Country,Rate=:Rate,Availability=:availability,description=:description where ID=:eid";
        $query = $dbh->prepare($sql);

        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->bindParam(':tourtitle', $tourptitle, PDO::PARAM_STR);
        $query->bindParam(':price', $tourprice, PDO::PARAM_STR);
        $query->bindParam(':operatorname', $operatorname, PDO::PARAM_STR);
        $query->bindParam(':Country', $Country, PDO::PARAM_STR);
        $query->bindParam(':Rate', $Rate, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':availability', $availability, PDO::PARAM_STR);
        
        $query->execute();
        echo '<script>alert("Tour has been updated")</script>';
    }
?>
    <!doctype html>
    <html class="no-js" lang="en">

    <head>

        <title>Updates Tours | Tonga Management System</title>

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
            <div class="single-product-tab-area mg-tb-15">
                <!-- Single pro tab review Start-->
                <div class="single-pro-review-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="review-tab-pro-inner">
                                    <ul id="myTab3" class="tab-review-design">
                                        <li class="active"><a href="add-products.php"><i class="fa fa-pencil" aria-hidden="true"></i> Update Tour</a></li>
                                    </ul>
                                    <form action="#" method="post" enctype="multipart/form-data">
                                        <?php
                                        $eid = $_GET['editid'];
                                        $sql = "SELECT * from tbltours where tbltours.ID=:eid";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {               ?>
                                                <div id="myTabContent" class="tab-content custom-product-edit">
                                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                                        <div class="row">
                                                            <form action="#" method="post" enctype="multipart/form-data">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="review-content-section">

                                                                        <div class="input-group mg-b-pro-edt">

                                                                            <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span><label>Tour Title</label>
                                                                            <input type="text" class="form-control" value="<?php echo $row->TourTitle; ?>" name='tourtitle' id="tourtitle" required="true">
                                                                        </div>
                                                                        <div class="input-group mg-b-pro-edt">
                                                                            <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span><label>Price</label>
                                                                            <input type="text" class="form-control" value="<?php echo $row->Price; ?>" name="price" id="price" required="true">
                                                                        </div>
                                                                        <div class="input-group mg-b-pro-edt">
                                                                            <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span><label>Operator Name</label>
                                                                            <select name="operatorname" id="operatorname" required="true" class="form-control pro-edt-select form-control-primary">
                                                                                <option value="<?php echo $row->OperatorName; ?>"><?php echo $row->OperatorName; ?></option>
                                                                                <?php

                                                                                $sql2 = "SELECT * from    tbloperator ";
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
                                                                            <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span><label>Availability</label>
                                                                            <select name="availability" id="availability" required="true" class="form-control pro-edt-select form-control-primary">
                                                                                <option value="<?php echo $row->Availability; ?>"><?php echo $row->Availability; ?></option>
                                                                                <option value="Avaibale">Available</option>
                                                                                <option value="Not Available">Not Availabe</option>

                                                                            </select>
                                                                        </div>
                                                                        <div class="input-group mg-b-pro-edt">
                                                                            <span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span><label>Rate</label>
                                                                            <input type="text" class="form-control" value="<?php echo $row->Rate; ?>" name="Rate" id="Rate" required="true">
                                                                        </div>
                                                                        <div class="input-group mg-b-pro-edt">
                                                                            <label style="padding-right: 20px">Image </label>
                                                                            <img src="images/tours/<?php echo $row->Image; ?>" width="100" height="100" value="<?php echo $row->Image; ?>"><a href="changeimage1.php?editid=<?php echo $row->ID; ?>"> &nbsp; Edit Image</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="review-content-section">

                                                                        <div class="input-group mg-b-pro-edt">
                                                                            <span class="input-group-addon"><i class="fa fa-ticket" aria-hidden="true"></i></span><label>Tour Descriptions</label>
                                                                            <textarea type="text" class="form-control" name="description" id="description" required="true"><?php echo $row->description; ?></textarea>
                                                                        </div>
                                                                        
                                                                        <div class="input-group mg-b-pro-edt">
                                                                            <span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span><label>Country</label>
                                                                            <select name="Country" id="Country" required="true" class="form-control pro-edt-select form-control-primary">
                                                                                <option value="<?php echo $row->Country; ?>"><?php echo $row->Country; ?></option>
                                                                                <?php

                                                                                $sql2 = "SELECT * from tblcountries ";
                                                                                $query2 = $dbh->prepare($sql2);
                                                                                $query2->execute();
                                                                                $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                                                                                foreach ($result2 as $row1) {
                                                                                ?>
                                                                                    <option value="<?php echo htmlentities($row1->country_name); ?>"><?php echo htmlentities($row1->country_name); ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        
                                                                        <div class="input-group mg-b-pro-edt">
                                                                            <label style="padding-right: 20px">Image1 </label>
                                                                            <img src="images/tours/<?php echo $row->Image1; ?>" width="100" height="100" value="<?php echo $row->Image1; ?>"><a href="changeimage2.php?editid=<?php echo $row->ID; ?>"> &nbsp; Edit Image</a>
                                                                        </div>
                                                                        <div class="input-group mg-b-pro-edt">
                                                                            <label style="padding-right: 20px">Image2 </label>
                                                                            <img src="images/tours/<?php echo $row->Image2; ?>" width="100" height="100" value="<?php echo $row->Image2; ?>"><a href="changeimage3.php?editid=<?php echo $row->ID; ?>"> &nbsp; Edit Image</a>
                                                                        </div>
                                                                        <div class="input-group mg-b-pro-edt">
                                                                            <label style="padding-right: 20px">Image3 </label>
                                                                            <img src="images/tours/<?php echo $row->Image3; ?>" width="100" height="100" value="<?php echo $row->Image3; ?>"><a href="changeimage4.php?editid=<?php echo $row->ID; ?>"> &nbsp; Edit Image</a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                        <?php $cnt = $cnt + 1;
                                                    }
                                                } ?>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary waves-effect waves-light m-r-10">Update
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