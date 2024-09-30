
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('design.css');?>">
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <script src="<?php echo base_url('js.js');?>"></script>

</head>
<body>
<div class="header">
       <div class="right_wrapper">       
       <form action="" method="post">


   
       <a href="#" class="show_user"><img src="./assets/images/user.png" alt="" > </a>
           <div class="admin_show">
           <?php echo $this->session->userdata('user_name'); ?>
           </div>
          
       
        <?php  if($this->session->userdata('user_name')){?>
            <button name="logout" class="logout_btn"><a href="<?php echo base_url().'index.php/admin/User/logout'?>" class="user_account">Logout</a></button>
        <?php } ?>
      
       </form>
       </div>
    </div>
    <div class="container">
        
        <div class="dashboard">
            <h2 class="side_bar_head">Products</h2>
        <a href="<?php echo base_url().'index.php/admin/Dashboard/dashboard/'?>">Dashboard</a>
        <a href="<?php echo base_url().'index.php/admin/Product/index/'?>">Products</a>
        <a href="<?php echo base_url().'index.php/admin/Order/index/'?>">Orders</a>
        <a href="<?php echo base_url().'index.php/admin/User/index/'?>">Users</a>
        <a href="<?php echo base_url().'index.php/admin/Coupon/index/'?>">Coupons</a>
        <a href="<?php echo base_url().'index.php/admin/Page/index/'?>">pages</a>
        <a href="<?php echo base_url().'index.php/admin/Categories/index/'?>">categories</a>
        <a href="<?php echo base_url().'index.php/admin/Setting/get_value/'?>">Settings</a>


        </div>
        

</div>
</body>
</html>


