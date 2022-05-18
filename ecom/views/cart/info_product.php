<div class="single">
<?php

?>
	<?php  foreach ($data['data'] as $row) { ?>

<div class="container">
<div class="col-md-9">
	<div class="col-md-5 grid">		
		<div class="flexslider">
			  <ul class="slides">
			    <li data-thumb="images/si.jpg">
			        <div class="thumb-image"> <img src="http://localhost/ecommerce/ecom/public/images/<?php echo $row['product_image']?>" data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    <!-- <li data-thumb="images/si1.jpg">
			         <div class="thumb-image"> <img src="http://localhost/ecommerce/ecom/public/images/si1.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    <li data-thumb="images/si2.jpg">
			       <div class="thumb-image"> <img src="http://localhost/ecommerce/ecom/public/images/si2.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li>  -->
			  </ul>
		</div>
	</div>	
<div class="col-md-7 single-top-in">
						<div class="single-para simpleCart_shelfItem">
							<h1><?php echo $row['product_title']?></h1>
							<p><?php echo $row['product_desc']?></p>
							<div class="star-on">
								<ul>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
								</ul>
								<div class="review">
									<a href="#"> 3 reviews </a>/
									<a href="#">  Write a review</a>
								</div>
							<div class="clearfix"> </div>
							</div>
							
								<label  class="add-to item_price">$<?php echo $row['product_price']?></label>
							
							<div class="available">
								<h6>Available Options :</h6>
								<ul>
									
								<li>Size:<select>
									<option>Large</option>
									<option>Medium</option>
									<option>small</option>
								</select></li>
								<li>Cost:
										<select>
										<option>V.N.D</option>
										<option>U.S.Dollar</option>
									</select></li>
							</ul>
						</div>
								<a href="http://localhost/ecommerce/cart/addtocart/<?php echo $row['product_id']?>" class="cart item_add">Add to Cart</a>
						</div>
					</div>
	<?php }?>
			<div class="clearfix"> </div>
			<div class="content-top1">
			<?php foreach ($data['datatop3'] as $row) {?>
				<div class="col-md-4 col-md3">
					<div class="col-md1 simpleCart_shelfItem">
						<a href="http://localhost/ecommerce/product/info_product/<?php echo $row['product_id']?>">
							<img style ="height:181px;width:161px" class="img-responsive" src="http://localhost/ecommerce/ecom/public/images/<?php echo $row['product_image']?>" alt="" />
						</a>
						<h3><a href="http://localhost/ecommerce/product/info_product/<?php echo $row['product_id']?>"><?php echo $row['product_title']?></a></h3>
						<div class="price">
								<h5 class="item_price">$<?php echo $row['product_price']?></h5>
								<a href="http://localhost/ecommerce/product/info_product/<?php echo $row['product_id']?>" class="item_add">Add To Cart</a>
								<div class="clearfix"> </div>
						</div>
					</div>
				</div>	
			<?php }?>
			<!-- <div class="col-md-4 col-md3">
					<div class="col-md1 simpleCart_shelfItem">
						<a href="single.html">
							<img class="img-responsive" src="http://localhost/ecommerce/ecom/public/images/pi7.png" alt="" />
						</a>
						<h3><a href="single.html">Tops</a></h3>
						<div class="price">
								<h5 class="item_price">$300</h5>
								<a href="#" class="item_add">Add To Cart</a>
								<div class="clearfix"> </div>
						</div>
						
					</div>
				</div>	-->
			<!-- <div class="col-md-4 col-md3">
					<div class="col-md1 simpleCart_shelfItem">
						<a href="single.html">
							<img class="img-responsive" src="http://localhost/ecommerce/ecom/public/images/pi.png" alt="" />
						</a>
						<h3><a href="single.html">Tops</a></h3>
						<div class="price">
								<h5 class="item_price">$300</h5>
								<a href="#" class="item_add">Add To Cart</a>
								<div class="clearfix"> </div>
						</div>
						
					</div>
				</div>		 -->
			
			<div class="clearfix"> </div>
			</div>
