

<body class="listing_table">
  




<form action="<?php base_url().'index.php/admin/Order/index'?>" method="GET" class="search_btn">
    <input type="text" name="value_search" placeholder="search">
	<input type="submit" name="search" class="btn">   
</form>







    <button class="add_user_btn"><a href="<?php echo base_url().'index.php/admin/Order/add_order'?>" class="add_btn">add order</a></button>
    
<form method="POST" action="<?php echo base_url(''); ?>index.php/admin/Order/delete_multipal"">




    <table align=center class="table"  cellspacing="20">
        <thead>
            <tr><br>
                <a href="<?php echo base_url(''); ?>index.php/admin/Order/delete_multipal""><button type="submit"  name="save" class="btn multipal_delete_btn"
                onclick="return confirm('Are you sure to delete')">DELETE</button></a>
                <th><input type="checkbox" id="checkAl"></th>



                <!-- sort asc and desc by giving parameters -->
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Order/index/?sort=id&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>id</a></th>
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Order/index/?sort=user_id&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>user name</a></th>
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Order/index/?sort=customer&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>customer</a></th>
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Order/index/?sort=amount_subtotal&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>amount subtotal</a></th>
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Order/index/?sort=tax&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>tax()</a></th>
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Order/index/?sort=discount&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>discount</a></th>
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Order/index/?sort=shipping_charge&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>shipping charges</a></th>
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Order/index/?sort=total&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>total</a></th>
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Order/index/?sort=order_date&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>order date</a></th>
                <th><a href='<?php echo base_url(''); ?>index.php/admin/Order/index/?sort=status&order=<?php echo $order =='DESC' ? 'ASC' : 'DESC' ?>'>order status</a></th>

                <th>update</th>
            </tr>
        </thead>

    <?php

// var_dump($ord_list);
    foreach($ord_list as $row){
        $order_status = unserialize($row->status);
        foreach($order_status as $data){

        }
    ?>

    <tr>
        <td><input type="checkbox" class="checkItem" name="check[]" value="<?php echo$row->id; ?>"></td>
        <td><?php echo $row->id; ?></td>
        <td><?php echo $row->user_id; ?></td>
        <td><?php echo $row->customer; ?></td>
        <td><?php echo $row->amount_subtotal; ?></td>
        <td><?php echo $row->tax; ?></td>
        <td><?php echo $row->discount; ?></td>
        <td><?php echo $row->ship_charge; ?></td>
        <td><?php echo $row->total; ?></td>
        <td><?php echo $row->order_date; ?></td>
        <td><?php echo $data; ?></td>
    
        <!-- <td><a href="<?php echo base_url(''); ?>index.php/admin/Order/delete/?id=<?php echo $row->id; ?>" class="delete_btn del_btn" 
        onclick="return confirm('Are you sure to delete')">Delete</a></td> -->
        <td><a href="<?php echo base_url(''); ?>index.php/admin/Order/show_value/?id=<?php echo $row->id; ?>" class="update_btn del_btn">update</a></td>

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











