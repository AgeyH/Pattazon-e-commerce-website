<?php
		include('dbcon.php');
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$address = $_POST['address'];

		//if ($password == $cpassword) 
		//{
			$qry = "INSERT INTO `user`(`firstname`, `lastname`, `password`, `email`,`address`) VALUES ('$firstname','$lastname','$password','$email','$address')";
			$run = mysqli_query($con,$qry);
			$row = mysqli_num_rows($run);

			if ($row == 0) 
			{
				echo "No";
			}

			else
			{
				//$data = mysqli_fetch_assoc($run);
				//$id = $data['id'];
				//session_start();
				//$_SESSION['uid'] = $id;
				echo "success";
			}
			
		

		
?>