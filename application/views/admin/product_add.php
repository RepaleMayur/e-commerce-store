
<body>
 <div class="product_form">
 <form action="<?php echo base_url().'index.php/admin/Product/add_product'?>" method="post" enctype="multipart/form-data">

<table cellpadding="30">
            <tr>
                <td>
                    <h2>Product Form</h2>
                    <label>Product Name</label><br>
                    <input type="text" name="product_name" required><br>

                    <label>product Desc</label><br>
                    <textarea name="product_desc"  cols="35" rows="3"></textarea><br>
                    
                    <label>Product price </label><br>
                    <input type="text" name="product_price" required><br>

                    <label>Product Stock</label><br>
                    <input type="text" name="product_stock" required>
                </td>
                <td>
                        <h2>Attributes</h2>
                    <label>Color</label><br>
                    <input type="text" name="attribute[color]"><br>

                    <label>Size</label><br>
                    <input type="text" name="attribute[size]"><br>

                    <label>Quality</label><br>
                    <input type="text" name="attribute[quality]"><br>

                    <label>Warrenty</label><br>
                    <input type="text" name="attribute[warrenty]"><br>
                </td>
            </tr>
            <tr>
               <td>
                    <label>categories</label><br>
                    <?php
                            
                            // var_dump($categories);die();
                             foreach($categories as $value){
                            //    var_dump($value);die();  
                     ?>
                         <input type="checkbox" name="checkbox[]" value="<?php echo $value->id?>">
                         <label for=""><?php echo $value->cat_title; ?></label><br>
                    <?php
                        }
                    ?>
                        
                    <label>Product Image</label><br>
                    <input type="file" name="images[]" multiple><br><br>

                    <input type="submit" name="submit" value="upload">     
               </td>
            </tr>        
        </table>
</form>
 </div>
</body>
