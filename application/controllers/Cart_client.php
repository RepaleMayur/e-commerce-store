<?php

class Cart_client extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Cart_model');
        $this->load->model('Setting_model');
        $this->load->model('Product_model');
        $this->load->model('Order_model');

    }



    function add_card(){
        if(isset($_GET['add_card_qyt'])){
            $quantity = $this->input->get('add_card_qyt');

        }else{
            $quantity = $this->input->get('quantity');
        }
        
        $pro_id = $this->input->get('id');
      
        $data['add_pro'] = $this->Product_model->get_product($pro_id);

       
        foreach($data['add_pro'] as $val){
            $img = unserialize($val->images);
        }

        $pro_price = $val->product_price;
        $pro_name = $val->product_name;
        $img;
  
        if(!empty($_SESSION['cart']['items_'][$pro_id])){
          $_SESSION['cart']['items_'][$pro_id]['quantity'] += $quantity;
        
           
        }
        else
        {
        $_SESSION['cart']['items_'][$pro_id]= array(
                                                'pro_id' =>      $pro_id,
                                                'quantity' =>       $quantity,
                                                'pro_price' =>   $pro_price,
                                                'pro_name' =>    $pro_name,
                                                'img' => $img);

        }
        header('Location: '.base_url('index.php/product_client/product_list'));
        die();
    }


    function get_coupon(){
        if(isset($_POST['apply_coupon'])){
            $rem_space = trim($this->input->post('apply_c'));
            $coupon_code['apply_c'] = $rem_space;
            $data['valid_date'] = $this->Order_model->check_coupon($coupon_code);
        }
        foreach($data['valid_date'] as $value){
           
        }
       
        $current = date("Y-m-d");
        $s_data = $value->valid_from;
        $e_date = $value->valid_to;       
        if($current >= $s_data && $current <= $e_date ){
            $_SESSION['cart']['discount'] = $value->coup_disc;
            redirect('Cart_client/get_cart');
        }
        else{
            $_SESSION['message'] = 'invalid coupon';
            unset($_SESSION['cart']['discount']);
            redirect('Cart_client/get_cart');
           
        }
        $data['content']= $this->load->view('view_cart',$data,true);
		$this->load->view('template',$data);  
    }

    function get_cart(){
        $data['ship_cost'] =  $this->Setting_model->get_value('ship_cost');
        $ship = $data['ship_cost']->setting_value;
        $data['tax'] =$this->Setting_model->get_value('tax');
        $tax = $data['tax']->setting_value;

       if(!isset($_SESSION['cart']['items_'])){
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('your cart empty select the product ');
        window.location.href='http://localhost/mi74/codeigniter/index.php/Product_client/product_list';
        </script>");
            
       }
    
       $subtotal = 0;
        foreach($_SESSION['cart']['items_'] as $value){
            $subtotal += $value['pro_price'] * $value['quantity'];
        }

         $_SESSION['cart']['subtotal'] = $subtotal;
         $sub = $_SESSION['cart']['subtotal'];

         // tax calculate
        $_SESSION['cart']['tax'] = $tax;
        $taxs=$sub*$tax/100;
        $tax_and_sub = $taxs+$sub;
        $_SESSION['cart']['taxs'] = $taxs;

        // shipping cost
        $_SESSION['cart']['shipping'] = $ship;

        //discount
        if(isset($_SESSION['cart']['discount'])){
            $total_d = ($tax_and_sub/100) *  ($_SESSION['cart']['discount']);
            $_SESSION['cart']['total_discount'] = $total_d;
            $c_disc = $tax_and_sub - $total_d; 
        }else{
            $c_disc =$tax_and_sub ;
        }
       
        //total
        $total =  $ship + $c_disc;
        $_SESSION['cart']['total'] = $total;
        $data['curr_sym'] =  $this->Setting_model->get_value('curr_sym');
        $data['tax'] =  $this->Setting_model->get_value('tax');          
        $data['content']= $this->load->view('view_cart',$data,true);
		$this->load->view('template',$data);
    }



    function add_quantity(){
        if(isset($_GET['submit'])){
        $id = $this->input->get('id');
        $qty = $this->input->get('add_qyt');
        $_SESSION['cart']['items_'][$id]['quantity'] = $qty ;
        }
        $data['curr_sym'] =  $this->Setting_model->get_value('curr_sym');
        $data['tax'] =  $this->Setting_model->get_value('tax');
        $data['content']= $this->load->view('view_cart',$data,true);
		$this->load->view('template',$data);  
    }


    function remove_from_card(){
        $id = $this->input->get('id');
        unset( $_SESSION['cart']['items_'][ $id]);
        redirect('Cart_client/get_cart');
        
    }


    function check_out(){
        if(isset($_SESSION['user_name'])){
            if(!empty($_SESSION['cart']['items_'])){
                $user = $_SESSION['user_name'];
                $data['user_info'] = $this->Cart_model->user($user);
                $data['curr_sym'] =  $this->Setting_model->get_value('curr_sym');
                $data['tax'] =  $this->Setting_model->get_value('tax');
                $data['content']= $this->load->view('check_out',$data,true);
		        $this->load->view('template',$data);

            }else{
                redirect('Product_client/product_list');
            }
        }else{
            redirect('User_client/login');           
        }
    }




    function order_place(){
        if(isset($_POST['submit'])){
            // billing
            $billing = $this->input->post('bill');
            $_SESSION['cart']['bill'] = $billing;
            $shipping = $this->input->post('ship');
            $_SESSION['cart']['ship'] = $shipping;
            //user order
            $_SESSION['cart']['items_'];
            $_SESSION['cart']['subtotal'];
            $_SESSION['cart']['tax'];
            $_SESSION['cart']['shipping'];
            if(isset($_SESSION['cart']['discount'])){
                $_SESSION['cart']['discount'];
            }else{
                $_SESSION['cart']['discount'] = 0;
            }
            
            $_SESSION['cart']['total'];

            $date = date('Y-m-d');
            $_SESSION['cart']['date'] = $date;


            $payment = array('type' => 'cash on delivery', 'status' => 'sussesful', 'transaction_id' => '');
            $_SESSION['cart']['payment'] = $payment;

            $status = array('status' => 'procces');
            $_SESSION['cart']['status'] = $status;


            $cart = $_SESSION['cart'];

            $order_id = $this->Cart_model->place_order($cart);
           
            $this->thank_page($order_id);
        }

    }


    function thank_page($order){
        unset($_SESSION['cart']);
        $data['order_id'] = $order;
        $data['content']= $this->load->view('thank', $data, true);
		$this->load->view('template',$data); 
    }



    function get_old_order(){
        $id = $_GET['id'];
        $data['order'] = $this->Cart_model->user_order($id);
        foreach($data['order'] as $value){
            $order_item = unserialize($value->order_item);
            foreach($order_item as $row){
            } 
        }
        $data['billing'] = unserialize($value->billing);
        $data['payment'] = unserialize($value->payment);
        $data['status'] = unserialize($value->status);
        $data['shipping'] = unserialize($value->shipping);
        if($id == $value->id){
            $data['content']= $this->load->view('order_view',$data,true);
		    $this->load->view('template',$data);
 
        }      
    }  
}