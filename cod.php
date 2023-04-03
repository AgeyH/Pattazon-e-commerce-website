<?php
	
	if (isset($_POST['x'])) 
	{
		include('dbcon.php');
		
		echo $qry = "UPDATE `cart` SET `status`='1' WHERE user_id='$_SESSION[uid]'";
		$run = mysqli_query($con,$qry);

		$qry1 = "SELECT * FROM `cart` WHERE status = '1'";
		$run1 = mysqli_query($con,$qry1);
		$data1 = mysqli_fetch_assoc($run1);
		$user_id = $data1['user_id'];
		$product_id = $data1['product_id'];
		$booked_quantity = $data1['pqty'];

		$qry2 = "SELECT * FROM `product` WHERE id='$product_id'";
		$run2 = mysqli_query($con,$qry2);
		$data2=  mysqli_fetch_assoc($run2);
		$old_quantity = $data2['pquantity'];
		$price = $data2['pprice'];
		$p_name = $data2['pname'];

		 $qry3  = "SELECT * FROM `user` WHERE id='$_SESSION[uid]'";
		$run3  = mysqli_query($con,$qry3);
		$data3 =  mysqli_fetch_assoc($run3);
		$fname = $data3['firstname'];
		$lname = $data3['lastname'];
		$email = $data3['email'];

		$final_qry = "INSERT INTO `checkout`(`pid`, `pname`, `pprice`,`user_firstname`, `user_lastname`, `user_email`) VALUES ('$product_id','$p_name','$price','$fname','$lname','$email')";
		$final_run = mysqli_query($con,$final_qry);

		echo $del_qry = "DELETE FROM `cart` WHERE  product_id='$product_id'";
	
	$del_run = mysqli_query($con,$del_qry);

	}

?>