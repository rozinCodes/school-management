<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Promote_model extends CI_Model {
    
    
    // public function view_fali_std_list_forpromote($class_id,$session_id,$section_id,$exam_id,$status)
    // {
    //   $sql=" SELECT STUDENT_ID,EXAM_ID, SUM(MARK) FROM MARKS WHERE CLASS_ID=$class_id
    //    AND SECTION_ID=$section_id AND SESSIONS_ID=$session_id AND EXAM_ID=$exam_id AND STATUS=$status  GROUP BY STUDENT_ID,EXAM_ID";
    //   $query = $this->db->query($sql);
    //   $r= $query->result();
    //   return $r;
    // }

    public function view_result_forpromote_withfail($class_id,$session_id,$section_id,$exam_id,$status)
    {
      $sql="SELECT STUDENTS.F_NAME,STUDENTS.ADMISSION_NO,MARKS.STUDENT_ID,CLASSES.CLASSES
        AS CLASS_NAME,SECTIONS.NAME AS SECTION_NAME,SESSIONS.SESSIONS AS SESSION_NAME,EXAMS.EXAM_NAME,SUM(MARKS.MARK) AS MARKS,MARKS.EXAM_ID
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
        AND MARKS.STATUS=$status
        GROUP BY MARKS.STUDENT_ID,STUDENTS.F_NAME,MARKS.STUDENT_ID,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS,EXAMS.EXAM_NAME,STUDENTS.ADMISSION_NO,MARKS.EXAM_ID
        ORDER BY SUM(MARKS.MARK) DESC ";
        $query = $this->db->query($sql);
        $r= $query->result();
        return $r;

    }


    public function view_result_forpromote($class_id,$session_id,$section_id,$exam_id)
    {
      $sql="SELECT STUDENTS.F_NAME,STUDENTS.ADMISSION_NO,MARKS.STUDENT_ID,CLASSES.CLASSES
        AS CLASS_NAME,SECTIONS.NAME AS SECTION_NAME,SESSIONS.SESSIONS AS SESSION_NAME,EXAMS.EXAM_NAME,SUM(MARKS.MARK) AS MARKS,MARKS.EXAM_ID
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
        GROUP BY MARKS.STUDENT_ID,STUDENTS.F_NAME,MARKS.STUDENT_ID,CLASSES.CLASSES,SECTIONS.NAME,SESSIONS.SESSIONS,EXAMS.EXAM_NAME,STUDENTS.ADMISSION_NO,MARKS.EXAM_ID
        ORDER BY SUM(MARKS.MARK) DESC ";
        $query = $this->db->query($sql);
        $r= $query->result();
        return $r;

    }

    
    
}