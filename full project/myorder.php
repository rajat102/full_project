<!DOCTYPE html>

<?php
session_start();
$con=mysqli_connect("localhost","root","","sabji khazana");
?>
<html>
	<head>
		<?php include('header1.php'); ?>
	</head>
		<div class="content" >
			<table class="table-stripped table-bordered table-hover mytype">
				<tbody>
					<div>
						<tr>
							
							<th style="text-align:center;">DATE</th>
							<th style="text-align:center;">TIME</th>
							<th style="text-align:center;">ITEM NAME</th>
							<th style="text-align:center;">QUANTITY</th>
							<th style="text-align:center;">PRICE-PER-KG</th>
							<th style="text-align:center;">TOTAL PRICE</th>
							<th style="text-align:center; ">STATUS</th>
						</tr>
						
						<?php
									$username=$_SESSION['username'];				
									$query1="select * from myorder where username='$username';";
									$rs1 = mysqli_query($con,$query1);
									$num=mysqli_num_rows($rs1);
														
													
							for($i=0;$i<$num;$i++)
							{
								
								$row1 = mysqli_fetch_assoc($rs1);
								$placeorderid= $row1["placeorderid"];
								
								$date = $row1["date"];
								$time=$row1["time"];
								$itemname=$row1["itemname"];
								$qty=$row1["qty"];
								$price_per_kg=$row1["price_per_kg"];
								$totalprice = $row1["total_price"];
								$orderid=$row1["orderid"];
								$status=$row1["status"];
							?>	
							<tr>
								
								<td><?php echo $date ?></td>
								<td><?php echo $time ?></td>
								<td><?php echo $itemname ?></td>
								<td><?php echo $qty ?></td>
								<td><?php echo $price_per_kg ?></td>
								<td><?php echo $totalprice ?></td>
								<td><?php 
								if($status=="1")
								{
									echo "Delivered";
								}
								else
								{
									echo "Not Delivered";
								} 
								?>
								</td>
							</tr>
							<?php 
								}
							?>
					</div>
				</tbody>
			</table>
		</div>	
	<?php include('footer1.php'); ?>
	</body>
</html>	

