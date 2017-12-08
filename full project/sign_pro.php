<?php
$con=mysqli_connect("localhost","root","","sabji khazana");
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