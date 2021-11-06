<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends CI_Model {

    
   
   public function get_subjects_classwise($table,$where)
   {
    $this->db->select('SUBJECTS.*');
        $this->db->from($table);
       $this->db->where($where);


        $result = $this->db->get()->result();
        return $result;
   }
   
   public function check_marks($table,$where)
   {


    $this->db->select('MARKS.*');
        $this->db->from($table);
        $this->db->where($where);
        $result = $this->db->get()->result();

        

        if($result)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

        
   }
   
   public function edit($table, $data, $where) {
         /*echo $table;
         echo $where;
         echo"OK";
          print_r($data);
          
          exit();*/
         

        $this->db->where($where);
        $this->db->update($table, $data);

        return TRUE;
    }
   /*public function get_subjects_classwise_with_marks($table,$where)
   {
    $this->db->select('SUBJECTS.*,MARKS.MARK,ENROLL.STUDENT_ID');
        $this->db->from($table);
        $this->db->join('SUBJECTS', 'SUBJECTS.ID = MARKS.SUBJECT_ID');
        $this->db->join('ENROLL', 'ENROLL.STUDENT_ID = MARKS.STUDENT_ID');

       $this->db->where($where);

        $result = $this->db->get()->result();
        return $result;
   }*/
   public function get_subjects_classwise_with_marks($table,$where)
   {
        $this->db->select('SUBJECTS.*,MARKS.MARK');
        $this->db->from($table);
        //$this->db->distinct();
        $this->db->join('SUBJECTS', 'SUBJECTS.ID = MARKS.SUBJECT_ID');

       $this->db->where($where);
       

        $result = $this->db->get()->result();
        return $result;
   }
   

}
