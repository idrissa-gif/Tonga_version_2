<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/explore.css">
</head>
<?php
include("../connection.php");
include("../headerAndFooter/header.php"); ?>

<?php
// $id = $_GET['editid'];

$query = "SELECT T.TourTitle , T.Price, T.Country , T.description , T.rate , T.Image , O.logo,  T.OperatorName 
           FROM `tbltours` T ,`tbloperator` O where T.OperatorName=O.OperatorName ";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
?>

<div class="box">

    <div class="m-4">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab">
                    <li class="nav-item">
                        <a href="#home" class="nav-link active" data-bs-toggle="tab">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile" class="nav-link" data-bs-toggle="tab">Rates</a>
                    </li>
                    <li class="nav-item">
                        <a href="#inclusions" class="nav-link" data-bs-toggle="tab">Inclusions</a>
                    </li>
                    <li class="nav-item">
                        <a href="#offeredby" class="nav-link" data-bs-toggle="tab">Offered By</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="home">
                        <img class="Page-img" src="./image/tours/<?php echo $row['Image']; ?>" alt="">
                        <!-- <h5 class="card-title">Overview tab content</h5> -->
                        <!-- <p><text class="no-bold">
                            s<?php echo $row['description'] ?></text></p> -->
                        <p class="card-text"><text class="no-bold"><?php echo $row['description'] ?></text></p>

                        <h5 class="card-title" style="text-align: left;">Tour Features</h5>
                        <ul>
                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <div style="float:left;"> <img src="https://cfstatic.safaribookings.com/img/svg/icons-red/icon-accomodation-mid.svg"></div>
                                    <p><b>Mid-range tour</b></p>
                                    <p style="margin-left:48px; margin-top: -15px; ">
                                        This mid-range tour uses lodges and tented camps.
                                    </p>
                                </div>

                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <div style="float:left;"> <img style="display:block;" src="https://cfstatic.safaribookings.com/img/svg/icons-red/icon-private-tour.svg"></div>
                                    <p><b>Private tour</b></p>
                                    <p style="margin-left:48px; margin-top: -15px; ">
                                        This tour will be organized exclusively for you and won't be shared with others.
                                    </p>
                                </div>

                            </li>
                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <div style="float:left;"> <img src="https://cfstatic.safaribookings.com/img/svg/icons-red/icon-departure-any-day.svg"></div>
                                    <p><b>Can start any day</b></p>
                                    <p style="margin-left:48px; margin-top: -15px; ">
                                        If availability permits, this tour can start on any day.
                                    </p>
                                </div>

                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <div style="float:left;"> <img style="display:block;" src="https://cfstatic.safaribookings.com/img/svg/icons-red/icon-customize-yes.svg"></div>
                                    <p><b>Can be customized</b></p>
                                    <p style="margin-left:48px; margin-top: -15px; ">
                                        You can request minor changes to the accommodations and destinations of this tour.
                                    </p>
                                </div>

                            </li>
                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <div style="float:left;"> <img src="https://cfstatic.safaribookings.com/img/svg/icons-red/icon-solo-travelers-no.svg"></div>
                                    <p><b>Not for solo travelers</b></p>
                                    <p style="margin-left:48px; margin-top: -15px; ">
                                        Solo travelers cannot book this private tour.


                                    </p>
                                </div>

                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <div style="float:left;"> <img style="display:block;" src="https://cfstatic.safaribookings.com/img/svg/icons-red/icon-age-all.svg"></div>
                                    <p><b>Suitable for all ages</b></p>
                                    <p style="margin-left:48px; margin-top: -15px; ">
                                        This tour is suitable for children of all ages.

                                    </p>
                                </div>

                            </li>
                        </ul>


                        <h5 class="card-title" style="text-align: left;">Activities & Transportation
                        </h5>
                        <ul>
                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <div style="float:left;">
                                        <img src="https://cfstatic.safaribookings.com/img/svg/icons-red/icon-activities.svg">
                                        <br>
                                        <br>
                                    </div>
                                    <p>Activities: <b>game drives</b></p>

                                </div>

                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <div style="float:left;">
                                        <img src="https://cfstatic.safaribookings.com/img/svg/icons-red/icon-tour-selfdriving.svg">
                                        <br>
                                        <br>
                                    </div>
                                    <p>Game drives: pop-up roof 4x4 vehicle</p>

                                </div>
                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <div style="float:left;">
                                        <img src="https://cfstatic.safaribookings.com/img/svg/icons-red/icon-road.svg">
                                        <br>
                                        <br>
                                    </div>
                                    <p>Getting around: pop-up roof 4x4 vehicle
                                    </p>

                                </div>
                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <div style="float:left;">
                                        <img src="https://cfstatic.safaribookings.com/img/svg/icons-red/icon-airport-transfer.svg">

                                    </div>
                                    <p>A transfer from and back to the airport is included
                                    </p>

                                </div>
                            </li>

                        </ul>


                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->

                    </div>

                    <div class="tab-pane fade" id="profile">


                    </div>

                    <div class="tab-pane fade" id="inclusions">
                        <h5 class="card-title" style="text-align: left;">Included</h5>
                        <ul>
                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <p>Park-fees</p>
                                    <p style="margin-top: -15px; color:grey;">
                                        (For non-residents)
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <p>All Activities</p>
                                    <p style="margin-top: -15px; color:grey;">
                                        (Unless labeled as optional)
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <p>All Accomodation</p>
                                    <p style="margin-top: -15px; color:grey;">
                                        (Unless listed as upgrade)
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <p>A professional driver/guide</p>
                                </div>
                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <p>All Taxes/VAT</p>
                                </div>
                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <p>Roundtrip airport transfer
                                    </p>
                                </div>
                            </li>
                        </ul>

                        <h5 class="card-title" style="text-align: left;">Excluded</h5>
                        <ul>
                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <p>Additional accommodation before and at the end of the tour
                                    </p>

                                </div>
                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <p>Tips</p>
                                    <p style="margin-top: -15px; color:grey;">
                                        (Tipping guideline US$10.00 pp per day)
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <p>Personal Items</p>
                                    <p style="margin-top: -15px; color:grey;">
                                        (Souvenirs, travel insurance, visa fees, etc.)
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <p>A professional driver/guide</p>
                                </div>
                            </li>

                            <li>
                                <div class="content" style="text-align: left; overflow:auto; ">
                                    <p>Government imposed increase of taxes and/or park fees
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>


                    <div class="tab-pane fade" id="offeredby">
                        <div class="container">
                            <div class="title text-center">
                                <h5 class="card-title" style="text-align: left;">This tour is offered by</h5>
                            </div>
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="Page-img" src="./image/tours/<?php echo $row['Image']; ?>" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h5 style="text-align: left;"><?php echo $row['OperatorName'] ?></h5>
                                            </div>
                                            <p class="card-text">
                                            <p style="text-align: left;">Offices In: <?php echo $row['Country'] ?></h5>
                                            <p style="text-align: left;">Size: <?php echo $row['Country'] ?></h5>
                                            <p style="text-align: left;">Tour Types: <?php echo $row['Country'] ?></h5>
                                            <p style="text-align: left;">Destinations: <?php echo $row['Country'] ?></h5>
                                            </p>


                                        </div>

                                    </div>


                                </div>
                                <p class="card-text" style="text-align: left;">
                                    <?php echo $row['description'] ?>
                                </p>


                                <h5 class="card-title" style="text-align: left; font-weight:bold">
                                    <hr>    Reviews <?php echo $row['Country'] ?>
                                    <hr>
                                </h5>


                                <div class="row">

                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <div class="content" style="text-align: left; overflow:auto; ">
                                                    <div style="float:left;"> <img style=" width:30px; height:30px; margin-right:20px" src="../images/usericon.png"></div>
                                                    <p><?php echo $row['OperatorName'] ?></p>

                                                </div>
                                                <p class="card-text">
                                                <p style="text-align: left;">Offices In: <?php echo $row['Country'] ?></h5>
                                                <p style="text-align: left;">Size: <?php echo $row['Country'] ?></h5>
                                                <p style="text-align: left;">Tour Types: <?php echo $row['Country'] ?></h5>
                                                <p style="text-align: left;">Destinations: <?php echo $row['description'] ?></h5>
                                                </p>


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
    </div>


</div>
<h5>Disclaimer</h5>
<ul>
    <li>This tour is offered by Safari Soles, not SafariBookings.
    </li>
    <li>This operator reserves the right to change rates advertised on SafariBookings.
    </li>
    <li>If you request changes to this tour, the advertised rates will likely change.
    </li>
    <li>The exact order, contents and rates of this tour is subject to availability.
    </li>
    <li>If an accommodation is fully booked, the operator will suggest a comparable alternative.
    </li>
</ul>
<!-- Tabs content -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>