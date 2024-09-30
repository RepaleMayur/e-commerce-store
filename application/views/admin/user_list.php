
<body class="listing_table">
  

<form action="<?php base_url().'index.php/admin/User/index'?>" method="get" class="search_btn">
	<input type="hidden" name="c"  value="users">
	<input type="hidden" name="m" value="user_list">
	<input type="text" name="value_search" placeholder="search">
	<input type="submit" name="search" class="btn"> 
</form>


	<button class="add_user_btn"><a href="<?php echo base_url().'index.php/admin/User/add_user'?>" class="add_btn">add user</a></button>
    
<form method="post" action="<?php echo base_url(''); ?>index.php/admin/user/delete_users">


	<table align=center class="table"  cellspacing="20">
		<thead>
			<tr><br>

				<a href="<?php echo base_url(''); ?>index.php/admin/user/delete_users"><button type="submit"  name="save" class="btn multipal_delete_btn"
				onclick="return confirm('Are you sure to delete')">DELETE</button></a>

				<th><input type="checkbox" id="checkAl"></th>

				<!-- sort asc and desc by giving parameters -->
				<th><a href="<?php echo base_url(''); ?>index.php/admin/User/index/?sort=first_name&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>">id</a></th>
				<th><a href="<?php echo base_url(''); ?>index.php/admin/User/index/?&sort=first_name&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>">first name</a></th>
				<th><a href="<?php echo base_url(''); ?>index.php/admin/User/index/?&sort=last_name&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>">last name</a></th>
				<th><a href="<?php echo base_url(''); ?>index.php/admin/User/index/?&sort=email&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>">email</a></th>
				<th><a href="<?php echo base_url(''); ?>index.php/admin/User/index/?&sort=user_name&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>">user name</a></th>
				<th><a href="<?php echo base_url(''); ?>index.php/admin/User/index/?&sort=mob_no&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>">mobile no</a></th>
				<th><a href="<?php echo base_url(''); ?>index.php/admin/User/index/?&sort=user_type&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>">user type</a></th>
				<th><a href="<?php echo base_url(''); ?>index.php/admin/User/index/?&sort=user_status&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>">user status</a></th>
				<th>delete</th>
				<th>update</th>
			</tr>
		</thead>


	<?php


		

	foreach($user as $row){
	?>
	<tr>
		<td><input type="checkbox" class="checkItem" name="check[]" value="<?php echo $row->id; ?>"></td>
		<td><?php echo $row->id; ?></td>
		<td><?php echo $row->first_name; ?></td>
		<td><?php echo $row->last_name; ?></td>
		<td><?php echo $row->email; ?></td>
		<td><?php echo $row->user_name; ?></td>
		<td><?php echo $row->mob_no; ?></td>
		<td><?php echo $row->user_type; ?></td>
		<td><?php echo $row->user_status; ?></td>
	
		<td><a href="<?php echo base_url(''); ?>index.php/admin/user/delete_user/?id=<?php echo $row->id; ?>" class="delete_btn del_btn"
		onclick="return confirm('Are you sure to delete')">Delete</a></td>
		<td><a href="<?php echo base_url(''); ?>index.php/admin/user/show_value/?id=<?php echo $row->id; ?>" class="update_btn del_btn">update</a></td>

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








