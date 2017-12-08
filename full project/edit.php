<?php
session_start();
$con=mysqli_connect("localhost","root","","sabji khazana");

?>
<html>
<body>
<form method="post" action="edit.php">
		<div class="form-group">
				<div>
					Edit Quantity <input type="text" class="form-control" name="editqty" placeholder="enter quantity"><br>
					<input type="submit" class="form-control" name="edit" value="edit"><br>
				</div>
		</form>	
</body>
</html>
<?php
$id='0';
if(isset($_GET['edititem']))
{
	 $cartid=$_GET['edititem'];
	 $_SESSION['id']=$cartid;
}
if(isset($_POST['edit']))
				{
					
						$qty=$_SESSION['qty'];
						$name=$_SESSION['name'];
						$_SESSION['id'];
						$id=$_SESSION['id'];
						$itemqty=$_POST['editqty'];
						$query="select stock_in_kg from item where name='$name';";
						$rs1 = mysqli_query($con,$query);
						$row = mysqli_fetch_assoc($rs1);
						echo $stock=$row["stock_in_kg"];
						echo $stock=$stock-$itemqty+$qty;
						$price=$_SESSION['price'];
						$total=$price*$itemqty;
					
						echo $update="update item set stock_in_kg='$stock' where name='$name';"; 
						$run_ro=mysqli_query($con,$update);
					
						$sel_c="update addcart set qty='$itemqty' where addcartid='$id';";
						$run_c=mysqli_query($con,$sel_c);
						
						$sel_b="update addcart set total='$total' where addcartid='$id';";
						$run_b=mysqli_query($con,$sel_b);
						if ($run_c)
							{
								echo "<script> alert('quantity is edited')</script>";
								echo "<script>window.location.href='mycart.php';</script>";
							}
				}
?>