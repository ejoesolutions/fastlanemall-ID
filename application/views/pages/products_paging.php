<div class="row">
	<!-- ASIDE -->
	<div id="aside" class="col-md-3">
	<?php echo form_open('page/products/'.$this->uri->segment(3));?>
		<div class="aside" style="margin-bottom:0">
			<h5 class="">Subcategory <a href="<?= base_url('page/all_categories') ?>"><span class="pull-right"><i class="fa fa-sm fa-bars" aria-hidden="true"></i> All Category</span></a></h5>
			<select class="form-control" name="subcategory_id" id="">
				<option selected>Select</option>
				<?php 
				foreach ($sCat as $key) {
					echo '<option value="'.$key['category_id'].'">'.$key['category_type'].'</option>';
				} ?>
			</select>
		</div>
		<hr>
		<div class="aside" style="margin-bottom:0">
			<h5 class="">Price Range</h5>
			<div class="row">
				<div class="col-lg-6">
					<div class="input-group">
						<span class="input-group-addon"><?= $currency['tag'] ?></span>
						<input type="text" class="form-control text-center" name="price_min" placeholder="Min">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="input-group">
						<span class="input-group-addon"><?= $currency['tag'] ?></span>
						<input type="text" class="form-control text-center" name="price_max" placeholder="Max">
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="aside" style="margin-bottom:0">
			<h5 class="">Seller</h5>
			<select class="form-control" name="seller_id" id="">
				<option selected>Select</option>
				<?php 
				foreach ($seller as $key) {
					echo '<option value="'.$key['seller_id'].'">'.$key['shop_name'].'</option>';
				} ?>
			</select>
		</div>
		<hr>
		<div class="aside" style="margin-bottom:0">
			<h5 class="">Shipped From</h5>
			<select class="form-control" name="ship_from" id="ship_from">
				<option selected>Select</option>
				<?php 
				foreach ($state_list as $key) {
					echo '<option value="'.$key['state_id'].'">'.$key['state'].'</option>';
				} ?>
			</select>
		</div>
		<div id="show_list_city"></div>
		<hr>
		<div class="col-lg-12" style="margin-top:10px;padding:0">
			<button type="submit" class="btn btn-primary btn-default btn-xs btn-block">Apply</button>
		</div>
		<?php echo form_close(); ?>
	</div>
	<!-- /ASIDE -->

	<!-- MAIN -->
	<div id="main" class="col-md-9">
		<div class="section-title">
			<h3 class="title"><?php echo $pCat['category_type'] ?></h3>
		</div>

		<?php
		$limit =24;
		if (isset($_GET["page"])) {
			$pn  = $_GET["page"];
		} else {
			$pn=1;
		};

		$start_from = ($pn-1) * $limit;
		$data=[];
		$this->db->LIMIT($limit,$start_from);
		$this->db->where('vu_products_list.seller_status=1 and vu_products_list.product_status=1 and vu_products_list.stock > 0');
		$this->db->where('vu_products_list.category_id',$this->uri->segment(3));

		$price_max='';
		if (isset($_POST['price_max'])) {
			$price_max = $_POST['price_max'];
		}

		$price_min='';
		if (isset($_POST['price_min'])) {
			$price_min = $_POST['price_min'];
		}

		$seller_id='';
		if(isset($_POST['seller_id'])){
			$seller_id = $_POST['seller_id'];
		}

		$subcategory_id='';
		if(isset($_POST['subcategory_id'])){
			$subcategory_id = $_POST['subcategory_id'];
		}

		$ship_from='';
		if(isset($_POST['ship_from'])){
			$ship_from = $_POST['ship_from'];
		}

		$city='';
		if(isset($_POST['city'])){
			$city = $_POST['city'];
		}
		
		if($seller_id > 0){
			$this->db->where('vu_products_list.seller_id', $_POST['seller_id']);
		}

		if($subcategory_id > 0){
			$this->db->where('vu_products_list.subcategory_id', $_POST['subcategory_id']);
		}

		if($subcategory_id > 0){
			$this->db->where('vu_products_list.subcategory_id', $_POST['subcategory_id']);
		}

		if($ship_from > 0){
			$this->db->where('ci_seller.shop_state_id', $_POST['ship_from']);
		}

		if(!empty($city)){
			$this->db->where('ci_seller.shop_city', $_POST['city']);
		}

		if($price_min > 0 && $price_max > 0){
			$this->db->where("vu_products_list.total_price BETWEEN ".$_POST['price_min']." AND ".$_POST['price_max']."");
		}elseif ($price_min > 0) {
			$this->db->where('vu_products_list.total_price >=',$price_min);
		}elseif ($price_max > 0) {
			$this->db->where('vu_products_list.total_price <=',$price_max);
		}

		$this->db->join('ci_seller', 'ci_seller.seller_id = vu_products_list.seller_id', 'left');
		$this->query = $this->db->get('vu_products_list');
		if ($this->query->num_rows() > 0) {
			foreach ($this->query->result_array() as $row) {
				$data[] = $row;
			}
		}
		?>
		<div class="row" style="padding-left:15px">
			<ul class="pagination">
					<?php
						$total_records = 0;
						if(!empty($pList)){
							foreach ($pList as $key) {
								if($key['seller_status']==1 && $key['product_status']==1 && $key['stock'] > 0){
									$total_records++;
								}
							}
						}
						// Number of pages required.
						$total_pages = ceil($total_records / $limit);
						$page = "";
						for ($i=1; $i<=$total_pages; $i++) {
							if ($i==$pn) {
								if($this->uri->segment(4)!=''){
									$page .= "<li class='active'><a href='".$this->uri->segment(4)."?page=".$i."'>".$i."</a></li>";
								}else{
									$page .= "<li class='active'><a href='?page=".$i."'>".$i."</a></li>";
								}
							}
							else  {
								if($this->uri->segment(4)!=''){
									$page .= "<li class=''><a href='".$this->uri->segment(4)."?page=".$i."'>".$i."</a></li>";
								}else{
									$page .= "<li class=''><a href='?page=".$i."'>".$i."</a></li>";
								}
							}
						};
						echo $page;
					?>
		</ul>
		</div>
		<?php
		if(!empty($data)){
			foreach ($data as $row) {
				if($row['stock']>0 && $row['seller_status']==1 && $row['product_status']==1){
					$info = pathinfo( $row['image_file'] );
					$no_extension =  basename( $row['image_file'], '.'.$info['extension'] );
					$thumb_image = $no_extension.'_thumb.'.$info['extension'];
				?>
				<div class="col-md-3 col-sm-6 col-xs-6 c-padding">
					<a href="<?php echo base_url('catalog/product_detail') ?>/<?php echo $row['product_id'].'/1'; ?>">
					<div class="content product product-single custom-banner" style="margin-top:10px;margin-bottom:0">
							<div class="product-thumb" style="margin:0;">
								<div class="content-overlay"></div>
								<?php if($row['discount']!=null){ ?>
									<div class="discount-label red"> <span>-<?php echo $row['discount'].'%' ?></span> </div>
								<?php }
								if($row['top_product']!=null){ ?>
									<div class="discount-label-2 yellow"> <span>TOP!</span> </div>
								<?php }
								if($row['new_product']!=null) { ?>
									<div class="discount-label-3 black"> <span>NEW!</span> </div>
								<?php } ?>
								<div class="center" style="height: 182px;">
									<img src="<?php echo base_url().'images/thumbnail/'.$thumb_image; ?>" alt=" " style="height: 100%; width: 100%; object-fit: contain" />
								</div>
								<div class="content-details fadeIn-bottom">
								<div class="bottom d-flex align-items-center justify-content-center">
									<?php $nuprice=0;$price_after_tax=0;$clean_price=0;$price_1=0; ?>
									<p style="color:black">
										<?php
										if ($row['shop_image']) {
											$image = $row['shop_image'];
											$image_properties = array(
												'src'   => base_url().'logo_vendor/small/'.$image,
												'alt'   => $row['shop_name'],
												'class' => '',
												'width' => '30',
												'height'=> '30',
												'style'=>'border:0',
												'title' => $row['shop_name'],
											);
											echo img($image_properties);

										} else {

											$image_properties = array(
												'src'   => base_url().'logo_vendor/DummyShop.png',
												'alt'   => 'No image',
												'class' => '',
												'width' => '30',
												'height'=> '30',
												'style'=>'border:0',
												'title' => 'No image',
											);
											echo img($image_properties);
										}

										?>
										<br><?= $row['shop_name'] ?><br>
										CODE : <?php echo $row['item_code']; ?>
									</p>
								</div>
								</div>
							</div>
							<div class="product-body" align="left" style="height:107px;margin-top:0.1px">
								<p class="over-flow" style="color:black;margin-top:0;margin-bottom:3px;line-height: 1;">
									<a class="product-name2" href="<?php echo base_url('catalog/product_detail') ?>/<?php echo $row['product_id'].'/1'; ?>"><?php echo $row['product_name'] ?></a>
								</p>
								<h4 class="product-price">
									<?php
										if($row['discount']!=null)
										{
											$clean_price=$row['add_cost']-($row['add_cost']*($row['discount']/100));
											echo '<span style="text-decoration: line-through;color:#AEB6BF;margin-right:2px;font-size:84%"><span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($row['add_cost'],2, '.', $currency['separate']) : substr(number_format($row['add_cost'],2, '.', $currency['separate']), 0 ,-3)).'</span>';

											echo '<span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($clean_price,2, '.', $currency['separate']) : substr(number_format($clean_price,2, '.', $currency['separate']), 0 ,-3));
										}else{
											echo '<span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($row['add_cost'],2, '.', $currency['separate']) : substr(number_format($row['add_cost'],2, '.', $currency['separate']), 0 ,-3));
										}
									?>
								</h4>
								<p style="margin:0;line-height: 1.2;">
									<span class="text-danger" style="font-size:82%">In Stock : <?php echo $row['stock'] ?></span>
									<!-- <br> -->
								</p>
								<span style="color:#AEB6BF;font-size:84%"><?php echo $row['shop_city'] ?>, <?php echo $row['shop_state'] ?></span>

									
							</div>
						</div>
					</a>
				</div>

				<?php
			}
			}
		}else{
			echo "<p class='text-center'>No Products Available</p>";
		}
			?>
	</div>
	<!-- /MAIN -->
</div>
<!-- /row -->

<script>
$(document).ready(function(){   
	$("#ship_from").change(function() {
		if ($("#ship_from").val() > 0) {	
			$.ajax({
				type: "POST",
				url: "<?= base_url('page/get_city') ?>", 
				data: {state_id: $("#ship_from").val()},
				dataType: "text",  
				cache:false,
				success: 
				function(data){
					$("#show_list_city").html(data);
				}
			});// you have missed this bracket
		}
		return false;
	});
});
</script>