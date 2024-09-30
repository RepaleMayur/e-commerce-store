

<form method="GET" action="<?php echo base_url('index.php/product_client/product_list')?>"> 

<div class="wrapper">
	<div class="left_side">
	<div class="checkbox">
	<div class="min_max">
		<label >min value</label><br>
		<input type="text" name="min_value" value="<?php echo $_GET['min_value'] ?>"><br><br>
		<label >max value</label><br>
		<input type="text" name="max_value" value="<?php echo $_GET['max_value'] ?>">

</div>
<div class="sorting">
	<select name="sorting" id="sorting_drop">
		<option value="">sorting</option>
		<option value="ASC" 
		<?php
			if($_GET['sorting'] == 'ASC'){
				echo 'selected';
			}
		?>>sort_by_asc</option>
		<option value="DESC" 
		<?php	
			if($_GET['sorting'] == 'DESC'){
				echo 'selected';
			}
		?>>sort_by_desc</option>
           
	</select>
</div>

<?php

			
	foreach($categories as $value){ 
	// var_dump($value);
		$ids = $value->id;
		$checked = "checked";
		if(in_array($ids, $c_id)){
?>
		<input type="checkbox" name="checkbox[]" checked="checked" value="<?php echo $value->id;?>">
		<label for=""><?php echo $value->cat_title ?></label><br>
	<?php
		}
		else{ 
	?>
		<input type="checkbox" name="checkbox[]"  value="<?php echo $value->id;?>">
		<label for=""><?php echo $value->cat_title ?></label><br>
			
				
	<?php
		}
	}
		
	?>
		<input type="text" name="value_search" value="<?php echo $_GET['value_search']?>">
		<input type="submit" name="apply" >
		</div>
					

	</div>
	</form>
	<div class="right_side">
							
<?php
foreach($pro as $row){
    // var_dump($row);
	
	
 
	$img = unserialize($row->images);

	
?>

<div class="product_list" >
	
	<a href="<?php echo base_url(''); ?>index.php/Product_client/get_product?id=<?php echo $row->id;?>"><img src="<?php echo base_url().'/upload/'. $img[0]; ?>"  class="product_img"></a>

    <a href="" class="product_name">Name   <?php echo $row->product_name; ?></a>
    <a href="" class="product_price">price <?php  echo $curr_sym->setting_value;?>  <?php echo  $row->product_price; ?></a>
	
    <a href="<?php echo base_url('index.php/cart_client/add_card?id=')?><?php echo $row->id.'&quantity=1'?>" name="add_card" value="ADD CARD" class="btns ">add card</a>
    <a href="<?php echo base_url(''); ?>index.php/Product_client/get_product?id=<?php echo $row->id; ?>" class="single_view">view</a>

</div>
<?php
}
?>

	</div>
</div>
<!-- pagination -->
<div class="pagination_design">
	<?php echo $links;?>
</div>



