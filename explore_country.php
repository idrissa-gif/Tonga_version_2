<head>
  <link rel="stylesheet" href="css/tour.css">
  <link rel="stylesheet" href="css/explore_country.css">

</head>
<div class="featured-Places-Head">
  <?php

  include("./headerAndFooter/header.php");
  include("./connection.php");
  $country = $_GET['country'];
  $query1 = "SELECT *
            FROM tblcountries where country_name='$country'";

  $result1 = mysqli_query($con, $query1);
  $row1 = mysqli_fetch_array($result1)
  ?>

</div>
<?php
include("./connection.php");
?>

<body class="HomeBody">

  <div class="container-fluid" style="z-index: -2;">
    <div class="swiper" style="z-index: 0;">
      <img src="./image/tours/<?php echo $row1['image'] ?>">
    </div>
    <h3>Welcome to <?php echo $_GET['country'] ?> Tours</h3>

  </div>

  </div>
  <!-- </div> -->

</body>

</html>
<!-- <div class='FeaturedPlaces'> -->
<div class="row">
  <?php
  $country = $_GET['country'];
  $query = "SELECT T.TourTitle , T.Price, T.Country , T.rate , T.Image , O.logo,  T.OperatorName 
            FROM `tbltours` T ,`tbloperator` O  where T.OperatorName=O.OperatorName and T.Country='$country'";

  $result = mysqli_query($con, $query);
  while ($row = mysqli_fetch_array($result)) {

  ?>

    <div class="card col-sm-3">

      <img class="card-img-top" src="./image/tours/<?php echo $row['Image'] ?>">

      <div class="card-body">

        <h4 class="card-tour-title"><?php echo $row['TourTitle'] ?></h4>
        <h5 class="card-price"><?php echo $row['Price'] ?></h5>
        <h5 class="card-title">Country: <text class="no-bold"><?php echo $row['Country'] ?></text></h5>
        <!-- <h5 class="card-title">You visit: <text class="no-bold"><?php echo $row['rate'] ?></text></h5> -->
        <!-- <h5 class="card-title">Reviews: <text class="no-bold"><?php echo $row['rate'] ?></text></h5> -->

        <a href="./explore.php?tourid=<?php echo $row['TourTitle'] ?>" class="btn btn-primary">Explore</a>
      </div>

      <div class="card-footerg">
        <p>Offered By
        <p>
          <img class="logo" src="./image/tours/<?php echo $row['logo'] ?>">
          <small class="text-muted"><?php echo $row['OperatorName'] ?></small>
      </div>

    </div>


  <?php } ?>

</div>
<!-- </div> -->
<?php
include("./headerAndFooter/footer.php");
?>