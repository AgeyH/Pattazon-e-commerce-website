<?php
	include('dbcon.php');
	$id = $_REQUEST['sid'];
	$qry = "DELETE FROM `user` WHERE id='$id'";
	$run = mysqli_query($con,$qry);
	session_start();
	session_destroy();
	header('location:index.php')

?>