<!DOCTYPE html>

<?php
session_start();
$con=mysqli_connect("localhost","root","","sabji khazana");
?>
<html>
	<head>
	<?php include('header1.php'); ?>
 </head> 
	<body>	
		<div class="content" >
			<table class="table-stripped table-bordered table-hover mytype">
				<tbody>
					<div class="table-responsive">
						<tr>
	
							<th style="text-align:center">Item Name</th>
							<th style="text-align:center">Price Per Kg</th>
							<th style="text-align:center">Quantity</th>
							<th style="text-align:center">Total Price</th>
							<th style="text-align:center">Delete items</th>
							<th style="text-align:center">Edit quantity</th>
							
						</tr>
						
						<?php
														
														$query1="select * from addcart";
														$rs1 = mysqli_query($con,$query1);
														$num=mysqli_num_rows($rs1);
														$totalprice="0";
													
							for($i=0;$i<$num;$i++)
							{
								$row1 = mysqli_fetch_assoc($rs1);
								$id= $row1["itemid"];
								$name=$row1["itemname"];
								$price_per_kg1=$row1["price"];
								$qty=$row1["qty"];
								$total=($price_per_kg1 * ($qty));
								$totalprice = $totalprice + $total;
								$cartid=$row1["addcartid"];
								$_SESSION['qty']=$qty;
								$_SESSION['name']=$name;
								$_SESSION['price']=$price_per_kg1;
								
							?>	
						<tr>
							
							<td><?php echo $name ?></td>
							<td><?php echo $price_per_kg1 ?></td>
							<td><?php echo $qty?></td>
							<td><?php echo $total?></td>
							<td><a href="mycart.php?delete=<?php echo $cartid;?>"><button class="btn btn-primary" style="background-color:red ;color:white">X</button></a></td>
							<td><a href="edit.php?edititem=<?php echo $cartid;?>"><button class="btn btn-primary" style="background-color:green ;color:white">Edit</button></a></td>
							
						</tr>
							<?php 
							}
							?>
						<tr style="height:50px;background-color:#EAEDED ">
							<td></td>
							<td></td>
				
							<td>Total</td>
							<td><?php echo $totalprice ?></td>
							<td><a href="placeorder.php"><button class="btn btn-primary">Confirm Order</button></a></td>
							<td></td>
						</tr>
						<?php
								
									if(!empty($_POST["quantity"]))
									{
				
									$query2="select qty from addcart where id=$id and addcartid=$cartid" ;
									$rs2 = mysqli_query($con,$query2);
									$num=mysqli_num_rows($rs2);
									$row2 = mysqli_fetch_assoc($rs2);
									$qty=$row2["qty"];
									$query3="update addcart set qty=[$qty]";
									$rs3 = mysqli_query($con,$query3);
									}
								?>
						
					</div>
				</tbody>
			</table>
			<br>
		</div>	
	<?php include('footer1.php'); ?>
	</body>
</html>	
<?php
									if(isset($_GET['delete']))
									{
										$cartid=$_GET['delete'];
										$query="delete from addcart where addcartid='$cartid' ";
										$rs=mysqli_query($con,$query);
										echo "<script>alert('Item has been deleted');
												window.location='mycart.php';</script>";
 									}
?>

