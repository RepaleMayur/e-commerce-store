<?php

class Product_client extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Product_model');
        $this->load->model('Categories_model');
        $this->load->model('Order_model');
        $this->load->library('pagination');
        $this->load->model('Setting_model');

    }
    

    function product_list(){
        error_reporting(1);
        $value_search = $this->input->get('value_search');
        if(isset($_GET['search'])){
            $value_search = $this->input->get('value_search');
        }
        $id = $this->input->get('checkbox');
        $record = array();
        $record['checkbox'] = $this->input->get('checkbox');
        $record['min_value'] = $this->input->get('min_value');
        $record['max_value'] = $this->input->get('max_value');
        $record['sorting'] = $this->input->get('sorting');
        $record['value_search'] = $this->input->get('value_search');

        $data['c_id'] = $this->input->get('checkbox');

         //pagination
         $config = array();
         $config["base_url"] = base_url() . "index.php/product_client/product_list";
         $config["total_rows"] = $this->Product_model->page($record);
         $config['reuse_query_string'] = true;

         $config["per_page"] = 4;
         $config["uri_segment"] = 3;
        

         $this->pagination->initialize($config);
         $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
         $data["links"] = $this->pagination->create_links();
 
        $data['pro'] = $this->Product_model->all_product($record,$config["per_page"], $page);
        $total = count( $data['pro']);

        $data['categories'] =  $this->Categories_model->show_categories();
        $data['curr_sym'] =  $this->Setting_model->get_value('curr_sym');

        $data['arr'] =  $this->Categories_model->all_categorie($id);
        $data['content']= $this->load->view('product_list',$data,true);
        $this->load->view('template',$data);
    
    }


    function get_product(){
        $pro_id = $this->input->get('id');
       
        $data['single_view'] =  $this->Product_model->get_product($pro_id);
       
        $categories_id =  $this->Product_model->get_cat_id_by_pro_id($pro_id);
        foreach($categories_id as $cat_id){
           
            }
        $data['releated_pro'] = $this->Product_model->get_releted_product($cat_id->cat_id);
        $data['curr_sym'] =  $this->Setting_model->get_value('curr_sym');

        $data['content']= $this->load->view('single_view',$data,true);
		$this->load->view('template',$data);
    }


    function get_categories(){
        $id = $this->input->get('id');
        // var_dump($id);die();
        $data['categories'] = $this->Categories_model->single_categories($id);
        $data['cat_name'] = $this->Categories_model->get_categories_name($id);
       

        $data['content']= $this->load->view('categories',$data,true);
		$this->load->view('template',$data);


    }


    
}
