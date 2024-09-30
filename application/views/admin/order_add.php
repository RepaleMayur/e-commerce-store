
<form action="<?php echo base_url().'index.php/admin/Order/add_order'?>" method="post">
    
    <div>
        <?php
            
        //    foreach($arr as $category_id){
        //     $categories_id[] = $category_id->cat_id;
        // }
        // $checked = "checked"; 
        foreach($categories as $value){
            //    var_dump($value);die();
            
        ?>
        
            <input type="checkbox" name="checkbox[]"  value="<?php echo $value->id?>">
            <label for=""><?php echo $value->cat_title; ?></label><br>
        <?php
            }
        ?>
    </div>
        <input type="submit" name="sub_btn">	<br><br>
        
</form>
<form action="index.php?c=order&m=add_card" method="post">
    
    <div class="scroll">
        <?php
    //    var_dump($product);
        foreach($product as $row){
            $img = unserialize($row->images);
        //    $p = $row->pro_id;
            
        ?>
        
            <div class="product_list">
                <table>
                    <tr>
                        <td><?php echo $row->id; ?></td>          
                    </tr>
                    <tr>
                        <td><img src="<?php echo base_url('').'upload/'. $img[0]; ?>" width="100" height="100"></td>
                    </tr>
                    <tr>
                        <td><?php echo $row->product_name; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <td><a href="<?php echo base_url().'index.php/admin/Order/add_qyt?id='?><?php echo $row->id; ?>" name="add_cart" class="qyt_btn add_btn">add</a></td>
                        </td>    
                    </tr>
                </table>
            </div>
        <?php
        }
        ?> 
    </div>
</form>
    