<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Asset_search_model extends CI_Model {

    

    public function search_asset($table, $where, $order1, $order2) {

    	if ($where) {
            $this->db->where("CAT_ID",$where ); 
        }
        $this->db->select("*");
        $this->db->from($table);
        $this->db->order_by($order1, $order2);
        return $this->db->get()->result();

////amadr code ata korlaw hobe
        /*$this->db->select("*");
        $this->db->from($table);
        $this->db->where("asset_type_id",$where ); 
        $this->db->order_by($order1, $order2);
        return $this->db->get()->result();*/
    }

    public function count_asset($table, $where, $order1, $order2) {

    	if ($where) {
           $this->db->where("CAT_ID",$where); 
            //$count=$this->db->count_all($table);
        }
        $this->db->select("*");
        $this->db->from($table);
        $this->db->order_by($order1, $order2);

        $result= $this->db->get()->result();
        
         
        $count=count($result); 
       
        return $count;


    }

}
