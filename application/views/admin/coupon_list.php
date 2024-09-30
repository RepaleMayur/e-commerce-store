
<body class="listing_table">
  
   
<form action="<?php base_url().'index.php/admin/Coupon/index'?>" method="GET" class="search_btn">

	<input type="text" name="value_search" placeholder="search">
	<input type="submit" name="search" class="btn">   
</form>


	<button class="add_user_btn"><a href="<?php echo base_url().'index.php/admin/Coupon/add_coupon'?>" class="add_btn">add coupon</a></button>

<form method="post" action="<?php echo base_url(''); ?>index.php/admin/product/delete_multipal">
	<table align=center class="table"  cellspacing="20">
		<thead>
			<tr>
				<a href="<?php echo base_url(''); ?>index.php/admin/product/delete_multipal"><button type="submit"  name="save" class="btn multipal_delete_btn" 
				onclick="return confirm('Are you sure to delete')">DELETE</button></a>
				<th><input type="checkbox" id="checkAl"></th>


				<th><a href='<?php echo base_url(''); ?>index.php/admin/Coupon/index/?sort=id&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>id</a></th>
				<th><a href='<?php echo base_url(''); ?>index.php/admin/Coupon/index/?sort=coup_title&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>Coupon title</a></th>
				<th><a href='<?php echo base_url(''); ?>index.php/admin/Coupon/index/?sort=coup_code&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>Coupon code</a></th>
				<th><a href='<?php echo base_url(''); ?>index.php/admin/Coupon/index/?sort=coup_type&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>Coupon type</a></th>
				<th><a href='<?php echo base_url(''); ?>index.php/admin/Coupon/index/?sort=coup_disc&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>Coupon discount</a></th>
				<th><a href='<?php echo base_url(''); ?>index.php/admin/Coupon/index/?sort=valid_from&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>valid from</a></th>
				<th><a href='<?php echo base_url(''); ?>index.php/admin/Coupon/index/?sort=valid_to&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>valid to</a></th>
				<th>delete</th>
				<th>update</th>
			</tr>
		</thead>

	<?php


	foreach($coup_list as $row){
	?>

	<tr>
	<td><input type="checkbox" class="checkItem" name="check[]" value="<?php echo $row->id; ?>"></td>
		<td><?php echo $row->id; ?></td>
		<td><?php echo $row->coup_title; ?></td>
		<td><?php echo $row->coup_code; ?></td>
		<td><?php echo $row->coup_type; ?></td>
		<td><?php echo $row->coup_disc; ?></td>
		<td><?php echo $row->valid_from; ?></td>
		<td><?php echo $row->valid_to; ?></td>
			
		<td><a href="<?php echo base_url(''); ?>index.php/admin/coupon/delete_coupon/?id=<?php echo $row->id; ?>" class="delete_btn del_btn" 
		onclick="return confirm('Are you sure to delete')">Delete</a></td>
		<td><a href="<?php echo base_url(''); ?>index.php/admin/coupon/show_value/?id=<?php echo $row->id; ?>" class="update_btn del_btn">update</a></td>

	</tr>

	<?php

	}
	?>

	</table>
	<div class="pagination_design">
		<?php echo $links;?>
	</div>
</form>

</body>









