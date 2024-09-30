<head>
<link rel="stylesheet" href="<?php echo base_url();?>style.css">

</head>
<body>
    <div class="login_form">
        <h2>User login</h2>
       <form method="POST" action="<?php echo base_url().'index.php/User_client/login_check'?>">
       <div class="input">
            <input type="text" name="admin_name" placeholder="Admin name" class="login">
        </div><br>
        <div class="input">
            <input type="password"  name="admin_pass" placeholder="Enter password" class="login">
        </div><br>
        <input type="submit" name="submit" class="btn"><br><br>
        <a href="<?php echo base_url('index.php/user_client/user_register')?>">create a new account</a>
       </form>
    </div>
</body>