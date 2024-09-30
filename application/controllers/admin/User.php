<?php
// session_destroy();
class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model');
        $this->load->library('pagination');
        $this->load->library('form_validation');
       
    }
    


    function login(){
        $this->load->view('admin/login.php');
		
    }
    

    function login_check(){
       
        if(($this->input->post('submit'))){
          
            $login_details_check = array();
            $login_details_check['admin_name'] = $this->input->post('admin_name');
            $login_details_check['admin_pass'] = $this->input->post('admin_pass');

            $result = $this->User_model->login_check($login_details_check);
            $count = count($result);   

            if($count >0){
                foreach($result as $row){}
                $pass_check = password_verify($login_details_check['admin_pass'], $row->password);
                 $this->session->set_userdata('user_name', $row->user_name);
                 $this->session->userdata('user_name');

                if($pass_check == true && $row->user_type == 'admin' && $row->user_status == 'active'){
                    $this->session->set_flashdata('login_susessful', 'user login user sucess');
                    redirect('admin/Dashboard/dashboard');
                    $data['content']= 'admin/Dashboard.php';
                    $this->load->view('admin/template',$data);
                }else{
                   
                    $this->form_validation->set_rules('admin_name', 'admin_name', 'required');
                    $this->form_validation->set_rules('admin_pass', 'password', 'required|min_length[3]|max_length[8]');
                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                    $this->form_validation->set_message('required', 'Enter %s');

                
                    if ($this->form_validation->run() == FALSE)
                    {
                        $this->load->view('admin/login.php');
                           
                    }else{
                        echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Please enter the valid password');
                        window.location.href='http://localhost/codeigniter/index.php/admin/User/login';
                        </script>");
                    }

                }
            }else{
                

                $this->form_validation->set_rules('admin_name', 'admin_name', 'required');
                $this->form_validation->set_rules('admin_pass', 'password', 'required|min_length[3]|max_length[8]');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $this->form_validation->set_message('required', 'Enter %s');

                
                if ($this->form_validation->run() == FALSE)
                {
                    
                    $this->load->view('admin/login.php');
                    
                }else{
                    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Please enter the valid password');
                    window.location.href='http://localhost/mi74/codeigniter/index.php/admin/User/login';
                    </script>");
                }                  
            }
        }else{
            $this->form_validation->set_rules('admin_name', 'admin_name', 'required');
            $this->form_validation->set_rules('admin_pass', 'password', 'required|min_length[3]|max_length[8]');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('required', 'Enter %s');

            
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('admin/login.php');
                    
            }else{
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Please enter the valid password');
                window.location.href='http://localhost/mi74/codeigniter/index.php/admin/User/login';
                </script>");
            }
        }

    }

    function logout(){
        $this->session->unset_userdata('user_name');
        redirect('admin/User/login');
    }




    function index(){
        //search data
        $value_search = trim($this->input->get('value_search'));

        //pagination
        $config = array();
        $config["base_url"] = base_url() . "index.php/admin/user/index";
        $config["total_rows"] = $this->User_model->user_pagination($value_search);
        $config["per_page"] = 5;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();

        $sortDefault = 'id'; 
        $sortColumns = array('id','first_name','last_name','email','user_name','mob_no','user_type','user_status');
        
        $sort = $this->input->get('sort') && in_array($this->input->get('sort'), $sortColumns) ? $this->input->get('sort') : $sortDefault; 
        $order = ($this->input->get('order') && strcasecmp($this->input->get('order'), 'DESC') == 0) ? 'DESC' : 'ASC'; 	
 
        $data['order'] = $order;
        $data['user'] = $this->User_model->index($value_search, $sort, $order,$config["per_page"], $page);
       
        $data['content']= $this->load->view('admin/user_list',$data,true);
		$this->load->view('admin/template',$data);
    }



    function add_user(){
        if($this->input->post('submit')){
            $user_form = array();
            $user_form['first_name']  =  $this->input->post('first_name');
            $user_form['last_name']   =  $this->input->post('last_name');
            $user_form['email']       =  $this->input->post('email');
            $user_form['user_name']   =  $this->input->post('user_name');
            $pass   =  $this->input->post('password');
            $user_form['password']    =  password_hash($pass, PASSWORD_DEFAULT);
            $user_form['mob_no']      =  $this->input->post('mob_no');
            $user_form['user_type']   =  $this->input->post('user_type');
            $user_form['user_status'] =  $this->input->post('user_status');
            $result = $this->User_model->user_check($user_form);
            $count = count($result); 
            if($count > 0){
                $message = "This User Already Exists";
                echo "<script type='text/javascript'>alert('$message');</script>";
                
            }
            else{
                $result = $this->User_model->insert($user_form);
                if($result){
                    redirect('admin/User/index');
                   
                    
                   
                }
                else{
                    echo "invalid failed to add";
                }
                               
            }
        }
        $data[] = '';
        $data['content']= $this->load->view('admin/user_add', $data, true);
		$this->load->view('admin/template',$data);
    }



    function delete_user(){
        $id =$this->input->get('id');
        $result =  $this->User_model->delete($id);
        header('Location:'.site_url('/admin/user/index'));
        die();
            
    }


    function delete_users(){
        if($this->input->post('save')){
            $all_ids = $this->input->post('check');
            $result = $this->User_model->delete_users($all_ids);
            if($result){
                header('Location:'.base_url('index.php/admin/user/index'));
                die();
            }
            else{
                echo "not delete";
            } 
        }

    }


    function update(){
        //$data = $this->User_model->old_password();
       
        if($this->input->post('submit')){
           
            $update_user = array();
            $id=$_POST['id'];
           
            
            $update_user['first_name']  = $this->input->post('first_name');
            $update_user['last_name']   = $this->input->post('last_name');
            $update_user['email']       =  $this->input->post('email');
            $update_user['user_name']   =  $this->input->post('user_name');
            // $pass                       =  $_POST['password'];
            // $update_user['password']    = password_hash($pass, PASSWORD_DEFAULT);
            $update_user['mob_no']      =  $this->input->post('mob_no');
            $update_user['user_type']   =  $this->input->post('user_type');
            $update_user['user_status'] =  $this->input->post('user_status');
        //    var_dump($pass);
        //    var_dump($update_user['password']);die();
            $result = $this->User_model->update($id,$update_user);
            if($result == true){
                redirect('admin/User/index');
               
            }
            else{
                echo "not update";
            }
        
       
      
        } 
       
        

    }

    function show_value(){
        $id =$this->input->get('id');
        $data['row'] =  $this->User_model->show_value($id);
        
        $data['content']= $this->load->view('admin/user_update',$data,true);
		$this->load->view('admin/template',$data);
    }
}