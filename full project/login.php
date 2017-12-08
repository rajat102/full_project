<!DOCTYPE html>
<?php
session_start();
$con=mysqli_connect("localhost","root","","sabji khazana");
$_SESSION['username'];
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
					<a href ="index.php" class="navbar-brand">Sabzi Khazana</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</div>	
			</div>	
		</nav>
	<div class="content">	
		<div class="container ">
			<div class="row">
				<div class="col-xs-12">
					<div class=" panel-body panel panel-primary mytype">
						<div class="panel-heading">
							<h4>LOGIN</h4>
						</div>	
						<div class="text-warning">
							<p><b><i>Login to make purchase</i></b></p>
						</div>
						<form method="post" action="login.php">
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="username" required="required"><br>
								<input type="password" class="form-control" name="password" placeholder="password" required="required"><br>
								<input type="submit" class="form-control" name="login" value="login"><br>
								
							</div>
						</form>	
						<div class="panel-footer">
							<p>Don't have an account?<a href="signup.php">Register</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<footer>	   
		<center>
	   <div class="container">
			<p>Copyright © Sabzi Khazana. All Rights Reserved | Contact Us:910000000000</p>
		</div>
		</center>
	</footer>
</body>
</html>	

<?php
				
				
			     if(isset($_POST['login']))
				 {
					
					 echo  $c_username=$_POST['username'];
					 echo $c_pass=$_POST['password'];
					 $sel_c = "select * from wholesaler where (password='$c_pass' AND username='$c_username');";
					 $run_c = mysqli_query($con,$sel_c);	
					 echo $check_wholesaler=mysqli_num_rows($run_c);
					 
					 if($check_wholesaler==0)
					 {
						$sel_c1="select * from customer where (password='$c_pass' AND username='$c_username');";
						$run_c1=mysqli_query($con,$sel_c1); 
						echo $check_customer=mysqli_num_rows($run_c1);
						if($check_customer==0)
						{
							echo "<script> alert('incorrected password or username')</script>";
						}
						else
						{
							echo "<script>alert('Customer Login Successful!')</script>";
							$_SESSION['username'] = $c_username;
							echo "<script>window.open('home.php','_self')</script>";
						}
					 }
					 
					 else
					 {
							echo "<script>alert('Wholesaler Login Successful!')</script>";
							$_SESSION['username'] = $c_username;
							echo "<script>window.open('wholesalerhome.php','_self')</script>";
					 }
				 }
?>
 