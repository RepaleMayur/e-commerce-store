<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_client extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Page_model');
    }

    function about_page(){
        
        // $this->load->helper('new');
        // test();
        // $this->load->library('mylibrary');
        // echo $this->mylibrary->addition(10,10);
        // echo $this->mylibrary->tax_count(100,5);
        // echo $this->mylibrary->hello();

        $title = "About us";
        $data['row'] =  $this->Page_model->get_page($title);
       
        $data['content']= $this->load->view('about_us',$data,true);
		$this->load->view('template',$data);
            
    }

    function contact_page(){
        $data[] = '';
        $data['content']= $this->load->view('contact_us',$data,true);
		$this->load->view('template',$data);
    }
    
}