<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/***********************
Users model
************************/

class Register_users_model extends MY_Model{
	
    public $table = 'e_users';
    public $pk = 'id';
    
    public function getRecords($page = null, $per_page = null, $where = false)
    {
        if(!empty($where)){
            $this->db->where($where);
        }
        if(!is_null($page) && !is_null($per_page)){
            $this->db->limit($page, $per_page);    
        }
        $this->db->order_by("order", "asc"); 
        return parent::getRecords();
    }

    public function getRecordsWithClassAndCourse($page = null, $per_page = null, $where = false)
    {
        if(!empty($where)){
            $this->db->where($where);
        }
        if(!is_null($page) && !is_null($per_page)){
            $this->db->limit($page, $per_page);    
        }
        $this->db->select('lessons.*, classes.name as class_name,classes.course_id,courses.name as course_name,courses.description course_description');
        $this->db->join('classes', 'classes.id = lessons.class_id');
        $this->db->join('courses', 'courses.id = classes.course_id');
        $this->db->order_by("order", "asc"); 
        return parent::getRecords();

    }

    
}

