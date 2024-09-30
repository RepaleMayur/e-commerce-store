<form method="post" action="<?php echo base_url('index.php/cart_client/order_place')?>">

<?php
// var_dump($user_info);die();
foreach($user_info as $row){

}
// var_dump($row['id']);die();
?>
<div class="bill_wrapp">
<div class="left_div">
<h2>billing details</h2><br>
   
        First name <br>
        <input type="hidden" name="bill[id]" value="<?php echo $row->id?>">
        <input type="text" name="bill[first_name]" value="<?php echo $row->first_name  ?>" required><br>
   
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
<input type="checkbox" id="same" name="same" onchange="samestatement()" class="same_as" required>same as above 

<div class="right_div">
<h2>shipping details</h2><br>


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
<table class="table_add">
<thead>

<tr>
<th>id</th>
<th>product</th>
<th>price</th>
<th>name</th>
<th>quantity</th>
<th>subtotal</th>
<!-- <th>remove</th> -->


</tr>
</thead>
    <h1 class="title heading"> <?php //echo $title['cat_title']; ?></h1>
<?php
     foreach($_SESSION['cart']['items_'] as $value){
        $img = $value['img'][0];
           
 ?>           



<tr class="">
    

<td><?php echo $value["pro_id"]; ?></td>
	<td><img src="<?php echo base_url().'/upload/'. $img; ?>" width="100px" height="100px">
</td>
<td><?php  echo $curr_sym->setting_value;?>  <?php echo  $value['pro_price'] ?></td>
	<td><?php echo $value['pro_name'] ?></td>
    <td><?php echo $value['quantity'] ?></td>
    <td><?php  echo $curr_sym->setting_value;?>  <?php echo  $subtotal=$value['pro_price']*$value['quantity'];?> </td>
    <!-- <td><a href="<?php echo base_url('index.php/cart_client/remove_from_card?id=')?><?php echo $value['pro_id']?>">remove</a></td> -->
</tr>


<?php
     } 
     ?>


</table>


<?php 

// discount

// foreach($add as $disc){

// }


?>
<table class="table_bill">
    <tr class="">
        <th>subtotal</th>
        <td ><?php  echo $curr_sym->setting_value;?>  <?php echo  $_SESSION['cart']['subtotal']?></td>
       
    </tr>

    <tr class="">
        <th>tax(5%)</th>
        <td><?php  echo $curr_sym->setting_value;?>  <?php echo  $_SESSION['cart']['taxs'];?></td>
    </tr>

    <?php if(isset($_SESSION['cart']['discount'])){?>
    <tr class="">
        <th>discount</th>
        <td>- <?php echo  $_SESSION['cart']['total_discount']; ?></td>
    </tr>
    <?php }?>

    <tr class="">
        <th>Shipping cost (fix)</th>
        <td>+<?php echo  $_SESSION['cart']['shipping'] ?></td>
    </tr>

    <tr class="">
        <th>total</th>
        <td><?php  echo $curr_sym->setting_value;?>  <?php echo  $_SESSION['cart']['total'] ?></td>
       
    </tr>
    <tr>
        <th colspan="2">
        <div class="order_btn">
<a href="<?php echo site_url('/thank_page')?>" ><input type="submit" name="submit" class="cart_select" value="place_order"> </a>

</div>

        </th>
    </tr>
  
</table><br>

</form>
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