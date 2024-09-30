<?php

class Order_model extends CI_Model{

    function index($value_search, $sort, $order, $limit, $offset){
        // var_dump($value_search);
        $this->db->select('*');
        $this->db->from('place_order');

        if($sort == !"" && $order == !""){
            $this->db->order_by($sort, $order);
        }
        $this->db->like("concat('',id,user_id, order_item, customer, amount_subtotal, tax, discount, ship_charge, total, payment,billing, shipping, order_date, status)", $value_search, 'both',false);
        if($value_search == ""){
            $this->db->limit($limit, $offset);
        }
        
        $query = $this->db->get();
        //  var_dump($query);
        return $query->result();
    }

    function order_pagination($value_search){
        // var_dump($value_search);

        $this->db->select('*');
        $this->db->from('place_order');
        $this->db->like("concat('',id,user_id, order_item, customer, amount_subtotal, tax, discount, ship_charge, total, payment,billing, shipping, order_date, status)", $value_search, 'both',false);
        $query = $this->db->get();
        // var_dump($query);
        return $query->num_rows();
    }

    function delete($id){
        $this->db-> where('id', $id);
        $this->db-> delete('place_order');
    }


    function delete_multipal($checkbox){
        
        $del_id = $checkbox;
        $this->db-> where_in('id', $del_id);
        $query = $this->db-> delete('place_order'); 
        if($query == true){
            return $query;
        }else{
            return false;
        }
       

        
        
    }


    function show_value($id){
        $this->db->select('*');
        $this->db->from('place_order');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }


    function update($id,$order_form){
        $this->db->where('id',$id);
        $query = $this->db->update('place_order', $order_form);
        if($query ==true){
            return true;
        }else{
            return false;
        }
    }


    function get_categories($id){
       
        $this->db->select('*');
        if(!empty($id)){
          
            $this->db->where_in('pro_categories.cat_id ',$id);
            // $this->db->in();
            $this->db->join('pro_categories', 'product.id=pro_categories.pro_id', 'left');
        
            
        }
        $this->db->from('product');
        $query = $this->db->get(); 
        return $query->result(); 
      
    
    }
   


    function user_detail($user){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name',$user);
        $query = $this->db->get();
        return $query->result();
    }

    function get_pro_data_by_pro_id($user){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('id',$user);
        $query = $this->db->get();
        return $query->result();
    }


    function place_order($cart){

        $item = serialize($cart['order_item']);
        $cart_o['order_item']      = $item;
        $cart_o['customer']        = $cart['bill']['email'];
        $cart_o['amount_subtotal'] = $cart['subtotal'];
        $cart_o['tax']             =  $cart['taxs'];
        $cart_o['discount']        = $cart['discount'];
        $cart_o['ship_charge']     = $cart['shipping'];
        $cart_o['user_id']         = $this->session->userdata('user_name');//$_SESSION['user_name'];
        $cart_o['total']           = $cart['total'];
        $payment                   = serialize($cart['payment']);
        $cart_o['payment']         = $payment;
        $billing                   = serialize($cart['bill']);
        $cart_o['billing']         = $billing;
        $shipping                  = serialize($cart['ship']);
        $cart_o['shipping']        = $shipping;
        $cart_o['order_date']      = $cart['date'];
        $status                    = serialize($cart['status']);
        $cart_o['status']          = $status;

       
     
    
        $this->db->insert('place_order', $cart_o);
        return $idOfInsertedData =  $this->db->insert_id();

    }

    function check_coupon($coupon_code){
        $id = $coupon_code['apply_c'];
        $this->db->select('*');
        $this->db->from('coupon');
        $this->db->where('coup_code',$id);
        $query = $this->db->get();
        return $query->result();
    }

}