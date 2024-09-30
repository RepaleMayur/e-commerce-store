   

<body>
    

<form method="post" action="<?php echo base_url().'index.php/admin/Order/order_palce'?>">   
    <table align=center class="table"  cellspacing="25">
        <thead>

            <tr>
            <th>id</th>
            <th>product</th>
            <th>price</th>
            <th>name</th>
            <th>quantity</th>
            <th>subtotal</th>

            </tr>
        </thead>
        <h1 class="title heading"> <?php //echo $title->cat_title; ?></h1>
    <?php
        foreach($_SESSION['cart']['order_item'] as $value){
            $img = $value['img'][0];
            
    ?>           



    <tr class="table_head">
        <td><?php echo $value["pro_id"]; ?></td>
        <td><img src="<?php echo base_url(). 'upload/'. $img; ?>" width="100px" height="100px"></td>
        <td><?php echo $value['pro_price'] ?></td>
        <td><?php echo $value['pro_name'] ?></td>
        <td><?php echo $value['quantity']?></td>
        <td><?php echo  $subtotal=$value['pro_price']*$value['quantity'];?> </td>
    </tr>


    <?php
        } 
        ?>


    </table>


    <?php 

    // discount


    ?>

    <table align=center >
        <tr>
            <td>
            <div class="right_wrapper">
    <div class="left_div">
    <table align=center >
            <tr>
                <td>
                <div class="right_wrapper">
        <div class="left_div">
        <?php

        foreach($user_info as $row){}
        //    var_dump($row);
        ?>
        <h2>billing details</h2>
                First name <br>
                <input type="hidden" name="bill[id]" value="<?php echo $row->id?>">
                <input type="text" name="bill[first_name]" value="<?php echo $row->first_name;  ?>" required><br>
            
                Last name<br>
                <input type="text" name="bill[last_name]" value="<?php echo $row->last_name  ?>" required><br>
            
                Email<br>
                <input type="text" name="bill[email]" value="<?php echo $row->email  ?>" required><br>
            
                Mobile no<br>
                <input type="text" name="bill[mob_no]" value="<?php echo $row->mob_no  ?>" required><br>
            
                pin<br>
            <input type="text" name="bill[pin]" id="pin" required><br>
    
            Country<br>
            <input type="text" name="bill[country]" id="country" required><br>
    
            State<br>
            <input type="text" name="bill[state]" id="state" required><br>
    
            Dist<br>
            <input type="text" name="bill[dist]" id="dist" required><br>
    
            
            city<br>
            <input type="text" name="bill[city]" id="city" required><br>
        
                
            
        </div>
        </td>
        <td>       <input type="checkbox" id="same" name="same" onchange="samestatement()" class="same_as" required>
    </td>
        <td>
            
        <div class="item">
            

            <h2>shipping details</h2>
        
        
        First name <br>
        <input type="text" name="ship[first_name]" value="<?php echo $row->first_name  ?>" required><br>
        
        Last name<br>
        <input type="text" name="ship[last_name]" value="<?php echo $row->last_name  ?>" required><br>
        
        Email<br>
        <input type="text" name="ship[email]" value="<?php echo $row->email  ?>" required><br>
        
        Mobile no<br>
        <input type="text" name="ship[mob_no]" value="<?php echo $row->mob_no  ?>" required><br>
        
        pin<br>
            <input type="text" name="ship[pin]" id="s_pin" required><br>

            Country<br>
            <input type="text" name="ship[country]" id="s_country" required><br>

            State<br>
            <input type="text" name="ship[state]" id="s_state" required><br>

            Dist<br>
            <input type="text" name="ship[dist]" id="s_dist" required><br>

            city<br>
            <input type="text" name="ship[city]" id="s_city" required>
                </div>
        
        </div>
        
                </td>
            </tr>
        </table>
        
    <table align=center class="billing_table">
        <tr class="table_head">
            <th>subtotal</th>
            <td ><?php echo $_SESSION['cart']['subtotal']?></td>
        
        </tr>

        <tr class="table_head">
            <th>tax(5%)</th>
            <td><?php echo $_SESSION['cart']['taxs'];?></td>
        </tr>

        <?php if(isset($_SESSION['cart']['discount'])){?>
        <tr class="table_head">
            <th>discount</th>
            <td><?php echo  $_SESSION['cart']['discount']; ?></td>
        </tr>
        <?php }?>

        <tr class="table_head">
            <th>Shipping cost (fix)</th>
            <td>+<?php echo $_SESSION['cart']['shipping'] ?></td>
        </tr>

        <tr class="table_head">
            <th>total</th>
            <td><?php echo  $_SESSION['cart']['total'] ?></td>
        
        </tr>
        <tr>
            <th>
            <div class="order_btn">
    <input type="submit" name="submit" class="cart_select" value="place_order">

    </div>

            </th>
        </tr>
    
    </table><br>
<script>
    function samestatement(){
    if(document.getElementById("same").checked){
        document.getElementById("s_pin").value = document.getElementById("pin").value;
        document.getElementById("s_country").value = document.getElementById("country").value;
        document.getElementById("s_state").value = document.getElementById("state").value;
        document.getElementById("s_dist").value = document.getElementById("dist").value;
        document.getElementById("s_city").value = document.getElementById("city").value;

    }
    else{
        document.getElementById("University2").value = "";
document.getElementById("graution2").value = "";
    }
}


</script>
</form>

</body>