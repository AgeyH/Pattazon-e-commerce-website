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
              <body background="#6a7b76;">
                
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
?>

<!--SIDE BAR-->>
  

<div class="col-sm-3">
    <div  style="margin-top: 130px; height: 55px;">
        <div  style=" background-color:#a3d9ff"; ">   
          <?php

            
            $qry = "SELECT * FROM `user`";
            $run = mysqli_query($con,$qry);
            $data = mysqli_fetch_array($run);
            $fname = $data['firstname'];
          ?>
          <div>
              <div style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .08); border-radius: 2px; background-color: #fff" >
               <center><img class="card-img-top" src="img/i3.svg" style="height: 50px; width: auto; padding-top: 3px " alt="Card image cap"></center>  
              <center><h3 style="text-transform: capitalize;">Hello, <?php $qry = "SELECT * FROM `user` WHERE id='$_SESSION[uid]'";
$run = mysqli_query($con,$qry);
$data = mysqli_fetch_array($run);
$id = $data['id'];
$name = $data['firstname']; echo $name ?></h3></center>
          </div>
            
        </div>
    </div>

    
    <div style="margin-top: 15px; height: auto; background-color: white">
      <center><a href="#" style="color: #878787; cursor: pointer; text-decoration:none" ><span class="glyphicon glyphicon-user"></span><h4>My Orders</h4></a></center><hr>

      <center><span class="glyphicon glyphicon-user" style="color:  #878787;"></span><h4 style="color:  #878787;">Account Details</h4></center>

      <?php

            
            $qry = "SELECT * FROM `user`";
            $run = mysqli_query($con,$qry);
            $data = mysqli_fetch_array($run);
            $id = $data['id'];
          ?>
      <button class="btn btn-info pi"  id="<?php 
            $qry = 'SELECT * FROM `user`';
            $run = mysqli_query($con,$qry);
            $data = mysqli_fetch_array($run);
            $id = $data['id'];
            echo $id;
          ?>">Personal Information</button>

      <button class="btn btn-info ma"  id="<?php include('dbcon.php');
            $qry = 'SELECT * FROM `user`';
            $run = mysqli_query($con,$qry);
            $data = mysqli_fetch_array($run);
            $id = $data['id'];
            echo $id;
          ?>">Manage Addresses</button><hr>


        <div>
          <center><a href="deleteuser.php?sid=<?php echo $data['id']; ?>" style="text-decoration: none"><h4>Delete Account</h4></a></center>
        </div><hr>
      
       <div style="margin-top:20px;">
           <center>
             <svg width="20" height="20" class="" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-reactid="156"><path fill="#2874F0" stroke-width="0.3" stroke="#2874F0" d="M13 3h-2v10h2V3zm4.83 2.17l-1.42 1.42C17.99 7.86 19 9.81 19 12c0 3.87-3.13 7-7 7s-7-3.13-7-7c0-2.19 1.01-4.14 2.58-5.42L6.17 5.17C4.23 6.82 3 9.26 3 12c0 4.97 4.03 9 9 9s9-4.03 9-9c0-2.74-1.23-5.18-3.17-6.83z" data-reactid="157"></path></svg>
      
           <a href="logout.php" style="text-decoration: none;">Log Out</a>
           </center>
             
        </div> 

    </div>
</div>
</div>
    <div id="result" class="col-sm-9">
    </div>

</div>

</div>
</div>



<script type="text/javascript">
  $(document).ready(function(){
    $('.pi').click(function(){
      var ci = $(this).attr("id");
      var i = ci;
      
                      
      $.ajax({
              method:"POST",
              url:"pinfo.php",
              data:{
                    i:i
              },
              
              success:function(data){
                if(data)
                {
                  
                  $("#result").html(data);  
                }
                
                // $("result").hide();
              }
      });

    });
  });
</script>