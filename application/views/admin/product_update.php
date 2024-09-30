

<body>
<form  method="POST" action="<?php echo base_url().'index.php/admin/Product/update'?>"  enctype="multipart/form-data">
<h2>Product</h2>


<table cellpadding="30">
  <tr>
      <td>
            <h2>Product form</h2>
            <label>Product Name</label><br>
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <input type="text" name="product_name"  value="<?php echo $row->product_name?>" ><br>

 
            <label>product Desc</label><br>
            <textarea name="product_desc"  cols="35" rows="3" ><?php echo $row->product_desc; ?></textarea><br>
           


            <label>Product price </label><br>
            <input type="text" name="product_price" value="<?php echo $row->product_price ?>" ><br>


            <label>Product Stock</label><br>
            <input type="text" name="product_stock" value="<?php echo $row->product_stock ?>" ><br>

        </td>
        <td>
            <?php $val = unserialize($row->attribute);
        
            ?>

            <h2>Attributes</h2>
            <label>Color</label><br>
            <input type="text" name="attribute[color]" value="<?php echo $val['color']; ?>" ><br>


            <label>Size</label><br>
            <input type="text" name="attribute[size]" value="<?php echo $val['size'];?>" ><br>


            <label>Quality</label><br>
            <input type="text" name="attribute[quality]" value="<?php echo $val['quality']; ?>" ><br>


            <label>Warrenty</label><br>
            <input type="text" name="attribute[warrenty]" value="<?php echo $val['warrenty']; ?>" ><br>

         
        </td>
      </tr>
      <tr>
          <td>
              <label>categories</label><br>
             

<?php

            foreach($arr as $category_id){
                $categories_id[] = $category_id->cat_id;
            }
            $checked = "checked"; 
            foreach ($categories as $value) { 
                $id = $value->id;
               

            if (in_array($id, $categories_id)) { ?>
                <input type="checkbox" name="checkbox[]" checked="checked" value="<?php echo $value->id ?>">
            <?php } else { ?>
                <input type="checkbox" name="checkbox[]" value="<?php echo $value->id ?>">
            <?php } ?>
                <label for=""><?php echo $value->cat_title ?></label><br>

            <?php } ?>
                <label>Product Image</label><br>
                <input type="hidden" name="old_img" value="<?php echo $row->images ?>">
                <input type="file" name="images[]" multiple >
            <br>

            </td>
            <td >
              <?php


// var_dump($row);
$val = unserialize($row->images);
// var_dump($val);
foreach($val as $img){
    // var_dump($val);

            ?>
            <div id="remove_img">
                <img src="<?php echo  base_url('').'upload/thumb_small/'.$img; ?>"  name="images"  width="100px" height="100px" class="img_show">
                <!-- <a href="<?php echo base_url(''); ?>index.php/admin/product/remove/?id=<?php echo $row->id .'&image='.$img?>" class="remove">remove</a> -->
               <!-- <button onClick="return confirm('Sure to delete?')" class="remove" id="<?php echo $row->id .'&image='.$img?>">delete</button>  -->
               <button type="submit" class="btn delete" id="<?php echo $row->id;?><?php echo $img?>" >delete</button>
            </div>
            <?php
                }
            ?><br><br>

                <input type="submit" name="submit" value="update"> 
        </td>
      </tr>        
</table>
        
</form>
</body>
</html>


<script>
    $(document).ready(function () {
        function ConfirmDelete() {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
        $(".delete").click(function (e) {
            var obj = $(this);
            e.preventDefault();
            if (ConfirmDelete() == false) {
                return false;
            }
            $.ajax({
                //alert(); this can't go here
                type: "GET",
                url: "<?php echo base_url(''); ?>index.php/admin/product/remove",
                cache: false,
                data: {id: $(this).attr("id"),img: $(this).attr("image")},
                success : function (data) {
                    console.log('ajax returned: ');
                    console.log(data);
                    if (data) {
                        obj.closest('#remove_img').remove();
                        alert("click to confirm");
                    } else {
                        alert("ERROR");
                    }
                }
            });
        });
    });
</script>


















