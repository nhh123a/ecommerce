<?php
    require_once './core/notify.php';
?>
<!--content-->
<div class="content">
	<div class="container">
		<div class="content-top">
			<h1>All Products</h1>

			<div class="content-top">
            <?php foreach ($data['dataprd'] as $row) {?>
				<div class="col-md-3 col-md2" style = " margin-bottom: 40px;">
					<div class="col-md1 simpleCart_shelfItem">

                            <a href="single.html">
							    <img style=" display:block;width: 171px; height: 191px;" src="http://localhost/ecommerce/ecom/public/images/<?php echo $row['product_image']?>" alt="" />
						    </a>
						    <h3><a href="single.html"><?php echo $row['product_title']?></a></h3>
						    <div class="price">
								<h5 class="item_price">$<?php echo $row['product_price']?></h5>
                                <a href="http://localhost/ecommerce/product/info_product/<?php echo $row['product_id']?>" class="">Add To Cart</a>
								<div class="clearfix"> </div>
						    </div>


						<!-- <a href="single.html">
							<img class="img-responsive" src="http://localhost/ecommerce/ecom/public/images/pi.png" alt="" />
						</a>
						<h3><a href="single.html">Tops</a></h3>
						<div class="price">
								<h5 class="item_price">$300</h5>
								<a href="#" class="item_add">Add To Cart</a>
								<div class="clearfix"> </div>
						</div> -->
					</div>
				</div>	
                <?php }?>	
			 <div class="clearfix"> </div> 
			 <div style="margin-left:500px"><?php echo $data['page'] ?></div>
			</div>
		</div>
	</div>
</div>

<!--//content-->
