
<?php
  
  include('dbcon.php');
  //$pid = $_POST['x'];
$qry1 = "SELECT * FROM `user` WHERE id='$_SESSION[uid]'";
$run1 = mysqli_query($con,$qry1);
$data = mysqli_fetch_array($run1);
$id = $data['id'];
  
  //$name = $_SESSION['firstname'];
  echo $qry2 = "INSERT INTO `cart`(`product_id`, `user_id`, `pqty`) VALUES ('$_POST[x]','$id','$_POST[y]')";
  $run = mysqli_query($con,$qry2);
  
?>