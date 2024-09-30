
<?php
   foreach($cat_name as $title){
    ?>
    <h1 class="title heading"> <?php echo $title->cat_title; ?></h1>
<?php 
}		
	foreach($categories as $row){
		$img = unserialize($row->images);

           
 ?>           

    <div class="single_view_list">
        <a href="<?php echo base_url(''); ?>index.php/Product_client/get_product?id=<?php echo $row->pro_id?>"><img src="<?php echo base_url().'/upload/'. $img[0]; ?>"  class="product_img"></a>
        <a href="" class="product_name">Name   <?php echo $row->product_name; ?></a>
        <a href="" class="product_price">price   <?php echo  $row->product_price; ?></a>
        <a href="<?php echo base_url('index.php/cart_client/add_card?id=')?><?php echo $row->pro_id.'&quantity=1'?>" name="add_card" value="ADD CARD" class="btns ">add card</a>
        <a href="<?php echo base_url(''); ?>index.php/Product_client/get_product?id=<?php echo $row->pro_id; ?>" class="single_view">view</a>



    </div>
<?php

}
?>

