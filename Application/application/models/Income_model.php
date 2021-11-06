<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Income_model extends CI_Model
{

    public function get_income_by_period($table, $from_date,$to_date,$specific_date, $order1, $order2){

        if(!empty($from_date) && !empty($to_date)){

            $this->db->select("*");
            $this->db->from($table);
            $this->db->where('INCOME_DATE >=', $from_date);
            $this->db->where('INCOME_DATE<=', $to_date);
            $this->db->order_by("$order1", $order2);
            $res = $this->db->get()->result();
            return $res;
            // if($res){
            //     return $res;
            // }else{
            //     return FALSE;
            // }

        }else if($specific_date=="today"){
            
            $sql = "
                SELECT * FROM ADD_INCOME DD
                WHERE DD.INCOME_DATE >= TRUNC(SYSDATE)
                AND DD.INCOME_DATE < TRUNC(SYSDATE) + 1
            ";
            $query = $this->db->query($sql);
            $r = $query->result();
            return $r;
            // if($r){
            //     return $r;
            // }else{
            //     return false;
            
            // }
        }else if($specific_date=="this_week"){
            $sql="
                SELECT *
                FROM $table
                where INCOME_DATE <= TRUNC(sysdate)
                and INCOME_DATE >= TRUNC(sysdate - 7)
                ";

                $query = $this->db->query($sql);
                $r =  $query->result();
                return $r;
                // if($r){
                //     return $r;
                // }else{
                //     return FALSE;
                // }
        }else if($specific_date=="last_week"){
        
            $sql="
                SELECT * FROM ADD_INCOME WHERE INCOME_DATE <= TRUNC(SYSDATE,'W')-7
                AND INCOME_DATE >= TRUNC(SYSDATE,'W')-14
                ";  

                $query = $this->db->query($sql);
                $r =  $query->result();
                return $r;
                // if($r){
                //     return $r;
                // }else{
                //     return FALSE;
                // }
        }else if($specific_date=="this_month"){
            $sql="
            SELECT * FROM ADD_INCOME WHERE INCOME_DATE BETWEEN TRUNC (SYSDATE, 'MM') AND SYSDATE
                ";  

                $query = $this->db->query($sql);
                $r =  $query->result();
                return $r;
                // if($r){
                //     return $r;
                // }else{
                //     return FALSE;
                // }

        }


     

    }

    public function get_income_by_period_report($table, $from_date,$to_date,$specific_date, $order1, $order2){

        if(!empty($from_date) && !empty($to_date)){

            $this->db->select("*");
            $this->db->from($table);
            $this->db->where('INCOME_DATE >=', $from_date);
            $this->db->where('INCOME_DATE<=', $to_date);
            $this->db->order_by("$order1", $order2);
            $res = $this->db->get()->result();
            return $res;
            // if($res){
            //     return $res;
            // }else{
            //     return FALSE;
            // }

        }else if($specific_date=="today"){
            
            $sql = "
                SELECT * FROM ADD_INCOME DD
                WHERE DD.INCOME_DATE >= TRUNC(SYSDATE)
                AND DD.INCOME_DATE < TRUNC(SYSDATE) + 1
            ";
            $query = $this->db->query($sql);
            $r = $query->result();
            return $r;
            // if($r){
            //     return $r;
            // }else{
            //     return false;
            
            // }
        }else if($specific_date=="this_week"){
            $sql="
                SELECT *
                FROM $table
                where INCOME_DATE <= TRUNC(sysdate)
                and INCOME_DATE >= TRUNC(sysdate - 7)
                ";

                $query = $this->db->query($sql);
                $r =  $query->result();
                return $r;
                // if($r){
                //     return $r;
                // }else{
                //     return FALSE;
                // }
        }else if($specific_date=="last_week"){
        
            $sql="
                SELECT * FROM ADD_INCOME WHERE INCOME_DATE <= TRUNC(SYSDATE,'W')-7
                AND INCOME_DATE >= TRUNC(SYSDATE,'W')-14
                ";  

                $query = $this->db->query($sql);
                $r =  $query->result();
                return $r;
                // if($r){
                //     return $r;
                // }else{
                //     return FALSE;
                // }
        }else if($specific_date=="this_month"){
            $sql="
            SELECT * FROM ADD_INCOME WHERE INCOME_DATE BETWEEN TRUNC (SYSDATE, 'MM') AND SYSDATE
                ";  

                $query = $this->db->query($sql);
                $r =  $query->result();
                return $r;
                // if($r){
                //     return $r;
                // }else{
                //     return FALSE;
                // }

        }


     

    }
    
}
