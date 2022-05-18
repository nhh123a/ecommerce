<?php
$title = isset($data['title']) ? $data['title'] : 'Trang chủ';
$total = isset($_SESSION['cart']) ? number_format($_SESSION['cart']) : 0;
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $title ?></title>
<link href="http://localhost/ecommerce/ecom/public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://localhost/ecommerce/ecom/public/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="http://localhost/ecommerce/ecom/public/css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashion Mania Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start menu -->
<link href="http://localhost/ecommerce/ecom/public/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="http://localhost/ecommerce/ecom/public/js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="http://localhost/ecommerce/ecom/public/js/simpleCart.min.js"> </script>
<!-- slide -->
<script src="http://localhost/ecommerce/ecom/public/js/responsiveslides.min.js"></script>
   <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<!--header-->
<div class="header">
	<div class="header-top">
		<div class="container">
		<div class="col-sm-4 world">

				</div>
				<div class="col-sm-4 logo">
					<a href="http://localhost/ecommerce/"><img src="http://localhost/ecommerce/ecom/public/images/logo.png" alt=""></a>	
				</div>
		
			<div class="col-sm-4 header-left">
					<?php if(!isset($_SESSION['name'])){		
						echo '<p class="log"><a href="http://localhost/ecommerce/user/login"  >Login</a>
						<span>or</span><a  href="http://localhost/ecommerce/user/register"  >Signup</a></p>';
					}else{
						echo '<p class="log">
						<span>Welcome: '.$_SESSION['name'].'</span><a  href="http://localhost/ecommerce/user/logout"  >Loguot</a></p>';
					}?>
						<div class="cart box_1">
						<a href="http://localhost/ecommerce/cart/">
						<h3> <div class="total">
							<span class="">$<?php echo $total ?></span></div>
							<img src="http://localhost/ecommerce/ecom/public/images/cart.png" alt=""/></h3>
						</a>
						<p><a href="http://localhost/ecommerce/cart/" class="simpleCart_empty">Go to Cart</a></p>

					</div>
					<div class="clearfix"> </div>
			</div>
				<div class="clearfix"> </div>
		</div>
		</div>
		<div class="container">
			<div class="head-top">
				<div class="col-sm-2 number">
					<span><i class="glyphicon glyphicon-phone"></i>085 596 234</span>
				</div>
		 <div class="col-sm-8 h_menu4">
				<ul class="memenu skyblue">
					  <li class=" grid"><a  href="http://localhost/ecommerce/">Home</a></li>	
				      <li><a  href="#">Category</a>
				      	<div class="mepanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul>
										<?php foreach ($data['data'] as $row) { ?>
											<li><a href="http://localhost/ecommerce/category/index/<?php echo $row['cat_id']?>"><?php echo $row['cat_title']?></a></li>
										<?php } ?>
										<!-- <li><a href="products.html">Shirts</a></li>
										<li><a href="products.html">Sports Wear</a></li>
										<li><a href="products.html">Shorts</a></li>
										<li><a href="products.html">Suits & Blazers</a></li>
										<li><a href="products.html">Formal Shirts</a></li>
										<li><a href="products.html">Sweatpants</a></li>
										<li><a href="products.html">Swimwear</a></li>
										<li><a href="products.html">Trousers & Chinos</a></li>
										<li><a href="products.html">T-Shirts</a></li>
										<li><a href="products.html">Underwear & Socks</a></li> -->
									</ul>	
								</div>							
							</div>

				    <li class="grid"><a  href="#">	Brands</a>
					  	<div class="mepanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul>
										<?php foreach ($data['databrand'] as $row) { ?>
											<li><a href="http://localhost/ecommerce/brand/index/<?php echo $row['brand_id']?>"><?php echo $row['brand_title'] ?></a></li>
										<?php }?>
										<!-- <li><a href="products.html">Shirts & Tops</a></li>
										<li><a href="products.html">Sports Wear</a></li>
										<li><a href="products.html">Kurtas & Kurties</a></li>
										<li><a href="products.html">Suits & Blazers</a></li>
										<li><a href="products.html">Sarees</a></li>
										<li><a href="products.html">Sweatpants</a></li>
										<li><a href="products.html">Swimwear</a></li>
										<li><a href="products.html">Night-Suits</a></li>
										<li><a href="products.html">T-Shirts</a></li>
										<li><a href="products.html">Jeans</a></li> -->
									</ul>	
								</div>							
							</div>
							
						  </div>
						</div>
			    </li>
				<li><a  href="typo.html">Blog</a></li>				
				<li><a class="color6" href="contact.html">Conact</a></li>
			  </ul> 
			</div>
				<div class="col-sm-2 search">		
					<!-- <a class="play-icon popup-with-zoom-anim" href=""><i class="glyphicon glyphicon-search"> </i> </a> -->
					<form action="http://localhost/ecommerce/product/search" method="get">
						<input style="width:111px" type="text" name = "search" placeholder ="Tìm kiếm ...">
						<input type="submit" value = "Tìm">
					</form>
				</div>
		<div class="clearfix"> </div>
			<!---pop-up-box---->
					  <script type="text/javascript" src="http://localhost/ecommerce/ecom/public/js/modernizr.custom.min.js"></script>    
					<link href="http://localhost/ecommerce/ecom/public/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
					<script src="http://localhost/ecommerce/ecom/public/js/jquery.magnific-popup.js" type="text/javascript"></script>
					<!---//pop-up-box---->
				<div id="small-dialog" class="mfp-hide">
				<div class="search-top">
						<div class="login">
							<input type="submit" value="">
							<input type="text" value="Type something..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">		
						</div>
						<p>	Shopping</p>
					</div>				
				</div>
				 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
				</script>			
	<!---->		
		</div>
	</div>
</div>
<div class="banner">
	<div class="col-sm-3 banner-mat">
		<img class="img-responsive"	src="http://localhost/ecommerce/ecom/public/images/ba1.jpg" alt="">
	</div>
	<div class="col-sm-6 matter-banner">
	 	<div class="slider">
	    	<div class="callbacks_container">
	      		<ul class="rslides" id="slider">
	        		<li>
	          			<img src="http://localhost/ecommerce/ecom/public/images/1.jpg" alt="">
	       			 </li>
			 		 <li>
	          			<img src="http://localhost/ecommerce/ecom/public/images/2.jpg" alt="">   
	       			 </li>
					 <li>
	          			<img src="http://localhost/ecommerce/ecom/public/images/1.jpg" alt="">
	        		</li>	
	      		</ul>
	 	 	</div>
		</div>
	</div>
	<div class="col-sm-3 banner-mat">
		<img class="img-responsive" src="http://localhost/ecommerce/ecom/public/images/ba.jpg" alt="">
	</div>
	<div class="clearfix"> </div>
</div>
