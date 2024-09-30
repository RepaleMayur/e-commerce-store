
<form action="index.php?c=categories&m=categories_listing" method="get"  class="search_btn">
  <input type="hidden" name="c"  value="categories">
  <input type="hidden" name="m" value="categories_listing">
  <input type="text" name="value_search" placeholder="search">
<input type="submit" name="search" class="btn">
</form>
  <button class="add_user_btn"><a href="<?php echo base_url().'index.php/admin/Categories/add_categories'?>" class="add_btn">add categories</a></button>
<form method="post" action="">
    <table align=center class="table"  cellspacing="20">
        <thead>
            <tr>

            <!-- sort asc and desc by giving parameters -->
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Categories/index/?sort=id&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>id</a></th>
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Categories/index/?sort=cat_img&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>Images</a></th>
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Categories/index/?sort=cat_title&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>Title</a></th>
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Categories/index/?sort=cat_desc&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>Description</a></th>

                <th>update</th>
                <th>delete</th>
            </tr>
    </thead>
    <?php
    //   var_dump($cat_list);
    foreach($cat_list as $row){

        $img = unserialize($row->cat_img);
    //  var_dump($img);die();

    ?>
    <tr>
        <td><?php echo $row->id; ?></td>
        <td><img src="<?php echo  base_url(''). 'upload/thumb_small/'.$img[0]; ?>" width="100" height="100"></td>
        <td><?php echo $row->cat_title; ?></td>
        <td><?php echo $row->cat_desc; ?></td>
        <td><a href="<?php echo base_url(''); ?>index.php/admin/categories/delete_categories/?id=<?php echo $row->id; ?>" class="delete_btn del_btn"
        onclick="return confirm('Are you sure to delete')">Delete</a></td>
        <td><a href="<?php echo base_url(''); ?>index.php/admin/categories/show_value/?id=<?php echo $row->id; ?>" class="update_btn del_btn">update</a></td>

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






