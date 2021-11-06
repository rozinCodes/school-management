<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Staff_model extends CI_Model
{
    public function generateRandomString($length = 10)
    {
        $characters = '!@#$%^&*123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function staff_id_generator()
    {
        $y = '1999';
        $month = date("m");
        $year = date("Y");

        $a = $year / 10;
        $b = $a / 10;
        $c = ($a % 10);
        $d = ($year % 10);

        $s = sprintf("%05d", 0);
        $f = $y . $s;
        $f = $f + 1;

        return $f;
    }

    public function check_staff_id()
    {
        $this->db->select('STAFF.STAFF_ID');
        $this->db->from("STAFF");

        if ($this->db->get()->row()) {
            return true;
        } else {
            return false;
        }
    }

    public function check_last_staff_id($param, $table)
    {
        $this->db->select_max($param);
        $this->db->from($table);



        return $this->db->get()->row();
    }

    public function check_last_id()
    {
        $this->db->select_max("STAFF_ID");
        $this->db->from("STAFF");
        $r = $this->db->get()->row();
        if ($r) {
            return $r;
        } else {
            return false;
        }
    }

    public function search_staff_by_role($table, $where, $order1, $order2)
    {
        $this->db->select('STAFF.*,STAFF_DEPARTMENT.DEPARTMENT_NAME,STAFF_DESIGNATION.DESIGNATION_NAME,ROLES.NAME');
        $this->db->from($table);
        $this->db->join('STAFF_DEPARTMENT', 'STAFF_DEPARTMENT.ID = STAFF.DEPARTMENT');
        $this->db->join('STAFF_DESIGNATION', 'STAFF_DESIGNATION.ID = STAFF.DESIGNATION');
        $this->db->join('ROLES', 'ROLES.ID = STAFF.ROLES_ID');


        $this->db->where($where);
        $this->db->order_by("STAFF.ID", $order2);
        return $this->db->get()->result();
    }

    public function search_staff_by_staff_id($table, $where, $order1, $order2)
    {
        $this->db->select('STAFF.*,STAFF_DEPARTMENT.DEPARTMENT_NAME,STAFF_DESIGNATION.DESIGNATION_NAME,ROLES.NAME');
        $this->db->from($table);
        $this->db->join('STAFF_DEPARTMENT', 'STAFF_DEPARTMENT.ID = STAFF.DEPARTMENT');
        $this->db->join('STAFF_DESIGNATION', 'STAFF_DESIGNATION.ID = STAFF.DESIGNATION');
        $this->db->join('ROLES', 'ROLES.ID = STAFF.ROLES_ID');

        $this->db->where($where);
        $this->db->order_by("STAFF.ID", $order2);

        return $this->db->get()->result();
    }


    public function get_staff_details($table, $where, $order1, $order2)
    {
        $this->db->select('STAFF.*,STAFF_DEPARTMENT.DEPARTMENT_NAME,STAFF_DESIGNATION.DESIGNATION_NAME,ROLES.NAME,STAFF_SHIFT.SHIFT_NAME');
        $this->db->from($table);
        $this->db->join('STAFF_DEPARTMENT', 'STAFF_DEPARTMENT.ID = STAFF.DEPARTMENT');
        $this->db->join('STAFF_DESIGNATION', 'STAFF_DESIGNATION.ID = STAFF.DESIGNATION');
        $this->db->join('ROLES', 'ROLES.ID = STAFF.ROLES_ID');
        $this->db->join('STAFF_SHIFT', 'STAFF_SHIFT.ID = STAFF.WORK_SHIFT');
        //$this->db->join('STAFF_LEAVE_DETAILS','STAFF_LEAVE_DETAILS.STAFF_ID=STAFF.STAFF_ID');

        $this->db->where($where);

        return $this->db->get()->row();
    }

    public function view_leave_of_staff($table, $where, $order1, $order2)
    {
        $this->db->select('LEAVE_TYPE.*,STAFF_LEAVE_DETAILS.LEAVE_TYPE_ID,STAFF_LEAVE_DETAILS.ALLOTTED_LEAVE,REMAINING_LEAVE');
        $this->db->from($table);
        $this->db->join('STAFF_LEAVE_DETAILS', 'STAFF_LEAVE_DETAILS.LEAVE_TYPE_ID = LEAVE_TYPE.ID');
        $this->db->where($where);
        return $this->db->get()->result();
    }

    public function check_existing_pass($table, $where, $order1, $order2)
    {
        $this->db->select('STAFF.PASSWORD');
        $this->db->from("STAFF");
        $this->db->where("ID", $where);
        return $this->db->get()->row();

        /*if($this->db->get()->row()){

            return TRUE;
        }
        else
        {
            return FALSE;
        }*/
    }

    public function search_staff_attendence($table, $where, $order1, $order2)
    {
        $this->db->select('STAFF.*,STAFF_DEPARTMENT.*,STAFF_DESIGNATION.*,ROLES.*');
        $this->db->from($table);



        $this->db->join('ROLES', 'ROLES.ID = STAFF.ROLES_ID');
        $this->db->join('STAFF_DEPARTMENT', 'STAFF_DEPARTMENT.ID = STAFF.DEPARTMENT');
        $this->db->join('STAFF_DESIGNATION', 'STAFF_DESIGNATION.ID = STAFF.DESIGNATION');
        $this->db->where($where);
        $this->db->order_by('STAFF.ID', $order2);

        return $this->db->get()->result();
    }

    public function check_staff_attendence($table, $where, $atnd_date, $order1, $order2)
    {
        $this->db->select('STAFF_ATTENDENCE.*,STAFF_DEPARTMENT.DEPARTMENT_NAME,STAFF_DESIGNATION.DESIGNATION_NAME,ROLES.NAME');
        $this->db->from($table);
        $this->db->join('STAFF_DEPARTMENT', 'STAFF_DEPARTMENT.ID = STAFF_ATTENDENCE.DEPARTMENT');
        $this->db->join('STAFF_DESIGNATION', 'STAFF_DESIGNATION.ID = STAFF_ATTENDENCE.DESIGNATION');
        $this->db->join('ROLES', 'ROLES.ID = STAFF_ATTENDENCE.ROLES_ID');
        $this->db->where($where);
        $this->db->where('ATTENDENCE_DATE >=', $atnd_date);




        if ($this->db->get()->result()) {
            return true;
        } else {
            return false;
        }
    }

    public function search_staff_late_attendence($table, $where, $order1, $order2)
    {
        $this->db->select('STAFF_ATTENDENCE.*,STAFF.*,STAFF_DEPARTMENT.*,STAFF_DESIGNATION.*,ROLES.*');
        $this->db->from($table);


        $this->db->join('STAFF', 'STAFF.STAFF_ID = STAFF_ATTENDENCE.STAFF_ID');

        $this->db->join('ROLES', 'ROLES.ID = STAFF_ATTENDENCE.ROLES_ID');
        $this->db->join('STAFF_DEPARTMENT', 'STAFF_DEPARTMENT.ID = STAFF_ATTENDENCE.DEPARTMENT');
        $this->db->join('STAFF_DESIGNATION', 'STAFF_DESIGNATION.ID = STAFF_ATTENDENCE.DESIGNATION');


        $this->db->where($where);
        $this->db->where('ATTENDENCE_TYPE', 'ABSENT');
        //$this->db->where("CLASS",$where );
        $this->db->order_by('STAFF_ATTENDENCE.ID', $order2);

        return $this->db->get()->result();
    }

    public function edit_staff_late_attendence($table, $data, $where, $date)
    {
        $this->db->where($where);
        $this->db->where('ATTENDENCE_DATE', $date);
        $this->db->update($table, $data);

        return true;
    }


    public function search_staff_attendence_by_admission_no($table, $where, $order1, $order2)
    {
        $this->db->select('STAFF.*,STAFF_DEPARTMENT.*,STAFF_DESIGNATION.*,ROLES.*');
        $this->db->from($table);



        $this->db->join('ROLES', 'ROLES.ID = STAFF.ROLES_ID');
        $this->db->join('STAFF_DEPARTMENT', 'STAFF_DEPARTMENT.ID = STAFF.DEPARTMENT');
        $this->db->join('STAFF_DESIGNATION', 'STAFF_DESIGNATION.ID = STAFF.DESIGNATION');
        $this->db->where($where);
        //$this->db->where("CLASS",$where );
        $this->db->order_by('STAFF.ID', $order2);

        return $this->db->get()->result();
    }

    public function search_staff_late_attendence_by_admission_no($table, $where, $order1, $order2)
    {
        $this->db->select('STAFF_ATTENDENCE.*,STAFF.*,STAFF_DEPARTMENT.*,STAFF_DESIGNATION.*,ROLES.*');
        $this->db->from($table);


        $this->db->join('STAFF', 'STAFF.STAFF_ID = STAFF_ATTENDENCE.STAFF_ID');
        $this->db->join('ROLES', 'ROLES.ID = STAFF_ATTENDENCE.ROLES_ID');
        $this->db->join('STAFF_DEPARTMENT', 'STAFF_DEPARTMENT.ID = STAFF_ATTENDENCE.DEPARTMENT');
        $this->db->join('STAFF_DESIGNATION', 'STAFF_DESIGNATION.ID = STAFF_ATTENDENCE.DESIGNATION');
        $this->db->where($where);
        $this->db->where("ATTENDENCE_TYPE", "ABSENT");
        $this->db->order_by('STAFF_ATTENDENCE.ID', $order2);

        return $this->db->get()->result();
    }


    public function search_staff_attendence_report($table, $where, $from_date, $to_date, $order1, $order2)
    {
        $this->db->select('STAFF_ATTENDENCE.*, ROLES.*,STAFF.FIRST_NAME,STAFF.LAST_NAME,STAFF_DEPARTMENT.*,STAFF_DESIGNATION.*');
        $this->db->from($table);


        $this->db->join('ROLES', 'ROLES.ID = STAFF_ATTENDENCE.ROLES_ID');
        $this->db->join('STAFF', 'STAFF.STAFF_ID = STAFF_ATTENDENCE.STAFF_ID');
        $this->db->join('STAFF_DEPARTMENT', 'STAFF_DEPARTMENT.ID = STAFF_ATTENDENCE.DEPARTMENT');
        $this->db->join('STAFF_DESIGNATION', 'STAFF_DESIGNATION.ID = STAFF_ATTENDENCE.DESIGNATION');



        $this->db->where($where);



        $this->db->where('ATTENDENCE_DATE >=', $from_date);
        $this->db->where('ATTENDENCE_DATE<=', $to_date);

        $this->db->order_by("STAFF_ATTENDENCE.ATTENDENCE_DATE_TIME", $order2);
        $r = $this->db->get()->result();

        return $r;
    }

    public function search_staff_attendence_report_by_staff_id($table, $where, $from_date, $to_date, $order1, $order2)
    {
        $this->db->select('STAFF_ATTENDENCE.*, ROLES.*,STAFF.FIRST_NAME,STAFF.LAST_NAME,STAFF_DEPARTMENT.*,STAFF_DESIGNATION.*');
        $this->db->from($table);

        $this->db->join('ROLES', 'ROLES.ID = STAFF_ATTENDENCE.ROLES_ID');
        $this->db->join('STAFF', 'STAFF.STAFF_ID = STAFF_ATTENDENCE.STAFF_ID');
        $this->db->join('STAFF_DEPARTMENT', 'STAFF_DEPARTMENT.ID = STAFF_ATTENDENCE.DEPARTMENT');
        $this->db->join('STAFF_DESIGNATION', 'STAFF_DESIGNATION.ID = STAFF_ATTENDENCE.DESIGNATION');

        $this->db->where($where);
        $this->db->where('ATTENDENCE_DATE >=', $from_date);
        $this->db->where('ATTENDENCE_DATE<=', $to_date);

        $this->db->order_by("STAFF_ATTENDENCE.ATTENDENCE_DATE", $order2);
        $r = $this->db->get()->result();


        return $r;
    }

    public function get_available_leave($table, $where, $order1, $order2)
    {
        $this->db->select('STAFF_LEAVE_DETAILS.*,LEAVE_TYPE.*');
        $this->db->from($table);



        $this->db->join('LEAVE_TYPE', 'LEAVE_TYPE.ID = STAFF_LEAVE_DETAILS.LEAVE_TYPE_ID');

        $this->db->where($where);
        //$this->db->where("CLASS",$where );
        $this->db->order_by('STAFF_LEAVE_DETAILS.ID', $order2);

        return $this->db->get()->result();
    }


    public function diffrence_two_date_days($date1, $date2)
    {
        $diff = strtotime($date2) - strtotime($date1);
        return abs(round($diff / 86400));
    }

    public function get_leave_history($table, $where, $order1, $order2)
    {
        $this->db->select('STAFF_LEAVE_REQUEST.*,STAFF_LEAVE_REQUEST.ID AS REQ_ID,LEAVE_TYPE.*,STAFF.FIRST_NAME,STAFF.LAST_NAME');
        $this->db->from($table);

        $this->db->join('LEAVE_TYPE', 'LEAVE_TYPE.ID = STAFF_LEAVE_REQUEST.LEAVE_TYPE_ID');
        $this->db->join('STAFF', 'STAFF.STAFF_ID = STAFF_LEAVE_REQUEST.STAFF_ID');
        $this->db->where($where);
        //$this->db->where("CLASS",$where );
        $this->db->order_by('STAFF_LEAVE_REQUEST.ID', $order2);


        return $this->db->get()->result();
    }

    public function need_approval_leave($table, $where, $order1, $order2)
    {
        $this->db->select('STAFF_LEAVE_REQUEST.*,LEAVE_TYPE.LEAVE_NAME,STAFF.FIRST_NAME,STAFF.LAST_NAME');
        $this->db->from($table);

        $this->db->join('LEAVE_TYPE', 'LEAVE_TYPE.ID = STAFF_LEAVE_REQUEST.LEAVE_TYPE_ID');
        $this->db->join('STAFF', 'STAFF.STAFF_ID = STAFF_LEAVE_REQUEST.STAFF_ID');
        $this->db->where($where);
        //$this->db->where("CLASS",$where );
        $this->db->order_by('STAFF_LEAVE_REQUEST.ID', $order2);


        return $this->db->get()->result();
    }

    public function get_specific_row($table, $where)
    {
        $this->db->select('STAFF_LEAVE_DETAILS.*');
        $this->db->from($table);


        $this->db->where($where);
        //$this->db->where("CLASS",$where );



        return $this->db->get()->row();
    }


    public function get_staff_for_payroll($table, $roles_id, $month, $year)
    {
        if (empty($month) && empty($year)) {
            $sql = "SELECT SF.STAFF_ID,SF.FIRST_NAME,SF.PHONE,STAFF_DEPARTMENT.DEPARTMENT_NAME,STAFF_DESIGNATION.DESIGNATION_NAME,
            ROLES.NAME AS ROLE,
            CASE WHEN (SELECT COUNT(SP.STAFF_ID)
            FROM STAFF_PAYSLIP SP
            WHERE SP.STAFF_ID=SF.STAFF_ID and SP.ROLES_ID='".$roles_id."')>0 THEN 1 
            ELSE 0 END STATUS FROM STAFF SF  join STAFF_DEPARTMENT on STAFF_DEPARTMENT.ID=SF.DEPARTMENT 
            join STAFF_DESIGNATION on STAFF_DESIGNATION.ID = SF.DESIGNATION 
            join ROLES  on ROLES.ID=SF.ROLES_ID
            WHERE SF.ROLES_ID='".$roles_id."' AND SF.ACTIVE='1' ";

            $query = $this->db->query($sql);
            return $query->result_array();
        } else {
            $sql = "SELECT SF.STAFF_ID,SF.FIRST_NAME,SF.PHONE,STAFF_DEPARTMENT.DEPARTMENT_NAME,STAFF_DESIGNATION.DESIGNATION_NAME,
            ROLES.NAME AS ROLE,
            CASE WHEN (SELECT COUNT(SP.STAFF_ID)
            FROM STAFF_PAYSLIP SP
            WHERE SP.STAFF_ID=SF.STAFF_ID and  SP.YEAR='".$year."' and SP.MONTH='".$month."' and SP.ROLES_ID='".$roles_id."')>0 THEN 1 
            ELSE 0 END STATUS FROM STAFF SF  join STAFF_DEPARTMENT on STAFF_DEPARTMENT.ID=SF.DEPARTMENT 
            join STAFF_DESIGNATION on STAFF_DESIGNATION.ID = SF.DESIGNATION 
            join ROLES  on ROLES.ID=SF.ROLES_ID
            
            WHERE SF.ROLES_ID='".$roles_id."' AND SF.ACTIVE='1' ";

            $query = $this->db->query($sql);
            return $query->result_array();
        }
    }

    public function get_staff_all_info_for_generate_payroll($table, $where)
    {
        $this->db->select('STAFF.*,STAFF.ID AS STAFF_TBL_ID,ROLES.NAME,ROLES.ID,STAFF_DEPARTMENT.DEPARTMENT_NAME,STAFF_DEPARTMENT.ID,STAFF_DESIGNATION.DESIGNATION_NAME');
        $this->db->from($table);
        $this->db->join('ROLES', 'ROLES.ID = STAFF.ROLES_ID');
        $this->db->join('STAFF_DEPARTMENT', 'STAFF_DEPARTMENT.ID = STAFF.DEPARTMENT');
        $this->db->join('STAFF_DESIGNATION', 'STAFF_DESIGNATION.ID = STAFF.DESIGNATION');

        $this->db->where($where);
   
        return $this->db->get()->result();
    }

    public function count_staff_attendence($table, $start_month, $staff_id)
    {
        $sql = "SELECT ATTENDENCE_TYPE,  COUNT(*) ALL_COUNT,STAFF_ID
        FROM STAFF_ATTENDENCE  
        WHERE  ATTENDENCE_DATE >= '".$start_month."' AND ATTENDENCE_DATE <= LAST_DAY('".$start_month."') 
        AND STAFF_ID='".$staff_id."'
        GROUP BY ATTENDENCE_TYPE,STAFF_ID ";

        $query = $this->db->query($sql);
        $r =$query->result();
        if ($r) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function delete_payroll($table, $where)
    {
        $this->db->where($where);

        $this->db->delete($table);

        return true;
    }

    public function get_payslip_report($table, $where)
    {
        $this->db->select('STAFF_PAYSLIP.*,STAFF.FIRST_NAME,STAFF.LAST_NAME,STAFF.BASIC_SALARY,STAFF_DEPARTMENT.DEPARTMENT_NAME,STAFF_DESIGNATION.DESIGNATION_NAME');
        $this->db->from($table);
        $this->db->join('STAFF', 'STAFF.STAFF_ID = STAFF_PAYSLIP.STAFF_ID');
        $this->db->join('STAFF_DEPARTMENT', 'STAFF_DEPARTMENT.ID = STAFF_PAYSLIP.DEPARTMENT');
        $this->db->join('STAFF_DESIGNATION', 'STAFF_DESIGNATION.ID = STAFF_PAYSLIP.DESIGNATION');
        $this->db->where($where);
        return $this->db->get()->row();
    }

    public function get_school_info($table, $where)
    {
        $this->db->select('GENERAL_SETTINGS.*');
        $this->db->from($table);


        $this->db->where("ID", $where);


        return $this->db->get()->row();
    }

    public function get_staff_payroll_report($table, $where)
    {
        $sql = " SELECT SUM(NET_SALARY)
         AS TOTAL_NET_SALARY,SUM(TOTAL_ALLOWANCE) AS TOTAL_EARNINGS,SUM(TOTAL_DEDUCTION) AS TOTAL_DEDUCTION FROM $table
         WHERE STAFF_PAYSLIP.STAFF_TBL_ID='".$where."' ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_staff_payroll_report2($table, $where)
    {
        $this->db->select('STAFF_PAYSLIP.*');
        $this->db->from($table);
        $this->db->where("STAFF_TBL_ID", $where);
   
        return $this->db->get()->result();
    }

    public function get_details_attendence($table, $staff_id, $start_year, $end_year)
    {
        $sql = "SELECT ATTENDENCE_TYPE,ATTENDENCE_DATE FROM $table 
         WHERE  STAFF_ID='".$staff_id."'  AND ATTENDENCE_DATE >='".$start_year."'  AND ATTENDENCE_DATE<='".$end_year."' ORDER BY ATTENDENCE_DATE ";

        $query = $this->db->query($sql);
        $r = $query->result();
        return $r;
    }
    // public function get_total_attendance_details($table, $where){

    //     $sql=" SELECT COUNT(ATTENDENCE_TYPE)  AS PRESENT FROM $table WHERE ATTENDENCE_TYPE='LATE'
    //     AND STAFF_ATTENDENCE.STAFF_ID='".$where."' ";

    //     $query = $this->db->query($sql);
    //     $r =  $query->result_array();
    //     print_r($r);
    //     exit();



    // }

    public function get_total_attendance_details($table, $where)
    {
        $sql="SELECT ATTENDENCE_TYPE,ATTENDENCE_DATE   FROM $table WHERE 
        STAFF_ATTENDENCE.STAFF_ID='".$where."' ";

        $query = $this->db->query($sql);
        $r =  $query->result();
        return $r;
    }

    public function get_general_setting($table)
    {
        $this->db->select('GENERAL_SETTINGS.*');
        $this->db->from($table);
        return $this->db->get()->row();
    }

    public function last_seven_days_attendence($table, $where)
    {
        $sql="
        SELECT ATTENDENCE_DATE_TIME,ATTENDENCE_TYPE
        FROM $table
       where ATTENDENCE_DATE <= TRUNC(sysdate)
         and ATTENDENCE_DATE >= TRUNC(sysdate - 7) AND STAFF_ID=$where
        
        ";

        $query = $this->db->query($sql);
        $r =  $query->result();
        return $r;
    }

  
    public function Staff_View($where)
    {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->select("STAFF.* , STAFF_DESIGNATION.DESIGNATION_NAME");
        $this->db->from("STAFF");
        $this->db->join('STAFF_DESIGNATION', 'STAFF_DESIGNATION.ID = STAFF.DESIGNATION');
        $this->db->order_by("STAFF.ID", "DESC");
        return $this->db->get()->result();
    }
    
    public function need_approval_student_leave($table, $where, $order2,$today)
    {
        $this->db->select('STUDENT_LEAVE.*');
        $this->db->from($table);

        // $this->db->join('LEAVE_TYPE', 'LEAVE_TYPE.ID = STAFF_LEAVE_REQUEST.LEAVE_TYPE_ID');
        // $this->db->join('STAFF', 'STAFF.STAFF_ID = STAFF_LEAVE_REQUEST.STAFF_ID');
        $this->db->where($where);
        $this->db->where('FROM_DATE <=', $today);
        //$this->db->where("CLASS",$where );
        $this->db->order_by('STUDENT_LEAVE.ID', $order2);
        return $this->db->get()->result();
    }

    public function get_teacher()
    {
        $where = "STAFF.ROLES_ID=1 OR STAFF.ROLES_ID=2 OR STAFF.ROLES_ID=3";
        $this->db->select("STAFF.*");
        $this->db->from("STAFF");
        $this->db->where($where);
        $this->db->order_by("STAFF.ID", "DESC");
        return $this->db->get()->result();
    }


   
}

