<!DOCTYPE html>
<?php
session_start();
$con=mysqli_connect("localhost","root","","sabji khazana");
?>

<html>
	<head>
		<title>Sabzi Khazana</title>
		<link rel="stylesheet" type="text/css" href="indexboot.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top ">
			<div class ="container">
				<div class="navbar-header">
					<a href ="indexboot.html" class="navbar-brand">Sabzi Khazana</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in "></span> Login</a></li>
					</ul>
				</div>	
			</div>	
		</nav>
	<div class="content">	
		<div class="container ">
			<div class="row">
				<div class="col-xs-12">
					<div class=" panel-body panel mytype1">
						<div class="panel-heading">
							<h2><b>SIGNUP</b></h>
						</div>	
						<form action="sign_pro.php" method="post">
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="username" required="required"><br>
								<input type="text" class="form-control" name="email" placeholder="Email" required="required"><br>
								<input type="password" class="form-control" name="password" placeholder="Password" required="required"><br>
								<input type="text" class="form-control" name="Contact" placeholder="Contact" required="required"><br>
								<input type="submit" class="form-control" name="submit" value="signup" required="required"><br>
							</div>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>	
	<footer>	   
		<center>
	   <div class="container">
			<p>Copyright © Sabzi Khazana Store. All Rights Reserved | Contact Us:910000000000</p>
		</div>
		</center>
	</footer>
</body>
</html>
<?php
if(isset($_POST['submit']))
 {
	 
   echo  $c_name=$_POST['username'];
	echo $c_email=$_POST['email'];	
	echo $c_pass=$_POST['password'];
	echo $c_contact=$_POST['contact'];
	$insert_c ="insert into customer(username,email,password,contact) 
	values('$c_name','$c_email','$c_pass','$c_contact')";	 
 
  $run_c=mysqli_query($con,$insert_c);
  if($run_c)
  {
	  echo "<script>alert('Registration Successful!')</script>";
	  echo "<script>window.open('index.php','_self')</script>";
  }
 }
?>			