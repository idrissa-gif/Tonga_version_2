<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations</title>
    <!-- bootstrap css link -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- custom css file link -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/destinations.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">


</head>

<body>

    <!-- header section start -->
    <?php
    include("./connection.php");
    include("./headerAndFooter/header.php"); ?>
    <!-- header section end -->

    <!-- body content -->
    <div class="Banner">
        <img src="./images/cover/240_F_192627036_bVcxrBIK92RSasEFXiDOTrLI639mRPqt.jpg">
        <h3 class="Places-to-visit"> Places to Visit </h3>
        <p>Home to more than 50 different countries, the African continent has some of the world's best cities to explore.
            Vibrant, eclectic, and culturally rich, many African cities are modern affairs set to a beautiful backdrop
            Based on diversity, beauty, and reasons you would want to include them on a vacation,
            here we present our best destinations for your prolific trip to the African continent
        </p>
    </div>


    <div class="Best-Place-Destinations-Head">
        <h3>
            <center><b>Best Place Destinations</b></center>
        </h3>
    </div>

    <div class="row">
        <?php

        $query = "SELECT * FROM `tblcountries`";

        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
        ?>

            <div class="card col-sm-3" style=" height: 20rem; margin-bottom:50px; ">
                <div class="card bg-dark text-white">
                    <img class="card-img-body" src="./image/tours/<?php echo $row['image'] ?>" 
                    style="width:auto; height:50vh">
                    <div class="card-img-overlay">
                        <h5 class="card-title"><?php echo $row['country_name'] ?></text></h5>
                        <a href="#!" class="btn btn-outline-light" 
                        style="position:absolute; margin-top: 80%; margin-left:65%; ">Explore</a>

                    </div>
                </div>




            </div>


        <?php } ?>


    </div>



    </div>


</body>


<!-- footer session start  -->

<!-- footer session end -->
<!-- swiper js link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<!-- custom js file js -->
<script src="./js/script.js"></script>
<!-- script for bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteration: false,
        },
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        // scrollbar: {
        //   el: '.swiper-scrollbar',
        // },
    });
</script>

</html>