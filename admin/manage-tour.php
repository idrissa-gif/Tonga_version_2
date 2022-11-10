<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ofsmsaid'] == 0)) {
    header('location:logout.php');
} else {
    // Code for deleting product
    if (isset($_GET['delid'])) {
        $id = intval($_GET['delid']);
        $count = $dbh->prepare("DELETE FROM tbltours WHERE ID=:id");
        $count->bindParam(":id", $id, PDO::PARAM_INT);
        $count->execute();
        echo "<script>alert('Data deleted');</script>";
        echo "<script>window.location.href ='manage-tour.php'</script>";
    }

?>
    <!doctype html>
    <html class="no-js" lang="en">

    <head>

        <title>Manage Tour | Tonga Management System</title>

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
        <!-- x-editor CSS
    ============================================ -->
        <link rel="stylesheet" href="css/editor/select2.css">
        <link rel="stylesheet" href="css/editor/datetimepicker.css">
        <link rel="stylesheet" href="css/editor/bootstrap-editable.css">
        <link rel="stylesheet" href="css/editor/x-editor-style.css">
        <!-- normalize CSS
    ============================================ -->
        <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
        <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
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
            <div class="data-table-area mg-tb-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline13-list">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>Manage <span class="table-project-n">Tour</span></h1>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">

                                        <table id="table" data-toggle="table" data-pagination="true" data-show-pagination-switch="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar" data-show-export="true">
                                            <thead>
                                                <tr>

                                                    <th>S.NO</th>   
                                                    <th>Tour Title</th>
                                                    <th>Price</th>
                                                    <th>Operator Name</th>
                                                    <th>Country</th>
                                                    <th>Availability</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Setting</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * from tbltours";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);

                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $row) {               ?>

                                                        <tr>

                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo htmlentities($row->TourTitle); ?></td>
                                                            <td><?php echo htmlentities($row->Price); ?></td>
                                                            <td><?php echo htmlentities($row->OperatorName); ?></td>
                                                            <td><?php echo htmlentities($row->Country); ?></td>
                                                            <td><?php echo htmlentities($row->Availability); ?></td>
                                                            <td><?php echo htmlentities($row->description); ?></td>
                                                            <td><img src="images/tours/<?php echo $row->Image; ?>" width="4000px" height="3000px" value="<?php echo $row->Image; ?>"></td>
                                                            <td><a href="edit-tour-detail.php?editid=<?php echo htmlentities($row->ID); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="manage-tour.php?delid=<?php echo htmlentities($row->ID); ?>" onclick="return confirm('Do you really want to Delete ?');"> <i class="fa fa-trash-o" aria-hidden="true"></i></a></td>


                                                        </tr>
                                                <?php $cnt = $cnt + 1;
                                                    }
                                                } ?>


                                            </tbody>
                                        </table>
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
        <!-- data table JS
    ============================================ -->
        <script src="js/data-table/bootstrap-table.js"></script>
        <script src="js/data-table/tableExport.js"></script>
        <script src="js/data-table/data-table-active.js"></script>
        <script src="js/data-table/bootstrap-table-editable.js"></script>
        <script src="js/data-table/bootstrap-editable.js"></script>
        <script src="js/data-table/bootstrap-table-resizable.js"></script>
        <script src="js/data-table/colResizable-1.5.source.js"></script>
        <script src="js/data-table/bootstrap-table-export.js"></script>
        <!--  editable JS
    ============================================ -->
        <script src="js/editable/jquery.mockjax.js"></script>
        <script src="js/editable/mock-active.js"></script>
        <script src="js/editable/select2.js"></script>
        <script src="js/editable/moment.min.js"></script>
        <script src="js/editable/bootstrap-datetimepicker.js"></script>
        <script src="js/editable/bootstrap-editable.js"></script>
        <script src="js/editable/xediable-active.js"></script>
        <!-- Chart JS
    ============================================ -->
        <script src="js/chart/jquery.peity.min.js"></script>
        <script src="js/peity/peity-active.js"></script>
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