
<head>
    <link rel="stylesheet" href="<?php echo base_url();?>style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="<?php echo base_url();?>zoomsl.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>zoomsl.min.js" type="text/javascript"></script>

</head>
<body>
    
        <header class="header">   
            <div class="head_top ">
                <div class="wrapper_body">     
                <a href="tel:+0100000000" class="left">+01 000 000 0000</a>
                <a href="<?php echo base_url('index.php/cart_client/check_out')?>" class="right_check">check out</a>

                <?php  if(isset( $_SESSION['user_name'])){?>

                <a href="<?php echo base_url('index.php/User_client/logout')?>" class="right"> logout</a>
               
               <?php }else{ ?>
                <a href="<?php echo base_url('index.php/User_client/login')?>" class="right"> login</a>

                <?php }?>
                        <div class="dropdown">
                        <?php  if(isset($_SESSION['user_name']) ){?>
                        <a href="#" class="drop_head"><?php  if(isset($_SESSION['cart']['items_'])) { echo count($_SESSION['cart']['items_']) ;}
                        ?></a>
                            <div class="dropdown-content">
                            <a href="<?php echo base_url('index.php/cart_client/get_coupon')?>">view cart</a>
                                                        
                            </div>
                            
                            <?php }else{ 
                               
                                ?>
                            <a href="#" class="drop_head"><?php if(isset($_SESSION['cart']['items_'])) { echo count($_SESSION['cart']['items_']); } ?></a>
                            <div class="dropdown-content">
                            <a href="<?php echo base_url('index.php/cart_client/get_coupon')?>">view cart</a>
                            <!-- <a href="<?php echo base_url()?>">old order</a>
                            <a href="<?php echo base_url()?>">check out</a>  -->
                             
                            </div>
                            <?php }?>   
                        </div>
                
                </div>
               
                <a href="<?php echo base_url('index.php/user_client/get_user_info')?>"  class="user_display" > <?php 
                if(isset($_SESSION['user_name'])){
                    echo $_SESSION['user_name'];
                    } ?></a>
                <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="sidebar_btn">☰</span>
            </div>
    
        <nav class="navbar">
               <!-- <a href=""></a> -->
           
            <ul>
                <li> <a href="<?php echo base_url('index.php/User_client/home_page/')?>">Home</a></li>
                <li><a href="<?php echo base_url('index.php/Page_client/about_page')?>">about as</a></li>
                <li><a href="<?php echo base_url('index.php/Page_client/contact_Page')?>">contact</a></li>
                <li><a href="<?php echo base_url('index.php/Product_client/product_list/')?>" >product</a> </li>
            </ul>
         
        </nav>
        <form method="get" action="<?php echo base_url()?>">

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="<?php echo base_url('index.php/user_client/get_user_info') ?>" class="user_disp_sidebar" name="u_name"><?php   if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];} ?></a>
  <a href="<?php echo base_url('index.php/User_client/home_page/')?>">Home</a>		
  <a href="<?php echo base_url('index.php/Page_client/about_page')?>">About</a>		
  <a href="<?php echo base_url('index.php/Page_client/contact_Page')?>">contact</a>		
  <a href="<?php echo base_url('index.php/Product_client/product_list/')?>?>">product list</a>	
  <?php  if(isset( $_SESSION['user_name'])){?>
  <a href="<?php echo base_url('index.php/User_client/logout')?>">logout</a>		
  <?php }
  else{ 
    ?>
    <a href="<?php echo base_url()?>" class="right"> login</a>
  <?php }?>
</div>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
     

 </form>
     
    </header>
