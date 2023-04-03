<?php
	include('dbcon.php');
	if (isset($_POST['x'])) 
	{

		
										
										
										$qry1 = "SELECT * FROM `cart` WHERE status = '1'";
										$run1 = mysqli_query($con,$qry1);
										$data1 = mysqli_fetch_assoc($run1);
										$user_id = $data1['user_id'];
										$product_id = $data1['product_id'];
										$booked_quantity = $data1['pqty'];

										$qry2 = "SELECT * FROM `product` WHERE id='$product_id'";
										$run2 = mysqli_query($con,$qry2);
										$data2=  mysqli_fetch_assoc($run2);
										$old_quantity = $data2['pquantity'];

										$modified_quantity = $old_quantity - $booked_quantity;
										
										$qry4 = "UPDATE `product` SET `pquantity`= '$modified_quantity' WHERE id='$product_id'";
										$run4 = mysqli_query($con,$qry4);
										echo $modified_quantity;
										
		?>

			<div class="col-sm-12">
				<div class="col-md-6">
              		<div style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .08);  margin-top: 100px; border-radius: 2px; background-color: #fff;" >

             	 		<div class="row">
            				<h4 class="col-md-2" style="color: #6a7b76;"><b>Payment Option</b></h4>
							<img class="col-md-2"  src="img/visa.png" class="img-responsive" style="width: 80px; height: 50px;">
			  			</div>
				
					
						<input type="password" name="text" placeholder="Enter Credit Card Number" class="form-control" style="width: 250px;">

					</div>
				</div>

		<div class="col-md-6">

			<div style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .08);  margin-top: 100px; border-radius: 2px; background-color: #fff; height: 100px;" >

			<center><button  class="btn btn-success cod">Cash On Delivery</button></center>
		</div>
			
		</div>
	</div>

		<?php
	}
	
?>


<script type="text/javascript">
	 $(document).ready(function(){
    $(".cod").click(function(){
      alert("CHECKOUT");
      var x = 'ishan';
      $.ajax({
        url: 'cod.php',
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