<!DOCTYPE html>

<?php
session_start();
$con=mysqli_connect("localhost","root","","sabji khazana");
$_SESSION['username'];
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wholesaler Form</title>
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

<div class="container">
<?php include('header2.php'); ?>
            <div class="imagebg"></div>
            <div class="row " style="margin-top: 50px">
                <div class="col-md-6 col-md-offset-3 form-container">
                    <h2>Form</h2> 
                    
    <form method="post"  action="wholesalerhome.php">
        <label for="name">Wholesaler Name	:</label><?php echo $_SESSION['username']?><br><br><br>
		<label for="vegetable_fruit">Vegetable and Fruit</label><br>
		<select id="vegetable_fruit" name="vegetable_fruit">
      <option>Beetroot</option>
      <option>Capcicum</option>
      <option>Bitter Gourd</option>
	  <option>bottle Gourd</option>
      <option>Brinjal</option>
      <option>Carrot</option>
      <option>Cauliflower</option>
      <option>Green Chilli</option>
	  <option>Black Currant</option>
      <option>Custard Apple</option>
      <option>Apple</option>
	  <option>Banana</option>
	  <option>Grapes</option>
      <option>Guava</option>
      <option>Mango</option>
	  <option>Orange</option>
	 </select><br>
	 
	  <label for="price">Price per Kg</label><br>
    <input type="text" id="price" name="price" placeholder="Today's Price.."><br>
	
	<label for="quantity">Available Stock</label><br>
    <input type="text" id="quantity" name="quantity" placeholder="Your Stock.."><br>
	<input type="submit" class="form-control" name="submit" value="submit"><br>
</form>
                    </div>
            </div>
        </div>
		
		</body>
</html>

<?php
				
				
			    if(isset($_POST['submit']))
				{
					
					 $c_username=$_SESSION['username'];;
					 $c_itemname=$_POST['vegetable_fruit'];
					 $c_price=$_POST['price'];
					 $c_price=$c_price+10;
					 $c_quantity=$_POST['quantity'];
					 $insert_c ="insert into wholesaler_post(w_username,item_name,w_price,w_stock) 
								values('$c_username','$c_itemname','$c_price','$c_quantity');";	
					 $run_c=mysqli_query($con,$insert_c);
					 if($run_c)
					{
						 echo "<script> alert('New Item is posted by wholesaler')</script>";
						 $insert_c3="select * from item where name='$c_itemname';";
						 $run_c2=mysqli_query($con,$insert_c3);
						 $row4 = mysqli_fetch_assoc($run_c2);
						 $stock=$row4['stock_in_kg']+ $c_quantity;
						 $insert_c1 ="update item set price_per_kg = '$c_price', stock_in_kg= '$stock' where name = '$c_itemname';";	
					     $run_c1=mysqli_query($con,$insert_c1);
						 if($run_c1)
						 {
							echo "<script> alert('Stock and price of item are updated by wholesaler')</script>"; 
						 }
						 
					}
				}
?>
 


​

