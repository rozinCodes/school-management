<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

    public $Id;

    public function save_data($table, $data) {
        if ($this->db->insert($table, $data)) {
            //$this->Id = $this->db->insert_id();

            return TRUE;
        } else {
            return FALSE;
        }
    }
    
      public function Quesion_id() {
        //$this->db->where("SELECT MAX(ID) AS ID FROM CLASSES");
        $this->db->select_max("ID");
        $this->db->from("QUESTIONS");
        // $this->db->from("CLASSES");
        //$this->db->order_by($order1, $order2);
        return $this->db->get()->result();
    }

    public function insert_id() {
        //$this->db->where("SELECT MAX(ID) AS ID FROM CLASSES");
        $this->db->select_max("ID");
        $this->db->from("CLASSES");
        // $this->db->from("CLASSES");
        //$this->db->order_by($order1, $order2);
        return $this->db->get()->result();
    }

    public function update($table, $data, $where) {



        if ($where) {
            $this->db->where($where);
        }
        if ($this->db->update($table, $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function edit($table, $data, $where) {
         /*echo $table;
         echo $where;
         echo"OK";
          print_r($data);
          
          exit();*/
         

        $this->db->where('ID', $where);
        $this->db->update($table, $data);

        return TRUE;
    }
    public function editBioAttendance($table, $data, $where) {
        /*echo $table;
        echo $where;
        echo"OK";
         print_r($data);
         
         exit();*/
        

       $this->db->where($where);
       $this->db->update($table, $data);

       return TRUE;
   }
    public function update_student_leave_status($table, $data, $where) {
       

       $this->db->where('ADMISSION_NO', $where);
       $this->db->update($table, $data);

       return TRUE;
   }
    public function edit_leave_details($table, $data, $where,$where2) {
        /*echo $table;
        echo $where;
        echo"OK";
         print_r($data);
         
         exit();*/
        

       $this->db->where('STAFF_TBL_ID', $where);
       $this->db->where('LEAVE_TYPE_ID', $where2);
       $this->db->update($table, $data);

       return TRUE;
   }
    public function edit_enroll($table, $data, $where) {
         /*echo $table;
         echo $where;
         echo"OK";
          print_r($data);
          
          exit();*/
         

        $this->db->where('STUDENT_ID', $where);
        $this->db->update($table, $data);

        return TRUE;
    }
    public function edit_enroll2($table, $data, $where) {
         /*echo $table;
         echo $where;
         echo"OK";
          print_r($data);
          
          exit();*/
         

        $this->db->where($where);
        $this->db->update($table, $data);

        return TRUE;
    }

    public function update_attendance($table,$from_date,$to_date,$staff_id){

        

        $sql = "Update $table set ATTENDENCE_TYPE='LEAVE'  
        WHERE ATTENDENCE_DATE >=$from_date
        AND ATTENDENCE_DATE <= $to_date
        and STAFF_ID=$staff_id ";
        $this->db->query($sql);
       
        

    }
    public function update_student_attendance($table,$from_date,$to_date,$admission_no){

        

        $sql = "Update $table set ATTENDENCE_TYPE='LEAVE'  
        WHERE ATTENDENCE_DATE >=$from_date
        AND ATTENDENCE_DATE <= $to_date
        and ADMISSION_NO=$admission_no ";
        
        if($this->db->query($sql)){
            return true;
        }else{
            return false;
        }
       
        

    }


    public function delete($table, $where) {
        /* echo $table;
          print_r($data);
          echo $where;
          exit();
         */

        $this->db->where('ID', $where);

        $this->db->delete($table);

        return TRUE;
    }

    public function view_data($table, $where, $order1, $order2) {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->select("*");
        $this->db->from($table);
        $this->db->order_by($order1, $order2);
        return $this->db->get()->result();
    }
    public function view_data2($table, $where, $order1, $order2) {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->select("*");
        $this->db->from($table);
        $this->db->order_by($order1, $order2);
        return $this->db->get()->row();
    }

    public function delete_data($table, $data) {
        if ($this->db->delete($table, $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }
 public function Onlineexam_View($where) {
          if ($where) {
            $this->db->where($where);
        }
        
        $this->db->select('ONLINEEXAM.* ,(SELECT count(ONLINEEXAM_ID) from ONLINEEXAM_QUESTIONS where ONLINEEXAM_QUESTIONS.ONLINEEXAM_ID= ONLINEEXAM.ID) AS  TOTAL');
        $this->db->from('ONLINEEXAM');
        $this->db->order_by('ONLINEEXAM.ID');
        return $this->db->get()->result();
    }
    
     public function view_qn($table, $where, $order1, $order2) {//note: oracle a ja ja attribute select korbo tar moddha orderby thakta hobe,,but mysql a thakalage na
        if ($where) {
            $this->db->where($where);
        }
        $this->db->DISTINCT("QUESTIONSID");
        //$this->db->group_by("QUESTIONSID");
        $this->db->SELECT("QUESTIONSID");
        $this->db->from($table);
       // $this->db->order_by($order1, $order2);
        return $this->db->get()->result();
    }
    
       public function Oline_Question_View($where) {
              //if ($where) {
           // $this->db->where($where);
       // }
        $this->db->select('QUESTIONS.*, ONLINEEXAM.ID QID');
        $this->db->from('QUESTIONS');
        $this->db->join('ONLINEEXAM_QUESTIONS', 'ONLINEEXAM_QUESTIONS.QUESTIONSID = QUESTIONS.ID');
        $this->db->join('ONLINEEXAM', 'ONLINEEXAM.ID = ONLINEEXAM_QUESTIONS.ONLINEEXAM_ID');
         $this->db->where('ONLINEEXAM.ID', $where);
        $this->db->order_by('QUESTIONS.ID');
        return $this->db->get()->result();
    }
    public function Encryptor($action, $string) {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        //pls set your unique hashing key
        $secret_key = 'hitenVkuld%:bTXz,3r>6|FW#!7eSs>vM~n+48~{Mh$#A4p).)#wV3^_y-B.6WCar=b4.';
        $secret_iv = '3w8XD|r@n:nxp|oml]nw$-KEc|rT$H).(~ &`gnV!vD0vs|?r]#Zdr-qRlOV@&#6';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        //do the encyption given text/string/number
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    public function xss_clean($data) {
        return $this->security->xss_clean($data);
    }

    public function login($username, $password) {
        
        if(is_numeric($username)){
            $this->db->where("ADMISSION_NO", $username);
            $this->db->where("PASSWORD", $password);
            //$this->db->where("active", 1);
            $query = $this->db->get('STUDENTS') ;
            if ($query->num_rows() == 1) {
                return $query->row();
            }
            return FALSE;
        }
        else{
            return false;
        }
        
    }

    public function admin_login($email, $password) {
        $this->db->where("EMAIL", $email);
        $this->db->where("PASSWORD", $this->Encryptor('encrypt', $password));
        $this->db->where("ACTIVE", 1);
        $query = $this->db->get('STAFF');
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        return FALSE;
    }

    public function guardian_login($username, $password){
        
        $this->db->where("PHONE_NO", $username);
        $this->db->where("PASSWORD", $password);
        //$this->db->where("active", 1);
        $query = $this->db->get('GUARDIAN') ;
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        return FALSE;

    }

    public function Class_Sections() {
        $this->db->select('CLASS_SECTIONS.*,CLASSES.ID SID, CLASS_SECTIONS.SECTION_ID,SECTIONS.NAME , CLASSES.CLASSES');
        $this->db->from('CLASS_SECTIONS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = CLASS_SECTIONS.SECTION_ID');
        $this->db->join('CLASSES', 'CLASSES.ID = CLASS_SECTIONS.CLASS_ID');
        // $this->db->where('class_sections.class_id', $classid);
        $this->db->order_by('CLASS_SECTIONS.ID');
        return $this->db->get()->result();
    }

    public function check_unique($table,$where)
    {
        $this->db->select($table.'.*');
        $this->db->from($table);
        $this->db->where($where);
         if($this->db->get()->row())
        {
           return TRUE;
        }
        else
        {
            return FALSE;
        }

    }

    public function check_school_info($table){

        $this->db->select($table . '.*');
        $this->db->from($table);

        if ($this->db->get()->row()) {
            return TRUE;
        } else {
            return FALSE;
        }

    }
	
	    public function Online_admission_view($where) {
            if ($where) {
                $this->db->where($where);
            }
        $this->db->select('ONLINE_ADMISSION.* ,CLASSES.CLASSES');
        $this->db->from('ONLINE_ADMISSION');
        //$this->db->join('SECTIONS', 'SECTIONS.ID = CLASS_SECTIONS.SECTION_ID');
       $this->db->join('CLASSES', 'CLASSES.ID = ONLINE_ADMISSION.CLASS');
        // $this->db->where('class_sections.class_id', $classid);
        $this->db->order_by('ONLINE_ADMISSION.ID');
        return $this->db->get()->result();
    }


    

}
