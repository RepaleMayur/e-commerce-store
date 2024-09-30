
    <head>
    <link rel="stylesheet" href="<?php echo base_url('design.css');?>">

    </head>
   
    <div class="login_form">
        <h2>Admin login</h2>
       <form  action="<?php echo base_url().'index.php/admin/User/login_check'?>" method="post">
        <div class="input">
        <?php echo form_error('admin_name'); ?>
                <input type="text" name="admin_name" value="<?php echo set_value('admin_name'); ?>" placeholder="Admin name" class="login">
        </div><br>
       
        <div class="input">
                <?php echo form_error('admin_pass'); ?>
                <input type="password"  name="admin_pass" placeholder="Enter password" class="login">
        </div><br>
            <input type="submit" name="submit" class="btn">
       </form>
    </div>


