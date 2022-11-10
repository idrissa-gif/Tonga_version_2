<head>
  <link rel="stylesheet" href="../css/tour.css">
</head>
<?php
include("../connection.php");
include("../headerAndFooter/header.php"); ?>

<!-- <div class='FeaturedPlaces'> -->
<div class="row">
  <?php

  $query = "SELECT T.TourTitle , T.Price, T.Country , T.description , T.rate , T.Image , O.logo,  T.OperatorName FROM `tbltours` T ,`tbloperator` O where T.OperatorName=O.OperatorName";
  $result = mysqli_query($con, $query);
  while ($row = mysqli_fetch_array($result)) {
    
  ?>

    <div class="card col-sm-6">

      <img class="card-img-top" src="../image/tours/<?php echo $row['Image'] ?>">

      <div class="card-body">

        <h4 class="card-tour-title"><?php echo $row['TourTitle'] ?></h4>
        <h5 class="card-price"><?php echo $row['Price'] ?></h5>
        <h5 class="card-title"><?php echo $row['Country'] ?>: <text class="no-bold"><?php echo $row['country'] ?></text></h5>
        <p class="card-text"><?php echo $row['description'] ?></p>
        <h5 class="card-title">You visit: <text class="no-bold"><?php echo $row['rate'] ?></text></h5>
        <h5 class="card-title">Reviews: <text class="no-bold"><?php echo $row['rate'] ?></text></h5>

        <a href="krugerpark.html" class="btn btn-primary">Explore</a>
      </div>

      <div class="card-footerg">
        <p>Offered By
        <p>
          <img class="logo" src="../image/tours/<?php echo $row['logo'] ?>">
          <small class="text-muted"><?php echo $row['OperatorName'] ?></small>
      </div>

    </div>

  <?php } ?>

</div>
<!-- </div> -->
<?php
include("../headerAndFooter/footer.php");
