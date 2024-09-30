<?php

class Categories extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Categories_model');
        $this->load->library('pagination');
        $this->load->library('upload');
        $this->load->helper('url', 'form');
    }
 
    
    function index(){
        $value_search = trim($this->input->get('value_search'));

        //pagination
        $config = array();
        $config["base_url"] = base_url() . "index.php/admin/categories/index";
        $config["total_rows"] = $this->Categories_model->categories_pagination($value_search);
        $config["per_page"] = 3;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();

        $sortDefault = 'id'; 

        $sortColumns = array('id','cat_img','cat_title','cat_desc');
            
        $sort = $this->input->get('sort') && in_array($this->input->get('sort'), $sortColumns) ? $this->input->get('sort') : $sortDefault; 
        $order = ($this->input->get('order') && strcasecmp($this->input->get('order'), 'DESC') == 0) ? 'DESC' : 'ASC'; 	
 
        $data['order'] = $order;
        $data['cat_list'] = $this->Categories_model->index($value_search, $sort, $order,$config["per_page"], $page);
       
        $data['content']= $this->load->view('admin/categories_list',$data,true);
		$this->load->view('admin/template',$data);
    }


    function add_categories(){
        if($this->input->post('submit')){
            $cat_form = array();
            
          
            $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;
        $cpt = count($_FILES['cat_img']['name']);
        for($i=0; $i<$cpt; $i++)
        {           
            $_FILES['cat_img']['name']= $files['cat_img']['name'][$i];
            $_FILES['cat_img']['type']= $files['cat_img']['type'][$i];
            $_FILES['cat_img']['tmp_name']= $files['cat_img']['tmp_name'][$i];
            $_FILES['cat_img']['error']= $files['cat_img']['error'][$i];
            $_FILES['cat_img']['size']= $files['cat_img']['size'][$i];    

            $this->upload->initialize($this->upload_img());
            $this->upload->do_upload('cat_img');
            $dataInfo[] = $this->upload->data();
            foreach($dataInfo  as $val)
                $this->create_thumb($val['file_name']);
            
        //    var_dump($val['file_name']);die();
            
        }
        // var_dump($dataInfo);die();
            $file[] = $val['file_name'];
           $cat_form['cat_img']   = serialize($file);



           $cat_form['cat_title'] = $this->input->post('cat_title');
           $cat_form['cat_desc'] = $this->input->post('cat_desc');
            

            $data = $this->Categories_model->insert($cat_form);
            if($data == true){
                redirect('admin/Categories/index');
            }
            else{
                echo "invalid";
            }
        }
        $data[] = '';

        $data['content']= $this->load->view('admin/categories_add',$data,true);
		$this->load->view('admin/template',$data);
    }



    function upload_img(){
        $config = array();
        $config['upload_path'] = FCPATH.'upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048;
        $config['width'] = 400;
        $congif['height'] = 400;
        $config['overwrite']     = FALSE;
        

    
        return $config;
    }
  
    function create_thumb($file_name){
        // var_dump($file_name);die();
        // Image resizing config
        $config = array(
            // Medium Image
            array(
                'image_library' => 'GD2',
                'source_image'  => FCPATH.'upload/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 600,
                'height'        => 400,
                'new_image'     => FCPATH.'upload/thumb/'.$file_name
                ),
            // Small Image
            array(
                'image_library' => 'GD2',
                'source_image'  => FCPATH.'upload/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 100,
                'height'        => 100,
                'new_image'     => FCPATH.'upload/thumb_small/'.$file_name
            ));
 
        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        }
    }


    function delete_categories(){
        $id =$this->input->get('id');
        $result =  $this->Categories_model->delete($id);
        header('Location:'.base_url('index.php/admin/categories/index'));
        die();
            
    }

    function update(){
        if($this->input->post('submit')){
           
            $update_categories = array();
            $id = $_POST['id'];

            // give the path
           
            $dataInfo = array();
            $files = $_FILES;
            $cpt = count($_FILES['cat_img']['name']);
            $file_name = $_FILES["cat_img"]["name"];
            for($i=0; $i<$cpt; $i++)
            {           
                $_FILES['cat_img']['name']= $files['cat_img']['name'][$i];
                $_FILES['cat_img']['type']= $files['cat_img']['type'][$i];
                $_FILES['cat_img']['tmp_name']= $files['cat_img']['tmp_name'][$i];
                $_FILES['cat_img']['error']= $files['cat_img']['error'][$i];
                $_FILES['cat_img']['size']= $files['cat_img']['size'][$i];    
    
                $this->upload->initialize($this->upload_img());
                $this->upload->do_upload('cat_img');
                $dataInfo[] = $this->upload->data();
                foreach($dataInfo  as $val)
                    $this->create_thumb($val['file_name']);
                
            //    var_dump($val['file_name']);die();
                
            }
             $categories = $this->Categories_model->get_categories($id);
             $cat_data =  unserialize($categories->cat_img);

            if($file_name[0] == ""){
                $arr_merge = serialize($cat_data);
            }
            else{
                $arr = array_merge($file_name, $cat_data);
                $arr_merge = serialize($arr);
           
            }
         

            $update_categories['cat_img']  = $arr_merge;
            $update_categories['cat_title']   =  $this->input->post('cat_title');
            $update_categories['cat_desc']       =  $this->input->post('cat_desc');

            $result = $this->Categories_model->update($id,$update_categories);
            
            if($result){
                redirect('admin/Categories/index');
            }
            else{
                echo "not update";
            }
        }

    }
    

    function show_value(){
        $id =$this->input->get('id');
        $data['row'] = $this->Categories_model->get_categories($id);
        $data['content']= $this->load->view('admin/categories_update',$data,true);
		$this->load->view('admin/template',$data);
    }

}