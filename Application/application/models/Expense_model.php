<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Expense_model extends CI_Model
{


    public function get_expense_by_period($table, $from_date,$to_date,$specific_date, $order1, $order2){

        if(!empty($from_date) && !empty($to_date)){

            $this->db->select("*");
            $this->db->from($table);
            $this->db->where('EXP_DATE >=', $from_date);
            $this->db->where('EXP_DATE<=', $to_date);
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
                SELECT * FROM ADD_EXPENSE DD
                WHERE DD.EXP_DATE >= TRUNC(SYSDATE)
                AND DD.EXP_DATE < TRUNC(SYSDATE) + 1
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
                where eXP_DATE <= TRUNC(sysdate)
                and eXP_DATE >= TRUNC(sysdate - 7)
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
                SELECT * FROM ADD_EXPENSE WHERE EXP_DATE <= TRUNC(SYSDATE,'W')-7
                AND EXP_DATE >= TRUNC(SYSDATE,'W')-14
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
            SELECT * FROM ADD_EXPENSE WHERE EXP_DATE BETWEEN TRUNC (SYSDATE, 'MM') AND SYSDATE
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