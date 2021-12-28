

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <div class="container">
  <form action="" method="POST">
	<nav style="display: flex;padding: 10px 0px;">
		<a style="width: 35%;text-decoration: none;" class="website-logo" href="home.php"><h2 style="font-weight: 700;text-shadow: 5px 5px 5px silver;font-family: arial;">Dinsha Cng</h2></a>
		<div style="width: 50%;padding: 20px; 0px" class="row">
			<?php
			
			if(!isset($_SESSION['login']))
			{   ?>
			<div class="col-lg-6"></div>
			<div class="col-lg-3"><button type="button"  class="btn btn-success" style="width:100%"><a href="login.php" style="color:white;text-decoration:none;">Log in</a></button></div>
			<div class="col-lg-3"><button type="button" class="btn btn-success" style="width:100%"><a href="signup.php" style="color:white;text-decoration:none;">Signup</a></button></div>
			<?php }
			else{ ?>
				<div class="col-lg-3"><a href="profile.php"><button type="button" style="width:100%" class="btn btn-success">My Account</button></a></div>
				<div class="col-lg-3"><a href="cart.php"><button type="button" style="width:100%" class="btn btn-success">My Cart</button></a></div>
				<div class="col-lg-3"><a href="orders.php"><button type="button" style="width:100%" class="btn btn-success">My Orders</button></a></div>
				<div class="col-lg-3"><a href="logout.php"><button type="button" style="width:100%" class="btn btn-success">Logout</button></a></div>
			<?php } ?>	
		</div>
		<div style="width: 15%">
		<?php
		if(isset($_SESSION['login']) && strlen($_SESSION['login']))
		{   ?>
			<div class="col-lg-12" style="padding: 20px 0px; text-align: right;">
				<i class="icon fa fa-user"></i> &nbsp;&nbsp;  Welcome <?php echo htmlentities($_SESSION['fname']);?>
			</div>
	<?php }
	?>
		</div>
	</nav>
</form>    
			</div>
<nav class="navbar-top">
	<div class="menu">
		<ul>
			<li><a href="home.php">HOME</a> </li>

			<li><a href="products.php">PRODUCTS</a></li>
			<li><a href="services.php">SERVICES</a></li> 

			<li><a href="safety.php">SAFETY</a></li>
			<li><a href="about.php">ABOUT</a></li>
			<li><a href="contact.php">CONTACT US</a></li>
		</ul>
	</div>

</nav>