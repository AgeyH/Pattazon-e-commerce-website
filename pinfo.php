<?php
	include('dbcon.php');

	$id = $_POST['i'];
	if(isset($id))
	{
		$sql = "SELECT * FROM `user` WHERE id='$_SESSION[uid]'";
		$run = mysqli_query($con,$sql);

		while( $data = mysqli_fetch_assoc($run))
		{
			?>

			<script type="text/javascript">
							$(document).ready(function(){
								$("#updatesubmit").click(function(){
									
									var u_id = $(this).attr("id");
									var y = u_id;
									var firstname = $("#firstname").val();
									var lastname = $("#lastname").val();
									var email = $("#email").val();
									var password = $("#password").val();
								
									
									if(confirm("Are You Sure To Update Your Information?"))
									{	
										$.ajax({
											method:"POST",
											url:"udata.php",
											data:{
												y:y,
												firstname:firstname,
												lastname:lastname,
												email:email,
												password:password
											},
											success:function(data){
												if (data) 
												{
													
													alert('Information Updated successfully.');
													$(y).html(data);
												}
											}
										});
									}
								});
							});
			</script>

			<div   style="background-color: white; height: auto; width: auto; margin-top: 130px;">

			<div>
				<br>
				<h4 style="margin-left: 20px;">Personal Information</h4>
			</div>
				
					<form>
					
							
							<b><input type="text" name="firstname" id="firstname" class="form-control" value='<?php echo $data["firstname"] ?>' style="width: 200px; float: left; margin-left: 20px;" disabled></b>
						
						
						
							<b><input type="text" name="lastname" id="lastname" class="form-control"  value='<?php echo $data["lastname"] ?>' style="width: 200px; margin-left: 250px; "></b>
					
						<div>
								<br>
								<h4 style="margin-left: 20px;">E-Mail</h4>
						</div>
			
						
							<b><input type="email" name="email" id="email" class="form-control"  value='<?php echo $data["email"] ?>' style="width: 200px; margin-left: 20px;" /></b>
						

						<div>
								<br>
								<h4 style="margin-left: 20px;">Password</h4>
						</div>

						<input type="password" name="password" id="password"  value='<?php echo $data["password"] ?>' style="width: 200px; margin-left: 20px;" class="form-control"><br>
						
						
						<div class="row">
							<input type="button" class="btn btn-success" name="update" id="updatesubmit" value="Update" style="margin-left: 37px;">
						</div>
						
					</form>
				
			</div>

			<div id="div1">
				
			</div>
			<?php
		}
	}
  
  	


?>