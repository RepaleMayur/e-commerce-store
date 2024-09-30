

    <form  method="POST" class="register_form wrap" action="<?php echo base_url().'index.php/admin/User/update'?>" >
       <div>
        <label for="">First name</label><br>
        <input type="hidden" name="id" value="<?php echo $row->id;?>">
            <input type="text" name="first_name"  placeholder="Enter name" value=<?php echo $row->first_name; ?> ><br><br>


            <label for="">Last name</label><br>
            <input type="text" name="last_name"  placeholder="Enter name" value=<?php echo $row->last_name; ?>><br><br>


            <label for="">Enter Email</label><br>
            <input type="email" name="email"  placeholder="Enter email" value=<?php echo $row->email; ?>><br><br>


            <label for="">User name</label><br>
            <input type="text" name="user_name"  placeholder="Enter name" value=<?php echo $row->user_name; ?>><br><br>



            <!-- <label for="">Enter Password</label><br>
            <input type="password" name="password"  placeholder="Enter password" ><br><br> -->


            <label for="">Enter Mobile number</label><br>
            <input type="text" name="mob_no"  placeholder="Enter number" value=<?php echo $row->mob_no; ?>><br><br>

            

            <label for="">user type</label><br>
            <select name="user_type"  class="btn_width" >
            <option>select type</option>
                <option 
                
                <?php 
                if($row->user_type == 'admin'){
                    echo "selected";
                }
                ?>
                >admin</option>
                <option 
                
                <?php 
                if($row->user_type == 'user'){
                    echo "selected";
                }
                ?>
                
                >user</option>
            </select><br><br>


            <label for="">user status</label><br>
            <select name="user_status"  class="btn_width" >
            <option>select status</option>
                <option 
                
                <?php 
                if($row->user_status == 'active'){
                    echo "selected";
                }
                ?>            
                
                >active</option>
                <option 
                
                <?php 
                if($row->user_status == 'deactive'){
                    echo "selected";
                }
                ?>
                
                >deactive</option>
            </select><br><br>
                <a href="<?php echo base_url('');?>'index.php/admin/User/update/?id='<?php echo $row->id; ?>">
                <input type="submit" name="submit" value="update" class="btn_width">
                </a>
      
       </div>
    </form>

