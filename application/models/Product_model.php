<?php

class Product_model extends CI_Model
{

    function index($value_search, $sort, $order, $limit, $offset){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->order_by($sort, $order);
        $this->db->like("CONCAT_WS('', id, images, product_name, product_desc, product_price, product_stock, attribute)", $value_search);
        if($value_search == ""){
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function product_pagination($value_search){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->like("CONCAT_WS('', id, images, product_name, product_desc, product_price, product_stock, attribute)", $value_search);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function getExpenses($limit, $start = 0) {
        $qry= $this->db->get("product", $limit, $start);
        return $qry->result();
    }



    function insert($product_form){
        $this->db->insert('product', $product_form);
        return $idOfInsertedData =  $this->db->insert_id();

    }


    function get_product_and_cat_id($product_id,$product_categories){
        if($product_id){
                foreach($product_categories as  $chk)  {  
                    $query = $this->db->query("INSERT INTO `pro_categories`(`pro_id`, `cat_id`)
                     VALUES ('$product_id', '$chk')");   
                } 
                
                if($query == true){
                    return $query;
                }else{
                    return false;
                }
            }
    }


    function delete($id){
        $this->db-> where('id', $id);
        $this->db-> delete('product');
    }


    function delete_multipal($checkbox){
        
        $del_id = $checkbox;
        $this->db-> where_in('id', $del_id);
        $query = $this->db-> delete('product'); 
        if($query == true){
            return $query;
        }else{
            return false;
        }
       

        
        
    }


    function get_value($id){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }



    function update_product($id,$update_product){
        $this->db->where('id',$id);
        $query = $this->db->update('product', $update_product);
        if($query ==true){
            return true;
        }else{
            return false;
        }
    }
        
    function update_product_and_cat_id($product_categories, $id){
        $this->db-> where_in('pro_id', $id);
        $query = $this->db-> delete('pro_categories'); 
        if($query ==true){
            foreach($product_categories as $pro_cat){
                $query = $this->db->query("INSERT INTO `pro_categories`(`pro_id`, `cat_id`)
                     VALUES ('$id', '$pro_cat')");  
            }
            
        }else{
            
        }

    }

    function image_remove($temp){
        $image = $temp['image'];
        $id = $temp['id'];
        $this->db->set('images',$image);
        $this->db->where('id',$id);
        $result = $this->db->update('product');
        
        if($result == TRUE){
            return true;
        }
        else{
            return false;
        }
    }














    

    // client side

    function get_product($id){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->result();
         
    }

    function get_cat_id_by_pro_id($pro_id){
        $this->db->select('*');
        $this->db->from('pro_categories');
        $this->db->where('pro_id', $pro_id);
        $query = $this->db->get();
        return $query->result();
    }


    function get_releted_product($id){
        $this->db->select('*');
        if(!empty($id)){
          
            $this->db->where_in('pro_categories.cat_id ',$id);
            // $this->db->in();
            $this->db->join('pro_categories', 'product.id=pro_categories.pro_id', 'left');
        
            
        }
        $this->db->from('product');
        $this->db->where('cat_id', $id);
        $query = $this->db->get(); 
        return $query->result(); 
    }

    function top_product(){
        $this->db->select("*");
        $this->db->from('product');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }


    function all_product($record,$limit, $offset){
        $cat_id =       $record['checkbox'];
        $min =      $record['min_value'];
        $max =      $record['max_value'];
        $order =    $record['sorting'];
        $value_search = $record['value_search'];
        $this->db->select('*');
        if(!empty($cat_id)){
          foreach($cat_id as $id){
            $this->db->where('pro_categories.cat_id ',$id);
            $this->db->join('pro_categories', 'product.id=pro_categories.pro_id', 'left');
        
          }
        }
        $this->db->from('product');
        if(!empty($value_search)){
            $this->db->like("CONCAT_WS('', id, images, product_name, product_desc, product_price, product_stock, attribute)", $value_search);
        }
        if(!empty($order)){
            $this->db->order_by('product_name', $order);
        }
        $this->db->limit($limit, $offset);
        if(!empty($min)){
            $this->db->where('product_price >=',$min);
        }
        if(!empty($max)){
            $this->db->where('product_price <=',$max);
        }
      
        $query = $this->db->get(); 
        return $query->result();
    
    }



    function page($record){
        $cat_id =       $record['checkbox'];
        $min =      $record['min_value'];
        $max =      $record['max_value'];
        $order =    $record['sorting'];
        $value_search = $record['value_search'];
        $this->db->select('*');
        $this->db->from('product');

        if(!empty($cat_id)){
          foreach($cat_id as $id){
        
            $this->db->where('pro_categories.cat_id ',$id);
            $this->db->join('pro_categories', 'product.id=pro_categories.pro_id', 'left');
        
          }
        }
        if(!empty($value_search)){
            $this->db->like("CONCAT_WS('', id, images, product_name, product_desc, product_price, product_stock, attribute)", $value_search);
        }
        if(!empty($order)){
            $this->db->order_by('product_name', $order);
        }
        if(!empty($min)){
            $this->db->where('product_price >=',$min);
        }
        if(!empty($max)){
            $this->db->where('product_price <=',$max);
        }
      
        $query = $this->db->get(); 
        return $query->num_rows();
    }
}
