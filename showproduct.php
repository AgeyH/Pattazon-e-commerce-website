<?php
      include('dbcon.php');
      $id = $_POST['x'];
      $qry = "SELECT * FROM `product` WHERE pcategory='$id'";
      $run = mysqli_query($con,$qry);
      if($run == true)
      {
      		
      		while ($d = mysqli_fetch_assoc($run))
      		{
      			
      			$id1 = $d['id'];

      				?>

        				<div class="col-sm-4" align="center" style="margin-top: 40px;">  

                  <form>
                        
                        <?php
                          if ($d['pquantity'] == 0) 
                          {
                              ?>
                                <img src="productimg/<?php echo $d['pimg']; ?>" style="height: 280px; width: 260px; padding-bottom: 10px; opacity: 0.1">
                                <h4><?php echo  $d['pname']; ?></h4>
                                <!-- <button class="btn btn-info" >View Product</button> -->
                                <h2 style="color: red;"><b>THIS ITEM IS OUT STOCK</b></h2>
                              <?php
                          }

                          else
                          {
                            ?>
                              <img src="productimg/<?php echo $d['pimg']; ?>" style="height: 280px; width: 260px; padding-bottom: 10px;">
                              <h4><?php echo  $d['pname']; ?></h4>
                              <!-- <button class="btn btn-info" >View Product</button> -->
                              <input type="text" name="quantity" id="qty" placeholder="Quantity" style="margin-top: 10px;" required="required" />
                              <button class="btn btn-success bcart" id="<?php
                                                            echo $id1; ?>">Add To Cart</button>
                      
                            <?php
                          }
                        ?>
                        </form>
            			</div>

  					<?php     

  			}
      }

      
  ?>

  <!-- <script type="text/javascript">
  $(document).ready(function(){
    $(".bcart").click(function(){
      
      var ci = $(this).attr("id");
      var x =  ci;
      alert(x);
      
      $.ajax({
          method:"POST",
          url:"showcart.php",
          data:{
            x:ci
          },
            success:function(data){
              if(data)
              {
                
                $("#result").html(data);  

              }
              

          }
        });
    });
  });
</script> -->

<!-- 


                      <img src="productimg/<?php echo $d['pimg']; ?>" style="height: 280px; width: 260px; padding-bottom: 10px;">
                      <h4><?php echo  $d['pname']; ?></h4>
                      <button class="btn btn-info" >View Product</button>
                      <button class="btn btn-success bcart" id="<?php
                                                            include('dbcon.php');
                                                            echo $id1; ?>">
                      Add To Cart</button> -->