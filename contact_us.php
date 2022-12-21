<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">
    <style>
      .body-footer{
        background: url(./images/Contact_backgroundimg.png);
        background-repeat: no-repeat;
        background-size: 100% 100%;
      }


      .container-fluid
      {
        background-color: #FCD19C;
      }
      .navbar{
        position: -webkit-sticky; 
        position: sticky; 
        top: 0;
        padding: 5px; 
        z-index: 2;
      }
      
    </style>
</head>
<body>
    <!-- header section start -->
    <?php include("./headerAndFooter/header_without_seach.php")?>
    <!-- header section end -->

    <div class="body-footer">
      <!-- body section start -->
      <div class="heading" >Contact us</div>
      <form action = "#" class="form" method="POST" >
          
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="name" 
            name = "name" tabindex = "1" required>
          </div>
          <div class="mb-3">
              <label for="subject" class="form-label">Subject</label>
              <input type="text" class="form-control" 
              name="subject"  tabindex = "2" id="subject" placeholder="subject">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" 
            name = "email" tabindex = "3" placeholder="name@example.com" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="10" colums="4" 
            name="message" tabindex = "4" placeholder="Write your message" required></textarea>
          </div>
          <div class = "div-btn">
              <button type="submit" class="btn btn-primary" id = "btn" >Send Message!</button>
          </div>
      </form>
      <!-- body section end  -->  
  
      <!-- footer session start  -->
     <?php include("./headerAndFooter/footer.php")?>
      <!-- footer session end -->
  

    </div>

    <script>
    var btn = document.getElementById('btn');
    btn.addEventListener('click',function (e){
    e.preventDefault();
    var name = document.getElementById('name').value;
    var subject = document.getElementById('subject').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;
    var body = 'name: '+name +'<br/> email: ' + email + '<br/> subject ' + subject + '<br/> message '+ message;
    if(name != "" && email != "" && message != "" && body != "")
    {
        Email.send({
        Host : "smtp.gmail.com",
        SecureToken : "868C1CF83650F7CC0298841D5AE45B33376F",
        Username : "tongavoyages@gmail.com",
        Password : "jagKi7-jitdew-sazjug",
        To : 'tongavoyages@gmail.com',
        From : email,
        Subject : subject,
        Body : body
      }).then(
        message => 
        {
          location.reload();
          alert("successfully sent")
        }
      );
      
    }else 
    {
      message=>alert("One of the required field is empty!");
    }
    
    
})
    </script>
    <!-- script smtpJs.com -->
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <!-- swiper js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <!-- custom js file js -->
    <script src="js/script.js"></script>
    <!-- script for bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
