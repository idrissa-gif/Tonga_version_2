<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Home</title>
    <!-- bootstrap css link -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/destinations.css">

    <link rel="stylesheet" href="../css/home.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">
    <link rel="preconnect dns-prefetch" href="https://fonts.googleapis.com" crossorigin>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect dns-prefetch" href="https://cloudfront.safaribookings.com" crossorigin>
    <link rel="preconnect dns-prefetch" href="https://cfstatic.safaribookings.com" crossorigin>
    <link rel="dns-prefetch" href="https://www.google-analytics.com" crossorigin>
    <link rel="dns-prefetch" href="https://stats.g.doubleclick.net" crossorigin>
    <link rel="dns-prefetch" href="https://ampcid.google.com" crossorigin>
 

</head>

<body class="HomeBody">

    <!-- header section start -->
    <nav class="navbar navbar-expand-lg bg-light" style="position: -webkit-sticky; position: sticky; width: 100%; top: 0; padding: 0px; z-index: 2;">
        <div id="Menubar" class="container-fluid">
            <a class="navbar-brand" href="./home.html">TONGA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="destinations.html">Destinations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Tour_Operators .html">Tour Operators</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="contact_us.html">Contact us</a>
                    </li>
                </ul>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>
                <ul class="nav">
                    <li class="nav-item"><a href="./login.html" class="nav-link link-dark px-2" style="background-color: #2A5BD9; border-radius: 10px ; margin-right: 10px;">Login</a></li>
                    <li class="nav-item"><a href="./register.html" class="nav-link link-dark px-2" style="background-color: #25E850; border-radius: 10px ; margin-right: 10px;">Sign up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- header section end -->



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










    <!-- </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Destinations
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">South Africa</a></li>
              <li><a class="dropdown-item" href="#">Rwanda</a></li>
              <li><a class="dropdown-item" href="#">Egypt</a></li>
              <li><a class="dropdown-item" href="#">Cameroon</a></li>
              <li><a class="dropdown-item" href="#">Mali</a></li>
              <li><a class="dropdown-item" href="#">Mauritius</a></li>
              <li><a class="dropdown-item" href="#">Tanzania</a></li>
              <li><a class="dropdown-item" href="#">Uganda</a></li>
            </ul>
          </li> -->
</body>

</html>