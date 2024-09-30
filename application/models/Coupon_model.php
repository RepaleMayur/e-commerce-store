<?php

class Coupon_model extends CI_Model{

    function index($value_search, $sort, $order, $limit, $offset){
        $this->db->select('*');
        $this->db->from('coupon');
        $this->db->order_by($sort, $order);
        $this->db->like("CONCAT_WS('', id, coup_title, coup_code, coup_type, coup_disc, valid_from, valid_to)", $value_search);
        if($value_search == ""){
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function coupon_pagination($value_search){
        $this->db->select('*');
        $this->db->from('coupon');
        $this->db->like("CONCAT_WS('', id, coup_title, coup_code, coup_type, coup_disc, valid_from, valid_to)", $value_search);
        $query = $this->db->get();
        return $query->num_rows();
    }


    function delete($id){
        $this->db-> where('id', $id);
        $this->db-> delete('coupon');
    }

    function insert($coupon_form){
        $this->db->insert('coupon', $coupon_form);
        return $idOfInsertedData =  $this->db->insert_id();

    }

    function get_coupon($id){
        $this->db->select('*');
        $this->db->from('coupon');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();

    }

    function update($id,$update_coupon){
        $this->db->where('id',$id);
        $query = $this->db->update('coupon', $update_coupon);
        if($query ==true){
            return true;
        }else{
            return false;
        }
    }

}