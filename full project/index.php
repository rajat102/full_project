<!DOCTYPE html>

<html>
	<head>
		<title>Sabji Khazana</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="indexboot.css"/>
		
	</head>
	<body>

		<nav class="navbar navbar-inverse navbar-fixed-top ">
			<div class ="container">
				<div class="navbar-header">
					<a href ="#" class="navbar-brand">Sabji Khazana</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</div>	
			</div>	
		</nav>	
		<div class="content">
			<div class="banner-image">
				<div class="inner-banner-image">
					<center>
					<div id="banner_content">
						<h1 style="color:white">Fresh & Best Delivered with Love</h1>
						<center>
						<a href="index.php?shopnow='$_SESSION['username']'"><button style="color:white" class="btn btn-danger btn lg-active">Shop Now</button></a>
						</center>
					</div>	
					</center>
				</div>
			</div>
		</div>
		<footer>	   
			<center>
				<div class="container">
					<p>Copyright @ Sabji Khazana. All Rights Reserved | Contact Us:910000000000</p>
				</div>
			</center>
		</footer>
	</body>
</html>

<?php
if (isset($_GET['shopnow']))
{
	if(isset($_SESSION['username']))
	{
		echo "<script>window.open('home.php','_self')</script>";
	}
	else
	{
	  echo "<script>alert('User has not Login')</script>";
	  echo "<script>window.open('index.php','_self')</script>";
	}
}
?>
