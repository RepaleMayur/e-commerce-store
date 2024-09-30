<?php
class Coupon extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Coupon_model');
        $this->load->library('pagination');
        $this->load->library('form_validation');
    }
    

    function index(){
        $value_search = trim($this->input->get('value_search'));
  
        //pagination
        $config = array();
        $config["base_url"] = base_url() . "index.php/admin/coupon/index";
        $config["total_rows"] = $this->Coupon_model->coupon_pagination($value_search);
        $config["per_page"] = 3;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();

        $sortDefault = 'id'; 
        $sortColumns = array('id','coup_title','coup_code','coup_type','coup_disc','valid_from','valid_to','user_status');    
        $sort = $this->input->get('sort') && in_array($this->input->get('sort'), $sortColumns) ? $this->input->get('sort') : $sortDefault; 
        $order = ($this->input->get('order') && strcasecmp($this->input->get('order'), 'DESC') == 0) ? 'DESC' : 'ASC'; 	
 

 
        $data['order'] = $order;
        $data['coup_list'] = $this->Coupon_model->index($value_search, $sort, $order,$config["per_page"], $page);
       
        $data['content']= $this->load->view('admin/coupon_list',$data,true);
		$this->load->view('admin/template',$data);
    }

    function delete_coupon(){
        $id =$this->input->get('id');
        $result =  $this->Coupon_model->delete($id);
        redirect('admin/Coupon/index');
            
    }

    function delete_multipal(){
        if($this->input->post('save')){
            $all_ids = $this->input->get('check');
            $result = $this->Product_model->delete_multipal($all_ids);
            if($result){
                redirect('admin/Coupon/index');
            }
            else{
                echo "not delete";
            }
    
            
        }
    }


    function add_coupon(){
        if($this->input->post('submit')){
            $coupon_form = array();

            $first_date = $this->input->post('valid_from');
            $second_date = $this->input->post('valid_to');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            $this->form_validation->set_rules('valid_from', 'Valid_from', 'trim|add_coupon['.$this->input->post('valid_from').']');
            $this->form_validation->set_rules('valid_to', 'Valid_to', 'trim|required|add_coupon['.$this->input->post('valid_to').']');
            


            if ( $first_date >= $second_date )
            {
                // $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
                // $this->session->set_flashdata('result', 'Please enter the valid date');
                $this->form_validation->set_message('add_coupon', 'Second date field should be greater than First date field!');
                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Please enter the valid date');
                    window.location.href='http://localhost/mi74/codeigniter/index.php/admin/Coupon/add_coupon';
                    </script>");
                // echo $this->session->flashdata('result');
                return false;       
            }
            else
            {
                $coupon_form['valid_from']    =  $this->input->post('valid_from');
                $coupon_form['valid_to']      =  $this->input->post('valid_to');
                $coupon_form['coup_title']  =  $this->input->post('coup_title');
                $coupon_form['coup_code']   =  $this->input->post('coup_code');
                $coupon_form['coup_type']       =  $this->input->post('coup_type');
                $coupon_form['coup_disc']   =  $this->input->post('coup_disc');
            }
            
            $result = $this->Coupon_model->insert($coupon_form);
            if($result){
               redirect('admin/Coupon/index');  
            }
            else{
                echo "invalid failed to add";
            }
        }
        $data[] = '';
        $data['content']= $this->load->view('admin/coupon_add',$data,true);
		$this->load->view('admin/template',$data);
    }


    function show_value(){
        $id =$this->input->get('id');
        $data['row'] = $this->Coupon_model->get_coupon($id);
        $data['content']= $this->load->view('admin/coupon_update',$data,true);
		$this->load->view('admin/template',$data);
    }

    function update(){
        if($this->input->post('submit')){
           
            $update_coupon = array();
            $id = $_POST['id'];
            if($this->input->post('valid_from') <= $this->input->post('valid_to')){
                $update_coupon['valid_from']    =  $this->input->post('valid_from');
                $update_coupon['valid_to']      =  $this->input->post('valid_to');
                $update_coupon['coup_title']  =  $this->input->post('coup_title');
                $update_coupon['coup_code']   =  $this->input->post('coup_code');
                $update_coupon['coup_type']       =  $this->input->post('coup_type');
                $update_coupon['coup_disc']   =  $this->input->post('coup_disc');
            }else{
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Please enter the valid date');
                window.location.href='http://localhost/mi74/codeigniter/index.php/admin/Coupon/index';
                </script>");
              
            }

            $result = $this->Coupon_model->update($id,$update_coupon);
            
            if($result){
                redirect('admin/Coupon/index');
            }
            else{
                echo "not update";
            }
        }
    }

}