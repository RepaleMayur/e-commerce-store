
<body class="listing_table">

    
<form action="<?php base_url().'index.php/admin/Product/index'?>" method="GET" class="search_btn">

	<input type="text" name="value_search" placeholder="search">
	<input type="submit" name="search" class="btn">   
</form>



	<button class="add_user_btn"><a href="<?php echo base_url().'index.php/admin/Product/add/'?>" class="add_btn">add product</a></button>
<form method="post" action="<?php echo base_url(''); ?>index.php/admin/product/delete_multipal"> 

	<table align=center class="table"  cellspacing="15">
		<thead>
		<tr><br>
			
			<a href="<?php echo base_url(''); ?>index.php/admin/product/delete_multipal"><button type="submit"  name="save" class="btn multipal_delete_btn" 
			onclick="return confirm('Are you sure to delete')">DELETE</button></a>
		
			<th><input type="checkbox" id="checkAl"></th>

			<!-- sort asc and desc by giving parameters -->
			<th><a href="<?php echo base_url(''); ?>index.php/admin/Product/index/?sort=id&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>">id</a></th>
			<th><a href="<?php echo base_url(''); ?>index.php/admin/Product/index/?sort=images&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>">images</a></th>
			<th><a href="<?php echo base_url(''); ?>index.php/admin/Product/index/?sort=product_name&order=<?php echo  $order =='DESC' ? 'ASC' : 'DESC' ?>">product name</a></th>
			<th><a href="<?php echo base_url(''); ?>index.php/admin/Product/index/?sort=product_desc&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>">product description</a></th>
			<th><a href="<?php echo base_url(''); ?>index.php/admin/Product/index/?sort=product_price&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>">product price  <?php ?></a></th>
			<th><a href="<?php echo base_url(''); ?>index.php/admin/Product/index/?sort=product_stock&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>">product stock</a></th>
			<th>update</th>
			<th>delete</th>
		</tr>
		</thead>

	<?php


		foreach($pro_list as $row){

			// var_dump($row);
			$img = unserialize($row->images);

			// var_dump($row['images']);
	?>


	<tr>
		<td><input type="checkbox" class="checkItem" name="check[]" value="<?php echo $row->id; ?>"></td>
		<td><?php echo $row->id; ?></td>
		<td><img src="<?php echo base_url('').'upload/thumb_small/'. $img[0] ; ?>" width="100" height="100"></td>
		<td><?php echo $row->product_name; ?></td>
		<td class="disc"><?php echo $row->product_desc; ?></td>
		<td><?php  echo $curr_sym->setting_value;?> <?php echo $row->product_price;?></td>
		<td><?php echo $row->product_stock; ?></td>

		<td><a href="<?php echo base_url(''); ?>index.php/admin/product/delete_product/?id=<?php echo $row->id; ?>" class="delete_btn del_btn" 
		onclick="return confirm('Are you sure to delete')">Delete</a></td>
		<td><a href="<?php echo base_url(''); ?>index.php/admin/product/show_value/?id=<?php echo $row->id; ?>" class="update_btn del_btn">update</a></td>

	</tr>


	<?php
	}
	
	?>


	</table>

	<div class="pagination_design">
		<?php echo $links;?>
	</div>


</form>







