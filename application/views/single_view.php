<form method="get" action="<?php echo base_url('index.php/cart_client/add_card')?>"> 

<?php
	foreach($single_view as $row){
		$img = unserialize($row->images);	
?>

<div class="product_list_all_images">
<?php
    foreach($img as $value){
?>
	<div class="row">
		<div class="column">
			<img src="<?php echo base_url(). 'upload/'. $value; ?>" alt="Nature" style="width:100px"  class="small_img">
		</div>
		<aside>
			
		</aside>
		
	</div>
		
<?php
}
?>

</div>
<div class="image_info" >
		<img class="big_img product_img image_adjust" src="<?php echo base_url().'upload/'. $img[0]; ?>" height="300px" id="expandedImg" style="width:400px"   ><br>
	</div>
<div class="image_details">
	<a href="" >Name:-  <?php echo $row->product_name; ?></a><br><br>
	<a href="" >price:-   <?php echo $row->product_price; ?></a><br><br>
	<a href="" >stock:-   <?php echo $row->product_stock; ?></a><br><br>
	<p><a href="" >description:- <br> <?php echo $row->product_desc; ?></a></p><br>
<select name="add_card_qyt" class="cart_select">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	

</select>
	<input type="hidden" name="id" value="<?php echo $row->id;?>">
	<input type="submit" name="submit" value="add cart">
<br><br>

</div>
<?php
	}
?><br><br><br><br>
	<h1 class="title heading">related product</h1>
<?php

foreach($releated_pro as $val){
	$img = unserialize($val->images);
?>
<div class="top_product">
	<a href="<?php echo base_url('index.php/product_client/get_product?id=')?><?php echo $val->pro_id; ?>"><img src="<?php echo base_url().'/upload/'. $img[0]; ?>"  class="product_img"></a>
	<a href="#" class="product_name">Name   <?php echo $val->product_name; ?></a>
	<a href="#" class="product_price">price   <?php echo  $val->product_price; ?></a>
    <a href="<?php echo base_url('index.php/cart_client/add_card?id=')?><?php echo $row->id.'&quantity=1'?>" name="add_card" value="ADD CARD" class="btns ">add card</a>
	<a href="<?php echo base_url('index.php/product_client/get_product?id=')?><?php echo $row->id;?>" class="single_view">view</a>
</div>
<?php
}
?>

</form>
<script type="text/javascript">
$(document).ready(function(){
	$(".big_img").imagezoomsl({
		zoomrange: [4, 4]
	});
});

</script>

<script type="text/javascript">
$(document).ready(function(){
	$(".small_img").click(function(){
		$(".big_img").attr('src', $(this).attr('src'));
	});
});


</script>