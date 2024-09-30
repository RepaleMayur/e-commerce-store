
<body>
    <form action="<?php echo base_url().'index.php/admin/Page/add_page'?>" method="POST" class="wrap">
        <table class="pages">
            <tr>
                <td>
                    <label>Title</label><br>
                    <input type="text" name="title" class="text_title">
                </td>
            </tr>
            <tr>
                
                <td>
                    <label>Description</label><br>
                    <textarea name="content" id="editor" cols="35" rows="10" ></textarea><br>
                   
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

