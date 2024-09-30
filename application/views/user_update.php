
<body>
    <form  method="POST" class="register_form" action="<?php echo base_url('index.php/user_client/user_update')?>">
       <div>
           <?php
        //    var_dump($user_info);die();
                foreach($user_info as $row){
                    
            ?>
            <label for="">First name</label><br>
            <input type="hidden" name="id" value="<?php echo $row->id;?>">
            <input type="text" name="first_name"  placeholder="Enter name" value=<?php echo $row->first_name; ?> ><br><br>


            <label for="">Last name</label><br>
            <input type="text" name="last_name"  placeholder="Enter name" value=<?php echo $row->last_name; ?>><br><br>


            <label for="">Enter Email</label><br>
            <input type="email" name="email"  placeholder="Enter email" value=<?php echo $row->email; ?>><br><br>

            <!-- <label for="">Enter Password</label><br>
            <input type="password" name="password"  placeholder="Enter password" value=<?php echo $row->password; ?>><br><br> -->


            <label for="">Enter Mobile number</label><br>
            <input type="text" name="mob_no"  placeholder="Enter number" value=<?php echo $row->mob_no; ?>><br><br>

            
                <a href="<?php echo base_url('index.php/user_client/user_update?id=')?><?php echo $row->id; ?>">
                <input type="submit" name="submit" value="update" class="btn_width">
                </a>
      
       </div>
       <?php
          }
        ?>
    </form>

</body>
</html>