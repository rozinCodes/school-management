<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Academics_model extends CI_Model {
    
    
    public function Subject_Book() {
        $this->db->select('SUBJECTS.*,CLASSES.CLASSES');
        $this->db->from('SUBJECTS');
       // $this->db->join('SECTIONS', 'SECTIONS.ID = CLASS_SECTIONS.SECTION_ID');
        $this->db->join('CLASSES', 'CLASSES.ID = SUBJECTS.CLASSESID');
        // $this->db->where('class_sections.class_id', $classid);
        $this->db->order_by('SUBJECTS.ID');
        return $this->db->get()->result();
    }
    
      public function Subject_Book_Pdf() {
        $this->db->select('LECTURE_PDF.*,SUBJECTS.NAME ,SUBJECTS.CODE, STAFF.FIRST_NAME, CLASSES.CLASSES');
        $this->db->from('LECTURE_PDF');
        $this->db->join('STAFF', 'STAFF.ID = LECTURE_PDF.STAFFID');
        $this->db->join('SUBJECTS', 'SUBJECTS.ID = LECTURE_PDF.SUBJECTSID');
        $this->db->join('CLASSES', 'CLASSES.ID = SUBJECTS.CLASSESID');
        // $this->db->where('class_sections.class_id', $classid);
        $this->db->order_by('LECTURE_PDF.ID');
        return $this->db->get()->result();
    }
    
    public function Subject_Book_Ebook() {
        $this->db->select('LECTURE_EBOOK.*,SUBJECTS.NAME ,SUBJECTS.CODE, STAFF.FIRST_NAME, CLASSES.CLASSES');
        $this->db->from('LECTURE_EBOOK');
        $this->db->join('STAFF', 'STAFF.ID = LECTURE_EBOOK.STAFFID');
        $this->db->join('SUBJECTS', 'SUBJECTS.ID = LECTURE_EBOOK.SUBJECTSID');
        $this->db->join('CLASSES', 'CLASSES.ID = SUBJECTS.CLASSESID');
        // $this->db->where('class_sections.class_id', $classid);
        $this->db->order_by('LECTURE_EBOOK.PAGE',"ASC");
        return $this->db->get()->result();
    }
    
    public function Subject_Book_Video() {
        $this->db->select('LECTURE_VIDEO.*,SUBJECTS.NAME ,SUBJECTS.CODE, STAFF.FIRST_NAME, CLASSES.CLASSES');
        $this->db->from('LECTURE_VIDEO');
        $this->db->join('STAFF', 'STAFF.ID = LECTURE_VIDEO.STAFFID');
        $this->db->join('SUBJECTS', 'SUBJECTS.ID = LECTURE_VIDEO.SUBJECTSID');
        $this->db->join('CLASSES', 'CLASSES.ID = SUBJECTS.CLASSESID');
        // $this->db->where('class_sections.class_id', $classid);
        $this->db->order_by('LECTURE_VIDEO.ID',"ASC");
        return $this->db->get()->result();
    }
      public function Subject_Book_PowerPoint() {
        $this->db->select('LECTURE_POWER_POINT.*,SUBJECTS.NAME ,SUBJECTS.CODE, STAFF.FIRST_NAME, CLASSES.CLASSES , VERSIONS.VERSION');
        $this->db->from('LECTURE_POWER_POINT');
        $this->db->join('STAFF', 'STAFF.ID = LECTURE_POWER_POINT.STAFFID');
        $this->db->join('SUBJECTS', 'SUBJECTS.ID = LECTURE_POWER_POINT.SUBJECTSID');
            $this->db->join('VERSIONS', 'VERSIONS.ID = LECTURE_POWER_POINT.VERSIONS');
        $this->db->join('CLASSES', 'CLASSES.ID = SUBJECTS.CLASSESID');
        // $this->db->where('class_sections.class_id', $classid);
        $this->db->order_by('LECTURE_POWER_POINT.ID',"ASC");
        return $this->db->get()->result();
    }

    public function check_assign_teacher($table,$where)
    {
        $this->db->select('TEACHER_ASSIGN.*');
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
    // public function show_from_teacher_assign($table)
    // {
    //     $this->db->select('TEACHER_ASSIGN.*,STAFF.FIRST_NAME,CLASSES.CLASSES,SECTIONS.NAME AS SECTION_NAME,SESSIONS.SESSIONS AS SESSION_NAME,SUBJECTS.NAME');
    //     $this->db->from($table);
    //     $this->db->join('STAFF', 'STAFF.ID = TEACHER_ASSIGN.STAFF_ID');
    //     $this->db->join('SUBJECTS', 'SUBJECTS.ID = TEACHER_ASSIGN.SUBJECT_ID');
    //     $this->db->join('CLASSES', 'CLASSES.ID = TEACHER_ASSIGN.CLASS_ID');
    //     $this->db->join('SECTIONS', 'SECTIONS.ID = TEACHER_ASSIGN.SECTION_ID');
    //     $this->db->join('SESSIONS', 'SESSIONS.ID = TEACHER_ASSIGN.SESSIONS');
    //     // $this->db->where('class_sections.class_id', $classid);
    //     $this->db->order_by('TEACHER_ASSIGN.ID','ASC');
    //     return $this->db->get()->result();
    // }

    public function show_from_teacher_assign($table)
    {
        // $sql = "select s_name, score, status, address_city, 
        // email_id, accomplishments from student s, 
        // marks m, details d where s.s_id = m.s_id and 
        // m.school_id = d.school_id";

        $sql="SELECT  TEACHER_ASSIGN.STAFF_ID,TEACHER_ASSIGN.ID,TEACHER_ASSIGN.SUBJECT_ID,CLASS_SECTIONS.CLASS_ID,CLASS_SECTIONS.SECTION_ID,CLASSES.CLASSES,SECTIONS.NAME AS SECTION_NAME,SUBJECTS.NAME AS SUBJECT_NAME,STAFF.FIRST_NAME,SESSIONS.SESSIONS,
        SESSIONS.ID AS SESSIONID,VERSIONS.VERSION,VERSIONS.ID AS VERSION_ID
         FROM TEACHER_ASSIGN,CLASS_SECTIONS,CLASSES,SECTIONS,STAFF,SUBJECTS,SESSIONS,VERSIONS
        WHERE  TEACHER_ASSIGN.CLASS_SECTION_ID = CLASS_SECTIONS.ID AND CLASS_SECTIONS.CLASS_ID = CLASSES.ID  AND CLASS_SECTIONS.SECTION_ID = SECTIONS.ID AND
        STAFF.ID=TEACHER_ASSIGN.STAFF_ID AND SUBJECTS.ID=TEACHER_ASSIGN.SUBJECT_ID AND SESSIONS.ID=TEACHER_ASSIGN.SESSIONS AND VERSIONS.ID=CLASSES.VERSIONSID";

        $query = $this->db->query($sql);
        $r= $query->result_array();
        
        return $r;
        //print_r($r);
        //exit();
    }

    public function show_section_classwise($table)
    {
        $this->db->select('CLASS_SECTIONS.*,SECTIONS.NAME');
        $this->db->from($table);
        $this->db->join('SECTIONS', 'SECTIONS.ID = CLASS_SECTIONS.SECTION_ID');
       
        // $this->db->where('class_sections.class_id', $classid);
        $this->db->order_by('SECTIONS.ID');
        return $this->db->get()->result();

    }

    // public function view_all_teacher($table)
    // {
    //     $this->db->select('TEACHER_ASSIGN.*,STAFF.FIRST_NAME,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS,SUBJECTS.NAME AS SUBNAME');
    //     $this->db->from($table);
    //     $this->db->join('STAFF', 'STAFF.STAFF_ID = TEACHER_ASSIGN.STAFF_ID');
    //     $this->db->join('CLASSES', 'CLASSES.ID = TEACHER_ASSIGN.CLASS_ID');
    //     $this->db->join('SECTIONS', 'SECTIONS.ID = TEACHER_ASSIGN.SECTION_ID');
    //     $this->db->join('SESSIONS', 'SESSIONS.ID = TEACHER_ASSIGN.SESSIONS');
    //     $this->db->join('SUBJECTS', 'SUBJECTS.ID = TEACHER_ASSIGN.SUBJECT_ID');

        
           
        
       
    //     // $this->db->where('class_sections.class_id', $classid);
    //     $this->db->order_by('STAFF.ID');
    //     return $this->db->get()->result();

    // }
    public function view_teacher_byid($table,$where)
    {
        $this->db->select('TEACHER_ASSIGN.*');
        $this->db->from($table);
        

        
            $this->db->where("TEACHER_ASSIGN.STAFF_ID",$where);
        
       
        // $this->db->where('class_sections.class_id', $classid);
        $this->db->order_by('TEACHER_ASSIGN.ID');
        return $this->db->get()->row();

    }

    public function view_all_time_table($table)
    {
        $this->db->select('TIME_TABLE.*');
        $this->db->from($table);
        
       
        // $this->db->where('class_sections.class_id', $classid);
        $this->db->order_by('TIME_TABLE.ID');
        return $this->db->get()->result();
    }

    public function view_all_class_routine($table)

    {
        $this->db->select('CLASS_ROUTINE.*,STAFF.FIRST_NAME,CLASSES.CLASSES,SECTIONS.NAME AS SECTION_NAME,SUBJECTS.NAME AS SUBJECT_NAME,TIME_TABLE.START_TIME,TIME_TABLE.END_TIME');
        $this->db->from($table);
        //$this->db->join('STAFF', 'STAFF.STAFF_ID = CLASS_ROUTINE.TEACHER_ID');
        $this->db->join('STAFF', 'STAFF.ID = CLASS_ROUTINE.TEACHER_ID');
        $this->db->join('CLASSES', 'CLASSES.ID = CLASS_ROUTINE.CLASS_ID');
        $this->db->join('SECTIONS', 'SECTIONS.ID = CLASS_ROUTINE.SECTION_ID');
        $this->db->join('SUBJECTS', 'SUBJECTS.ID = CLASS_ROUTINE.SUBJECT_ID');
        
        $this->db->join('TIME_TABLE', 'TIME_TABLE.ID = CLASS_ROUTINE.TIME_ID');



        $this->db->order_by('CLASS_ROUTINE.ID');
        return $this->db->get()->result();
        
        

    }
    public function view_teacher_distinct($table, $where, $order1, $order2)
    {
        $this->db->distinct();
        $this->db->select('TEACHER_ASSIGN.STAFF_ID,STAFF.FIRST_NAME');
        $this->db->from($table);
        $this->db->join('STAFF', 'STAFF.ID = TEACHER_ASSIGN.STAFF_ID');
        return $this->db->get()->result();

        // $sql="SELECT DISTINCT TEACHER_ASSIGN.STAFF_ID,STAFF.FIRST_NAME,CLASSES.ID
        // FROM TEACHER_ASSIGN,CLASS_SECTIONS,CLASSES,STAFF
        // WHERE  TEACHER_ASSIGN.CLASS_SECTION_ID = CLASS_SECTIONS.ID AND CLASS_SECTIONS.CLASS_ID=CLASSES.ID AND STAFF.ID = TEACHER_ASSIGN.STAFF_ID";

        // $query = $this->db->query($sql);
        // $r= $query->result();
        // return $r;




    }

    public function view_subject_distinct($table, $where, $order1, $order2)
    {
        $sql="SELECT DISTINCT TEACHER_ASSIGN.STAFF_ID,TEACHER_ASSIGN.SUBJECT_ID,TEACHER_ASSIGN.CLASS_SECTION_ID, CLASS_SECTIONS.CLASS_ID,CLASS_SECTIONS.SECTION_ID,SUBJECTS.NAME AS SUBJECT_NAME
        FROM TEACHER_ASSIGN,CLASS_SECTIONS,CLASSES,SUBJECTS
        WHERE  TEACHER_ASSIGN.CLASS_SECTION_ID = CLASS_SECTIONS.ID AND CLASS_SECTIONS.CLASS_ID=CLASSES.ID AND CLASS_SECTIONS.CLASS_ID=SUBJECTS.CLASSESID AND TEACHER_ASSIGN.SUBJECT_ID=SUBJECTS.ID";

       $query = $this->db->query($sql);
       $r= $query->result();
       return $r;
        

    }
    public function view_subject_distinct_teacher_assign_wise($wherecls,$wheresec,$wheretec)
    {
        $sql="SELECT DISTINCT TEACHER_ASSIGN.STAFF_ID,TEACHER_ASSIGN.SESSIONS,TEACHER_ASSIGN.SUBJECT_ID,TEACHER_ASSIGN.CLASS_SECTION_ID,
         CLASS_SECTIONS.CLASS_ID,CLASS_SECTIONS.SECTION_ID,SUBJECTS.NAME AS SUBJECT_NAME,SUBJECTS.CODE
        FROM TEACHER_ASSIGN,CLASS_SECTIONS,CLASSES,SUBJECTS
        WHERE  TEACHER_ASSIGN.CLASS_SECTION_ID = CLASS_SECTIONS.ID AND CLASS_SECTIONS.CLASS_ID=CLASSES.ID AND CLASS_SECTIONS.CLASS_ID=SUBJECTS.CLASSESID
         AND TEACHER_ASSIGN.SUBJECT_ID=SUBJECTS.ID AND CLASS_SECTIONS.CLASS_ID=$wherecls AND CLASS_SECTIONS.SECTION_ID= $wheresec
         AND TEACHER_ASSIGN.STAFF_ID=$wheretec";

       $query = $this->db->query($sql);
       $r= $query->result();
       return $r;
        

    }
    public function view_marks($table, $where, $order1, $order2)
    {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->select("*");
        $this->db->from($table);
        $this->db->order_by($order1, $order2);
       $r= $this->db->get()->result();
       if($r)
       {
           return $r;
       }
       else{
        return false;
       }
      

    }

    public function view_fali_std_list($class_id,$session_id,$section_id,$exam_id,$pass_mark)
    {
        if(!$class_id==""){
            $sql="SELECT DISTINCT STUDENT_ID FROM MARKS WHERE CLASS_ID=$class_id AND SECTION_ID=$section_id AND SESSIONS_ID=$session_id AND EXAM_ID=$exam_id AND MARK<$pass_mark";
      $query = $this->db->query($sql);
      $r= $query->result();
      return $r;
        }

      
    }


    public function view_result($class_id,$session_id,$section_id,$exam_id)
    {
        if(!$class_id==""){
        $sql="SELECT STUDENTS.F_NAME,STUDENTS.ADMISSION_NO,MARKS.STUDENT_ID,CLASSES.ID AS CLASS_ID,CLASSES.CLASSES
        AS CLASS_NAME,SECTIONS.NAME AS SECTION_NAME,SECTIONS.ID AS SECTION_ID,SESSIONS.SESSIONS AS SESSION_NAME,SESSIONS.ID AS SESSION_ID,EXAMS.EXAM_NAME,SUM(MARKS.MARK) AS MARKS,MARKS.EXAM_ID
        FROM MARKS,CLASSES,SECTIONS,SESSIONS,EXAMS,STUDENTS
        WHERE MARKS.CLASS_ID = CLASSES.ID 
        AND MARKS.SECTION_ID = SECTIONS.ID 
        AND MARKS.SESSIONS_ID = SESSIONS.ID
        AND MARKS.EXAM_ID = EXAMS.ID 
        AND STUDENTS.ID=MARKS.STUDENT_ID    
        AND MARKS.CLASS_ID=$class_id
        AND MARKS.SECTION_ID=$section_id
        AND MARKS.EXAM_ID=$exam_id
        AND MARKS.SESSIONS_ID=$session_id 
        GROUP BY MARKS.STUDENT_ID,STUDENTS.F_NAME,MARKS.STUDENT_ID,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS,EXAMS.EXAM_NAME,STUDENTS.ADMISSION_NO,MARKS.EXAM_ID,CLASSES.ID,SECTIONS.ID,SESSIONS.ID
        ORDER BY SUM(MARKS.MARK) DESC ";
        $query = $this->db->query($sql);
        $r= $query->result();
        return $r;

        }

    }

    public function get_result_details_by_id($table,$view_id,$exm_id,$session_id)
    {
        // $sql="SELECT * FROM MARKS WHERE STUDENT_ID=$view_id";
        // $query = $this->db->query($sql);
        // $r= $query->result();
        // return $r;
        $this->db->select('MARKS.*,MARKS.EXAM_ID,MARKS.MARK,SESSIONS.SESSIONS,EXAMS.EXAM_NAME,
        SUBJECTS.NAME AS SUBJECT_NAME, SUBJECTS.CODE CODE');
        $this->db->from($table);
        $this->db->join('SESSIONS', 'SESSIONS.ID = MARKS.SESSIONS_ID');
        $this->db->join('EXAMS', 'EXAMS.ID = MARKS.EXAM_ID');
        $this->db->join('SUBJECTS', 'SUBJECTS.ID = MARKS.SUBJECT_ID');

        $this->db->where("STUDENT_ID",$view_id);
        $this->db->where("EXAM_ID",$exm_id);
        $this->db->where("SESSIONS_ID",$session_id);
        
        return $this->db->get()->result();

    }
    
    public function enroll_student($where){
        
        $this->db->select("ENROLL.*, STUDENTS.F_NAME ,STUDENTS.L_NAME,STUDENTS.ADMISSION_NO, CLASSES.CLASSES ");
         $this->db->from("ENROLL");
          $this->db->join('STUDENTS', 'ENROLL.STUDENT_ID = STUDENTS.ID');
                $this->db->join('CLASSES', 'ENROLL.CLASS_ID = CLASSES.ID');
           $this->db->where("STATUS", 1);
         $this->db->where("STUDENT_ID",$where);
          return $this->db->get()->result();
    }

    





    // public function view_subject_distinct($table, $where, $order1, $order2)
    // {
    //     $this->db->distinct();
    //     $this->db->select('TEACHER_ASSIGN.SUBJECT_ID,SUBJECTS.NAME AS SUBJECT_NAME');
    //     $this->db->from($table);
    //     $this->db->join('SUBJECTS', 'SUBJECTS.ID = TEACHER_ASSIGN.SUBJECT_ID');
    //     return $this->db->get()->result();

    // }
    // public function view_subject_distinct($table, $where, $order1, $order2)
    // {
    //     $this->db->distinct();
    //     $this->db->select('TEACHER_ASSIGN.SUBJECT_ID,TEACHER_ASSIGN.STAFF_ID,SUBJECTS.NAME AS SUBJECT_NAME');
    //     $this->db->from($table);
    //     $this->db->join('SUBJECTS', 'SUBJECTS.ID = TEACHER_ASSIGN.SUBJECT_ID');
    //     return $this->db->get()->result();

    // }
    public function view_class_distinct($table, $where, $order1, $order2)
    {
        
        // $sql="SELECT DISTINCT TEACHER_ASSIGN.CLASS_SECTION_ID,CLASS_SECTIONS.CLASS_ID,CLASSES.CLASSES AS CLASS_NAME 
        // FROM TEACHER_ASSIGN,CLASS_SECTIONS,CLASSES
        // WHERE  TEACHER_ASSIGN.CLASS_SECTION_ID = CLASS_SECTIONS.ID AND CLASS_SECTIONS.CLASS_ID=CLASSES.ID ";


        $sql="SELECT DISTINCT TEACHER_ASSIGN.STAFF_ID, CLASS_SECTIONS.CLASS_ID,CLASSES.CLASSES AS CLASS_NAME ,VERSIONS.VERSION
         FROM TEACHER_ASSIGN,CLASS_SECTIONS,CLASSES,VERSIONS
         WHERE  TEACHER_ASSIGN.CLASS_SECTION_ID = CLASS_SECTIONS.ID AND CLASS_SECTIONS.CLASS_ID=CLASSES.ID AND CLASSES.VERSIONSID=VERSIONS.ID ";

        $query = $this->db->query($sql);
        $r= $query->result();
        return $r;

    }
    public function view_section_distinct($table, $where, $order1, $order2)
    {
        
        $sql="SELECT DISTINCT TEACHER_ASSIGN.STAFF_ID, CLASS_SECTIONS.SECTION_ID,CLASS_SECTIONS.CLASS_ID,  SECTIONS.NAME AS SECTION_NAME ,CLASSES.CLASSES AS CLASS_NAME
         FROM TEACHER_ASSIGN,CLASS_SECTIONS,SECTIONS,CLASSES
         WHERE  TEACHER_ASSIGN.CLASS_SECTION_ID = CLASS_SECTIONS.ID AND CLASS_SECTIONS.SECTION_ID=SECTIONS.ID AND CLASS_SECTIONS.CLASS_ID=CLASSES.ID ";

        $query = $this->db->query($sql);
        $r= $query->result();
        return $r;
        
    }





    


    
    ///DELETE
     public function delete_data($table, $data) {
        if ($this->db->delete($table, $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_teacher_list($table, $where, $order1, $order2){

        $this->db->select('STAFF.*,ROLES.NAME');
        $this->db->from($table);
        $this->db->join('ROLES', 'ROLES.ID = STAFF.ROLES_ID');
        $this->db->where($where);
        $this->db->order_by('STAFF.ID', $order2);
        return $this->db->get()->result();
    }

    public function get_routine_alldays($table, $where, $order2){

        $this->db->select('CLASS_ROUTINE.*,CLASSES.CLASSES,SECTIONS.NAME AS SECTIONS,SUBJECTS.NAME AS SUBJECTS,TIME_TABLE.*');
        $this->db->from($table);
        $this->db->join('CLASSES', 'CLASSES.ID = CLASS_ROUTINE.CLASS_ID');
        $this->db->join('SECTIONS', 'SECTIONS.ID = CLASS_ROUTINE.SECTION_ID'); 
        $this->db->join('SUBJECTS', 'SUBJECTS.ID = CLASS_ROUTINE.SUBJECT_ID'); 
        $this->db->join('TIME_TABLE', 'TIME_TABLE.ID = CLASS_ROUTINE.TIME_ID'); 
        $this->db->where($where);
        $this->db->order_by('CLASS_ROUTINE.ID', $order2);
        return $this->db->get()->result();

    }

    public function view_class($table, $where, $groupby)
    {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->select("CLASS_ID");
        $this->db->from($table);
        $this->db->group_by($groupby);
        return $this->db->get()->result();

    }
    public function view_all_class_from_teacher_assign($table, $where)
    {
        $sql="SELECT DISTINCT TEACHER_ASSIGN.*, CLASS_SECTIONS.CLASS_ID,CLASSES.CLASSES AS CLASS_NAME,CLASS_SECTIONS.SECTION_ID,SECTIONS.NAME AS SECTION_NAME 
         FROM TEACHER_ASSIGN,CLASS_SECTIONS,CLASSES,SECTIONS
         WHERE  TEACHER_ASSIGN.CLASS_SECTION_ID = CLASS_SECTIONS.ID AND CLASS_SECTIONS.CLASS_ID=CLASSES.ID  AND CLASS_SECTIONS.SECTION_ID=SECTIONS.ID AND 
         TEACHER_ASSIGN.STAFF_ID=$where ";

        $query = $this->db->query($sql);
        $r= $query->result();
        return $r;
       

    }
    public function get_session($year)
    {
       
        $sql="SELECT ID FROM SESSIONS WHERE SESSIONS=$year";
        $query = $this->db->query($sql);
        $r= $query->row();
        return $r;
    }


    public function get_class_routine($table,$cls,$sec,$sess)
    {
        $sql="SELECT $table.*,CLASSES.CLASSES,SECTIONS.NAME AS SECTIONS,SUBJECTS.NAME AS SUBJECTS,TIME_TABLE.*,STAFF.FIRST_NAME
         FROM $table,CLASSES,SECTIONS,SUBJECTS,TIME_TABLE,STAFF
          WHERE CLASS_ID=$cls AND SECTION_ID=$sec AND SESSION_ID=$sess AND CLASSES.ID = CLASS_ROUTINE.CLASS_ID AND
          SECTIONS.ID = CLASS_ROUTINE.SECTION_ID AND SUBJECTS.ID = CLASS_ROUTINE.SUBJECT_ID AND TIME_TABLE.ID = CLASS_ROUTINE.TIME_ID  AND STAFF.ID=CLASS_ROUTINE.TEACHER_ID ORDER BY TIME_TABLE.ID ";
        $query = $this->db->query($sql);
        $r= $query->result();
        return $r;
    }

    public function OnlineQuestionView() {
        $this->db->select("QUESTIONS.*, SUBJECTS.NAME NAME, CLASSES.CLASSES");
        $this->db->from("QUESTIONS");
        $this->db->join('SUBJECTS', 'SUBJECTS.ID = QUESTIONS.SUBJECT_ID');
       $this->db->join('CLASSES', 'CLASSES.ID =SUBJECTS.CLASSESID ');
         $this->db->order_by('QUESTIONS.ID');
        return $this->db->get()->result();
    }

    public function ExamQuestionView() {
        $this->db->select("ONLINEEXAM_QUESTIONS.*, QUESTIONS.QUESTION");
        $this->db->from("ONLINEEXAM_QUESTIONS");
        $this->db->join('QUESTIONS', 'QUESTIONS.ID = ONLINEEXAM_QUESTIONS.QUESTIONSID');
      // $this->db->join('CLASSES', 'CLASSES.ID =SUBJECTS.CLASSESID ');
         $this->db->order_by('ONLINEEXAM_QUESTIONS.ID');
        return $this->db->get()->result();
    }

    
    
}