<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/tour.css">
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <title>Home</title>
  <!-- bootstrap css link -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <!-- swiper css link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <!-- font awesome cdn link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <!-- custom css file link -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">
  <style>
    .HomeBody{
      max-width:100%;
      max-height:100%;
      position: relative;
      overflow: auto;
    } 
    
    #Menubar {
      width: 100%;
      height: auto;
      background: #FCD19C;
    }
    
    .container-fluid {
      position: relative;
      width: 100%;
      height: 500px;
      padding: 0%;
      margin-bottom: 5px;
      display:inline-flex;
      align-items: center;
      justify-content: center;
      background-color: black;
      overflow: hidden;
     
    }
    
    .container-fluid h3{
    
    position: absolute;
    color: #fff;
    bottom: 400px;
    font-size: 60px;
    align-items: center;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    
    }
    .container-fluid p{
    
    position: absolute;
    color: #fff;
    bottom: 150px;
    text-align: center;
    font-size: 30px;
    align-items: center;
    
    }
    
    .container-fluid img{
      filter:brightness(40%);
    }
    
    
    .swiper-slide{
      position:relative;
    }
    
    .swiper-slide img { 
      width: 100%;
      height: 100%;
      object-fit: cover;
      background-size: cover;
    }
    
    .swiper-slide figcaption {
      position:absolute; 
      bottom:0; 
      left:0
    }
    
    
    
    
    .form-control-dark {
      border-color: var(--bs-gray);
    }
    
    .form-control-dark:focus {
      border-color: #fff;
      box-shadow: 0 0 0 .25rem rgba(255, 255, 255, .25);
    }
    
    .text-small {
      font-size: 85%;
    }
    
    .dropdown-toggle {
      outline: 0;
    }
    
    
    .featured-Places-Head {
      position: sticky;
      background: #87CEEB;
    }
    
    .FeaturedPlaces {
      position: relative;
      width: 100%;
      height: 550px;
      display: inline-flex;
      justify-content: space-around;
    
    }
    
    .Places {
      position: relative;
      height: auto;
      width: 500px;
      display: inline;
      text-align: center;
      border-radius: 12px;
      background-color: #FFC0CB;
      margin: 5px;
      overflow: auto;
    }
    
    .Places p {
      text-align: center;
      font-family: 'Times New Roman', Times, serif;
    }
    
    .Places h5 {
      color: black;
      font-size: 25px;
      letter-spacing: 1px;
      border-radius: 12px;
      padding: 0px;
      font-family: 'Times New Roman', Times, serif;
    }
    
    .Places img{
      width: 100%;
      height: 300px;
      border-radius: 12px;
    }
    
    .Places a {
      
      text-decoration: none;
      position: absolute;
      color: #ffff;
      font-weight: bold;
      font-size: 18px;
      border-radius: 20px;
      padding: 10px 20px;
      background-color: black;
      bottom: 2%;
      right:35%;
    }
    
    .Places a:hover {
      background-color: #87CEEB;
      letter-spacing: 3px;
      transition: 0.5s;
    }
  </style>
</head>
<?php
include("./connection.php");
?>

<body class="HomeBody">

    <div class="container-fluid" style="z-index: -2;">
        <div class="swiper" style="z-index: 0;">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper" style="z-index: -3;">
                <!-- Slides -->
                <div class="swiper-slide"><img src="./images/hana-el-zohiry-wEkp5JAAS7E-unsplash.jpg"></div>
                <div class="swiper-slide"><img src="./images/lina-loos-04-C1NZk1hE-unsplash (1).jpg"></div>
                <div class="swiper-slide"><img src="./images/bibhash-knapsnack-life-banerjee-krPO_vfPHVQ-unsplash.jpg"></div>
                <div class="swiper-slide"><img src="./images/home-slide-3.jpg"></div>
                <div class="swiper-slide"><img src="./images/damian-patkowski-T-LfvX-7IVg-unsplash.jpg"></div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
        <h3>Welcome to Tonga travel website</h3>
        <p>We are going to assist you through your journey of exploring
            the beautiful continent of Africa. Tonga will provide you with the most exclusive attractions which will make
            your African tour itenary worthwhile.
        </p>
    </div>  

    </div>
    <!-- </div> -->
    
</body>

</html>