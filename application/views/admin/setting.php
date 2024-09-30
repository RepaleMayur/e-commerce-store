
<form  method="POST" action="<?php echo base_url().'index.php/admin/Setting/index'?>" class="wrap">
<h2>Settings</h2>
        <label>Currency</label><br>
        <input type="hidden" name="id" value="<?php ?>">
        <input type="text" name="currency" value="<?php echo  $currency->setting_value ?>"><br><br>


        <label>Currency Symbol</label><br>
        
        
        <input type="text" name="curr_sym" value="<?php echo  $curr_sym->setting_value ?>" ><br><br>


        <label>Shipping Cost</label><br>
        <input type="text" name="ship_cost" value="<?php echo  $ship_cost->setting_value ?>" ><br><br>


        <label>Tax</label><br>
        <input type="text" name="tax" value="<?php echo  $tax->setting_value ?>" ><br><br>


        <label>Site email</label><br>
        <input type="text" name="site_email" value="<?php echo  $site_email->setting_value ?>" ><br><br>

        <input type="submit" name="submit" value="update">

</form>
</body>
</html>

