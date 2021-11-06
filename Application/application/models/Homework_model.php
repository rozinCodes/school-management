<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Homework_model extends CI_Model
{
    public function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('HOMEWORK');
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

    public function delete_content($table,$where){

        $this->db->where("ID",$where);

        $this->db->delete($table);

        return TRUE;

    }

    public function show_contents($table, $where, $order1, $order2){

        $this->db->select('HOMEWORK.*,CLASSES.CLASSES,SECTIONS.NAME');
        $this->db->from($table);
        $this->db->join('CLASSES', 'CLASSES.ID = HOMEWORK.CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = HOMEWORK.SECTION');
        $this->db->where($where);

        $this->db->order_by('HOMEWORK.ID', $order2);


        return $this->db->get()->result();


    }
    
}