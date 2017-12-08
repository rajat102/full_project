<?php
session_start();
$con=mysqli_connect("localhost","root","","sabji khazana");
?>

<?php
				
				 
			     if(isset($_POST['submit']))
				 {
					 echo "<script> alert('ykfmhvhnv')</script>";
					 $c_username=$_POST['name'];
					 $c_number=$_POST['Mobile'];
					 $c_pincode=$_POST['pincode'];
					 $c_flat=$_POST['flat'];
					 $c_colony=$_POST['colony'];
					 $c_town=$_POST['town'];
					 $c_state=$_POST['state'];
					echo $c_method=$_POST['payment'];
					 
					 
					echo  $insert_c ="insert into customer_detail(username,mobile_number,pincode,house_no,colony,town,state,payment_method) 
					 	values('$c_username','$c_number','$c_pincode','$c_flat','c_colony','c_town','c_state','c_method')";	
					 $run_c=mysqli_query($con,$insert_c);
					
				 if($run_c)
					 {
						echo "<script> alert('done')</script>";
					 }
				}
				else
				{
					echo "No";
				}
   ?>
​










<?php
				
	if(!isset($_COOKIE['countItems']))
	{
    $Items = 0;
    setcookie('countItems', $Items); 
	}
else{
    $Items = ++$_COOKIE['countItems'];  
    setcookie("countItems", $Items);
} 
?>

<?php


if(isset($_COOKIE['countItems'])){
    print "<p>You have $Items items in your shopping cart </p>";
    print "<p><a href='store.php'>Continue Shopping</a></p>";
}  
else{
    print "You have not added any items into your cart.";
}  

   ?>