<form action="<?php echo base_url().'index.php/admin/Order/add_qyt'?>" method="get">
    <table align=center class="table"  cellspacing="25">
        <thead>

            <tr>
                <th>id</th>
                <th>product</th>
                <th>price</th>
                <th>name</th>
                <th>quantity</th>
                <th>subtotal</th>
                <th>remove</th>


            </tr>
        </thead>
        <h1 class="title heading"> <?php //echo $title->cat_title; ?></h1>
    <?php
        foreach($_SESSION['cart']['order_item'] as $value){
            $img = $value['img'][0];
            
    ?>           



    <tr class="table_head">
        

        <td><?php echo $value["pro_id"]; ?></td>
            <td><img src="<?php echo base_url(). 'upload/'. $img; ?>" width="100px" height="100px">
        </td>
        <td><?php echo $value['pro_price'] ?></td>
        <td><?php echo $value['pro_name'] ?></td>
        <td>
            <input type="hidden" name="id" value="<?php echo $value['pro_id'];?>">
            <input type="text" name="add_card_qyt" class="qty_css" value="<?php echo $value['quantity']?>">
            <input type="submit" name="sub" value="add">

        </td>
        <td><?php echo  $subtotal=$value['pro_price']*$value['quantity'];?> </td>
        <td><a href="<?php echo base_url().'index.php/admin/Order/remove?id='?><?php echo $value['pro_id']?>" class="btn">remove</a></td>
    </tr>


    <?php
        }
        ?>

    <button class="add_user_btn"><a href="<?php echo base_url().'index.php/admin/Order/checkout'?>" class="add_btn">check out</a></button>
    <button class="add_user_btn"><a href="<?php echo base_url().'index.php/admin/Order/empty_cart'?>" class="add_btn">empty cart</a></button>

    </table>
</form>
<form action="<?php echo base_url().'index.php/admin/Order/get_coupon'?>" method="post">
<input type="hidden" name="id" value="<?php echo $value["pro_id"] ?>">
    <input type="text" name="apply_c" class="coup" >
    <input type="submit" name="apply_coupon" value="apply coupon">

    <?php if(empty($_SESSION['cart']['discount'])){
        echo $_SESSION['message'];
        }else{
            echo $_SESSION['msg'];
        }

    // discount



    ?>
</form>