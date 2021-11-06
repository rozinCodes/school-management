<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni_model extends CI_Model
{

    public function student_details_by_admission_no($table, $where,$status, $order1, $order2)
    {
        $this->db->select('ENROLL.*,STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME');
        $this->db->from($table);
        $this->db->join('CLASSES', 'CLASSES.ID = ENROLL.CLASS_ID');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ENROLL.SECTION_ID');
        $this->db->join('STUDENTS', 'ENROLL.STUDENT_ID = STUDENTS.ID');
        $this->db->where("STUDENTS.ADMISSION_NO",$where);
        $this->db->where("ENROLL.STATUS",$status);
        $this->db->order_by("STUDENTS.ID", $order2);
        $r = $this->db->get()->result();
        return $r;
    }
}