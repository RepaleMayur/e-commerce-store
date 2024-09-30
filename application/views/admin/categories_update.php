
<body>
    <form action="<?php echo base_url().'index.php/admin/Categories/update'?>" method="POST" enctype="multipart/form-data" class="wrap">
        <table>
            <tr>
                <?php 
                ?>
               <td>
               <label>categories</label><br>
               <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
              
                <input type="text" name="cat_title" value="<?php echo $row->cat_title; ?>"><br>
               </td>

            </tr>
            <tr>
                <td>
                <label>discription</label><br>
                <textarea name="cat_desc" cols="30" rows="10"> <?php echo $row->cat_desc;?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                <label>upload image</label><br>
                <input type="file" name="cat_img[]" multiple ><br>
               
                <input type="submit" name="submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>