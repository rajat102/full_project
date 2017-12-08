<!DOCTYPE html>

<?php
session_start();
$con=mysqli_connect("localhost","root","","sabji khazana");
?>

<html>
	<head>
			<?php include('header1.php'); ?>
		
	</head>
	<style>
		.submit{background-color:blue;
		width:100px;
		color:white;
		border-radius:8px;}
		
	</style>
	<body>
	<div class="content">	
		<div class="container ">
			<div class="row">
				<div class="col-xs-12">
					<div class=" panel-body panel mytype1">
						<div class="panel-heading">
							<h3><b>Change Password</b></h3>
						</div>	
						<form method="post" action="settings.php">
							<div class="form-group">
								<input type="password" class="form-control" name="oldpassword" placeholder="Old Password" required="required"><br>
								<input type="password" class="form-control" name="newpassword" placeholder="New Password" required="required"><br>
								<input type="password" class="form-control" name="newpassword2" placeholder="Re-type New Password" required="required"><br>
							<center><input type="submit" class="form-control" name="change" value="change password" required="required"></center>
							</div>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>	
	<?php include('footer1.php'); ?>
	</body>
</html>			
<?php
		
		if(isset($_POST['change']))
		{
			echo $username=$_SESSION['username'];
			echo $oldpassword=$_POST['oldpassword'];
			echo $query="select password from customer where username='$username';";
			$rs = mysqli_query($con,$query);
			$row = mysqli_fetch_assoc($rs);
			$password=$row["password"];
			if($oldpassword!=$password)
			{
				echo "<script>alert('Please enter correct Old Password');</script>";
			}
			else
			{
				$newpassword=$_POST['newpassword'];
				$newpassword2=$_POST['newpassword2'];
				if($newpassword!=$newpassword2)
				{
					echo "<script>alert('Please enter correct confirmation password');</script>";
				}
				else
				{
					$insert="update customer set password='$newpassword'  where username='$username';";
					$rs1 = mysqli_query($con,$insert);
					if($rs1)
					{
						echo "<script>alert('Your Password has been changed');</script>";
					}
				}
			}
		}
?>