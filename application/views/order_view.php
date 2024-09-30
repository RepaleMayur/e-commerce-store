<head>
    <!-- <link rel="stylesheet" href="../asset/css/design.css"> -->
</head>
<body>
    

<form action="" method="GET">

<table  class="t_old_order">
    <tr>

   <tr><br>
   <th>product</th>
   <th>price</th>
   <th>name</th>
   <th>quantity</th>
   <th>customer</th>
    <th>amount subtotal</th>
    <th>tax</th>
    <th>discount</th>
    <th>shipping cost</th>
    <th>Total</th>
   </tr>
   
   <?php
        foreach($order as $value){
           $val = unserialize($value->order_item);
           foreach($val as $row){
               $img = $row['img'][0];
               foreach($order as $value){
    ?>   
         
   
   
   
   <tr >
       <td><img src="<?php echo base_url().'/upload/'. $img; ?>" width="100px" height="100px">
   </td>
   <td><?php echo  $row['pro_price'] ?></td>
       <td><?php echo $row['pro_name'] ?></td>
       <td><?php echo $row['quantity'] ?></td>
       <td><?php echo $value->customer ?></td>
        <td><?php echo $value->amount_subtotal ?></td>
        <td><?php echo $value->tax ?></td>
        <td><?php echo $value->discount ?></td>
        <td><?php echo $value->ship_charge?></td>
        <td><?php echo $value->total?></td>

     
   </tr>
   
   
   <?php
        } 
       }
    }
        ?>
    </tr>
</table>
<table class="t_old_order" cellspacing="15">
    <tr>
        <td>
            <h1>Billing details</h1>
            <table class="bill" >
                <tr>
                    <td>First name</td>
                    <td><?php echo $billing['first_name'] ?></td>
                </tr>
                <tr>
                    <td>last name</td>
                    <td><?php echo $billing['last_name'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $billing['email'] ?></td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><?php echo $billing['mob_no'] ?></td>
                </tr>
                <tr>
                    <td>PIN</td>
                    <td><?php echo $billing['pin'] ?></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><?php echo $billing['country'] ?></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><?php echo $billing['state'] ?></td>
                </tr>
                <tr>
                    <td>Dist</td>
                    <td><?php echo $billing['dist'] ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo $billing['city'] ?></td>
                </tr>
            </table>
        </td>
        <td>
            <h1 >Shipping details</h1>
            <table class="bill"  >
                <tr>
                    <td>First name</td>
                    <td><?php echo $shipping['first_name'] ?></td>
                </tr>
                <tr>
                    <td>last name</td>
                    <td><?php echo $shipping['last_name'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $shipping['email'] ?></td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><?php echo $shipping['mob_no'] ?></td>
                </tr>
                <tr>
                    <td>PIN</td>
                    <td><?php echo $shipping['pin'] ?></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><?php echo $shipping['country'] ?></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><?php echo $shipping['state'] ?></td>
                </tr>
                <tr>
                    <td>Dist</td>
                    <td><?php echo $shipping['dist'] ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo $shipping['city'] ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
    <table align=center class="t_old_order" cellspacing="" >
    <tr>
        <td>type</td>
        <td><?php echo $payment['type'] ?></td>
       
        
    </tr>
    <tr>
        <td>status</td>
        <td><?php echo $payment['status'] ?></td>
    </tr>
    <tr>
    <td>transaction id</td>
        <td><?php //echo rand(10, 100); ?></td>
        
    </tr>
    <tr>
    <td>order date</td>
        <td><?php echo $value->order_date ?></td>
    </tr>
   </table>


</form>
</body>
