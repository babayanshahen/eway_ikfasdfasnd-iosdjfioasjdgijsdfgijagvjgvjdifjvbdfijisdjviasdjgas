<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***********************
Users model
************************/

class Shop_model extends MY_Model{
	
    public $table = 'e_shop';
    public $pk = 'id';

    public function getShopswithshopsname() {
    	 $this->db->select('e_shop.*,e_shops.sh_name as as_shop_type');
        $this->db->join('e_shops', ' e_shops.sh_value = e_shop.e_shop_type ');
		// $this->db->where('e_product_type',$where); 
        // $this->db->order_by("order", "asc"); 
        return parent::getRecords();
				        // return $this->db->select(
				        //     'SELECT
				        //     e_shop.id,
				        //     e_shop.e_24hour,
				        //     e_shop.e_address,
				        //     e_shop.e_lat,
				        //     e_shop.e_lng,
				        //     e_shop.e_shop_name,
				        //     e_shop.e_time_1,
				        //     e_shop.e_time_2,
				        //     e_shop.e_user_id,
				        //     e_shops.sh_name as as_shop_type FROM e_shops JOIN e_shop ON e_shops.sh_value = e_shop.e_shop_type '
				        // );
    }
}

