<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{



    /*public function Get_student_class_list($table,$where)
    {
        $this->db->select('STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS');
        $this->db->from($table);
        $this->db->join('CLASSES', 'CLASSES.ID = STUDENTS.CLASS');
       $this->db->join('SECTIONS', 'SECTIONS.ID = STUDENTS.SECTION');
       $this->db->join('SESSIONS', 'SESSIONS.ID = STUDENTS.ADMISSION_SESSION');
       $this->db->where($where);
        $result = $this->db->get()->result();
        return $result;
        // print_r($result);
        // exit();

    }*/

    public function get_siblingsParant_info()
    {
        $sql = "SELECT GUARDIAN.*,STUDENTS.GUARDIAN_NAME FROM GUARDIAN,STUDENTS
        WHERE STUDENTS.ID=GUARDIAN.STUDENT_ID";
        $query = $this->db->query($sql);
        $r = $query->result();
        return $r;
    }

    public function Get_student_class_list($table, $where)
    {
        $this->db->select('STUDENTS.*,ENROLL.*,CLASSES.CLASSES,SECTIONS.NAME');
        $this->db->from($table);
        $this->db->join('CLASSES', 'CLASSES.ID = ENROLL.CLASS_ID');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ENROLL.SECTION_ID');
        $this->db->join('SESSIONS', 'SESSIONS.ID = ENROLL.SESSION_ID');
        $this->db->join('STUDENTS', 'STUDENTS.ID= ENROLL.STUDENT_ID ');
        $this->db->where($where);
        $result = $this->db->get()->result();
        return $result;
        // print_r($result);
        // exit();
    }

    public function Get_single_student_for_id_card($table, $where)
    {
        $this->db->select('STUDENTS.*,ENROLL.*,CLASSES.CLASSES,SECTIONS.NAME');
        $this->db->from($table);
        $this->db->join('CLASSES', 'CLASSES.ID = ENROLL.CLASS_ID');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ENROLL.SECTION_ID');
        // $this->db->join('SESSIONS', 'SESSIONS.ID = ENROLL.SESSION_ID');
        $this->db->join('STUDENTS', 'ENROLL.STUDENT_ID = STUDENTS.ID');
        $this->db->where($where);
        $result = $this->db->get()->result();
        return $result;
        // print_r($result);
        // exit();
    }

    public function insert_id()
    {
        //$this->db->where("SELECT MAX(ID) AS ID FROM CLASSES");
        $this->db->select_max("ID");
        $this->db->from("STUDENTS");
        // $this->db->from("CLASSES");
        //$this->db->order_by($order1, $order2);
        return $this->db->get()->row();
    }
    public function insert_id_online_admission()
    {
        //$this->db->where("SELECT MAX(ID) AS ID FROM CLASSES");
        $this->db->select_max("ID");
        $this->db->from("ONLINE_ADMISSION");
        // $this->db->from("CLASSES");
        //$this->db->order_by($order1, $order2);
        return $this->db->get()->row();
    }
    public function get_std_details_by_admission_no($table, $where, $order1, $order2)
    {
        /*if ($where) {
            $this->db->where("ADMISSION_NO",$where );
        }
        $this->db->select("*");
        $this->db->from($table);
        $this->db->order_by($order1, $order2);
        return $this->db->get()->row();*/
        $this->db->select('STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS');
        $this->db->from('STUDENTS');
        $this->db->join('CLASSES', 'CLASSES.ID = STUDENTS.CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = STUDENTS.SECTION');
        $this->db->join('SESSIONS', 'SESSIONS.ID = STUDENTS.ADMISSION_SESSION');
        $this->db->where("ADMISSION_NO", $where);
        //$this->db->where("CLASS",$where );
        $this->db->order_by('STUDENTS.ID', $order2);

        return $this->db->get()->row();
    }

    /*public function get_std_details_by_id($table, $where, $order1, $order2)
    {
        $this->db->select('STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS');
        $this->db->from('STUDENTS');
        $this->db->join('CLASSES', 'CLASSES.ID = STUDENTS.CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = STUDENTS.SECTION');
        $this->db->join('SESSIONS', 'SESSIONS.ID = STUDENTS.ADMISSION_SESSION');
        $this->db->where("STUDENTS.ID",$where);
        $this->db->order_by('STUDENTS.ID', $order2);

        return $this->db->get()->row();

    }*/

    public function get_std_details_by_id($table, $where, $order1, $order2)
    {
        $this->db->select('STUDENTS.*,ENROLL.*,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS,VERSIONS.VERSION');
        $this->db->from($table);
        $this->db->join('CLASSES', 'CLASSES.ID = ENROLL.CLASS_ID');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ENROLL.SECTION_ID');
        $this->db->join('SESSIONS', 'SESSIONS.ID = ENROLL.SESSION_ID');
        $this->db->join('STUDENTS', 'STUDENTS.ID = ENROLL.STUDENT_ID');
        $this->db->join('VERSIONS', 'VERSIONS.ID = ENROLL.VERSION');

        $this->db->where($where);

        //$this->db->order_by($order1, $order2);

        return $this->db->get()->row();
    }
    // public function get_std_details_by_id($table, $where, $order1, $order2)
    // {
    //     $this->db->select('STUDENTS.*,GUARDIAN.PASSWORD AS PASS,ENROLL.*,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS,VERSIONS.VERSION');
    //     $this->db->from($table);
    //     $this->db->join('CLASSES', 'CLASSES.ID = ENROLL.CLASS_ID');
    //     $this->db->join('SECTIONS', 'SECTIONS.ID = ENROLL.SECTION_ID');
    //     $this->db->join('SESSIONS', 'SESSIONS.ID = ENROLL.SESSION_ID');
    //     $this->db->join('STUDENTS', 'STUDENTS.ID = ENROLL.STUDENT_ID');
    //     $this->db->join('VERSIONS', 'VERSIONS.ID = ENROLL.VERSION');
    //     $this->db->join('GUARDIAN', 'GUARDIAN.STUDENT_ID = ENROLL.STUDENT_ID');

    //     $this->db->where($where);

    //     //$this->db->order_by($order1, $order2);

    //     return $this->db->get()->row();
    // }

    public function search_student_attendence($table, $where, $order1, $order2)
    {
        $this->db->select('ENROLL.*,STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS');
        $this->db->from($table);
        $this->db->join('CLASSES', 'CLASSES.ID = ENROLL.CLASS_ID');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ENROLL.SECTION_ID');
        $this->db->join('SESSIONS', 'SESSIONS.ID = ENROLL.SESSION_ID');
        $this->db->join('STUDENTS', 'STUDENTS.ID = ENROLL.STUDENT_ID');
        //  $this->db->join('STUDENT_ATTENDENCE', 'STUDENT_ATTENDENCE.ADMISSION_NO = STUDENTS.ADMISSION_NO');
        $this->db->where($where);
        //$this->db->where("CLASS",$where );
        $this->db->order_by('STUDENTS.ID', $order2);

        return $this->db->get()->result();
    }

    public function search_student_attendence_by_admission_no($table, $where, $order1, $order2)
    {
        $this->db->select('ENROLL.*,STUDENTS.*,SESSIONS.*');
        $this->db->from($table);
        // $this->db->join('STUDENTS', 'STUDENTS.ADMISSION_NO = STUDENT_ATTENDENCE.ADMISSION_NO');
        //$this->db->join('STUDENT_ATTENDENCE', 'STUDENT_ATTENDENCE.ADMISSION_NO = STUDENTS.ADMISSION_NO');
        $this->db->join('STUDENTS', 'STUDENTS.ID = ENROLL.STUDENT_ID');
        $this->db->join('SESSIONS', 'SESSIONS.ID = ENROLL.SESSION_ID');
        $this->db->where($where);
        $this->db->order_by("STUDENTS.ID", $order2);
        $r = $this->db->get()->result();
        return $r;
    }

    public function student_details_by_admission_no($table, $where, $status, $order1, $order2)
    {
        $this->db->select('ENROLL.*,STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME');
        $this->db->from($table);
        $this->db->join('CLASSES', 'CLASSES.ID = ENROLL.CLASS_ID');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ENROLL.SECTION_ID');
        $this->db->join('STUDENTS', 'ENROLL.STUDENT_ID = STUDENTS.ID');
        $this->db->where("STUDENTS.ADMISSION_NO", $where);
        $this->db->where("ENROLL.STATUS", $status);
        $this->db->order_by("STUDENTS.ID", $order2);
        $r = $this->db->get()->result();
        return $r;
    }

    public function search_student_late_attendence_by_admission_no($table, $where, $order1, $order2)
    {
        $this->db->select('STUDENT_ATTENDENCE.*,STUDENTS.F_NAME,STUDENTS.ROLL_NO,SESSIONS.SESSIONS');
        $this->db->from($table);
        $this->db->join('STUDENTS', 'STUDENTS.ADMISSION_NO = STUDENT_ATTENDENCE.ADMISSION_NO');
        $this->db->join('SESSIONS', 'SESSIONS.ID = STUDENT_ATTENDENCE.SESSIONS');
        $this->db->where($where);
        $this->db->where('ATTENDENCE_TYPE', 'ABSENT');

        return $this->db->get()->result();
    }

    public function check_attendence($table, $where, $atnd_date, $order1, $order2)
    {
        $this->db->select('STUDENT_ATTENDENCE.*,CLASSES.CLASSES,SECTIONS.NAME');
        $this->db->from($table);
        $this->db->join('CLASSES', 'CLASSES.ID = STUDENT_ATTENDENCE.CLASSES');
        $this->db->join('SECTIONS', 'SECTIONS.ID = STUDENT_ATTENDENCE.SECTION');
        $this->db->join('SESSIONS', 'SESSIONS.ID = STUDENT_ATTENDENCE.SESSIONS');
        $this->db->where($where);
        $this->db->where('ATTENDENCE_DATE >=', $atnd_date);

        if ($this->db->get()->result()) {
            return true;
        } else {
            return false;
        }
    }


    public function search_student_attendence_report($table, $where, $from_date, $to_date, $order1, $order2)
    {
        $this->db->select('STUDENT_ATTENDENCE.*, STUDENTS.F_NAME,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS');
        $this->db->from($table);
        // $this->db->distinct("STUDENT_ATTENDENCE.ADMISSION_NO");
        // $this->db->group_by('STUDENT_ATTENDENCE.ATTENDENCE_DATE_TIME');
        $this->db->join('STUDENTS', 'STUDENTS.ADMISSION_NO = STUDENT_ATTENDENCE.ADMISSION_NO');
        $this->db->join('CLASSES', 'CLASSES.ID = STUDENT_ATTENDENCE.CLASSES');
        $this->db->join('SECTIONS', 'SECTIONS.ID = STUDENT_ATTENDENCE.SECTION');
        $this->db->join('SESSIONS', 'SESSIONS.ID = STUDENT_ATTENDENCE.SESSIONS');
        $this->db->where($where);
        //  $this->db->group_by('STUDENT_ATTENDENCE.ADMISSION_NO');
        $this->db->where('ATTENDENCE_DATE >=', $from_date);
        $this->db->where('ATTENDENCE_DATE<=', $to_date);
        $this->db->order_by("STUDENT_ATTENDENCE.ATTENDENCE_DATE_TIME", $order2);
        $r = $this->db->get()->result();

        return $r;
    }

    public function search_student_attendence_report_by_admission_no($table, $where, $from_date, $to_date, $order1, $order2)
    {
        $this->db->select('STUDENT_ATTENDENCE.*, STUDENTS.F_NAME,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS');
        $this->db->from($table);
        $this->db->join('STUDENTS', 'STUDENTS.ADMISSION_NO = STUDENT_ATTENDENCE.ADMISSION_NO');
        $this->db->join('CLASSES', 'CLASSES.ID = STUDENT_ATTENDENCE.CLASSES');
        $this->db->join('SECTIONS', 'SECTIONS.ID = STUDENT_ATTENDENCE.SECTION');
        $this->db->join('SESSIONS', 'SESSIONS.ID = STUDENT_ATTENDENCE.SESSIONS');
        $this->db->where($where);
        $this->db->where('ATTENDENCE_DATE >=', $from_date);
        $this->db->where('ATTENDENCE_DATE<=', $to_date);
        $this->db->order_by("STUDENT_ATTENDENCE.ATTENDENCE_DATE", $order2);
        $r = $this->db->get()->result();


        return $r;
    }

    public function search_student_late_attendence($table, $where, $order1, $order2)
    {
        /* $this->db->select('STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS');
        $this->db->from('STUDENTS');
        $this->db->join('CLASSES', 'CLASSES.ID = STUDENTS.CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = STUDENTS.SECTION');
        $this->db->join('SESSIONS', 'SESSIONS.ID = STUDENTS.ADMISSION_SESSION');
      //  $this->db->join('STUDENT_ATTENDENCE', 'STUDENT_ATTENDENCE.ADMISSION_NO = STUDENTS.ADMISSION_NO');
        $this->db->where($where);
         //$this->db->where("CLASS",$where );
        $this->db->order_by('STUDENTS.ID', $order2);
        return $this->db->get()->result();*/

        $this->db->select('STUDENT_ATTENDENCE.*,STUDENTS.F_NAME,STUDENTS.ROLL_NO');
        $this->db->from('STUDENT_ATTENDENCE');
        //$this->db->join('CLASSES', 'CLASSES.ID = STUDENT_ATTENDENCE.CLASSES');
        //$this->db->join('SECTIONS', 'SECTIONS.ID = STUDENT_ATTENDENCE.SECTION');
        //$this->db->join('STUDENTS', 'STUDENTS.ADMISSION_SESSION = STUDENT_ATTENDENCE.SESSIONS');
        $this->db->join('STUDENTS', 'STUDENTS.ADMISSION_NO = STUDENT_ATTENDENCE.ADMISSION_NO');
        //  $this->db->join('STUDENT_ATTENDENCE', 'STUDENT_ATTENDENCE.ADMISSION_NO = STUDENTS.ADMISSION_NO');
        $this->db->where($where);
        $this->db->where('ATTENDENCE_TYPE', 'ABSENT');
        //$this->db->where("CLASS",$where );
        $this->db->order_by('STUDENT_ATTENDENCE.ID', $order2);
        return $this->db->get()->result();
    }

    /* public function search_absent_student($table, $where,$order1, $order2){

        $this->db->select('STUDENT_ATTENDENCE.*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order1, $order2);
        $r= $this->db->get()->result();

        return $r;
    }*/


    public function get_student_by_class_section($table, $where, $order1, $order2, $c)
    {
        $this->db->select('STUDENTS.*,ENROLL.CLASS_ID,ENROLL.SECTION_ID');
        $this->db->from($table);
        $this->db->join('ENROLL', 'STUDENTS.ID = ENROLL.STUDENT_ID');
        $this->db->where($where);
        $this->db->order_by('STUDENTS.ID', $order2);
        if ($c == 1) {
            $r = $this->db->get()->row();
        } elseif ($c == 2) {
            $r = $this->db->get()->result();
        }

        if ($r) {
            return $r;
        } else {
            return false;
        }
    }

    public function get_student_by_class_section1($table, $where, $order1, $order2, $c)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by('ID', $order2);
        if ($c == 1) {
            $r = $this->db->get()->row();
        } elseif ($c == 2) {
            $r = $this->db->get()->result();
        }

        if ($r) {
            return $r;
        } else {
            return false;
        }
    }

    public function edit_late_attendence($table, $data, $where, $date)
    {
        $this->db->where($where);
        $this->db->where('ATTENDENCE_DATE', $date);
        $this->db->update($table, $data);
        return true;
    }

    public function check_roll_no()
    {
        $this->db->select('ENROLL.ROLL');
        $this->db->from("ENROLL");
        if ($this->db->get()->row()) {
            return true;
        } else {
            return false;
        }
    }
    public function check_last_roll_no($table, $where)
    {
        $this->db->select('MAX(ID) AS MID');
        $this->db->from($table);
        $this->db->where($where);

        $r = $this->db->get()->row();
        //return $r;

        // print_r($r);
        // exit();
        if($r->MID)
        {
            $sql = "SELECT ROLL FROM $table WHERE ID=$r->MID";

            $query = $this->db->query($sql);
            $rr = $query->row();
            return $rr;
    
            if ($rr) {
                return $rr;
            } else {
                return false;
            }
        }
        else
        {
            return false; 
        }


       
    }

    public function check_Admission_no()
    {
        $this->db->select('STUDENTS.ADMISSION_NO');
        $this->db->from("STUDENTS");
        if ($this->db->get()->row()) {
            return true;
        } else {
            return false;
        }
    }


    public function check_last_Admission_no()
    {
        $this->db->select_max("ADMISSION_NO");
        $this->db->from("STUDENTS");
        return $this->db->get()->row();
    }
    public function check_last_id()
    {
        $this->db->select_max("ID");
        $this->db->from("STUDENTS");
        $r = $this->db->get()->row();
        if ($r) {
            return $r;
        } else {
            return false;
        }
    }


    public function get_staff_by_session($table, $where, $order1, $order2)
    {
        $this->db->select('STAFF.*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by("STAFF.ID", $order2);
        $r = $this->db->get()->row();
        return $r;
    }
	
	 public function Guardian_Details($where)
    {
        //$this->db->select('GUARDIAN.*');
        //$this->db->from("GUARDIAN");
        //$this->db->where("GUARDIAN.STUDENT_ID",$where);
        //$this->db->order_by("GUARDIAN.ID","desc");
        //$r = $this->db->get()->row();
        //return $r;
		
		 $this->db->select("GUARDIAN.*");
        $this->db->from("GUARDIAN");
		       $this->db->where("GUARDIAN.STUDENT_ID",$where);
                $this->db->order_by("GUARDIAN.ID","desc");
        return $this->db->get()->result();
    }

    public function check_std_existing_pass($table, $where, $order1, $order2)
    {
        $this->db->select('STUDENTS.PASSWORD,ENROLL.*');
        $this->db->from("ENROLL");
        $this->db->join('STUDENTS', 'STUDENTS.ID = ENROLL.STUDENT_ID');
        $this->db->where("ENROLL.STUDENT_ID", $where);
        return $this->db->get()->row();
    }


    public function get_student_by_session($table, $where)
    {
        $this->db->select('STUDENTS.*,ENROLL.*,CLASSES.CLASSES AS CLASS_NAME,SECTIONS.NAME AS SECTION_NAME,SESSIONS.SESSIONS,VERSIONS.VERSION');
        $this->db->from($table);
        $this->db->join('ENROLL', 'ENROLL.STUDENT_ID = STUDENTS.ID');
        $this->db->join('CLASSES', 'CLASSES.ID = ENROLL.CLASS_ID');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ENROLL.SECTION_ID');
        $this->db->join('SESSIONS', 'SESSIONS.ID = ENROLL.SESSION_ID');
        $this->db->join('VERSIONS', 'VERSIONS.ID = STUDENTS.VERSION');
        $this->db->where("STUDENTS.ADMISSION_NO", $where);
        $this->db->where("ENROLL.STATUS", 1);
        return $this->db->get()->row();
    }
    public function get_student_by_session_std_id($table, $where)
    {
        $this->db->select('STUDENTS.*,ENROLL.*,CLASSES.CLASSES AS CLASS_NAME,SECTIONS.NAME AS SECTION_NAME,SESSIONS.SESSIONS,VERSIONS.VERSION');
        $this->db->from($table);
        $this->db->join('ENROLL', 'ENROLL.STUDENT_ID = STUDENTS.ID');
        $this->db->join('CLASSES', 'CLASSES.ID = ENROLL.CLASS_ID');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ENROLL.SECTION_ID');
        $this->db->join('SESSIONS', 'SESSIONS.ID = ENROLL.SESSION_ID');
        $this->db->join('VERSIONS', 'VERSIONS.ID = STUDENTS.VERSION');
        $this->db->where("STUDENTS.ADMISSION_NO", $where);
        $this->db->where("ENROLL.STATUS", 1);
        return $this->db->get()->row();
    }

    public function check_existing_pass($table, $where, $order1, $order2)
    {
        $this->db->select('STUDENTS.PASSWORD');
        $this->db->from($table);
        $this->db->where("STUDENTS.ID", $where);
        return $this->db->get()->row();
    }

    public function check_existing_pass_guardian($table, $where)
    {
        $this->db->select('GUARDIAN.PASSWORD');
        $this->db->from($table);
        $this->db->where("GUARDIAN.ID", $where);
        return $this->db->get()->row();
    }

    public function get_guardian_photo($table, $where)
    {

        $this->db->select('STUDENTS.GUARDIAN_PHOTO,STUDENTS.GUARDIAN_NAME');
        $this->db->from($table);
        $this->db->where("STUDENTS.ADMISSION_NO", $where);
        return $this->db->get()->row();
    }

    public function get_total_std_attendance_details($table, $where)
    {
        $sql = "SELECT ATTENDENCE_TYPE,ATTENDENCE_DATE   FROM $table WHERE 
        STUDENT_ATTENDENCE.ADMISSION_NO='" . $where . "' ";
        $query = $this->db->query($sql);
        $r =  $query->result();
        return $r;
    }

    public function get_details_std_attendence($table, $admission_no, $start_year, $end_year)
    {
        $sql = "SELECT ATTENDENCE_TYPE,ATTENDENCE_DATE FROM $table 
        WHERE  ADMISSION_NO='" . $admission_no . "'  AND ATTENDENCE_DATE >='" . $start_year . "' 
        AND ATTENDENCE_DATE<='" . $end_year . "' ORDER BY ATTENDENCE_DATE ";
        $query = $this->db->query($sql);
        $r = $query->result();
        return $r;
    }

    public function get_specific_std_fees_details($table, $where)
    {

        $this->db->select('ADD_FEES_AMOUNT.*,CLASSES.CLASSES AS CLASS,SECTIONS.NAME AS SECTION,SESSIONS.SESSIONS,FEES_TYPE.FEES_NAME');
        $this->db->from($table);
        $this->db->join('CLASSES', 'CLASSES.ID = ADD_FEES_AMOUNT.CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ADD_FEES_AMOUNT.SECTION');
        $this->db->join('SESSIONS', 'SESSIONS.ID = ADD_FEES_AMOUNT.ADMISSION_SESSION');
        $this->db->join('FEES_TYPE', 'FEES_TYPE.ID = ADD_FEES_AMOUNT.FEES_TYPE');
        $this->db->where("ADMISSION_NO", $where);
        return $this->db->get()->result();
    }

    public function get_specific_std_exam_info($table, $admission_no, $cur_session)
    {
        // print_r($cur_session);


        $this->db->select('MARKS.ADMISSION_NO,MARKS.EXAM_ID,MARKS.MARK,SESSIONS.SESSIONS,EXAMS.EXAM_NAME,
        SUBJECTS.NAME AS SUBJECT_NAME');
        $this->db->from($table);
        $this->db->join('SESSIONS', 'SESSIONS.ID = MARKS.SESSIONS_ID');
        $this->db->join('EXAMS', 'EXAMS.ID = MARKS.EXAM_ID');
        $this->db->join('SUBJECTS', 'SUBJECTS.ID = MARKS.SUBJECT_ID');



        $this->db->where("ADMISSION_NO", $admission_no);
        $this->db->where("SESSIONS", $cur_session);
        return $this->db->get()->result();

        // $sql = "SELECT MARKS.ADMISSION_NO, MARKS.EXAM_ID, MARKS.MARK, SESSIONS.SESSIONS, EXAMS.EXAM_NAME,
        // (SELECT SUM(MARK) AS TOTAL_MARKS FROM
        // MARKS WHERE ADMISSION_NO='".$admission_no."' AND SESSIONS='".$cur_session."') AS TOTAL_MARKS,
        // SUBJECTS.NAME AS 
        // SUBJECT_NAME FROM MARKS JOIN SESSIONS ON SESSIONS.ID = MARKS.SESSIONS_ID JOIN EXAMS ON EXAMS.ID = MARKS.EXAM_ID 
        // JOIN SUBJECTS ON SUBJECTS.ID = MARKS.SUBJECT_ID WHERE ADMISSION_NO = '".$admission_no."' AND
        //  SESSIONS = '".$cur_session."' ";
        // $query = $this->db->query($sql);
        // $r = $query->result();
        // return $r;
    }
    public function pass_mark()
    {
        $sql = "SELECT  MIN(PERCENT_UPTO)AS PASS_MARK FROM MARKS_GRADE ";
        $query = $this->db->query($sql);
        $r =  $query->row();
        return $r;
    }

    public function marks_grads_max_min($table)
    {

        $sql = "SELECT MAX(PERCENT_UPTO) AS MAX_MARKS, MIN(PERCENT_FROM)  AS MIN_MARKS FROM $table ";
        $query = $this->db->query($sql);
        $r =  $query->row();
        return $r;
    }
    public function count_all_marks($table, $admission_no, $cur_session)
    {
        $sql = "SELECT SUM(MARK) FROM $table 
        JOIN SESSIONS ON SESSIONS.ID = MARKS.SESSIONS_ID WHERE 
        ADMISSION_NO='" . $admission_no . "' AND SESSIONS='" . $cur_session . "'";


        $query = $this->db->query($sql);
        $r = $query->row();
        return $r;
    }

    public function get_student_current_session($table, $cls, $sec, $sess)
    {
        $sql = "SELECT SESSIONS.SESSIONS AS SESSION_NAME FROM ENROLL,SESSIONS WHERE SESSIONS.ID=ENROLL.SESSION_ID AND
        ENROLL.CLASS_ID=$cls AND ENROLL.SECTION_ID=$sec AND ENROLL.SESSION_ID=$sess AND ENROLL.STATUS=1 ";
        $query = $this->db->query($sql);
        $r = $query->row();
        return $r;
    }

    public function get_student_by_std_id($table, $where)
    {
        $this->db->select('STUDENTS.*,ENROLL.*,CLASSES.CLASSES AS CLASS_NAME,SECTIONS.NAME AS SECTION_NAME,SESSIONS.SESSIONS');
        $this->db->from($table);
        $this->db->join('ENROLL', 'ENROLL.STUDENT_ID = STUDENTS.ID');
        $this->db->join('CLASSES', 'CLASSES.ID = ENROLL.CLASS_ID');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ENROLL.SECTION_ID');
        $this->db->join('SESSIONS', 'SESSIONS.ID = ENROLL.SESSION_ID');
        $this->db->where("STUDENTS.ADMISSION_NO", $where);
        $this->db->where("ENROLL.STATUS", 1);
        return $this->db->get()->row();
    }


    public function count_number_of_child($table, $where)
    {

        $sql = "SELECT  COUNT(ID)AS STUDENT_ID FROM STUDENTS WHERE GUARDIAN_ID=$where";
        $query = $this->db->query($sql);
        $r =  $query->row();
        return $r;
    }
    public function get_number_of_child($table, $where)
    {

        $sql = "SELECT * from $table where GUARDIAN_ID=$where";
        $query = $this->db->query($sql);
        $r = $query->result();
        return $r;
    }

    public function check_exists_attendance($table, $from_date, $to_date, $admission_no)
    {

        $sql = "SELECT * FROM $table   
        WHERE ATTENDENCE_DATE >=$from_date
        AND ATTENDENCE_DATE <= $to_date
        and ADMISSION_NO=$admission_no ";

        if ($this->db->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    // public function save_attendence($table,$from_date,$to_date,$admission_no){

    //     $sql = "INSERT INTO $table(ATTENDENCE_TYPE,ADMISSION_NO) VALUES('LEAVE',$admission_no)  
    //     WHERE ATTENDENCE_DATE >=$from_date
    //     AND ATTENDENCE_DATE <= $to_date
    //     and ADMISSION_NO=$admission_no ";

    //     if($this->db->query($sql)){
    //         return true;
    //     }else{
    //         return false;
    //     }


    // }


    public function get_students()
    {

        $this->db->select("STUDENTS.*");
        $this->db->from("STUDENTS");
        $this->db->order_by("STUDENTS.ID", "DESC");
        return $this->db->get()->result();
    }
    public function get_students_from_enroll($CLASS_ID, $SECTION_ID, $SESSION_ID, $STUDENT_ID)
    {
        $sql = "SELECT ENROLL.*,STUDENTS.F_NAME,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS
        FROM ENROLL,CLASSES,SECTIONS,SESSIONS,STUDENTS
        WHERE  ENROLL.STUDENT_ID= STUDENTS.ID 
        AND   ENROLL.CLASS_ID= CLASSES.ID 
        AND   ENROLL.SECTION_ID= SECTIONS.ID
        AND   ENROLL.SESSION_ID= SESSIONS.ID 
        AND   ENROLL.STATUS=1 
        AND ENROLL.STUDENT_ID= $STUDENT_ID
        AND   ENROLL.CLASS_ID= $CLASS_ID
        AND   ENROLL.SECTION_ID= $SECTION_ID
        AND   ENROLL.SESSION_ID= $SESSION_ID ";


        $query = $this->db->query($sql);
        $r =  $query->row();
        return $r;
    }

    public function get_students_foursub_info($table)
    {
        $sql = "SELECT $table.*,STUDENTS.F_NAME,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS,SUBJECTS.NAME AS SEUJECT_NAME
        FROM $table,CLASSES,SECTIONS,SESSIONS,STUDENTS,SUBJECTS
        WHERE  $table.STUDENT_ID= STUDENTS.ID 
        AND   $table.CLASS_ID= CLASSES.ID 
        AND   $table.SECTION_ID= SECTIONS.ID
        AND   $table.SESSION_ID= SESSIONS.ID
        AND   $table.SUBJECT_ID= SUBJECTS.ID";
       
       


        $query = $this->db->query($sql);
        $r =  $query->result();
        return $r;
    }

    public function check_fourth_sub($table,$where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where( $where);
        $r=$this->db->get()->row();
        if($r)
        {
            return $r;
        }
        else
        {
            return false;
        }
    }
}
