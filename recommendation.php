<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<?php
include("./headerAndFooter/header_without_seach.php")
?>
<?php

include('admin/includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $tourptitle = $_POST['tourtitle'];
    $tourprice = $_POST['price'];
    $operatorname = $_POST['operatorname'];
    $Country = $_POST['Country'];
    $Rate = '0';
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

    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if (!in_array($extension, $allowed_extensions)) {
        echo "<script>alert('Tour image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else if (!in_array($extension1, $allowed_extensions)) {
        echo "<script>alert('Tour image1 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else if (!in_array($extension2, $allowed_extensions)) {
        echo "<script>alert('Tour image2 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else if (!in_array($extension3, $allowed_extensions)) {
        echo "<script>alert('Tour image3 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else {



        //rename tour images
        // $propic = md5($pic) . time() . $extension;
        // $propic1 = md5($pic1) . time() . $extension1;
        // $propic2 = md5($pic2) . time() . $extension2;
        // $propic3 = md5($pic3) . time() . $extension3;
        // move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $propic);
        // move_uploaded_file($_FILES["image1"]["tmp_name"], "images/" . $propic1);
        // move_uploaded_file($_FILES["image2"]["tmp_name"], "images/" . $propic2);
        // move_uploaded_file($_FILES["image3"]["tmp_name"], "images/" . $propic3);


        $sql = "insert into tbltoursuggestion(TourTitle,Price,OperatorName,Country,Rate,Image,Image1,Image2,Image3,description) values(:tourtitle,:tourprice,:operatorname,:Country,:Rate,:img,:img1,:img2,:img3,:description)";

        $query = $dbh->prepare($sql);
        echo '<script>alert("Tour detail has all .")</script>';
        $query->bindParam(':tourtitle', $tourptitle, PDO::PARAM_STR);

        $query->bindParam(':tourprice', $price, PDO::PARAM_STR);
        $query->bindParam(':operatorname', $operatorname, PDO::PARAM_STR);
        $query->bindParam(':Country', $Country, PDO::PARAM_STR);
        $query->bindParam(':Rate', $Rate, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':img', $pic, PDO::PARAM_STR);
        $query->bindParam(':img1', $pic1, PDO::PARAM_STR);
        $query->bindParam(':img2', $pic2, PDO::PARAM_STR);
        $query->bindParam(':img3', $pic3, PDO::PARAM_STR);
        $query->execute();


        $LastInsertId = $dbh->lastInsertId();
        if ($LastInsertId > 0) {
            echo '<script>alert("Tour detail has been added.")</script>';
            echo "<script>window.location.href ='recommendation.php'</script>";
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
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/owl.carousel.css">
    <link rel="stylesheet" href="admin/css/owl.theme.css">
    <link rel="stylesheet" href="admin/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="admin/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="admin/css/calendar/fullcalendar.print.min.css">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/modals.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="admin/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="admin/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>

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
                                    <li class="active"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Suggest Tour</a></li>
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
                                                                <span class="input-group-addon"><i class="fa fa-ship" aria-hidden="true"></i></span>
                                                                <input type="text" class="form-control" placeholder="Operator Name" name="operatorname" id="operatorname" required="true">
                                                            </div>


                                                            <div class="input-group mg-b-pro-edt">
                                                                <span class="input-group-addon"><i class="fas fa-globe-africa" aria-hidden="true"></i></span>
                                                                <input type="text" class="form-control" placeholder="Country" name="Country" id="Country" required="true">
                                                            </div>

                                                            <div class="input-group mg-b-pro-edt">
                                                                <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                                                                <textarea type="text" class="form-control" placeholder="Tour Description" name="description" id="description" required="true"></textarea>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="review-content-section">


                                                            <div class="input-group mg-b-pro-edt">
                                                                <span class="input-group-addon"><i class="fa fa-image" aria-hidden="true"></i></span>
                                                                <input type="file" name="image" value="" class="form-control" id="image" required="true">
                                                            </div>
                                                            <div class="input-group mg-b-pro-edt">
                                                                <span class="input-group-addon"><i class="fa fa-image" aria-hidden="true"></i></span>
                                                                <input type="file" name="image1" value="" class="form-control" id="image1" required="true">
                                                            </div>
                                                            <div class="input-group mg-b-pro-edt">
                                                                <span class="input-group-addon"><i class="fa fa-image" aria-hidden="true"></i></span>
                                                                <input type="file" name="image2" value="" class="form-control" id="image2" required="true">
                                                            </div>
                                                            <div class="input-group mg-b-pro-edt">
                                                                <span class="input-group-addon"><i class="fa fa-image" aria-hidden="true"></i></span>
                                                                <input type="file" name="image3" value="" class="form-control" id="image3" required="true">
                                                            </div>




                                                        </div>


                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                                                <button type="submit" name="submit" id="submit" class="btn btn-primary waves-effect waves-light m-r-10">Submit
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
    <?php include_once('admin/includes/footer.php'); ?>


    <!-- jquery
    ============================================ -->
    <script src="admin/js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
    ============================================ -->
    <script src="admin/js/bootstrap.min.js"></script>
    <!-- wow JS
    ============================================ -->
    <script src="admin/js/wow.min.js"></script>
    <!-- price-slider JS
    ============================================ -->
    <script src="admin/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
    ============================================ -->
    <script src="admin/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
    ============================================ -->
    <script src="admin/js/owl.carousel.min.js"></script>
    <!-- sticky JS
    ============================================ -->
    <script src="admin/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
    ============================================ -->
    <script src="admin/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
    ============================================ -->
    <script src="admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="admin/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
    ============================================ -->
    <script src="admin/js/metisMenu/metisMenu.min.js"></script>
    <script src="admin/vjs/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
    ============================================ -->
    <script src="admin/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="admin/js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
    ============================================ -->
    <script src="admin/js/calendar/moment.min.js"></script>
    <script src="admin/js/calendar/fullcalendar.min.js"></script>
    <script src="admin/js/calendar/fullcalendar-active.js"></script>
    <!-- tab JS
    ============================================ -->
    <script src="admin/js/tab.js"></script>
    <!-- plugins JS
    ============================================ -->
    <script src="admin/js/plugins.js"></script>
    <!-- main JS
    ============================================ -->
    <script src="admin/js/main.js"></script>
</body>

</html>