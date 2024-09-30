<?php

class Setting_model extends CI_Model{



    function set_setting($key, $value){
        $this->db->select('*');
        $this->db->from('setting_table');
        $this->db->where('setting_key',$key);
        $query = $this->db->get();
        $query->row();
       
        if($query == true){
            $this->db->set('setting_value',$value);
            $this->db->where('setting_key',$key);
            $query = $this->db->update('setting_table');
            if($query ==true){
                return true;
            }else{
                return false;
            }
        }
        else{

            $query = $this->db->query("INSERT INTO `setting_table`(`setting_key`, `setting_value`)
                     VALUES ('$key', '$value')");  
             if($query == true){
                return $query;
            }else{
                return false;
            } 

        }

    }


    function get_value($id){
        $this->db->select('*');
        $this->db->from('setting_table');
        $this->db->where('setting_key',$id);
        $query = $this->db->get();
        return $query->row();
    }
}