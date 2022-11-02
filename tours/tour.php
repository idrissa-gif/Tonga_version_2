<?php
include("../connection.php");
include("../headerAndFooter/header.php");
$query = "SELECT `tour_name`, `tour_operator`, `country`, `price`, `image`, `operator_image`, `reviews`, `description` FROM `Tours`";
$result = mysqli_query($con, $query); ?>
<div class="FeaturedPlaces">
<?php
while ($row = mysqli_fetch_array($result)) {

    echo "
    

    <div class='Places $dvivName'>
      <h5>{$row['tour_name']}</h5>
      <img src='{$row['image']}'>
      <p>{$row['description']}</p>
      <a href='krugerpark.html'>Explore</a>
      
      <p>{$row['tour_operator']}</p>
      <img src='{$row['operator_image']}'>

    </div>

    ";
   
    
}
?>

</div>
<?php 
include("../headerAndFooter/footer.php");
?>

