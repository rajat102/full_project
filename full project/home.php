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
		
		<div class="content" style="background-image: url('mast.jpg')";background-color:#fff;>
			<div class="banner-image" >
				<div class="inner-banner-image">
					<center>
						<div id="banner_content" >
							<div>
								<h1><b>Welcome To Sabji Khazana !</b></h1>
								<h4>We have Fresh & best quality handpicked Fruits and Vegetables for you .No need to hunt around, we have all in one place</h4>	
							</div>
						</div>
					</center>
				</div>
			</div>
		</div>	

		<div id="block">
		<div class="col-sm-4">
		<hr style"height:1px;">
		</div>
		<div class="col-sm-3">
		<a href="vegetables.php">VEGETABLES</a>
		</div>
		<div class="col-sm-4">
		<hr style"height:1px;">
		</div>
		</div>
		 
		
				<?php   
                              
                             $query="select * from item where type='vegetable'";
                             $rs = mysqli_query($con,$query);
                           
                             $num=mysqli_num_rows($rs);
                             $t=$num%4;
							 $num=$num+(4-$t);
							 $x=$num/4;
                             if($num==0)
                                  
                                 {
                                      echo "No record";
                                      exit;
                                  }
                                    else
                                    { 
                                        
											 ?>
											 <div class="row">
												
												
											<?php
											
											 for($i=0;$i<4;$i++)
												 
												{
												$row = mysqli_fetch_assoc($rs);
												$id=$row["id"];
												$name=$row["name"];
												$price_per_kg=$row["price_per_kg"];
												$stock=$row["stock_in_kg"];
												$image=$row["item_image"];
												?>
												<div class="col-lg-3">
												<div class="items">
												<div class="header1">
												<a href="item.php?itempage=<?php echo $id; ?>"><h5><?php echo $name; ?></h5></a>
												</div>	
												
												<a href="item.php?itempage=<?php $id; ?>">
												<div class="thumbnail">
													<a href="item.php?itempage=<?php echo $id; ?>"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'"/>';?>
												</div>
												<div class="caption">
												
												<a href="item.php?itempage=<?php echo $id; ?>"><h4 style="color:blue"><?php echo $name ?></h4></a>
												<a href="item.php?itempage=<?php echo $id; ?>"><p style="color:blue"><?php echo $price_per_kg ?></p></a>
												</div>
												<a href="home.php?addtocart=<?php echo $id;?>"><button class="btn btn-primary btn lg-active " style="width:100%">Add To Cart</button></a>
												
												</a>
												</div>
												</div>
								<?php
											}
											
													
												
										
										?>								<?php
											}
										
										
										
									
                ?>
                      
				
			</div>
		</div>
	</div>
		
		
		
		<div id="block">
		<div class="col-sm-4">
		<hr style"height:1px;">
		</div>
		<div class="col-sm-3">
		<a href="fruits.php">FRUITS</a>
		</div>
		<div class="col-sm-4">
		<hr style"height:1px;">
		</div>
		</div>
		 
		
				<?php   
                              
                             $query="select * from item where type='fruit'";
                             $rs = mysqli_query($con,$query);
                           
                             $num=mysqli_num_rows($rs);
                             $t=$num%4;
							 $num=$num+(4-$t);
							 $x=$num/4;
                             if($num==0)
                                  
                                 {
                                      echo "No record";
                                      exit;
                                  }
                                    else
                                    { 
                                        
                                        
											 ?>
											 <div class="row">
												
												
											<?php
											
											 for($i=0;$i<4;$i++)
												 
												{
												$row = mysqli_fetch_assoc($rs);
												$id=$row["id"];
												$name=$row["name"];
												$price_per_kg=$row["price_per_kg"];
												$stock=$row["stock_in_kg"];
												$image=$row["item_image"];
												?>
												<div class="col-lg-3">
												<div class="items">
												<div class="header1">
												<a href="item.php?itempage=<?php echo $id; ?>"><h5><?php echo $name; ?></h5></a>
												</div>	
												
												<a href="item.php?itempage=<?php $id; ?>">
												<div class="thumbnail">
												<a href="item.php?itempage=<?php echo $id; ?>"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'"/>';?>
												</div>
												<div class="caption">
												<a href="item.php?itempage=<?php echo $id; ?>"><h4 style="color:blue"><?php echo $name ?></h4></a>
												<a href="item.php?itempage=<?php echo $id; ?>"><p style="color:blue"><?php echo $price_per_kg ?></p></a>
												</div>
												<a href="home.php?addtocart=<?php echo $id;?>"><button class="btn btn-primary btn lg-active " style="width:100%">Add To Cart</button></a>
												
												</a>
												</div>
												</div>
								<?php
											}
										
										?>	
										<?php
											
											
										}
										
										
									
                ?>
                      
				
			</div>
		</div>
	</div>	
		
	<?php include('footer1.php'); ?>
	</body>
</html>			

<?php
												if(isset($_GET['addtocart']))
													{
														$id=$_GET['addtocart'];
														
														$query1="select * from item where id=$id";
														$rs1 = mysqli_query($con,$query1);
														$row1 = mysqli_fetch_assoc($rs1);
														
														$name1= $row1["name"];
														$price_per_kg1=$row1["price_per_kg"];
														$stock=$row1["stock_in_kg"];
														$username=$_SESSION['username'];
														if ($stock>0)
														{
														$insert_pro="insert into addcart(itemid,itemname,price,qty,total,username) values('$id','$name1','$price_per_kg1','1','$price_per_kg1','$username')";
														echo $insert_pro;
														$run_pro=mysqli_query($con,$insert_pro);
														
														if($run_pro)
															{
																$stock=$stock-1;
																$update="update item set stock_in_kg='$stock' where name='$name1';"; 
																$run_ro=mysqli_query($con,$update);
																echo "<script>alert('item is added to cart');";
																echo "window.location.href='home.php';</script>";
															}
															
														}
														if($stock==0)
														{
															echo "<script>alert('item is out of stock');";
																echo "window.location.href='home.php';</script>";
														}
													}

?>	

