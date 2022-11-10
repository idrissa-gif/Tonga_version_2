<head>
  <link rel="stylesheet" href="../css/tour.css">
</head>
<?php
include("../connection.php");
include("../headerAndFooter/header.php");
$query = "SELECT * FROM `tbltours`,`tbloperator` where `tbltours`.OperatorName=`tbloperator`.OperatorName" ;
$result = mysqli_query($con, $query); ?>

<!-- <div class='FeaturedPlaces'> -->
<div class="row">
  <?php

  while ($row = mysqli_fetch_array($result)) {

    echo "

    <div class='card col-sm-6'>

    <img class='card-img-top' src='{$row['Image']}'>
  
    <div class='card-body'>
  
      <h4 class='card-tour-title'>{$row['TourTitle']}</h4>
      <h5 class='card-price'>{$row['Price']}</h5>
      <h5 class='card-title'>{$row['Country']}: <text class='no-bold'>{$row['country']}</text></h5>
      <p class='card-text'>{$row['description']}</p>
      <h5 class='card-title'>You visit: <text class='no-bold'>{$row['rate']}</text></h5>
      <h5 class='card-title'>Reviews: <text class='no-bold'>{$row['rate']}</text></h5>      

      <a href='krugerpark.html' class='btn btn-primary'>Explore</a>
    </div>
  
    <div class='card-footerg'>
      <p>Offered By<p>
      <img class='logo' src='{$row['logo']}'>
      <small class='text-muted'>{$row['OperatorName']}</small>
    </div>
      
</div>
    ";
  }

  ?>

</div>
<!-- </div> -->
<?php
include("../headerAndFooter/footer.php");
