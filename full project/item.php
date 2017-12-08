<!DOCTYPE html>

<?php
session_start();
$con=mysqli_connect("localhost","root","","sabji khazana");
?>

<html xml:lang="en">
<head>
		<?php include('header1.php'); ?>
</head>
<body>
	<div class="content" style="margin:200px">
			
					<div class="container">
						<div class="row">
						<?php
												if(isset($_GET['itempage']))
													{
														$id=$_GET['itempage'];
														
														$query1="select * from item where id=$id";
														$rs1 = mysqli_query($con,$query1);
														$row1 = mysqli_fetch_assoc($rs1);
														$name1= $row1["name"];
														$price_per_kg1=$row1["price_per_kg"];
														$image=$row1["item_image"];
														$itemid=$row1["id"];
														$stock=$row1["stock_in_kg"];
												
													
							?>	
													<div class="col-xs-6 col-ms-6">
														<div class="display,items">
															<?php
																echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'"/>';
															?>
									
														</div>
													</div>
													<div class="imformation" class="col-xs-6 col-xs-6">
														<h1><?php echo $name1 ?></h1>
														<h3 style="display:inline">AVAILABILITY:</h3>
														<h3 style="display:inline" class="stockcolor">
													<?php 
														if($stock>0)
														{
															echo $stock;
														}
														else
														{
															echo "OUT OF STOCK";
														} 
													?>
														</h3>
													<h3>Price:<?php echo $price_per_kg1;?>/kg</h3>
													<a href="item.php?addtocart=<?php echo $itemid;?>"><button class="button">ADD TO CART</button>
													</div>
													
											</div>
								</div>
					
													
	
	</div>
													<?php include('footer1.php'); } ?>
</body>
</html>

<?php

												if(isset($_GET['addtocart']))
													{
														$id2=$_GET['addtocart'];
														$query2="select * from item where id='$id2'";
														$rs2 = mysqli_query($con,$query2);
														$row2 = mysqli_fetch_assoc($rs2);
														$name2= $row2["name"];
														$price_per_kg2=$row2["price_per_kg"];
														$stock=$row2["stock_in_kg"];
														$stock=$stock-1;
														$username=$_SESSION['username'];
														//if ($stock1!=0)
														//{
														$insert_pro="insert into addcart(itemid,itemname,price,qty,total,username) values('$id2','$name2','$price_per_kg2','1','$price_per_kg2','$username')";
														$update="update item set stock_in_kg='$stock' where name='$name2';"; 
			
														$run_pr=mysqli_query($con,$update);
														$run_pro=mysqli_query($con,$insert_pro);
														if($run_pro)
														{
															echo "<script>alert('item is added to cart');";
															echo "window.location.href='fruits.php';</script>";
														}
														//}
														//else
														//{
															//echo "<script>alert('This item is out of stock');";
														//}
													}

?>	