<?php
      include('dbcon.php');
      $id = $_POST['x'];
      $qry = "SELECT * FROM `product`";
      $run = mysqli_query($con,$qry);
      if($run == true)
      {
      		
      		while ($d = mysqli_fetch_assoc($run))
      		{
      			
      			$id1 = $d['id'];

      				?>

        				<div class="col-sm-4" align="center" style="margin-top: 40px;">  
            					<img src="productimg/<?php echo $d['pimg']; ?>" style="height: 280px; width: 260px; padding-bottom: 10px;">
            					<h4><?php echo  $d['pname']; ?></h4>
            					<button class="btn btn-info" >View Product</button>
            					<button class="btn btn-success">Add To Cart</button>
            			</div>

  					<?php     

  			}
      }

      
  ?>
