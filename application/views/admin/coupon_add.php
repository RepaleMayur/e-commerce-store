
<body>
    <form action="<?php echo base_url().'index.php/admin/Coupon/add_coupon'?>" method="post" class="wrap">
        <h2>Add coupon form</h2>
        <label>Title</label><br>
        <input type="text" name="coup_title" ><br><br>
        <?php
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $res = "";
            for ($i = 0; $i < 10; $i++) {
                $res .= $chars[mt_rand(0, strlen($chars)-1)];

            }
        ?>
        <label>Coupon Code</label><br>
        <input type="text" name="coup_code" value="<?php echo $res ?>" readonly><br><br>


        <label>Discount</label><br>
        <input type="text" name="coup_type" value="discount" readonly><br><br>

        <!-- <select name="coup_type" class="btn_width">
            <option >discount</option>
        </select><br><br> -->


        <label>Total Discount(%)</label><br>
        <input type="text" name="coup_disc"><br><br>

        
        
        <label for="valid_from">Valid From</label><br>
        <input type="date" name="valid_from" id="valid_from" value="<?php echo set_value('valid_from'); ?>" class="btn_width"><br><br>


        <label for="valid_to">Valid To</label><br>
        <input type="date" name="valid_to" id="valid_to" value="<?php echo set_value('valid_to'); ?>" class="btn_width"><br><br>


        <input type="submit" name="submit" class="btn_width">

    </form>
</body>
