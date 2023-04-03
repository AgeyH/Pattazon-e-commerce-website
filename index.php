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
                          <a class="navbar-brand" href="index.php"><img src="img/shopadda_logo.png" class="img-responsive" style="height:25px;"></a>
                        </div>
                        
                        <!--NAV LEFT-->
                        <ul class="nav navbar-nav">
                          <li class="active"><a href="#">Home</a></li>
                          <li><a href="#">Products</a></li>
                          <li><a href="fcart.php">My Cart</a></li>
                          <li><a href="#">24-7 Customer Care</a></li>
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

<head>
  <style>
    body {
        font-family: "Lato", sans-serif;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }

    
}
  </style>
</head>

  
    
  
  <div class="container-fluid" style="height: 500px; background-color: #767bf7;">   
    <center><h1 style="margin-top: 240px;">Welcome To Pattazon</h1></center>
  </div>

  <div>
    <center><h2>Categories</h2></center>
    <?php
      
      $qry = "SELECT * FROM `category`";
      $run = mysqli_query($con,$qry);

      while ($data = mysqli_fetch_assoc($run))
      {
          ?>

            <div class="col-sm-4" align="center" style="margin-top: 40px;">  
                <img src="img/i1.jpg" style="height: 290px; width: 240px; padding-bottom: 5px;">
                <div>
                      <h4><?php echo  $data['catname']; ?></h4>
                    <button class="btn btn-info" ><h5 style="color: black">View Category</h5></button>  
                </div>
                
                <hr>
            </div>

      <?php        
      }

    ?>

  </div>

  

  <div>
    <center><h2 style="margin-top: 950px;">Products</h2></center>
    <div>
        <?php
          
          $qry = "SELECT * FROM `category`";
          $run = mysqli_query($con,$qry);

          while ($data = mysqli_fetch_assoc($run))
          {
             $id1 = $data['id'];
             $catname = $data['catname'];
           
            ?>
            <tr id="<?php echo $id1; ?>">
                <td>
                    <button class="btn btn-danger btn_show" id="<?php echo $catname; ?>" style="margin-left:100px; margin-top: 20px; padding: 2px;"><h><?php echo  $data['catname']; ?></h6></button>  

                </td>
                
            </tr>
          
            <?php

          }
        ?>
        <button class="btn btn-danger btn_show showall" style="margin-left:100px; margin-top: 20px; padding: 2px;"><h>All Categories</h6></button>

            <script type="text/javascript">
                  $(document).ready(function(){
                    $(".showall").click(function(){
                      $("#div1").hide();
                      var i = 'ishan';
                      
                    $.ajax({
                          method:"POST",
                          url:"allproduct.php",
                          data:{
                            x:i
                          },
                            success:function(data){
                              if(data)
                              {
                                alert('ALL PRODUCTS ARE HERE');
                                $("#result").html(data);  

                              }
                             // $("result").hide();

                          }
                        });
                    });
                  });
            </script>


  </div>


  <div id="div1">
        <?php
            
            $qry = "SELECT * FROM `product`";
            $run = mysqli_query($con,$qry);

            while ($data = mysqli_fetch_assoc($run))
            {
              $id1 = $data['id'];
                ?>

                  <div class="col-sm-4" align="center" style="margin-top: 40px;">  
                      
                      
                      <form>
                        
                        <?php
                          if ($data['pquantity'] == 0) 
                          {
                              ?>
                                <img src="productimg/<?php echo $data['pimg']; ?>" style="height: 280px; width: 260px; padding-bottom: 10px; opacity: 0.1">
                                <h4><?php echo  $data['pname']; ?></h4>
                                <!-- <button class="btn btn-info" >View Product</button> -->
                                <h2 style="color: red;"><b>THIS ITEM IS OUT STOCK</b></h2>
                              <?php
                          }

                          else
                          {
                            ?>
                              <img src="productimg/<?php echo $data['pimg']; ?>" style="height: 280px; width: 260px; padding-bottom: 10px;">
                              <h4><?php echo  $data['pname']; ?></h4>
                              <!-- <button class="btn btn-info" >View Product</button> -->
                              <input type="text" name="quantity" id="qty" placeholder="Quantity" style="margin-top: 10px;" required="required" />
                              <button class="btn btn-success bcart" id="<?php
                                                            echo $id1; ?>">Add To Cart</button>
                      
                            <?php
                          }
                        ?>
                        </form>
                      
                      <hr>
                  </div>

               <?php        
            }

          ?>
  </div>
    
  </div>

  <script type="text/javascript">
  $(document).ready(function(){
    $(".btn_show").click(function(){
      $("#div1").hide();
      
      var ci = $(this).attr("id");
      var x =  ci;
      
      $.ajax({
          method:"POST",
          url:"showproduct.php",
          data:{
            x:ci
          },
            success:function(data){
              if(data)
              {
                
                $("#result").html(data);  

              }
              $("result").hide();

          }
        });
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(".bcart").click(function(){
      
      var ci = $(this).attr("id");
      var qty = $("#qty").val();
      var x =  ci;  
      
      $.ajax({
          method:"POST",
          url:"showcart.php",
          data:{
            x:ci,
            y:qty
          },
            success:function(data){
              if(data)
              {
                alert('Successfully Added To Cart');
                //$("#result").html(data);  

              }
              //$("result").hide();

          }
        });
    });
  });
</script>

<!-- 
<script type="text/javascript">
  $(document).ready(function(){

    $(".bcart").click(function(){  
   
      var x =  $(this).attr("id");
      alert(x);
      $.session.set('scart',x);
      alert($.session.get('scart'));

      
      $.ajax({
          method:"POST",
          url:"showcart.php",
          data:{
            x:x
          },
            success:function(data){
              if(data)
              {
                alert(data);

              }
            }
        });
    });
  });
</script> -->
      

  <div id="result"></div>
</body>
</html>

