<?php
include('dbcon.php');
$qry = "SELECT * FROM `user` WHERE id='$_SESSION[uid]'";
$run = mysqli_query($con,$qry);
$data = mysqli_fetch_array($run);
$id = $data['id'];
$name = $data['firstname'];
$_SESSION['uid'] = $id;

if (isset($_SESSION['uid'])) 
  {

     
?>

              <!DOCTYPE html>
              <html lang="en">
              <head>
                <title>Welcome To Pattazon</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta charset="utf-8">

                <!-- bootstrap-css -->
                <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
                <!--// bootstrap-css -->
                <!-- css -->
                <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
                <link rel="stylesheet" href="css/main-gallery.css" type="text/css" media="all" />
                <link rel="stylesheet" href="css/lightbox.css">
                <!--// css -->
                <!-- font-awesome icons -->
                <link href="css/font-awesome.css" rel="stylesheet"> 
                <!-- //font-awesome icons -->
                <!-- font -->
                <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
                <!-- //font -->
                <script src="js/jquery-3.2.1.min.js"></script>
                <script src="js/jquery.session.js"></script>
                <script src="js/bootstrap.js"></script>
                <script src="js/js.js"></script>
              </head>
              <body>
                
                    <nav class="navbar navbar-fixed-top">
                      <div class="container-fluid" style="background-color: white;">
                        <div class="navbar-header">
                          <a class="navbar-brand" href="index.php">Pattazon</a>
                        </div>
                        
                        <!--NAV LEFT-->
                        <ul class="nav navbar-nav">
                          <li class="active"><a href="#">Home</a></li>
                          <li><a href="#">Products</a></li>
                          <li><a href="fcart.php">My Cart</a></li>
                          <li><a href="#">24 x 7 Customer Care</a></li>
                          <li><a href="#">Policy</a></li>
                        </ul>
                        
                        <!--NAV RIGHT-->
                        <ul class="nav navbar-nav navbar-right">
                            <li style="text-transform: capitalize;"><a href="userprofile.php"  style="text-decoration:none;"><span class="glyphicon glyphicon-user">
                                Hi <?php $qry = "SELECT * FROM `user` WHERE id='$_SESSION[uid]'";
                                    $run = mysqli_query($con,$qry);
                                    $data = mysqli_fetch_array($run);
                                    $id = $data['id'];
                                    $name = $data['firstname']; echo $name ?></a></li>

                            <li><a href="admin/aloginform.php"  style="text-decoration:none;"><span class="glyphicon glyphicon-user"></span>Admin Login</a></li>

                            <li><a href="logout.php"  style="text-decoration:none;">Log Out</a></li>
                        </ul>
                      </div>
                    </nav>
                    <?php
                      }

  else
  {

    include('navbar.php');
  }
?>

<!-- <div class="container-fluid" style="height: 500px; background-color: #767bf7;">   
    <center><h1 style="margin-top: 240px;"><?php $name = $data['firstname']; echo $name ?>'s Cart</h1></center>
  </div>
 -->
<?php
	//include('dbcon.php');
	
	?>
		<div style="margin-top: 100px;">
			
		</div>
	<?php
	$qry = "SELECT product_id FROM `cart` WHERE user_id='$_SESSION[uid]'";
	$run = mysqli_query($con,$qry);
	$qry1 = "SELECT * FROM `product` WHERE id IN ($qry)"; 
	$run1 = mysqli_query($con,$qry1);
	

	?>
					<!-- <div class="table-responsive">
							<table class="table table bordered">
								<tr>
									<th>ID</th>
									<th>Image</th>
									<th>Product Name</th>
									<th>Price</th>
									<th>Category</th>
									<th>Quantity</th>
								<tr> -->
				<?php
					$count=0;
				while ($data = mysqli_fetch_assoc($run1))
				{
					$count++;
          $id1 = $data['id'];
	                  
                	?>

                	<div class="row">
                		<div class="col-sm-3">
                			<center><img src="productimg/<?php echo $data['pimg']; ?>" style="height: 200px; width: 170px; 	padding-bottom: 10px;"></center>
                			<center><input type="text" name="qty" id="qty1" placeholder="Quantity" class="form-control" style="width: 100px;"></center><hr>
                      
                		</div>
                		
                		<div class="col-sm-6">
                			<h4 style="font-weight: lighter;"><?php echo  $data['pname']; ?></h4>
                		</div>
                		
                	
                	
                	<div class="col-sm-6">
                		<h4><b> ₹ <?php echo  $data['pprice']; ?></b></h4>
                	</div>


                  
                    <div class="col-sm-6">
                      <form action="checkout.php">
                          <button style="margin-top: 20px;" type="submit" class="btn btn-success chk" id="<?php echo $id1; ?>">Check Out</button>
                      </form>
                      
                      <button style="margin-top: 10px;" class="btn btn-danger btn_rmv" id="<?php echo $id1; ?>">Remove Item</button>
                      
                    </div>
                  
                	</div>
                		
              <?php
                 } 


?>



<script>
  $(document).ready(function(){
    $(".btn_rmv").click(function(){

      var u_id = $(this).attr("id");
      var x = 'id=' + u_id;
      if(confirm("Are You Sure You Want To Remove This Item From Cart?"))
      {
        $.ajax({
          method:"POST",
          url:"deletecart.php",
          data:{
            x:u_id
          },
          success:function(data){
            
            }
        });

        $(this).parent().parent().fadeOut(300,function(){
          $(this).remove();
        });
      }
    });
  });
</script>




<!-- <script>
  $(document).ready(function(){
    $(".btn_chk").click(function(){

      var u_id = $(this).attr("id");
      var x = 'id=' + u_id;
      if(confirm("Are You Sure You Want To Remove This Item From Cart?"))
      {
        $.ajax({
          method:"POST",
          url:"checkout.php",
          data:{
            x:u_id
          },
          success:function(data){
              if (data) 
              {
                alert(data);
              } 
            }
        });
      }
    });
  });
</script> -->