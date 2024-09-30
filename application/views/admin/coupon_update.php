

<body>
<form  method="post" action="<?php echo base_url().'index.php/admin/Coupon/update'?>" class="wrap">
        <h2>Add coupon form</h2>
        <label>Title</label><br>
        <input type="hidden" name="id" value="<?php echo $row->id;?>">
        <input type="text" name="coup_title" value="<?php echo $row->coup_title; ?>"><br><br>


        <!-- <label>Coupon Code</label><br>
        <input type="text" name="coup_code" value="<?php echo $row->coup_code; ?>" ><br><br>


        <label>Type</label><br>
        <select name="coup_type" class="btn_width">
          
            <option 
            
            <?php
                if($row->coup_type == 'discount'){
                    echo "selected";
                }
            ?>
            
            >discount</option>
           
        </select><br><br> -->
       
        <label>Coupon Code</label><br>
        <input type="text" name="coup_code" value="<?php echo $row->coup_code ?>" readonly><br><br>


        <label>Discount</label><br>
        <input type="text" name="coup_type" value="discount" readonly><br><br>


        <label>total Discount</label><br>
        <input type="text" name="coup_disc" value="<?php  echo $row->coup_disc; ?>" ><br><br>


        <label>Valid From</label><br>
        <input type="date" name="valid_from" value="<?php echo $row->valid_from; ?>" class="btn_width"><br><br>


        <label>Valid To</label><br>
        <input type="date" name="valid_to" value="<?php echo $row->valid_to; ?>" class="btn_width"><br><br>
        <input type="submit" name="submit" value="update" class="btn_width">

    </form>
</body>
</html>

