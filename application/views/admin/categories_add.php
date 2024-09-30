
<body>
    <form action="<?php base_url().'index.php/admin/Categories/add_categories'?>" method="POST" enctype="multipart/form-data" class="wrap">
        <table>
            <tr>
               <td>
               <label>categories</label><br>
                <input type="text" name="cat_title"><br>
               </td>

            </tr>
            <tr>
                <td>
                <label>discription</label><br>
                <textarea name="cat_desc" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                <label>upload image</label><br>
                <input type="file" name="cat_img[]" multiple><br>
               
                <input type="submit" name="submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>