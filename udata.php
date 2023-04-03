<?php

include('dbcon.php');
if(isset($_POST['firstname']))
	{


		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		

	echo $qry = "UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`password`='$password',`email`='$email' WHERE firstname='$firstname'"; 
		$run = mysqli_query($con,$qry);
					
	} 
?>