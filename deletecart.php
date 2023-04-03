 <?php
	include('dbcon.php');
	$id = $_POST['x'];
	$qry = "DELETE FROM `cart` WHERE  product_id='$id'";
	
	$run = mysqli_query($con,$qry);
?>