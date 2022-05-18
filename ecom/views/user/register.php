<div class="container">
	<div class="register">
		<h1>Register</h1>
		  	  <form  action = "http://localhost/ecommerce/user/register/" method = "post"> 
				 <div class="col-md-6  register-top-grid">
					
					<div class="mation">
						<span>First Name</span>
						<input name ="fname" type="text"> 
						<span style="color:red;"><?php echo $data['dataErr']['fnameErr']?></span>
						<span>Last Name</span>
						<input name="lname" type="text"> 
						<span style="color:red;"><?php echo $data['dataErr']['lnameErr']?></span>
						<span>Phone</span>
						<input name = "phone" type="text"> 
						<span style="color:red;"><?php echo $data['dataErr']['phoneErr']?></span>
						<span>Email</span>
						<input name="email" type="text"> 
						<span style="color:red;"><?php echo $data['dataErr']['emailErr']?></span>
					</div>
					 <div class="clearfix"> </div>
					   <!-- <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up</label>
					   </a> -->
					 </div>
				     <div class=" col-md-6 register-bottom-grid">
						   
							<div class="mation">
								<span>Password</span>
								<input name="pass" type="text">
								<span style="color:red;"><?php echo $data['dataErr']['passErr']?></span>
								<span>Confirm Password</span>
								<input name="cfpass" type="text">
								<span style="color:red;"><?php echo $data['dataErr']['cfpassErr']?></span>
								<span>Address1</span>
						 		<input name="address1"type="text"> 
								<span style="color:red;"><?php echo $data['dataErr']['add1Err']?></span>
								<span>Address2</span>
						 		<input name="address2" type="text"> 
								<span style="color:red;"><?php echo $data['dataErr']['add2Err']?></span>
							</div>
					 </div>
					 <div class="clearfix"> </div>
					 <div class="register-but">
				   <form>
					   <input type="submit" value="submit">
					   <div class="clearfix"> </div>
				   </form>
				</div>
				</form>
				
				
		   </div>
</div>
