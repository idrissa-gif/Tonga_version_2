<?php
include("../connection.php");
include("../headerAndFooter/header.php");
$query = "SELECT `tour_name`, `tour_operator`, `country`, `price`, `image`, `operator_image`, `reviews`, `description` FROM `Tours`";
$result = mysqli_query($con, $query); ?>
<div class="row">
      <div class="col-sm-6">
<?php
while ($row = mysqli_fetch_array($result)) {

    echo "
    

    <div class='card d-inline-block' style='width: 18rem;>
      <div class='card-body'>
        <h5 class='card-title'>{$row['tour_name']}</h5>
        <img class='card-image'src='{$row['image']}'>
        <pclass='card-text'>{$row['description']}</p>
        <a href='krugerpark.html' class='btn btn-primary'>Explore</a>
      
        <p>{$row['tour_operator']}</p>
        <img src='{$row['operator_image']}'>
      </div>
    </div>

    ";
   
    
}
?>

</div>
<?php 
include("../headerAndFooter/footer.php");
?>

