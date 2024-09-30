
<form action="<?php //echo site_url('/contact_us')?>" method="post">

    <div class="container">
    <h1 class="heading">Contact us</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Delectus autem voluptatum rem voluptatibus iure, 
            commodi laboriosam explicabo harum, vitae tempora quam iste excepturi et obcaecati, 
            expedita sapiente qui officiis placeat.</p><br>
        
                <input type="text" name="contact[first_name]" placeholder="Name" pattern="[a-zA-Z]+" title="use only letters" required class="contact_input">
                <input type="text" name="contact[last_name]" placeholder="Surname" pattern="[a-zA-Z]+" title="use only letters" required  class="contact_input">
                <input type="email"  name="contact[Email]" placeholder=" Email" required  class="contact_input">
                <input type="text"  name="contact[subject]" placeholder="subject" required  class="contact_input">
                <textarea name="contact[mesg]"  cols="28" rows="7" placeholder="Message" class="message_box"></textarea>
                <input type="submit" name="submit" class="btns" >
                
    </div>
   
</form>

    
