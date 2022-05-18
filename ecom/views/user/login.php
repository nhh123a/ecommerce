<?php
	require_once './core/notify.php';	
?>
<div class="account">
	<div class="container">
		<h1>Account</h1>
		<div class="account_grid">
			   <div class="col-md-6 login-right">
				<form action="http://localhost/ecommerce/user/login" method="post">
					<?php //foreach ($data['dataErr'] as $d) { ?>
					
					<span>Email Address</span>
					<input name ="email" type="text"> 
					<span style="color:red;"><?php echo $data['dataErr']['emailErr']?></span>
					<span>Password</span>
					<input name="pass" type="text"> 
					<span style="color:red;"><?php echo $data['dataErr']['passErr']?></span>
					<div class="word-in">
				  		<a class="forgot" href="#">Forgot Your Password?</a>
				 		 <input name ="sbm" type="submit" value="Login">
				  	</div>
					<?php //} ?> 
			    </form>
			   </div>	
			    <div class="col-md-6 login-left">
			  	 <h4>NEW CUSTOMERS</h4>
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				 <a class="acount-btn" href="http://localhost/ecommerce/user/register">Create an Account</a>
			   </div>
			   <div class="clearfix"> </div>
			 </div>
	</div>
</div>