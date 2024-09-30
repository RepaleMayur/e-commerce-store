<?php

class Order extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Order_model');
        $this->load->model('Categories_model');
        $this->load->model('Setting_model');
        $this->load->library('pagination');
    }
    


    function index(){
        $value_search = trim($this->input->get('value_search'));
        //pagination
        $config = array();
        $config["base_url"] = base_url() . "index.php/admin/Order/index";
        $config["total_rows"] = $this->Order_model->order_pagination($value_search);

        $config["per_page"] = 4;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();

        $sortDefault = 'id'; 

        $sortColumns = array('id','user_id','customer','amu_subtotal','tax','discount','shipping_charges','or_date','or_status');
            
        $sort = $this->input->get('sort') && in_array($this->input->get('sort'), $sortColumns) ? $this->input->get('sort') : $sortDefault; 
        $order = ($this->input->get('order') && strcasecmp($this->input->get('order'), 'DESC') == 0) ? 'DESC' : 'ASC'; 	
 
        $data['order'] = $order;
        $data['ord_list'] = $this->Order_model->index($value_search, $sort, $order,$config["per_page"], $page);
       
        $data['content']= $this->load->view('admin/order_list',$data,true);
		$this->load->view('admin/template',$data);
    }


    function add_order(){
    //    error_reporting(1);
    $id = '';
        if($this->input->post('checkbox')){
            $id = $this->input->post('checkbox');
        }
            // var_dump($id);
            $data['product'] =  $this->Order_model->get_categories($id);
        
      
       
        // var_dump($data);
        
        // $user = $_SESSION['user_name'];
        // $data['user_info'] = $this->Order_model->user_detail($user);
        $data['categories'] =  $this->Categories_model->show_categories();
        // $data['arr'] =  $this->Categories_model->all_categories($id);

        $data['content']= $this->load->view('admin/order_add',$data,true);
		$this->load->view('admin/template',$data);

    }

    function checkout(){
        
        $user = $this->session->userdata('user_name');
        $data['user_info'] = $this->Order_model->user_detail($user);

        $data['content']= $this->load->view('admin/order_check',$data,true);
		$this->load->view('admin/template',$data);

    }

    function get_coupon(){
       
        if($this->input->post('apply_coupon')){
        $id = $this->input->post('id');
        $coupon_code['apply_c'] = $this->input->post('apply_c');
        $data['coup'] = $this->Order_model->check_coupon($coupon_code);
        // var_dump($data);die();
        
            foreach( $data['coup'] as $value){
            }
        }
        $current = date("Y-m-d");
        
        $s_data = $value->valid_from;
        $e_date = $value->valid_to;
        $_SESSION['cart']['discount'] = 0;
        if($current >= $s_data && $current <= $e_date){
            $_SESSION['cart']['discount'] = $value->coup_disc;
            $_SESSION['msg'] = 'add_coupon susesfully';
            header('Location:'.base_url('index.php/admin/Order/add_qyt?id='.$id));
            echo "add_coupon susesfully";
            die();
            
           
        }
        else{
            $_SESSION['message'] = 'invalid coupon';
            unset($_SESSION['cart']['discount']);
          header('Location:'.base_url('index.php/admin/Order/add_qyt?id='.$id));
            die();
        }
       
        $data['content']= $this->load->view('admin/view_detail',$data,true);
		$this->load->view('admin/template',$data);

    }


    function add_qyt(){
        // error_reporting(1);
        if($this->input->get('sub')){
            // $id = $_GET['id'];
            $quantity = $this->input->get('add_card_qyt');
           
        }else{
            
            $quantity = '1';
           
        }
       
        $pro_id = $this->input->get('id');
        $data = $this->Order_model->get_pro_data_by_pro_id($pro_id);
       
        foreach($data as $val){
            $img = unserialize($val->images);
            
        }

        $pro_price = $val->product_price;
        $pro_name = $val->product_name;
        $img;
       
        if(!empty($_SESSION['cart']['order_item'][$pro_id])){
          $_SESSION['cart']['order_item'][$pro_id]['quantity'] = $quantity;
        
           
        }
        else
        {
        $_SESSION['cart']['order_item'][$pro_id]= array(
                                                'pro_id' =>      $pro_id,
                                                'quantity' =>       $quantity,
                                                'pro_price' =>   $pro_price,
                                                'pro_name' =>    $pro_name,
                                                'img' => $img);

        }
       

        $ship_cost =  $this->Setting_model->get_value('ship_cost');
        $ship = $ship_cost->setting_value;
        $item_tax =$this->Setting_model->get_value('tax');
        $row = $item_tax->setting_value;
//    var_dump($ship_cost->setting_value);
       if(!isset($_SESSION['cart']['order_item'])){
            echo "<script>alert('the card is empty')</script>";
       }
       $subtotal = 0;
    //    unset($_SESSION['cart']);
        foreach($_SESSION['cart']['order_item'] as $value){
          
             $subtotal += $value['pro_price'] * $value['quantity'];
             
        }
         $_SESSION['cart']['subtotal'] = $subtotal;
         $sub = $_SESSION['cart']['subtotal'];

        
         // tax calculate
        $_SESSION['cart']['tax'] = $row;
        $taxs=$sub*$row/100;
        $tax_and_sub = $taxs+$sub;
        $_SESSION['cart']['taxs'] = $taxs;

       
       
        // shipping cost
        $_SESSION['cart']['shipping'] = $ship;

        //discount
        if(isset($_SESSION['cart']['discount'])){
            $c_disc =$tax_and_sub - $_SESSION['cart']['discount']; 
        }else{
            // $_SESSION['cart']['discount'] = 0;
            $c_disc =$tax_and_sub ;
        }

        //total
        $total =  $ship + $c_disc;
        $_SESSION['cart']['total'] = $total;
        $data['tax'] = $item_tax;
        $data['content']= $this->load->view('admin/view_detail',$data,true);
		$this->load->view('admin/template',$data);

    }

    

    function remove(){
        $id =$this->input->get('id');
        // var_dump($id);die();
        unset($_SESSION['cart']['order_item'][$id]);
        header('Location:'.base_url('index.php/admin/Order/index'));
        die();
       
    }

    function empty_cart(){
        unset($_SESSION['cart']);
        redirect('admin/Order/add_order');
    }


   

    function delete(){
        $id =$this->input->get('id');
        $result =  $this->Order_model->delete($id);
        header('Location:'.base_url('index.php/admin/Order/index'));
        die();
            
    }

    function delete_multipal(){
        if($this->input->post('save')){
            $all_ids = $this->input->post('check');
            $result = $this->Order_model->delete_multipal($all_ids);
            if($result){
                header('Location:'.base_url('index.php/admin/Order/index'));
                die();
            }
            else{
                echo "not delete";
            }
    
            
        }
    }


    function show_value(){
        $id =$this->input->get('id');
        $data['row'] =  $this->Order_model->show_value($id);
        
        $data['content']= $this->load->view('admin/order_update',$data,true);
		$this->load->view('admin/template',$data);
    }


    function update(){
        if($this->input->post('submit')){
           
            $order_form = array();
            $id = $_POST['id'];
            $order_form['user_id']      =       $this->input->post('user_id');
            $order_form['customer']     =       $this->input->post('customer');
            $order_form['amount_subtotal'] =    $this->input->post('amu_subtotal');
            $order_form['tax']          =       $this->input->post('tax');
            $order_form['discount']     =       $this->input->post('discount');
            $order_form['ship_charge']=         $this->input->post('shipping_charge');
            $order_form['total']        =       $this->input->post('total');
            $order_form['order_date']      =    $this->input->post('or_date');
            $result = $this->Order_model->update($id,$order_form);
            
            if($result){
               redirect('admin/Order/index');
            }
            else{
                echo "not update";
            }
        }
    }



    function order_palce(){
        if($this->input->post('submit')){
            // billing
            $billing = $_POST['bill'];
            $_SESSION['cart']['bill'] = $billing;

            $shipping = $_POST['ship'];
            $_SESSION['cart']['ship'] = $shipping;

            //user order
            $_SESSION['cart']['order_item'];
            $_SESSION['cart']['subtotal'];
            $_SESSION['cart']['tax'];
            $_SESSION['cart']['shipping'];
            $_SESSION['cart']['discount'];
            $_SESSION['cart']['total'];

            $date = date('Y-m-d');
            $_SESSION['cart']['date'] = $date;


            $payment = array('type' => 'cash on delivery', 'status' => 'sussesful', 'transaction_id' => '');
            $_SESSION['cart']['payment'] = $payment;

            $status = array('status' => 'procces');
            $_SESSION['cart']['status'] = $status;


            $cart = $_SESSION['cart'];
            // var_dump($cart);die();
            $order_id = $this->Order_model->place_order($cart);

            //$this->thank_page($order_id);
         
            if($order_id == true){
                echo "record inserted";
                unset($_SESSION['cart']);
                redirect('admin/Order/index');
              
                die();
            }
            else{
                echo "invalid";
            }
      
        }
    }



   
}