<?php

class User_client extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model');
        $this->load->model('Categories_model');
        $this->load->model('Product_model');
        $this->load->model('Cart_model');
       
    
        // $this->load->library('session');


    }
    

    function home_page(){
        $data['categories'] =  $this->Categories_model->show_categories();
        $data['top_product'] = $this->Product_model->top_product();

        $data['content']= $this->load->view('home',$data,true);
		$this->load->view('template',$data);
    }


    function login(){
        
        // unset($_SESSION['user_name']);
       
        $data[] = '';
        $data['content']= $this->load->view('login',$data,true);
		$this->load->view('template',$data);
		
    }
    

    function login_check(){
       
        if(isset($_POST['submit'])){
          
            $login_details_check = array();
            $login_details_check['admin_name'] = $this->input->post('admin_name');
            $login_details_check['admin_pass'] = $this->input->post('admin_pass');

            $result = $this->User_model->login_check($login_details_check);
            $count = count($result);   

            if($count >0){
                foreach($result as $row){}
                $pass_check = password_verify($login_details_check['admin_pass'], $row->password);

                $_SESSION['user_name'] = $row->user_name;
                $_SESSION['user_id'] = $row->id;

                if($pass_check == true){
                    redirect('User_client/home_page');
                    $data['content']= 'home.php';
                    $this->load->view('template',$data);
                }else{
                    redirect('User_client/login');

                }
            }else{
                redirect('User_client/login');
            }
        }else{
            redirect('User_client/login');
        }

    }

    function logout(){
      
        unset($_SESSION['cart']['items_']);
        unset($_SESSION['user_name']);
        redirect('User_client/login');
        die();
    }


    function add_user(){
       
        if(isset($_POST['submit'])){
            $user_form = array();
            $user_form['first_name']  =  $this->input->post('first_name');
            $user_form['last_name']   =  $this->input->post('last_name');
            $user_form['email']       =  $this->input->post('email');
            $user_form['user_name']   =  $this->input->post('user_name');
            $pass                     =  $this->input->post('password');
            $user_form['password']    = password_hash($pass, PASSWORD_DEFAULT);
            $user_form['mob_no']      =  $this->input->post('mob_no');
            $user_form['user_type']   =  $this->input->post('user_type');
            $user_form['user_status'] =  $this->input->post('user_status');

            
            $count = $this->User_model->user_check($user_form);
            // var_dump($count);die();
            if($count == 1){
                $message = "This User Already Exists";
                echo "<script type='text/javascript'>alert('$message');</script>";
                
            }
            else{
                $result = $this->User_model->add_user($user_form);
                // var_dump($result);die();
                if($result){
                    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('your account is created sussesfully <br> now sign up ');
                    window.location.href='http://localhost/mi74/codeigniter/index.php/User_client/login';
                    </script>");
                  
                    
                    
                }
                else{
                    echo "invalid failed to add";
                } 
            }
        }         
        
    }

    function user_register(){
        $data[] = '';
        $data['content']= $this->load->view('user_register',$data,true);
		$this->load->view('template',$data);
		
    }


    function get_user_info(){
        $_SESSION['user_name'];
        $user_form = $_SESSION['user_name'];
        $data['info'] = $this->User_model->all_order_user($user_form);
       
        // var_dump($user_form);die();
        $data['content']= $this->load->view('user_order',$data,true);
		$this->load->view('template',$data);

    }


    function user_update(){
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $update_user = array();
            $update_user['first_name']  =   $this->input->post('first_name');
            $update_user['last_name']   =   $this->input->post('last_name');
            $update_user['email']       =   $this->input->post('email');
            $update_user['mob_no']      =   $this->input->post('mob_no');
        //   var_dump($update_user);die();
            $result = $this->User_model->update_user($id, $update_user);
            
            if($result){
                redirect('User_client/user_show');
               
            }
            else{
                echo "not update";
            }
        }
            
    }


    function user_show(){
        $user = $_SESSION['user_name'];
        $data['user_info'] = $this->Cart_model->user($user);

        $data['content']= $this->load->view('user_update',$data,true);
		$this->load->view('template',$data);

    }

}
