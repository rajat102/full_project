<?php
session_start();
$con=mysqli_connect("localhost","root","","sabji khazana");
?>
<?php
$id=$_SESSION['id'];
$query="delete from addcart where addcartid='$id' ";
$rs=mysqli_query($con,$query);
header('Location:mycart.php');
?>