</div>
<!----->
<div class="col-md-3 product-bottom">
			<!--categories-->
				<!-- <div class=" rsidebar span_1_of_left">
						<h3 class="cate">Categories</h3>
							 <ul class="menu-drop">
							<li class="item1"><a href="#">Men </a>
								<ul class="cute">
									<li class="subitem1"><a href="single.html">Cute Kittens </a></li>
									<li class="subitem2"><a href="single.html">Strange Stuff </a></li>
									<li class="subitem3"><a href="single.html">Automatic Fails </a></li>
								</ul>
							</li>
							<li class="item2"><a href="#">Women </a>
								<ul class="cute">
									<li class="subitem1"><a href="single.html">Cute Kittens </a></li>
									<li class="subitem2"><a href="single.html">Strange Stuff </a></li>
									<li class="subitem3"><a href="single.html">Automatic Fails </a></li>
								</ul>
							</li>
							<li class="item3"><a href="#">Kids</a>
								<ul class="cute">
									<li class="subitem1"><a href="single.html">Cute Kittens </a></li>
									<li class="subitem2"><a href="single.html">Strange Stuff </a></li>
									<li class="subitem3"><a href="single.html">Automatic Fails</a></li>
								</ul>
							</li>
							<li class="item4"><a href="#">Accesories</a>
								<ul class="cute">
									<li class="subitem1"><a href="single.html">Cute Kittens </a></li>
									<li class="subitem2"><a href="single.html">Strange Stuff </a></li>
									<li class="subitem3"><a href="single.html">Automatic Fails</a></li>
								</ul>
							</li>
									
							<li class="item4"><a href="#">Shoes</a>
								<ul class="cute">
									<li class="subitem1"><a href="single.html">Cute Kittens </a></li>
									<li class="subitem2"><a href="single.html">Strange Stuff </a></li>
									<li class="subitem3"><a href="single.html">Automatic Fails </a></li>
								</ul>
							</li>
						</ul>
					</div>  -->
				<!--initiate accordion-->
						<!-- <script type="text/javascript">
							$(function() {
							    var menu_ul = $('.menu-drop > li > ul'),
							           menu_a  = $('.menu-drop > li > a');
							    menu_ul.hide();
							    menu_a.click(function(e) {
							        e.preventDefault();
							        if(!$(this).hasClass('active')) {
							            menu_a.removeClass('active');
							            menu_ul.filter(':visible').slideUp('normal');
							            $(this).addClass('active').next().stop(true,true).slideDown('normal');
							        } else {
							            $(this).removeClass('active');
							            $(this).next().stop(true,true).slideUp('normal');
							        }
							    });
							
							});
						</script> -->
<!--//menu-->
<!--seller-->
				<div class="product-bottom">
						<h3 class="cate">Best Sellers</h3>
					<?php 
					for ($i=0; $i < count($data['datatopsell']) ; $i++) { 
						foreach ($data['datatopsell'][$i] as $key => $row) { ?>

					<div class="product-go">
						<div class=" fashion-grid">
							<a href="http://localhost/ecommerce/product/info_product/<?php echo $row['product_id'] ?>"><img class="img-responsive " src="http://localhost/ecommerce/ecom/public/images/<?php echo $row['product_image'] ?>" alt=""></a>	
						</div>
						<div class=" fashion-grid1">
							<h6 class="best2"><a href="http://localhost/ecommerce/product/info_product/<?php echo $row['product_id'] ?>" ><?php echo $row['product_title']?></a></h6>
							<span class=" price-in1">$<?php echo $row['product_price'] ?></span>
						</div>	
						<div class="clearfix"> </div>
					</div>
					
					<?php }
						}   ?>
				</div>

<!--//seller-->
<!--tag-->
				<div class="tag">	
						<h3 class="cate">Tags</h3>
					<div class="tags">
						<ul>
							<?php for ($i=0; $i <count($data['datatag']) ; $i++) { ?>
								<li><a href="#"><?php echo $data['datatag'][$i] ?></a></li>
							<?php }?>
							<li><a href="#">design</a></li>
						<div class="clearfix"> </div>
						</ul>
				</div>					
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	</div>