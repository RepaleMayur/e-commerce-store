
<form method="get" action="<?php echo base_url('index.php/cart_client/add_quantity')?>"> 

    <table align=center class="table_add" >
        <thead>

            <tr  class="">
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
// var_dump( $curr_sym->setting_value);
            //  var_dump($_SESSION['cart']['items_']);  
            foreach($_SESSION['cart']['items_'] as $value){
                $img = $value['img'][0];
                
        ?>           
        <tr >
            <td><?php echo $value["pro_id"]; ?></td>
            <td><img src="<?php echo base_url().'/upload/'. $img; ?>" width="100px" height="100px"></td>
            <td> <?php  echo $curr_sym->setting_value;?> <?php echo  $value['pro_price'] ?></td>
            <td><?php echo $value['pro_name'] ?></td>
            <td>
                <input type="hidden" name="id" value="<?php echo $value['pro_id'];?>">
                <input type="text" name="add_qyt" class="qty_css" value="<?php echo $value['quantity'];?>">
                <input type="submit" name="submit" value="add"><br><br>
            </td>
            <td><?php  echo $curr_sym->setting_value;?> <?php echo  $subtotal=$value['pro_price']*$value['quantity'];?> </td>
            <td><a href="<?php echo base_url('index.php/cart_client/remove_from_card?id=')?><?php echo $value['pro_id']?>">remove</a></td>
        </tr>
        <?php
            } 
        ?>
    </table>
    <table  class="table_bill">
        <tr>
                <th>subtotal</th>
                <td ><?php  echo $curr_sym->setting_value;?> <?php echo  $_SESSION['cart']['subtotal']?></td>
            
        </tr>
        <tr>
            <th>tax(<?php  echo $tax->setting_value;?>%)</th>
            <td><?php  echo $curr_sym->setting_value;?> <?php echo  $_SESSION['cart']['taxs'];?></td>
        </tr>
        <?php if(isset($_SESSION['cart']['discount'])){?>
        <tr>
            <th>discount</th>
            <td>- <?php echo  $_SESSION['cart']['total_discount']; ?></td>
        </tr>
        <?php }?>
        <!-- <?php if(isset($_SESSION['cart']['off'])){ ?>
            <th>discount</th>
            <td>- <?php echo  $_SESSION['cart']['total_discount']; ?></td>

            <?php } ?> -->
        <tr>
            <th>Shipping cost (fix)</th>
            <td>+<?php echo   $_SESSION['cart']['shipping'] ?></td>
        </tr>
        <tr>
            <th>total</th>
            <td ><?php  echo $curr_sym->setting_value;?> <?php echo  $_SESSION['cart']['total'] ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="order_btn">
                <a href="<?php echo base_url('index.php/cart_client/check_out')?>" class="cart_select">check out </a>

                </div>
            </td> 
        </tr>
    </table><br>
</form>
<form method="post" action="<?php echo base_url('index.php/cart_client/get_coupon')?>" class="apply_coup"> 
    <input type="text" name="apply_c" >
    <input type="submit" name="apply_coupon" value="apply coupon">

    <?php if(empty($_SESSION['cart']['discount'])){
    echo $_SESSION['message'];
    }

    // discount

    ?>
</form>