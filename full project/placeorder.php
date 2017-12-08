


<!DOCTYPE html>

<?php
session_start();
$con=mysqli_connect("localhost","root","","sabji khazana");

?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Place Order</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="wholesaler.css" >
        <script src="form.js"></script>
    </head>
	<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>


<body>
​

<div class="container">
            <div class="imagebg"></div>
            <div class="row " style="margin-top: 50px">
                <div class="col-md-6 col-md-offset-3 form-container">
                    <h2>Form</h2> 
                    
                    <form method="post" action="placeorder.php">
                        
							<label for="name">Userame:</label><br>
    <input type="text" id="name" name="name" required="required"><br>

    <label for="mob. no.">Mobile Number:</label><br>
    <input type="text" id="mob. no." name="Mobile" required="required" ><br>

    <label for="pincode">Pincode:</label><br>
    <input type="text" id="pincode" name="pincode" required="required"><br>
	 
	  <label for="flat">Flat/House No./Floor/Building:</label><br>
    <input type="text" id="flat" name="flat"  required="required"><br>
	
	<label for="colony">Colony/street/locality:</label><br>
    <input type="text" id="colony" name="colony" required="required"><br>
	  
    <label for="town">Town/City:</label><br>
    <input type="text" id="town" name="town" required="required"><br>
	
	 <label for="state">State:</label><br>
    <input type="text" id="state" name="state" required="required"><br>
	
	
     <label for="payment">Payment Method</label><br>
		<select id="payment" name="payment">
		<option>Cash on Delivery</option>
		<option>Card Payment</option>
	 </select><br>
  <a href="#"><input type="submit" class="form-control" name="submit" value="SUBMIT"></a>
						                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your feedback successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
                </div>
            </div>
        </div>



</body>
</html>



<?php
				
				 
			     if(isset($_POST['submit']))
				 {
					
					 $c_username=$_POST['name'];
					 $c_number=$_POST['Mobile'];
					 $c_pincode=$_POST['pincode'];
					 $c_flat=$_POST['flat'];
					 $c_colony=$_POST['colony'];
					 $c_town=$_POST['town'];
					 $c_state=$_POST['state'];
					 $c_method=$_POST['payment'];
					
					 
					$insert_c ="insert into customer_detail(username,mobile_number,pincode,house_no,colony,town,state,payment_method) 
					 	values('$c_username','$c_number','$c_pincode','$c_flat','$c_colony','$c_town','$c_state','$c_method')";	
					 $run_c=mysqli_query($con,$insert_c);
						 
					 $query="select placeorder_id from customer_detail";
					 $rs = mysqli_query($con,$query);
                           
                             $num=mysqli_num_rows($rs);
							 for($i=0;$i<$num;$i++)
							 {
								 $row = mysqli_fetch_assoc($rs);
								 $placeorderid12=$row["placeorder_id"];
							 }
					
					$username12=$_SESSION['username'];
					echo $placeorderid12;
					echo $a="update addcart set placeorder_id='$placeorderid12' where username='$username12'";
					 $rs12 = mysqli_query($con,$a);
					
				 if($run_c and $c_method=="Cash on Delivery")
					{
						echo "<script> alert('Order is delivered successfully')</script>";
					
						
						$query1="select * from addcart where username='$username12'";
						$rs1 = mysqli_query($con,$query1);
						
						$num=mysqli_num_rows($rs1);
						for($i=0;$i<$num;$i++)
						{
							date_default_timezone_set('Asia/Kolkata');
							$row1 = mysqli_fetch_assoc($rs1);
								$username = $row1["username"];
								$placeorderid= $row1["placeorder_id"];
								$date = date('Y-m-d');
								$time=date('H:i:s');
								$itemname=$row1["itemname"];
								$qty=$row1["qty"];
								$price_per_kg=$row1["price"];
								echo $totalprice = $row1["total"];
								
								
								$itemid=$row1["itemid"];
								$status="0";
								
								echo $insert_c1="insert into myorder(placeorderid,itemid,itemname,date,qty,price_per_kg,total_price,status,time,username) 
									 values('$placeorderid','$itemid','$itemname','$date','$qty','$price_per_kg','$totalprice','$status','$time','$username');";	
									 
								$run_c1=mysqli_query($con,$insert_c1);
								
								$delete="delete from addcart where username='$username12'";
								$run_del=mysqli_query($con,$delete);
								
						}
						echo "<script>window.open('home.php','_self')</script>";
					}
				else if ($run_c and $c_method=="Card Payment")
					 {
						echo "<script>window.open('home.php','_self')</script>";
					}
				else
					{
						echo "<script> alert('error')</script>";
					}
				}
			
				else
				{
					echo "No";
				}
			
				?>