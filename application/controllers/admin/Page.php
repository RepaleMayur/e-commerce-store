<?php

class Page extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Page_model');
        $this->load->library('pagination');
    }
    


    function index(){
        $value_search = trim($this->input->get('value_search'));

        
        
        //pagination
        $config = array();
        $config["base_url"] = base_url() . "index.php/admin/page/index";
        $config["total_rows"] = $this->Page_model->page_pagination($value_search);
        $config["per_page"] = 2;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();

        $sortDefault = 'id'; 
        $sortColumns = array(`title`, `content`);
            
        $sort = $this->input->get('sort') && in_array($this->input->get('sort'), $sortColumns) ? $this->input->get('sort') : $sortDefault; 
        $order = ($this->input->get('order') && strcasecmp($this->input->get('order'), 'DESC') == 0) ? 'DESC' : 'ASC'; 	
 
        $data['order'] = $order;
        $data['page_list'] = $this->Page_model->index($value_search, $sort, $order,$config["per_page"], $page);
       
        $data['content']= $this->load->view('admin/page_list',$data,true);
		$this->load->view('admin/template',$data);
    }


    function add_page(){
        if($this->input->post('submit')){
           
           
            $title =  $this->input->post('title');
            $content =  $this->input->post('content');

            $data = $this->Page_model->add_page($title, $content);

            if($data == true){
                redirect('admin/Page/index');
                echo "added";
            }
            else{
                echo "invalid";
            }

        }
        $data[] = '';
        $data['content']= $this->load->view('admin/page_add',$data,true);
		$this->load->view('admin/template',$data);
    }


    function delete_page(){
        $id =$this->input->get('id');
        $result =  $this->Page_model->delete($id);
        header('Location:'.base_url('index.php/admin/page/index'));
        die();
            
    }

    function show_value(){
        $id =$this->input->get('id');
        $data['row'] = $this->Page_model->get_value($id);
        // var_dump($data);
        $data['content']= $this->load->view('admin/page_update',$data,true);
		$this->load->view('admin/template',$data);
    }


    function update(){
        if($this->input->post('submit')){
            $update_page = array();
            $id =$this->input->post('id');
            $update_page['title']  =  $this->input->post('title');
            $update_page['content']   =   $this->input->post('content');
            $result = $this->Page_model->update($id,$update_page);
            
            if($result){
                header('Location:'.base_url('index.php/admin/page/index'));
                die();
            }
            else{
                echo "not update";
            }
        }
    }


}