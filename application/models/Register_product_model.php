<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***********************
Users model
************************/

class Register_product_model extends MY_Model{
	
    public $table = 'e_products';
    public $pk = 'id';
    public function getprodWithUser($where = false){
    	
        
        $this->db->select('e_users.user_name, e_users.user_lastname,e_products.*');
        $this->db->join('e_users', ' e_products.e_user_id = e_users.id');
		$this->db->where('e_product_type',$where); 
        // $this->db->order_by("order", "asc"); 
        return parent::getRecords();
    }

}
