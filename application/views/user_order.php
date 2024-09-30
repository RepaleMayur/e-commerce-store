<form action="" method="GET">
<table align=center class="t_old_order"  cellpadding="15">
<thead>
   

<tr  class="table_head"><br>
    <center>
        <a href="<?php echo site_url('user_client/user_show')?>" class="btns"> update user</a>
        <a href="<?php echo site_url('user_client/logout')?>" class="btns"> logout</a>
    </center>
<th>product</th>
<th>price</th>
<th>name</th>
<th>quantity</th>
<th>view</th>


</tr>
</thead>
    <h1 class="title heading"> <?php //echo $title['cat_title']; ?></h1>
<?php

     foreach($info as $value){
        $val = unserialize($value->order_item);
        // var_dump($val);
        foreach($val as $row){
            // var_dump($row['pro_price']);
            // var_dump($row['img']);die();
            foreach($row['img'] as $img){}
            $img = $row['img'][0];
 ?>   
      



<tr class="table_head">
	<td><img src="<?php echo base_url().'upload/thumb_small/'. $img; ?>" width="100px" height="100px">
</td>
<td><?php echo  $row['pro_price'] ?></td>
	<td><?php echo $row['pro_name'] ?></td>
    <td><?php echo $row['quantity'] ?></td>
    <td><a href="<?php echo base_url('index.php/cart_client/get_old_order?id=')?><?php echo $value->id?>">view</a></td>
</tr>


<?php
     } 
    }
     ?>


</table>

</form>
