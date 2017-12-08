<!DOCTYPE html>

<?php

$con=mysqli_connect("localhost","root","","sabji khazana");
?>

<html>
<head>
		<title>Sabzi Khazana</title>
		<link rel="stylesheet" type="text/css" href="index.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		
		<style>
.topnav {
    background-color: #333;
    overflow: hidden;
}


.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}


.topnav a:hover {
    background-color: #ddd;
    color: black;
}


.topnav a.active {
    background-color: #4CAF50;
    color: white;
}
.topnav1 a {
    float:right;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}
.topnav1 a.active {
    background-color: #4CAF50;
    color: white;
}
.topnav1 a:hover {
    background-color: #ddd;
    color: black;
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}

#block{
height:60px;
font-size:40px;
hr
	{
		border: none;
    height: 1px;
    
    color: black;
    
	}
}
</style>

	</head>
	
	<body>
		<div style="margin:20px">
			<form  method="post" action="header1.php" action="http://www.mysite.com/search.php" style="margin-left:300px"> 
				<table cellpadding="0px" cellspacing="0px"> 
					<tr> 
					<div style="float:right"><h2><?php echo $_SESSION['username']; ?></h2></div><br>
						<td style="border-style:solid none solid solid;border-color:#4B7B9F;border-width:1px;">
							<input type="text" name="Search" placeholder="Search Product" style="width:400px; border:0px solid; height:37px; padding:0px 3px; position:relative;"> 
							
						</td>
						<td style="border-style:solid;border-color:#4B7B9F;border-width:1px;"> 
							<input type="submit" name="submit" value="search" style="border-style: none; background-image: url('search.jpg') no-repeat; width: 52px; height: 37px;">
						</td>
					</tr>
					
				</table>
				
			</form>
			
		</div>
		
		<div class="topnav" id="myTopnav" style="margin-left:40px,margin-right:20px">
			<a href="home.php">Home</a>
			<a href="aboutus.php">About</a>
			<a href="fruits.php">Fruits</a>
			<a href="vegetables.php">Vegetables</a>
			<form method="get" action="http://www.mysite.com/search.php" style="float:right"> 
				<table cellpadding="4px" cellspacing="0px"> 
					<tr> 
						<td style="border-style:solid none solid solid;border-color:#4B7B9F;border-width:1px, color:#000">
							<input name="Search Location" placeholder="Search Location" type="text" name="zoom_query" style="width:200px; border:0px solid; height:27px; padding:0px 3px; position:relative; padding-top:3px"> 
						</td>
						<td style="border-style:solid;border-color:#4B7B9F;border-width:1px;"> 
							<input type="submit" value="search" style="border-style: none; background-image: url('search.jpg') no-repeat; width: 52px; height: 27px;">
						</td>
					</tr>
				</table>
			</form>
			<a href="log.php" style="float:right">Logout</a>
			
			<a href="settings.php" style="float:right">Settings</a>
			<a href="mycart.php" style="float:right">My Cart</a>
			<a href="myorder.php" style="float:right">MY Order</a>
			
			
		</div>
	</body>
</html>
<?php
	 if(isset($_POST['submit']))
	  {
					 $item=$_POST['Search'];
					 $query="select id from item where name='$item';";
					 $rs = mysqli_query($con,$query);
					 $row = mysqli_fetch_assoc($rs);
					 $num=mysqli_num_rows($rs);
					 if($num==0)
					 {
						 echo "<script>alert('This product is not available');
						 window.location='home.php'</script>";
					 }
					 else
					 {		 
						 $id=$row["id"];
						 
						 echo "<script>alert('Here is your desired Product');
						 window.location='item.php?itempage=$id';</script>";
					 }
				 }				 
				// header('Location:item.php?itempage=$id');
?>

					 