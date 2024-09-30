<?php

class Product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Product_model');
        $this->load->model('Categories_model');
        $this->load->library('pagination');
        $this->load->library('upload');
        $this->load->helper('url', 'form');
        $this->load->model('Setting_model');

    }


    public function index(){
        //search data
        $value_search = trim($this->input->get('value_search'));

        //pagination
        $config = array();
        $config["base_url"] = base_url() . "index.php/admin/product/index";
        $config["total_rows"] = $this->Product_model->product_pagination($value_search);
        $config["per_page"] = 4;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data["links"] = $this->pagination->create_links();


        $sortDefault = 'id'; 
        $sortColumns = array('id','images','product_name','product_desc','product_price','product_stock','attribute');
            
        $sort = $this->input->get('sort') && in_array($this->input->get('sort'), $sortColumns) ? $this->input->get('sort') : $sortDefault; 
        $order = ($this->input->get('order') && strcasecmp($this->input->get('order'), 'DESC') == 0) ? 'DESC' : 'ASC'; 	
 
        $data['order'] = $order;
        $data['pro_list'] = $this->Product_model->index($value_search, $sort, $order,$config["per_page"], $page);
        $data['curr_sym'] =  $this->Setting_model->get_value('curr_sym');
        $data['content']= $this->load->view('admin/product_list',$data,true);
		$this->load->view('admin/template',$data);
    }



    function add_product(){
        if($this->input->post('submit')){
           


// var_dump(FCPATH.'upload/');
        $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;
        $file_name = $_FILES["images"]["name"];
        $cpt = count($_FILES['images']['name']);
        for($i=0; $i<$cpt; $i++)
        {           
            $_FILES['images']['name']= $files['images']['name'][$i];
            $_FILES['images']['type']= $files['images']['type'][$i];
            $_FILES['images']['tmp_name']= $files['images']['tmp_name'][$i];
            $_FILES['images']['error']= $files['images']['error'][$i];
            $_FILES['images']['size']= $files['images']['size'][$i];    

            $this->upload->initialize($this->upload_img());
            $this->upload->do_upload('images');
            $dataInfo[] = $this->upload->data();
            foreach($dataInfo  as $val){
                $this->create_thumb($val['file_name']);
            }
           
            
        }

        // $file[] = $val['file_name'];
        // var_dump($file_name);die();
        $product_form['images']   =   serialize($file_name);

        $product_form['product_name']   = $this->input->post('product_name');
        $product_form['product_desc']       = $this->input->post('product_desc');
        $product_form['product_price']   = $this->input->post('product_price');
        $product_form['product_stock']    = $this->input->post('product_stock');
        $product_form['attribute']      =  serialize($this->input->post('attribute'));
        $product_categories = $_POST['checkbox'];
       
     
       $product_id = $this->Product_model->insert($product_form);
       $cate_id = $this->Product_model->get_product_and_cat_id($product_id, $product_categories);

        }
        if($product_id == true){
            redirect('admin/Product/index');
        }else{
            echo "invalid";
        }

       
    }
    function add(){
        $data['categories'] =  $this->Categories_model->show_categories();

        $data['content']= $this->load->view('admin/product_add',$data,true);
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


    function delete_product(){
        $id =$this->input->get('id');
        $result =  $this->Product_model->delete($id);
        header('Location:'.base_url('index.php/admin/product/index'));
        die();
            
    }

    function delete_multipal(){
        if($this->input->post('save')){
            $all_ids =  $this->input->post('check');;
            $result = $this->Product_model->delete_multipal($all_ids);
            if($result){
                header('Location:'.base_url('index.php/admin/product/index'));
                die();
            }
            else{
                echo "not delete";
            }
    
            
        }
    }


    function update(){
        if($this->input->post('submit')){
            $update_product = array();
            $id = $_POST['id'];
           
            $dataInfo = array();

            $files = $_FILES;
            $cpt = count($_FILES['images']['name']);
            $file_name = $_FILES["images"]["name"];
            for($i=0; $i<$cpt; $i++)
            {           
                $_FILES['images']['name']= $files['images']['name'][$i];
                $_FILES['images']['type']= $files['images']['type'][$i];
                $_FILES['images']['tmp_name']= $files['images']['tmp_name'][$i];
                $_FILES['images']['error']= $files['images']['error'][$i];
                $_FILES['images']['size']= $files['images']['size'][$i];    
    
                $this->upload->initialize($this->upload_img());
                $this->upload->do_upload('images');
                $dataInfo[] = $this->upload->data();
                foreach($dataInfo  as $val){
                    $this->create_thumb($val['file_name']);
                }
            //    var_dump($val['file_name']);
                
            }


            $product = $this->Product_model->get_value($id);
            $pro_data =  unserialize($product->images);
            // var_dump($pro_data);die();

            if($file_name[0] == ""){
                $images = serialize($pro_data);
            }
            else{
                $arr = array_merge($file_name, $pro_data);
                $images = serialize($arr);
            }
           
        //   var_dump($images);die();
            


            $update_product['images']  = $images;
            $update_product['product_name']   =  $this->input->post('product_name');
            $update_product['product_desc']      = $this->input->post('product_desc');
            $update_product['product_price']   =  $this->input->post('product_price');
            $update_product['product_stock']    =  $this->input->post('product_stock');
            $update_product['attribute']      =  serialize($this->input->post('attribute'));
            // var_dump( $update_product['attribute']);die();
            $product_categories = $_POST['checkbox'];
            $result = $this->Product_model->update_product($id,$update_product);


            $data = $this->Product_model->update_product_and_cat_id($product_categories, $id);
            if($data == true){
                redirect('admin/Product/index');
                 
               
            }
            else{
                echo "invalid failed to add";
            }

            
            if($result){
                redirect('admin/Product/index');
            }
            else{
                echo "not update";
            }
        }
       
       
    }


    function show_value(){
        $id =$this->input->get('id');
        $data['row'] = $this->Product_model->get_value($id);
        $data['categories'] =  $this->Categories_model->show_categories();
        $data['arr'] =  $this->Categories_model->all_categories($id);
        $data['content']= $this->load->view('admin/product_update',$data,true);
		$this->load->view('admin/template',$data);

    }


    function create_thumb($file_name){
        $config = array(
            // Medium Image
            array(
                'allowed_types' => 'gif|jpg|png',
                'image_library' => 'GD2',
                'source_image'  => FCPATH.'upload/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 600,
                'height'        => 400,
                'new_image'     => FCPATH.'upload/thumb/'.$file_name
                ),
            // Small Image
            array(
                'allowed_types' => 'gif|jpg|png',
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
 
    function remove(){
        $id = $this->input->get('id');
        $img = $this->input->get('image');
        $row = $this->Product_model->get_value($id);
        $old_img = unserialize($row->images);
        $arr = array_search($img,$old_img);
    
    
        unset($old_img[$arr]);
        $img_first = array_values($old_img);
        $temp['id'] = $id;
        $temp['image'] = serialize($img_first);
       // var_dump(serialize($old_img));die();
        $result = $this->Product_model->image_remove($temp);
        if($result == True){
           return true;
        }
        else{
            echo "invalid can't delete";
        }
    }

}
?>


