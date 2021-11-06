<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function count_current_active_student($table, $where, $order1, $order2){

        $this->db->select("COUNT(STATUS) AS CURRENT_STUDENT");
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order1, $order2);
        return $this->db->get()->row();

    }

    public function count_total_student($table, $start_year,$end_year){

      

        $sql = "SELECT COUNT(ID) AS TOTAL_STUDENT FROM $table 
        WHERE  ADMISSION_DATE >='".$start_year."'  AND ADMISSION_DATE<='".$end_year."' ORDER BY STUDENTS.ID ";

       $query = $this->db->query($sql);
       $r = $query->row();
       return $r;

    }

    public function count_total_session($table){

        $sql = "SELECT COUNT( DISTINCT( ADMISSION_SESSION)) AS TOTAL_YEAR FROM $table ";
       $query = $this->db->query($sql);
       return  $query->row();
    
    }

    public function count_total_fees($table, $where){ 

        $this->db->select("SUM(PAID_AMOUNT) AS TOTAL_FEES");
        $this->db->from($table);
        $this->db->where($where);
        return  $this->db->get()->row();    
    }
    public function todays_student_attendence($table,$where){

       $sql = "SELECT ATTENDENCE_TYPE FROM $table WHERE ATTENDENCE_DATE = '".$where."' ";
       $query = $this->db->query($sql);
       return  $query->result();


    }

    public function todays_staff_attendence($table,$where){

        $sql = "SELECT ATTENDENCE_TYPE FROM $table WHERE ATTENDENCE_DATE = '".$where."' ";
        $query = $this->db->query($sql);
        return  $query->result();

    }
    public function count_staff($table){
        $this->db->select("COUNT(ID) AS TOTAL_STAFF");
        $this->db->from($table);
        return  $this->db->get()->row(); 
    }

    public function remaining_fees($table,$year){

        $sql = " SELECT (select SUM(TOTAL_FEES) FROM $table
         WHERE YEAR=$year) - (SELECT SUM(PAID_AMOUNT) FROM $table WHERE YEAR=$year) as REMAINING_FEES from dual ";
        $query = $this->db->query($sql);
        return  $query->row();

    }

    public function count_each_staff(){
        $sql= " SELECT (SELECT COUNT(ROLES_ID) FROM STAFF WHERE ROLES_ID='3') AS TEACHER,(SELECT COUNT(ROLES_ID)FROM STAFF WHERE ROLES_ID='1' ) AS SUPER_ADMIN,
        (SELECT COUNT(ROLES_ID)FROM STAFF WHERE ROLES_ID='2' ) AS ADMIN,(SELECT COUNT(ROLES_ID)FROM STAFF WHERE ROLES_ID='4' ) AS ACCOUNTANT
        FROM DUAL ";

        $query = $this->db->query($sql);
        return  $query->row();

    }
    public function count_awaiting_payment(){
        $sql= " SELECT COUNT(STATUS) AS WAITING_PAYMENT FROM ADD_FEES_AMOUNT WHERE STATUS = 'partially paid' OR STATUS = 'paid' ";

        $query = $this->db->query($sql);
        return  $query->row();
    }

    public function count_leave_request(){

        $sql = "SELECT STATUS FROM STAFF_LEAVE_REQUEST";
        $query = $this->db->query($sql);
        return  $query->result();

    }

    public function total_expense_today(){

        $sql = " SELECT * FROM ADD_EXPENSE DD
        WHERE DD.EXP_DATE >= TRUNC(SYSDATE)
        AND DD.EXP_DATE < TRUNC(SYSDATE) + 1 ";
        $query = $this->db->query($sql);
        return  $query->result();

    }
    public function last_five_notice($table){

        $sql = " SELECT *
        FROM $table
        WHERE ROWNUM <= 5";
        $query = $this->db->query($sql);
        return  $query->result();

    }

    public function count_student_leave_request($teacher_id){

        $sql = "SELECT STATUS FROM STUDENT_LEAVE WHERE TEACHER_ID=$teacher_id";
        $query = $this->db->query($sql);
        return  $query->result();
    }

}