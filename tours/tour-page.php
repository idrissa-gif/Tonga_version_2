<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/tour-page.css">
</head>
<?php
include("../connection.php");
include("../headerAndFooter/header.php"); ?>
<?php
$id = $_GET['editid'];

$query = "SELECT T.TourTitle , T.Price, T.Country , T.description , T.rate , T.Image , O.logo,  T.OperatorName FROM `tbltours` T ,`tbloperator` O where T.OperatorName=O.OperatorName AND T.ID='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
?>

<div class="Page-Main">
    <img class="Page-img" src="../image/tours/<?php echo $row['Image']; ?>" alt="">
</div>
<!-- Tabs navs -->
<ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview-tabs" role="tab" aria-controls="overview-tabs" aria-selected="true">Overview</a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="nav-link" id="" data-bs-toggle="tab" href="#rates-tabs" role="tab" aria-controls="rates-tabs" aria-selected="true">Rates</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="" data-bs-toggle="tab" href="#inclusions-tabs" role="tab" aria-controls="inclusions-tabs" aria-selected="true">Inclusions</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="" data-bs-toggle="tab" href="#getting-there-tabs" role="tab" aria-controls="getting-there-tabs" aria-selected="true">Getting There</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="" data-bs-toggle="tab" href="#offered-by-tabs" role="tab" aria-controls="offered-by-tabs" aria-selected="true">Offered By</a>
    </li>
</ul>
<!-- Tabs navs -->

<!-- Tabs content -->
<div class="tab-content" id="ex1-content">
    <div class="tab-pane fade show active" id="overview-tabs" role="tabpanel" aria-labelledby="overview-tab">
        <p class="card-text"><?php echo $row['description'] ?></p>
        <div class="tour__content__block tour__content__block--consider avoid-break-p">
            <h2>Tour Features</h2>
            <hr>


            <div class="row">
                <div class="col col-12 col-t-6 item  ">
                    <div class="svg-box">
                        <img src="../image/tours/icon-accomodation-mid.svg" alt="">
                    </div>
                    <h5>Mid-range tour</h5>
                    <p><?php echo $row['mid_range'] ?></p>
                </div>
                <div class="col col-12 col-t-6 item  ">
                    <div class="svg-box">
                        <img src="../image/tours/icon-group-mid.svg" alt="">
                    </div>
                    <h5>Shared tour</h5>
                    <p>On this shared tour, you will join a group of other travelers.
                        Max 9 people per vehicle.</p>
                </div>
                <div class="col col-12 col-t-6 item  hide show-t  ">
                    <div class="svg-box">
                        <img src="../image/tours/icon-departure-any-day.svg" alt="">
                    </div>
                    <h5>Can start any day</h5>
                    <p>If availability permits, this tour can start on any day.</p>
                </div>
                <div class="col col-12 col-t-6 item  ">
                    <div class="svg-box">
                        <img src="../image/tours/icon-customize-no.svg" alt="">
                    </div>
                    <h5>Cannot be customized</h5>
                    <p>The contents of this tour cannot be changed.</p>
                </div>
                <div class="col col-12 col-t-6 item  ">
                    <div class="svg-box">
                        <img src="../image/tours/icon-solo-travelers-no.svg" alt="">
                    </div>
                    <h5>Not for single travelers</h5>
                    <p>Single travelers cannot join this group tour.</p>
                </div>
                <div class="col col-12 col-t-6 item  ">
                    <div class="svg-box">
                        <img src="../image/tours/icon-age-plus.svg" alt="">

                    </div>
                    <h5>Minimum age of <?php echo $row['age'] ?> years</h5>
                    <p>The minimum age for this tour is <?php $row['age'] ?> years.</p>
                </div>
            </div>

        </div>
        <div class="tour__content__block tour__content__block--activities avoid-break-p">
            <h2>Activities &amp; Transportation</h2>
            <hr>

            <ul>
                <li>
                    <div>
                        <picture>
                            <img src="../image/tours/icon-activities.svg" alt="">
                        </picture>
                    </div>
                    <span>
                        Activities: <b>game drives</b>
                    </span>
                </li>
                <li>
                    <div>
                        <picture>
                            <img src="../image/tours/icon-tour-selfdriving.svg" alt="">
                        </picture>
                    </div>
                    <span>
                        Game drives: <a href="#" class="help image textual" data-val="https://cfstatic.safaribookings.com/images/vehicles/open-sided-4x4-vehicle.jpg" title="">open-sided 4x4 vehicle</a>
                    </span>
                </li>
                <li>
                    <div>
                        <picture>
                            <img src="../image/tours/icon-road.svg" alt="">
                        </picture>
                    </div>
                    <span>
                        Getting around: open-sided 4x4 vehicle &amp; minivan
                    </span>
                </li>
                <li class="hide-544">
                    <div>
                        <picture>
                            <img src="../image/tours/icon-internationaal-flight.svg" alt="">
                        </picture>
                    </div>
                    <span>
                        Book your own international flights when using this operator <a href="#" title="If a tour operator cannot book your international flights, it will pick you up from the airport and take care of all further transportation, in most cases. All you'll have to do is book the flight yourself using a website such as Skyscanner.com. Please be sure to contact the operator upfront to confirm availability, dates and pick-up service." class="help">help</a>
                    </span>
                </li>
                <li>
                    <div>
                        <picture>
                            <img src="../image/tours/icon-airport-transfer.svg" alt="">
                        </picture>
                    </div>
                    <span>
                        A <b>transfer</b> from and back to the airport is included
                    </span>
                </li>

            </ul>

        </div>
        
    </div>
    <div class="tab-pane fade show" id="rates-tabs" role="tabpanel" aria-labelledby="rates-tab">
        Tab 3 content
    </div>
    <div class="tab-pane fade show" id="inclusions-tabs" role="tabpanel" aria-labelledby="inclusions-tab">
        Tab 4 content
    </div>
    <div class="tab-pane fade show" id="rates-tabs" role="tabpanel" aria-labelledby="rates-tab">
        Tab 5 content
    </div>
    <div class="tab-pane fade show" id="getting-there-tabs" role="tabpanel" aria-labelledby="getting-there-tab">
        Tab 6 content
    </div>
    <div class="tab-pane fade show" id="offered-by-tabs" role="tabpanel" aria-labelledby="offered-by-tab">
        Tab 7 content
    </div>
</div>
<!-- Tabs content -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>