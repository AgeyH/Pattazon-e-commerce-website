

<?php
	include('dbcon.php');
	
	
		
		$email = $_POST['email1'];
		$password = $_POST['password1'];

		echo $qry = "SELECT * FROM `user` WHERE password='$password' AND email='$email'";	
		$run = mysqli_query($con,$qry);
		$row = mysqli_fetch_row($run);

		
		if ($run == 'true') 
		{
			header('location:index.php');
		}
			
		
			
	
	
?>