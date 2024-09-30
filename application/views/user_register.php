

<body>

    <form action="<?php echo base_url('index.php/user_client/add_user')?>" method="POST" class="register_form" >
       <div class="container_add">
       <label for="">First name</label><br>
        <input type="text" name="first_name" placeholder="Enter name"><br><br>


        <label for="">Last name</label><br>
        <input type="text" name="last_name" placeholder="Enter name"><br><br>


        <label for="">Enter Email</label><br>
        <input type="email" name="email" placeholder="Enter email"><br><br>


        <label for="">User name</label><br>
        <input type="text" name="user_name" placeholder="Enter name"><br><br>



        <label for="">Enter Password</label><br>
        <input type="password" name="password" placeholder="Enter password"><br><br>


        <label for="">Enter Mobile number</label><br>
        <input type="text" name="mob_no" placeholder="Enter number"><br><br>

          <label for="">user type</label><br>
        <select name="user_type" class="select_tag">
        <option>select type</option>
            <option >user</option>
        </select><br><br>


        <label for="">user status</label><br>
        <select name="user_status" class="select_tag">
            <option>select status</option>
            <option >active</option>
            <option >deactive</option>
        </select><br><br>
        <input type="submit" name="submit" class="select_tag">
       </div>
    </form>




  
</body>
</html>

