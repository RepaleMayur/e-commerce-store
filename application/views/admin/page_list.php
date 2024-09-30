
   
<form method="get" action="<?php base_url().'index.php/admin/Page/index'?>">


    <button class="add_user_btn"><a href="<?php echo base_url().'index.php/admin/Page/add_page/'?>" class="add_btn">add page</a></button>
    <input type="text" name="value_search" placeholder="search">
	<input type="submit" name="search" class="btn">
    
    

  <table align=center class="table"  cellspacing="30">
    <thead>
        <tr>

        <!-- sort asc and desc by giving parameters -->
            <th><a href='?sort=id&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>id</a></th>
            <th><a href='?sort=currency&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>title</a></th>
            <th><a href='?sort=curr_sym&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>content</a></th>
            <th>update</th>
            <th>delete</th>
        </tr>
    </thead>
  <?php
  foreach($page_list as $row){


  ?>
  <tr>
    <td><?php echo $row->id; ?></td>
    <td><?php echo $row->title; ?></td>
    <td><?php echo $row->content; ?></td>

    <td><a href="<?php echo base_url(''); ?>index.php/admin/page/delete_page/?id=<?php echo $row->id; ?>" class="delete_btn del_btn" 
    onclick="return confirm('Are you sure to delete')">Delete</a></td>
    <td><a href="<?php echo base_url(''); ?>index.php/admin/page/show_value/?id=<?php echo $row->id; ?>" class="update_btn del_btn">update</a></td>

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
</html>






