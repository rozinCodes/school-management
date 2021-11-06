<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Finance_model extends CI_Model
{



    public function get_student()
    {
        $sql = "SELECT ENROLL.* ,STUDENTS.F_NAME
         FROM ENROLL,STUDENTS
         WHERE ENROLL.STUDENT_ID=STUDENTS.ID AND ENROLL.STATUS=1 ";

        $query = $this->db->query($sql);
        $r = $query->result();
        return $r;
    }

    public function get_std_fees_statement($where)
    {

        $cls = $where['CLASS'];
        $sid = $where['STUDENT_ID'];
        $session = $where['ADMISSION_SESSION'];
        $fees_type = $where['FEES_TYPE'];
        if ($fees_type) {
            $sql = "SELECT ADD_FEES_AMOUNT.* ,STUDENTS.F_NAME,CLASSES.CLASSES,SECTIONS.NAME AS SESCTION_NAME,FEES_TYPE.*,SESSIONS.SESSIONS AS SESSION_NAME
            FROM ADD_FEES_AMOUNT,STUDENTS,CLASSES,SECTIONS,FEES_TYPE,SESSIONS
            WHERE ADD_FEES_AMOUNT.STUDENT_ID=STUDENTS.ID 
            AND ADD_FEES_AMOUNT.CLASS=CLASSES.ID
            AND ADD_FEES_AMOUNT.SECTION=SECTIONS.ID 
            AND ADD_FEES_AMOUNT.FEES_TYPE=FEES_TYPE.ID
            AND ADD_FEES_AMOUNT.ADMISSION_SESSION=SESSIONS.ID
            AND ADD_FEES_AMOUNT.CLASS=$cls
            AND ADD_FEES_AMOUNT.STUDENT_ID=$sid
            AND ADD_FEES_AMOUNT.ADMISSION_SESSION=$session
            AND ADD_FEES_AMOUNT.FEES_TYPE=$fees_type";
        } else {
            $sql = "SELECT ADD_FEES_AMOUNT.* ,STUDENTS.F_NAME,CLASSES.CLASSES,SECTIONS.NAME AS SESCTION_NAME,FEES_TYPE.*,SESSIONS.SESSIONS AS SESSION_NAME
            FROM ADD_FEES_AMOUNT,STUDENTS,CLASSES,SECTIONS,FEES_TYPE,SESSIONS
            WHERE ADD_FEES_AMOUNT.STUDENT_ID=STUDENTS.ID 
            AND ADD_FEES_AMOUNT.CLASS=CLASSES.ID
            AND ADD_FEES_AMOUNT.SECTION=SECTIONS.ID 
            AND ADD_FEES_AMOUNT.FEES_TYPE=FEES_TYPE.ID
            AND ADD_FEES_AMOUNT.ADMISSION_SESSION=SESSIONS.ID
            AND ADD_FEES_AMOUNT.CLASS=$cls
            AND ADD_FEES_AMOUNT.STUDENT_ID=$sid
            AND ADD_FEES_AMOUNT.ADMISSION_SESSION=$session";
        }


        $query = $this->db->query($sql);
        $r = $query->result();
        return $r;
    }

    public function get_student_by_sid($table, $where)
    {
        $this->db->select('STUDENTS.*,ENROLL.*,CLASSES.CLASSES AS CLASS_NAME,SECTIONS.NAME AS SECTION_NAME,SESSIONS.SESSIONS,VERSIONS.VERSION');
        $this->db->from($table);
        $this->db->join('ENROLL', 'ENROLL.STUDENT_ID = STUDENTS.ID');
        $this->db->join('CLASSES', 'CLASSES.ID = ENROLL.CLASS_ID');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ENROLL.SECTION_ID');
        $this->db->join('SESSIONS', 'SESSIONS.ID = ENROLL.SESSION_ID');
        $this->db->join('VERSIONS', 'VERSIONS.ID = STUDENTS.VERSION');
        $this->db->where("STUDENTS.ID", $where);
        $this->db->where("ENROLL.STATUS", 1);
        return $this->db->get()->row();
    }

    public function get_std_all_typeof_fees_statement($where)
    {
        $cls = $where['CLASS'];
        $sec = $where['SECTION'];
        $session = $where['ADMISSION_SESSION'];
       

        $sql = "SELECT ADD_FEES_AMOUNT.ADMISSION_NO,ADD_FEES_AMOUNT.F_NAME,
        SUM(ADD_FEES_AMOUNT.DUE_AMOUNT) AS DUE_AMOUNT ,
        SUM(ADD_FEES_AMOUNT.TOTAL_FEES) AS TOTAL_FEES,
        SUM(ADD_FEES_AMOUNT.PAID_AMOUNT) AS PAID_AMOUNT
        FROM ADD_FEES_AMOUNT,STUDENTS
        WHERE ADD_FEES_AMOUNT.STUDENT_ID=STUDENTS.ID
        AND ADD_FEES_AMOUNT.CLASS=$cls
        AND ADD_FEES_AMOUNT.SECTION=$sec
        AND ADD_FEES_AMOUNT.ADMISSION_SESSION=$session
        GROUP BY ADD_FEES_AMOUNT.ADMISSION_NO,ADD_FEES_AMOUNT.F_NAME";
            
        $query = $this->db->query($sql);
        $r = $query->result();
        return $r;
    }
    public function students_info($where)
    {
        $cls = $where['CLASS'];
        $sec = $where['SECTION'];
        $session = $where['ADMISSION_SESSION'];
        $sql="SELECT DISTINCT CLASSES.CLASSES AS CLASS_NAME,SECTIONS.NAME AS SECTION_NAME,SESSIONS.SESSIONS AS SESSION_NAME FROM CLASSES,SECTIONS,SESSIONS,ADD_FEES_AMOUNT
        WHERE ADD_FEES_AMOUNT.CLASS=CLASSES.ID AND ADD_FEES_AMOUNT.SECTION=SECTIONS.ID AND ADD_FEES_AMOUNT.ADMISSION_SESSION=SESSIONS.ID
         AND ADD_FEES_AMOUNT.CLASS=$cls AND ADD_FEES_AMOUNT.SECTION=$sec AND ADD_FEES_AMOUNT.ADMISSION_SESSION=$session";

        $query = $this->db->query($sql);
        $r = $query->row();
        return $r;

    }

    public function get_std_fees_statement_history($where)
    {

        $cls = $where['CLASS'];
        $sid = $where['STUDENT_ID'];
        $session = $where['ADMISSION_SESSION'];
        $fees_type = $where['FEES_TYPE'];
        if ($fees_type) {
            $sql = "SELECT PAYMENT_HISTORY.* ,STUDENTS.F_NAME,CLASSES.CLASSES,SECTIONS.NAME AS SESCTION_NAME,FEES_TYPE.*,SESSIONS.SESSIONS AS SESSION_NAME
            FROM PAYMENT_HISTORY,STUDENTS,CLASSES,SECTIONS,FEES_TYPE,SESSIONS
            WHERE PAYMENT_HISTORY.STUDENT_ID=STUDENTS.ID 
            AND PAYMENT_HISTORY.CLASS=CLASSES.ID
            AND PAYMENT_HISTORY.SECTION=SECTIONS.ID 
            AND PAYMENT_HISTORY.FEES_TYPE=FEES_TYPE.ID
            AND PAYMENT_HISTORY.SESSIONS=SESSIONS.ID
            AND PAYMENT_HISTORY.CLASS=$cls
            AND PAYMENT_HISTORY.STUDENT_ID=$sid
            AND PAYMENT_HISTORY.SESSIONS=$session
            AND PAYMENT_HISTORY.FEES_TYPE=$fees_type";
        } else {
            $sql = "SELECT PAYMENT_HISTORY.* ,STUDENTS.F_NAME,CLASSES.CLASSES,SECTIONS.NAME AS SESCTION_NAME,FEES_TYPE.*,SESSIONS.SESSIONS AS SESSION_NAME
            FROM PAYMENT_HISTORY,STUDENTS,CLASSES,SECTIONS,FEES_TYPE,SESSIONS
            WHERE PAYMENT_HISTORY.STUDENT_ID=STUDENTS.ID 
            AND PAYMENT_HISTORY.CLASS=CLASSES.ID
            AND PAYMENT_HISTORY.SECTION=SECTIONS.ID 
            AND PAYMENT_HISTORY.FEES_TYPE=FEES_TYPE.ID
            AND PAYMENT_HISTORY.SESSIONS=SESSIONS.ID
            AND PAYMENT_HISTORY.CLASS=$cls
            AND PAYMENT_HISTORY.STUDENT_ID=$sid
            AND PAYMENT_HISTORY.SESSIONS=$session";
        }


        $query = $this->db->query($sql);
        $r = $query->result();
        return $r;
    }

    public function sum_of_allfees_std_wise($where)
    {
        $cls = $where['CLASS'];
        $sid = $where['STUDENT_ID'];
        $session = $where['ADMISSION_SESSION'];
        $fees_type = $where['FEES_TYPE'];
        if($fees_type){
        $sql = "SELECT SUM(ADD_FEES_AMOUNT.TOTAL_FEES) AS SUMOFPAID FROM ADD_FEES_AMOUNT WHERE
         ADD_FEES_AMOUNT.CLASS=$cls
        AND ADD_FEES_AMOUNT.STUDENT_ID=$sid
        AND ADD_FEES_AMOUNT.ADMISSION_SESSION=$session
        AND ADD_FEES_AMOUNT.FEES_TYPE=$fees_type";
        }
        else
        {
        $sql = "SELECT SUM(ADD_FEES_AMOUNT.TOTAL_FEES) AS SUMOFPAID FROM ADD_FEES_AMOUNT WHERE
         ADD_FEES_AMOUNT.CLASS=$cls
        AND ADD_FEES_AMOUNT.STUDENT_ID=$sid
        AND ADD_FEES_AMOUNT.ADMISSION_SESSION=$session";
        }
        $query = $this->db->query($sql);
        $r = $query->row();
        return $r;
    }
}
