<?php  require_once "config.php"; ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contact2.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Oswald&family=Parisienne&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animat/animate.min.css" />


  </head>
  <body>

    <div class="contact">

      <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <h4 class="navbar-brand" href="#">Cafe</h4>
      <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon custom-toggler"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active buton-nav" href="index.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link buton-nav" href="menu.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link buton-nav" href="shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link buton-nav focus" aria-current="page" href="#">Reservation</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
     <div class="row">
       <div class="col" >
         <h1 id="big-title">All in good taste!</h1>
       </div>
       <div class="col">

         <div class="container contact-form wow slideInRight" data-wow-duration="1.5s">

           <hr class="line">

                     <form class="formCls" method="post">
                         <h3>Table Reservation</h3>
                        <div class="row">
                             <div class="col">
                                 <div class="form-group">
                                     <input type="text" name="txtName" class="form-control" placeholder="Name *" value="" />
                                 </div>
                                 <div class="form-group">
                                     <input type="date" name="dateData" class="form-control"  />
                                 </div>
                                 <div class="form-group">
                                     <input type="time" name="timeData" class="form-control" />
                                 </div>
                                 <div class="form-group">
                                     <input type="submit" name="btnSubmit" class="btnContact" value="Reserve" />
                                 </div>
                             </div>
                         </div>
                     </form>
         </div>

       </div>

     </div>

   </div>

    </div>

    <script type="text/javascript" src="js/jquery/jquery.js"></script>

    <script type="text/javascript" src="js/script.js"></script>

    <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/wow/wow.min.js"></script>

  </body>



  <footer class="container-fluid bg-grey py-5">

    <div class="container">
   <div class="row">
      <div class="col-md-6">
         <div class="row">
            <div class="col-md-6 ">
               <div class="logo-part">
                 <h1 class="sub-title">Cafe</h1>
                  <!--<img src="https://i.ibb.co/sHZz13b/logo.png" class="w-50 logo-footer" >-->

                  <p>7637 Laurel Dr. King Of Prussia, PA 19406</p>
                  <p>Use this tool as test data for an automated system or find your next pen</p>
               </div>
            </div>
            <div class="col-md-6 px-4">
               <h6> About Company</h6>
               <p>But horizontal lines can only be a full pixel high.</p>
               <a href="#" class="btn-footer"> More Info </a><br>
               <a href="#" class="btn-footer"> Contact Us</a>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="row">
            <div class="col-md-6 px-4">
               <h6> Help us</h6>
               <div class="row ">
                  <div class="col-md-6">
                     <ul>
                        <li> <a href="#"> Home</a> </li>
                        <li> <a href="#"> About</a> </li>
                        <li> <a href="#"> Service</a> </li>
                        <li> <a href="#"> Team</a> </li>
                        <li> <a href="#"> Help</a> </li>
                        <li> <a href="#"> Contact</a> </li>
                     </ul>
                  </div>
                  <div class="col-md-6 px-4">
                     <ul>
                        <li> <a href="#"> Cab Faciliy</a> </li>
                        <li> <a href="#"> Fax</a> </li>
                        <li> <a href="#"> Terms</a> </li>
                        <li> <a href="#"> Policy</a> </li>
                        <li> <a href="#"> Refunds</a> </li>
                        <li> <a href="#"> Paypal</a> </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-md-6 ">
               <h6> Newsletter</h6>
               <div class="social">
                  <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
               </div>
               <form class="form-footer my-3">
                  <input type="text"  placeholder="Enter your Email Address" name="search">
                  <input type="button" value="Go" >
               </form>
               <p>© Copyright 2021 Magherusan Oana</p>
            </div>
         </div>
      </div>
   </div>
</div>
</div>


  </footer>
</html>

<?php
date_default_timezone_set('Europe/Bucharest');

if (!empty($_POST["txtName"]) && !empty($_POST["dateData"]) && !empty($_POST["timeData"])) {
  $name= $_POST["txtName"];
  $date = $_POST["dateData"];
  $time_initial = $_POST['timeData'];

  $timeString1 = "9:00 am";
  $timeString2 = "5:00 pm";

$maxTime =  strtotime($timeString2);
$minTime =  strtotime($timeString1);
$time = strtotime($time_initial);
$time2 = date("h:i",strtotime($time_initial));

$dayOfWeek = date('w', strtotime($date));




  if($dayOfWeek == 0) {
    echo '<script>alert("The shop is closed on Sundays!")</script>';
    exit;
  }
  else if ($date == date("Y-m-d")) { //current day

    if ($time2 >= date("h:i") && $time < $maxTime && $time > $minTime) {

      //echo "Timp valid!";

      $sql = "select * from reservations";
      $result = mysqli_query($conn, $sql);
      //echo "nr_rows=" . mysqli_num_rows($result);
      if(mysqli_num_rows($result)<10) {
        $sql2 = "insert into reservations (Name, Date, Time) values ('{$name}','{$date}','{$time_initial}')";
        $query = mysqli_query($conn,$sql2);
        echo '<script>alert("Successful reservation!")</script>';
      }
      else {
        //echo "Rezervari full!";
        echo '<script>alert("We apology! The shop is full reserved!")</script>';
        exit;
      }

    }
    else {
      //echo "Timp invalid!";
      echo '<script>alert("Invalid time!")</script>';
      exit;
    }
  }
  else if($date > date("Y-m-d")){
    if ($time < $maxTime && $time > $minTime) {

      //echo "Timp valid!";

      $sql = "select * from reservations";
      $result = mysqli_query($conn, $sql);
      //echo "nr_rows=" . mysqli_num_rows($result);
      if(mysqli_num_rows($result)<10) {
        $sql2 = "insert into reservations (Name, Date, Time) values ('{$name}','{$date}','{$time_initial}')";
        $query = mysqli_query($conn,$sql2);
        echo '<script>alert("Successful reservation!")</script>';
      }
      else {
        //echo "Rezervari full!";
          echo '<script>alert("We apology! The shop is full reserved!")</script>';
        exit;
      }
    }
    else {
      //echo "Timp invalid!";
      echo '<script>alert("Invalid time!")</script>';
      exit;
    }
  }
  else {
    //echo "Data invalida!";
    echo '<script>alert("Invalid date!")</script>';
    exit;
  }

  /*$sql = "select * from reservations where Date='{$date}'";
  $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
          echo "Eroare exista deja. Ocupat!";
        }
        else {
          echo '<br> Email: ' .$email . " este gresit!";
          exit;
        }*/
} else {
    echo "No, mail is not set";
}
?>
