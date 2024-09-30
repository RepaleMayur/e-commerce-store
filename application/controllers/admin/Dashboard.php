<?php

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Dashboard_model');
    }
    


    public function dashboard(){

        $data['count_user'] = $this->Dashboard_model->user();
        $data['count_product'] = $this->Dashboard_model->product();
        $data['count_order'] = $this->Dashboard_model->order();
        $data['count_coupon'] = $this->Dashboard_model->coupon();
       
      
        $last_date = date("Y-m-d", strtotime("-2 day"));
        $curr_date = date('Y-m-d');
        $data['ord_list'] = $this->Dashboard_model->progress($last_date, $curr_date);      
       
        $data['content']= $this->load->view('admin/Dashboard',$data,true);
		$this->load->view('admin/template',$data);
    }

}