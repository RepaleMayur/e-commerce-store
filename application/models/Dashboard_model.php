<?php

class Dashboard_model extends CI_Model{


    function user(){
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
                
    }

    function product(){
        $this->db->select('*');
        $this->db->from('product');
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    function order(){
        $this->db->select('*');
        $this->db->from('place_order');
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    function coupon(){
        $this->db->select('*');
        $this->db->from('coupon');
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }


    function progress($last_date, $curr_date){
        $this->db->select('*');
        $this->db->from('place_order');
        $this->db->where('order_date  >= ',$last_date);
        $this->db->where('order_date <= ',$curr_date);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}