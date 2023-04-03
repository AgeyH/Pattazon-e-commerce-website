

<?php

  
  if(isset($_SESSION['uid']))
  {
    header('location:index.php');
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Here</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">

  <!-- bootstrap-css -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
  <!--// bootstrap-css -->
  <!-- css -->
  <link rel="stylesheet" href="css/style1.css" type="text/css" media="all" />
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
<body bgcolor="black">
    <div align="center">
    <div  class="new col-lg-6 col-xs-12">
      <h2 style="color: black;">New User</h2>
      <form method="POST">
        <input type="text" name="firstname" id="firstname" placeholder="
        firstname" class="form-control" required="required" />
        <input type="text" name="lastname" id="lastname" placeholder="lastname" class="form-control" required="required" />
        <input type="password" name="password" id="password" placeholder="password" class="form-control" required="required" />
        <!-- <input type="text" name="cpassword" class="form-control" required="required" />  -->
        <input type="text" name="email" id="email" placeholder="Email" class="form-control" required="required" />
        <input type="text" name="address" id="address" placeholder="Address" class="form-control" required="required" />
        <input type="submit" name="submit" id="signup" value="Submit" class="form-control" required="required" />
      </form>
    </div>

    <div  class="new col-lg-6 col-xs-12">
      <h2 style="color: black;">Already A User?</h2>
      <form method="POST" action="login.php" >
        <input type="text" name="email1" class="form-control" required="required" />
        <input type="password" name="password1" class="form-control" required="required" />
        
        <input type="submit" name="submit1" value="Submit" class="form-control">
      </form>
    </div>

      
      
    
    <div id="ack"></div>
</body>
</html>


<script>
  $(document).ready(function(){
    $("#signup").click(function(){
      alert('SIGN UP');

        var firstname=$("#firstname").val();
        var lastname=$("#lastname").val();
        alert('dwwfwefewfwefwe');
        var email=$("#email").val();
        var password=$("#password").val();
        var address = $("#address").val();
        //var cpassword=$("#cpassword").val();

        $.ajax({
          type: 'POST',
          url : 'signup.php',
          data:{
                firstname:firstname,
                lastname:lastname,
                email:email,
                password:password,
                address:address
                //cpassword:cpassword
              },
            beforeSend: function(){ $("#signup").val('Connecting...');},
              success:function(data){
                if (data) 
                {
                  window.location='index.php';
                  alert('Welcome To Pattazon');

                }

              }
          });
          return false;
    }); 
  });
</script>




<?php

  include('dbcon.php');


  if(isset($_POST['submit1']))
  {

    $email = $_POST['email1'];
    $password = $_POST['password1'];

    $qry = "SELECT * FROM `user` WHERE password='$password' AND email='$email'";
    $run = mysqli_query($con,$qry);
    $row = mysqli_num_rows($run);
    session_start(); 
     if($row > 0)
    {

      $data = mysqli_fetch_array($run);
      $id = $data['id'];
      
      $_SESSION['uid'] = $id;
      header('Location:index.php');

      
    }

    else
    {
      ?>
      <script>
        alert('Usename Or Password is wrong.');
        window.open('login.php','_self')
      </script>
      <?php
      
    }
  


    
  }
?>