<?php
	
	include('dbcon.php');
	
$qry = "SELECT * FROM `user` WHERE id='$_SESSION[uid]'";
$run = mysqli_query($con,$qry);
$data = mysqli_fetch_array($run);
$id = $data['id'];
$name = $data['firstname'];
$_SESSION['uid'] = $id;

if (isset($_SESSION['uid'])) 
  {//session_start();

     
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
                <script src="js/bootstrap.js"></script>
                <script src="js/js.js"></script>
              </head>
              <body >
                
                    <nav class="navbar navbar-fixed-top">
                      <div class="container-fluid" style="background-color: white;">
                        <div class="navbar-header">
                          <a class="navbar-brand" href="index.php">Pattazon</a>
                        </div>
                        
                        <ul class="nav navbar-nav">
                          <li class="active"><a href="#">Home</a></li>
                          <li><a href="#">Products</a></li>
                          <li><a href="fcart.php">My Cart</a></li>
                          <li><a href="#">24 x 7 Customer Care</a></li>
                          <li><a href="#">Policy</a></li>
                        </ul>
                        
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


	$sql = "SELECT * FROM `user` WHERE id='$_SESSION[uid]'";
	$run = mysqli_query($con,$sql);
	if ($run == true) 
	{
		?>
		<div class="col-sm-6" >
              <div style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .08);  margin-top: 100px; border-radius: 2px; background-color: #fff" >
               <center><img class="card-img-top" src="img/i3.svg" style="height: 50px; width: auto; padding-top: 3px " alt="Card image cap"></center>  
              <center><h4 style="text-transform: capitalize; color: #6a7b76">Logged In As <?php $qry = "SELECT * FROM `user` WHERE id='$_SESSION[uid]'";
$run = mysqli_query($con,$qry);
$data = mysqli_fetch_array($run);
$id = $data['id'];
$name = $data['firstname']; echo $name;
 ?></h4>
				<svg height="25" width="26" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="_3baQOY" data-reactid="23"><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z" stroke="#2974f0" data-reactid="24"></path></svg>

          </div>
			
		
			<div style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .08); border-radius: 2px; background-color: #fff; margin-top: 50px; height: 180px; margin-top: " >
				<h4 style="color: #6a7b76;"><b>Delivery Address</b></h4>
		    <textarea style="height: 100px; width: 400px; margin-top: 10px; float: left;">
            <?php 
                $address = $data['address']; 
                echo $data['address']; ?>
        </textarea>		
					
					<input type="submit" name="submit" value="Delever To This Address" class="btn btn-info chk" style="margin-top: 50px; margin-left: 10px;" />		
				
				
			</div>
			</div>

      
		<?php
	}
?>


<script type="text/javascript">
  $(document).ready(function(){
    $(".chk").click(function(){
      alert("CHECKOUT");
      var x = 'ishan';
      $.ajax({
        url: 'fcheckout.php',
        method:'POST',
        data :{
          x:x
        },
        success:function(data){
          if (data) 
          {
            $("#result").html(data);
            
          }
        }
      });
    });

  });
</script>



<div id="result"></div>