<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/tour.css">

  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }

    thead {
      size: 50px;

    }
  </style>
</head>
<?php
include("connection.php");
include("headerAndFooter/header.php"); ?>

<!-- <div class='FeaturedPlaces'> -->
<div class="row">
  <?php
  $query = "SELECT T.TourTitle , T.Price, T.Country , T.rate , T.Image , O.logo,  T.OperatorName 
      FROM `tbltours` T ,`tbloperator` O where T.OperatorName=O.OperatorName LIMIT 18";

  $result = mysqli_query($con, $query);

  while ($row = mysqli_fetch_array($result)) {

  ?>

    <div class="card col-sm-6">

      <img class="card-img-top" src="image/tours/<?php echo $row['Image'] ?>">

      <div class="card-body">

        <h4 class="card-tour-title"><?php echo $row['TourTitle'] ?></h4>
        <h5 class="card-price"><?php echo $row['Price'] ?></h5>
        <h5 class="card-title">Country: <text class="no-bold"><?php echo $row['Country'] ?></text></h5>
        <p class="card-text"><?php echo $row['description'] ?></p>
        <h5 class="card-title">
          <?php for ($i = 0; $i < intval($row['rate']); $i++) echo "<i class='fa fa-star-o u-color' style='color:gold'></i>"; ?>
        </h5>

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
include("headerAndFooter/footer.php");
