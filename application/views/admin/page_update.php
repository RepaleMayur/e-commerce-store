
<body>
    <form action="<?php echo base_url().'index.php/admin/Page/update'?>" method="POST" class="wrap">
        <table>
            <tr>
                <td>
                    <label>Title</label><br>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <input type="text" name="title" class="text_title" value="<?php echo $row->title;?>">
                </td>
            </tr>
            <tr>
                
                <td>
                    <label>Description</label><br>
                    <textarea name="content" id="editor" cols="35" rows="10" ><?php echo $row->content;?></textarea><br>
                   
                   <script>
                      CKEDITOR.replace( 'content' );
                  </script>
                    <input type="submit" name="submit" >
                </td>
                
            </tr>
        </table>
    </form>
</body>
</html>