<?php

class Cart_model extends CI_Model{

    function user($user){
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("user_name", $user);
        $query = $this->db->get();
        return $query->result();
    
    }
    

    function place_order($cart){
        
        $order_placed['user_id']        = $_SESSION['user_name'];
        $item                           = serialize($cart['items_']);
        $order_placed['order_item']     = $item;
        $order_placed['customer']       = $cart['bill']['email'];
        $order_placed['amount_subtotal']= $cart['subtotal'];
        $order_placed['tax']            =  $cart['taxs'];
        $order_placed['discount']       = $cart['discount'];
        $order_placed['ship_charge']    = $cart['shipping'];
        $order_placed['total']          = $cart['total'];
        $payment                        = serialize($cart['payment']);
        $order_placed['payment']        = $payment  ;   
        $billing                        = serialize($cart['bill']);
        $order_placed['billing']        = $billing;
        $shipping                       = serialize($cart['ship']);
        $order_placed['shipping']       = $shipping;
        $order_placed['order_date']     = $cart['date'];
        $status                         = serialize($cart['status']);
        $order_placed['status']         = $status;
        $this->db->insert('place_order', $order_placed);
        return $idOfInsertedData =  $this->db->insert_id();
         
       
    }


    function user_order($id){
        $this->db->select('*');
        $this->db->from('place_order');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
       

    }


}