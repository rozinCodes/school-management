<?php

defined('BASEPATH') or exit('No direct script access allowed');

class notice_model extends CI_Model
{


    public function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('NOTICE_BOARD');
        // $this->db->where('status','1');
        // $this->db->order_by('created','desc');
        if(array_key_exists('ID',$params) && !empty($params['ID'])){
            $this->db->where('ID',$params['ID']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }

    public function get_content($table, $where, $order1, $order2){

        if($where==""){

            $this->db->select('NOTICE_BOARD.*,');
            $this->db->from($table);
            $this->db->order_by("NOTICE_BOARD.ID", $order2);
            return $this->db->get()->result();
    

        }else if($where=="staff"){

            $sql = " SELECT * FROM NOTICE_BOARD WHERE NOTICE_FOR='staff' OR NOTICE_FOR='all' ORDER BY NOTICE_BOARD.ID DESC " ;
            $query = $this->db->query($sql);
            return $query->result();
            

        }else if($where=="student"){

            $sql = " SELECT * FROM NOTICE_BOARD WHERE NOTICE_FOR='student' OR NOTICE_FOR='all' ORDER BY NOTICE_BOARD.ID DESC " ;
            $query = $this->db->query($sql);
            return $query->result();

        }

       
        
    }
   
}