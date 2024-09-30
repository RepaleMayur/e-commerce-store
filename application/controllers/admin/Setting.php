<?php

class Setting extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Setting_model');
    }

    function index(){
        if(isset($_POST['submit'])){
            $currency =     $_POST['currency'];
            // var_dump($_POST['curr_sym']);die();
            if($_POST['curr_sym'] == '₹'){
                $sym = '&#x20B9';
            }
            else{
                $sym = $_POST['curr_sym'];
            }
            $curr_sym =     $sym;
            $ship_cost =    $_POST['ship_cost'];
            $tax =          $_POST['tax'];
            $site_email =   $_POST['site_email'];
            $data =  $this->Setting_model->set_setting('currency', $currency);
            $data =  $this->Setting_model->set_setting('curr_sym', $curr_sym);
            $data =  $this->Setting_model->set_setting('ship_cost', $ship_cost);
            $data =  $this->Setting_model->set_setting('tax', $tax);
            $data =  $this->Setting_model->set_setting('site_email', $site_email);
            
            if($data == true){
                redirect('admin/Setting/get_value');
            }
            else{
                echo "not update";
            }

        }
       
       
    }

    function get_value(){
        $data['currency'] =  $this->Setting_model->get_value('currency');
        $data['curr_sym'] =  $this->Setting_model->get_value('curr_sym');
        $data['ship_cost'] =  $this->Setting_model->get_value('ship_cost');
        $data['tax'] =$this->Setting_model->get_value('tax');
        $data['site_email'] =  $this->Setting_model->get_value('site_email');
       
        $data['content']= $this->load->view('admin/setting',$data,true);
		$this->load->view('admin/template',$data);

    }
    
}