<?php

class Categories_model extends CI_Model{

    function show_categories()   {

        $this->db->select('*');
        $this->db->from('categories');
        $query = $this->db->get();
        return $query->result();
      
    }

    
    function all_categories($id){
        $this->db->select('*');
        $this->db->from('pro_categories');
        $this->db->where('pro_id',$id);
        $query = $this->db->get();
        return $query->result();
        

    }

    function index($value_search, $sort, $order, $limit, $offset){
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->order_by($sort, $order);
        $this->db->like("CONCAT_WS('', id, cat_img, cat_desc, cat_title)", $value_search);
        if($value_search == ""){
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        return $query->result();
    }


    function categories_pagination($value_search){
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->like("CONCAT_WS('', id, cat_img, cat_desc, cat_title)", $value_search);
        $query = $this->db->get();
        // var_dump($query);die();
        return $query->num_rows();
    }

    function insert($cat_form){
        $this->db->insert('categories', $cat_form);
        return $idOfInsertedData =  $this->db->insert_id();

    }

    function delete($id){
        $this->db-> where('id', $id);
        $this->db-> delete('categories');
    }

    function get_categories($id){
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();



    }

    function update($id,$update_categories){
        $this->db->where('id',$id);
        $query = $this->db->update('categories', $update_categories);
        if($query ==true){
            return true;
        }else{
            return false;
        }
    }



    function single_categories($id){
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

    function get_categories_name($id){
        $this->db->select("*");
        $this->db->from('categories');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }


    function all_categorie($id){
        $this->db->select('*');
        $this->db->from('pro_categories');
        foreach($id as $val){
        $this->db->where('pro_id',$val);
        }
        $query = $this->db->get();
       
        return $query->result();
        

    }

}