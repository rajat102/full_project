<?php
session_start();
$con=mysqli_connect("localhost","root","","sabji khazana");
?>
<?php
				
				
			     if(isset($_POST['login']))
				 {
					
					echo  $c_username=$_POST['username'];
					 echo $c_pass=$_POST['password'];
					 $sel_c="select * from customer where password='$c_pass' AND username='$c_username'";
					 $run_c=mysqli_query($con,$sel_c);
					 echo $check_customer=mysqli_num_rows($run_c);
					 if($check_customer==0)
					 {
						 echo "<script> alert('password or email is not correct')</script>";
					 }
				if($check_customer>0)
					  {
						  echo "<script>alert('Login Successful!')</script>";
						  echo "<script>window.open('cart.php','_self')</script>";
						  
					  }
				 }
   ?>
				