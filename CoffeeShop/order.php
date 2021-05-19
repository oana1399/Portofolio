<?php  require_once "config.php"; ?>
<html>
	<head>
		<title>Order Page</title>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/order.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Oswald&family=Parisienne&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body>

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
					<a class="nav-link buton-nav"  aria-current="page" href="#">Shop</a>
				</li>
				<li class="nav-item">
					<a class="nav-link buton-nav" href="contact.php">Reservation</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div id="menu">
  <div class="container">
    <div class="text-center">
      <h3 class="sub-title">Order</h3>
      <hr style="height:3px;"class="line" />
    </div>

    <div class="row justify-content-center">
      <div class="col-xs-12 col-sm-6 coloana">
        <div class="wrapper">
					<div class="menu-item">
            <div class="menu-item-title">Product</div>
            <div class="menu-item-price">
              <span class="menu-item-low">Qty</span>
              <span class="menu-item-low">Price</span>
            </div>
            <hr class="menu-line" style="height:3px;">
          </div>
					<?php
					$sql = "select * from orders";
					$result = mysqli_query($conn, $sql);
					$totalPrice=0;
					while($rs = mysqli_fetch_array($result)) {
						$totalPrice = $totalPrice + $rs['Price'];
						echo "<div class='menu-item'>
									<div class='menu-item-name'>{$rs['Name']}</div>
									<div class='menu-item-price'>{$rs['Qty']}  &emsp;$  {$rs['Price']}</div>
									</div>";
					}
					echo "	<div class='menu-item'>
							<hr class='menu-line' style='height:3px;'>

	            <div class='menu-item-title'>Total</div>
	            <div class='menu-item-price'>
	              <div class='menu-item-low'>$ {$totalPrice}</div>
	            </div>

	          </div>";
					?>
					<form class="button_div" method="post">
						<button class="menuButton" type="submit" name="orderButton">ORDER</button>
					</form>
					<?php
					  if (isset($_POST["orderButton"])){
							$sql = "truncate table orders";
							$result = mysqli_query($conn, $sql);
							echo '<script>alert("Order has been placed!")</script>';
							//header('Refresh:0');
						}
					 ?>

        </div>

      </div>

    </div>

  </div>
</div>


<footer class="container-fluid bg-grey py-5 footerClass">

	<div class="container">
 <div class="row">
		<div class="col-md-6">
			 <div class="row">
					<div class="col-md-6 ">
						 <div class="logo-part">
							 <h1 class="footer-logo">Cafe</h1>
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




		<!-- JavaScript includes -->

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="js/bootstrap/bootstrap.min.js"></script>
		<script src="js/orderScript.js"></script>

	</body>
</html>
