<?php

class User_model extends CI_Model{



    function login_check($login_details_check){
        // var_dump($login_details_check);
        $username = $login_details_check['admin_name'];
        $password = $login_details_check['admin_pass'];

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name', $username);
        $query = $this->db->get();
        return $query->result();

    }




    function index($value_search, $sort, $order, $limit, $offset)
    {
        // var_dump($value_search);
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by($sort, $order);
        $this->db->like("CONCAT_WS(' ', id, first_name, last_name, email, user_name, mob_no, user_type, user_status)", $value_search);
        if($value_search == ""){
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        //  var_dump($query);die();
        return $query->result();
    }



    function user_pagination($value_search)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->like("CONCAT_WS(' ', id, first_name, last_name, email, user_name, mob_no, user_type, user_status)", $value_search);
        $query = $this->db->get();
        // var_dump($query);die();
        return $query->num_rows();
    }


    function delete($id){
        $this->db-> where('id', $id);
        $this->db-> delete('user');
    }


    function delete_users($checkbox){
        
        $del_id = $checkbox;
        $this->db-> where_in('id', $del_id);
        $query = $this->db-> delete('user'); 
        if($query == true){
            return $query;
        }else{
            return false;
        } 
        
    }

    function user_check($user_form){
        $username =  $user_form['user_name'];

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name', $username);
        $query = $this->db->get();
        return $query->result();

    }


    function insert($user_form){
        $this->db->insert('user', $user_form);
        return $idOfInsertedData =  $this->db->insert_id();

    }


    function show_value($id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    function update($id, $update_user){
        // $this->db->set('',$data)
        $this->db->where('id',$id);
        $query = $this->db->update('user', $update_user);
        if($query ==true){
            return true;
        }else{
            return false;
        }


    }
    function old_password(){
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->row();
    }

    function add_user($user_form){
        $this->db->insert('user', $user_form);
        return $idOfInsertedData =  $this->db->insert_id();
    }


    function all_order_user($user_form){
        $user_name = $user_form;
        $this->db->select('*');
        $this->db->from('place_order');
        $this->db->where('user_id',$user_name);
        $query = $this->db->get();
        return $query->result();
    }

    function update_user($id, $update_user){
        // $this->db->set('',$data)
        $this->db->where('id',$id);
        $query = $this->db->update('user', $update_user);
        if($query ==true){
            return true;
        }else{
            return false;
        }


    }

}