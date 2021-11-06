<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Exam_routine_model extends CI_Model {

    public function Get_exam_routine() {
        $sql = "SELECT EXAM_ROUTINE.*, EXAM_ROUTINE.E_DATE, EXAM_ROUTINE.DAY,VERSIONS.VERSION,CLASSES.CLASSES,SECTIONS.NAME AS SECTION_NAME,EXAM_ROUTINE.ROOM,SUBJECTS.NAME,SUBJECTS.CODE,STAFF.FIRST_NAME,EXAM_ROUTINE.START_TIME,EXAM_ROUTINE.END_TIME,EXAM_ROUTINE.DURATION,EXAMS.EXAM_NAME,SESSIONS.SESSIONS AS SESSION_NAME, STAFF.FIRST_NAME
         FROM STAFF,CLASSES,SECTIONS,SUBJECTS,SESSIONS,VERSIONS,EXAMS,EXAM_ROUTINE
        WHERE EXAM_ROUTINE.VERSION=VERSIONS.ID AND  EXAM_ROUTINE.CLASS=CLASSES.ID AND EXAM_ROUTINE.SUBJECT=SUBJECTS.ID AND EXAM_ROUTINE.EXAM_GUARD=STAFF.ID AND EXAM_ROUTINE.EXAM=EXAMS.ID AND SECTIONS.ID=EXAM_ROUTINE.SECTION AND SESSIONS.ID=EXAM_ROUTINE.SESSIONS";
        $query = $this->db->query($sql);
        $r = $query->result();
        return $r;
    }

    public function getAllforGenerateRoutine($where) {
        $sql = "SELECT SUBJECTS.* FROM SUBJECTS,CLASSES
        
        WHERE SUBJECTS.CLASSESID=CLASSES.ID AND SUBJECTS.CLASSESID=$where ";
        $query = $this->db->query($sql);
        $r = $query->result();
        return $r;
    }

    public function Examroutine_view($where) {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->select("EXAM_ROUTINE.*, EXAMS.EXAM_NAME, SUBJECTS.NAME SNAME,SUBJECTS.TYPE ");
        $this->db->from("EXAM_ROUTINE");
        $this->db->join('EXAMS', 'EXAM_ROUTINE.EXAM = EXAMS.ID');
        $this->db->join('SUBJECTS', 'EXAM_ROUTINE.SUBJECT = SUBJECTS.ID');
        $this->db->order_by("EXAM_ROUTINE.ID", "DESC");
        return $this->db->get()->result();
    }

    public function Student_view($where) {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->select("ENROLL.* ,STUDENTS.ADMISSION_NO SADMISSION_NO,STUDENTS.F_NAME , STUDENTS.L_NAME ,CLASSES.CLASSES , SECTIONS.NAME, SESSIONS.SESSIONS");
        $this->db->from("ENROLL");
       $this->db->join('STUDENTS', 'ENROLL.STUDENT_ID = STUDENTS.ID');
        $this->db->join('CLASSES', 'ENROLL.CLASS_ID = CLASSES.ID');
        $this->db->join('SECTIONS', 'ENROLL.SECTION_ID = SECTIONS.ID');
        $this->db->join('SESSIONS', 'ENROLL.SESSION_ID = SESSIONS.ID');
        $this->db->order_by("ENROLL.ID", "DESC");
        return $this->db->get()->result();
    }

}
