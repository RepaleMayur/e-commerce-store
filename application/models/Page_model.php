<?php

class Page_model extends CI_Model{




    function index($value_search, $sort, $order, $limit, $offset){
        // var_dump($value_search);
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->order_by($sort, $order);
        $this->db->like("CONCAT_WS('', `title`, `content`)", $value_search);
        if($value_search == ""){
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        //  var_dump($query);die();
        return $query->result();
    }

    function page_pagination($value_search){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->like("CONCAT_WS('', `title`, `content`)", $value_search);
        $query = $this->db->get();
        // var_dump($query);die();
        return $query->num_rows();
    }


    function add_page($title, $content){
        $query = $this->db->query("INSERT INTO `pages`(`title`, `content`)
                     VALUES ('$title', '$content')");  
             if($query == true){
                return $query;
            }else{
                return false;
            } 
    }


    function delete($id){
        $this->db-> where('id', $id);
        $this->db-> delete('pages');
    }

    function get_value($id){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    function update($id,$update_page){
        $this->db->where('id',$id);
        $query = $this->db->update('pages', $update_page);
        if($query ==true){
            return true;
        }else{
            return false;
        }
    }




    // client side 

    function get_page($title){
        $this->db->select("*");
        $this->db->from('pages');
        $this->db->where('title', $title);
        $query = $this->db->get();
        return $query->result();
    }
}