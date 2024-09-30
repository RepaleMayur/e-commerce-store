
<body>
<form  method="POST" action="<?php echo base_url().'index.php/admin/Order/update'?>" class="wrap">
 
    <table>
    <h2>order Form</h2>
        <tr>
            <td>
                <label>user id</label><br>
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                <input type="text" name="user_id" value="<?php  echo $row->user_id;  ?>"><br>
            </td>
            <tr>
                <td>
                    <label> customer</label><br>
                    <input type="text" name="customer" value="<?php  echo $row->customer;  ?>"><br>

                </td>
            </tr>
            <tr>
                <td>
                    <label>amount subtotal</label><br>
                    <input type="text" name="amu_subtotal" value="<?php  echo $row->amount_subtotal;  ?>"><br>

                </td>
            </tr>
            <tr>
                <td>
                    <label>tax </label><br>
                    <input type="text" name="tax" value="<?php  echo $row->tax;  ?>"><br>

                </td>
            </tr>
        <tr>
            <td>
                <label>discount</label><br>
                <input type="text" name="discount" value="<?php  echo $row->discount;  ?>"><br>
            </td>
        </tr>
            <tr>
                <td>
                    <label>shipping charge</label><br>
                    <input type="text" name="shipping_charge" value="<?php  echo $row->ship_charge;  ?>"><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label>total</label><br>
                    <input type="text" name="total" value="<?php  echo $row->total;  ?>"><br>

                </td>
            </tr>
        <tr>
            <td>
                <label>order_date</label><br>
                <input type="date" name="or_date" value="<?php  echo $row->order_date;  ?>"><br>
            </td>
        </tr>
            <tr>
            <td>
                <input type="submit" name="submit"> 
            </td>
            </tr>
        </tr>
    </table>

</form>
</body>
</html>

