<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student_fees_model extends CI_Model {

    

    public function search_student($table, $where,$order1, $order2) {
       // echo "string";
/*
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($where);//ata class ar section wise student searche ar jonno
        $this->db->order_by($order1, $order2);
        $r= $this->db->get()->result(); 
        return $r;*/
        



        /*$this->db->select('STUDENTS*,CLASSES.CLASSES,SECTIONS.NAME');
        $this->db->from('STUDENTS');
         $this->db->join('CLASSES', 'CLASSES.ID = STUDENTS.CLASS');
       $this->db->join('SECTIONS', 'SECTIONS.ID = STUDENTS.SECTION');
        //$this->db->where($where);
        $this->db->order_by($order1, $order2);
        $r= $this->db->get()->result(); */


        $this->db->select('STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME');
        $this->db->from('STUDENTS');
        $this->db->join('CLASSES', 'CLASSES.ID = STUDENTS.CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = STUDENTS.SECTION');
        $this->db->where($where);
         //$this->db->where("CLASS",$where ); 
        $this->db->order_by('STUDENTS.ID', $order2);

        return $this->db->get()->result();

    }
    public function search_student2($table, $where,$order1, $order2) {
       // echo "string";

        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($where);//ata class ar section wise student searche ar jonno
        $this->db->order_by($order1, $order2);
        $r= $this->db->get()->result(); 
        return $r;

    }
  
    public function   add_students_fees($table, $data) {
       // echo "string";
      if ($this->db->insert($table, $data)) {
            //$this->Id = $this->db->insert_id();
            
            return TRUE;
        } else {
            return FALSE;
        }

    }
    
    public function Get_student_fees_list($table, $where,$order1, $order2) {
       // echo "string";

        /*$this->db->select('STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME,FEES_AMOUNT.AMOUNT');
        $this->db->from('STUDENTS');
        $this->db->join('CLASSES', 'CLASSES.ID = STUDENTS.CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = STUDENTS.SECTION');
       // $this->db->join('FEES_TYPE', 'FEES_TYPE.ID = FEES_AMOUNT.FEES_TYPE_ID');
        $this->db->join('FEES_AMOUNT', 'FEES_AMOUNT.STUDENT_CLASS = STUDENTS.CLASS AND FEES_AMOUNT.STUDENT_SECTION = STUDENTS.SECTION');
        
         //$this->db->where("CLASS",$where ); 
        $this->db->order_by('STUDENTS.ID', $order2);

        return $this->db->get()->result();*/


        $this->db->select('STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME,FEES_AMOUNT.AMOUNT,FEES_TYPE.FEES_NAME');
        $this->db->from('FEES_AMOUNT');
        $this->db->join('CLASSES', 'CLASSES.ID = FEES_AMOUNT.STUDENT_CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = FEES_AMOUNT.STUDENT_SECTION');
        $this->db->join('FEES_TYPE', 'FEES_TYPE.ID = FEES_AMOUNT.FEES_TYPE_ID');
        $this->db->join('STUDENTS', 'FEES_AMOUNT.STUDENT_CLASS = STUDENTS.CLASS AND FEES_AMOUNT.STUDENT_SECTION = STUDENTS.SECTION');
        $this->db->where($where);
        
         //$this->db->where("CLASS",$where ); 
        $this->db->order_by('STUDENTS.ID', $order2);

        return $this->db->get()->result();


    }

    public function Get_student_collect_fees_list($table, $where,$order1, $order2) {
       // echo "string";

        /*$this->db->select('STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME,FEES_AMOUNT.AMOUNT');
        $this->db->from('STUDENTS');
        $this->db->join('CLASSES', 'CLASSES.ID = STUDENTS.CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = STUDENTS.SECTION');
       // $this->db->join('FEES_TYPE', 'FEES_TYPE.ID = FEES_AMOUNT.FEES_TYPE_ID');
        $this->db->join('FEES_AMOUNT', 'FEES_AMOUNT.STUDENT_CLASS = STUDENTS.CLASS AND FEES_AMOUNT.STUDENT_SECTION = STUDENTS.SECTION');
        
         //$this->db->where("CLASS",$where ); 
        $this->db->order_by('STUDENTS.ID', $order2);

        return $this->db->get()->result();*/


        $this->db->select('STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME,FEES_AMOUNT.AMOUNT,FEES_AMOUNT.MONTH,FEES_AMOUNT.YEAR,FEES_AMOUNT.FEES_TYPE_ID,FEES_TYPE.FEES_NAME');
        $this->db->from('FEES_AMOUNT');
        $this->db->join('CLASSES', 'CLASSES.ID = FEES_AMOUNT.STUDENT_CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = FEES_AMOUNT.STUDENT_SECTION');
        $this->db->join('FEES_TYPE', 'FEES_TYPE.ID = FEES_AMOUNT.FEES_TYPE_ID');
        $this->db->join('STUDENTS', 'FEES_AMOUNT.STUDENT_CLASS = STUDENTS.CLASS AND FEES_AMOUNT.STUDENT_SECTION = STUDENTS.SECTION');
        $this->db->where($where);
        
         //$this->db->where("CLASS",$where ); 
        $this->db->order_by('STUDENTS.ID', $order2);
        return $this->db->get()->result();


    }



    public function Get_student_collect_fees_list2($table, $where,$order1, $order2) {

        $this->db->select('STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME,FEES_AMOUNT.AMOUNT,FEES_AMOUNT.MONTH,FEES_AMOUNT.YEAR,FEES_AMOUNT.FEES_TYPE_ID,FEES_TYPE.FEES_NAME');
        $this->db->from('FEES_AMOUNT');
        $this->db->join('CLASSES', 'CLASSES.ID = FEES_AMOUNT.STUDENT_CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = FEES_AMOUNT.STUDENT_SECTION');
        $this->db->join('FEES_TYPE', 'FEES_TYPE.ID = FEES_AMOUNT.FEES_TYPE_ID');
        $this->db->join('STUDENTS', 'FEES_AMOUNT.STUDENT_CLASS = STUDENTS.CLASS AND FEES_AMOUNT.STUDENT_SECTION = STUDENTS.SECTION');
        $this->db->where($where);
        
         //$this->db->where("CLASS",$where ); 
        $this->db->order_by('STUDENTS.ID', $order2);

        return $this->db->get()->result();


    }

    public function check_paid($table,$where,$order1, $order2){


        $this->db->select('COLLECT_FEES.*');
        $this->db->from($table);
        
        $this->db->where('ADMISSION_NO',$where);
        $this->db->order_by($order1, $order2);
        $r= $this->db->get()->row(); 
        return $r;
    }
    public function check_paid2($table,$where,$order1, $order2){

    

        /*$con1= $where["ADMISSION_NO"];
        $con2= $where["FEES_TYPE"];
        $con3= $where["MONTH"];
        $con4= $where["YEAR"];*/

        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);

        $this->db->order_by($order1, $order2);
        $r= $this->db->get()->row(); 
        return $r;
    }
    public function findamount_by_feestype($table,$where,$order1, $order2)
    {
        $this->db->select('FEES_AMOUNT.*');
        $this->db->from($table);
        
        $this->db->where('FEES_TYPE_ID',$where);
        $this->db->order_by($order1, $order2);
        $r= $this->db->get()->row(); 
        return $r;

    }
    public function find_paid_status_by_sid_and_ftype($table,$where,$where2,$order1, $order2)
    {
        $array = array('FEES_TYPE' => $where, 'ADMISSION_NO' => $where2);
        $this->db->select('COLLECT_FEES.*');
        $this->db->from($table);
        
        $this->db->where($array);
        $this->db->order_by($order1, $order2);
        $r= $this->db->get()->row(); 
        return $r;

    }

    public function find_paid_status_by_sid_and_ftype_on_add_fees_amount($table,$where,$where2,$order1, $order2)
    {
        $array = array('FEES_TYPE' => $where, 'ADMISSION_NO' => $where2);
        $this->db->select('ADD_FEES_AMOUNT.*');
        $this->db->from($table);
        
        $this->db->where($array);
        $this->db->order_by($order1, $order2);
        $r= $this->db->get()->row(); 
        return $r;

    }
    public function checkdata_paid_status_by_sid_and_ftype($table,$where,$where2,$order1, $order2)
    {
         $array = array('FEES_TYPE' => $where, 'ADMISSION_NO' => $where2);
        $this->db->select('COLLECT_FEES.ID');
        $this->db->from($table);
        
        $this->db->where($array);
        $this->db->order_by($order1, $order2);
        if($this->db->get()->row())
        {
            return TRUE;
        } 
        else
        {
            return FALSE;
        }
        
    }
    public function update_status_and_paid_amount($table,$where,$data)
    {
        
      $this->db->where('ID', $where);
       $this->db->update($table, $data);
        
       return TRUE;
    }
    public function update_status_and_paid_amount_on_add_fees_amount($table,$where,$data)
    {
        $this->db->where('ID', $where);
       $this->db->update($table, $data);
        
       return TRUE;

    }
    public function Get_student_fees_list_form_add_fees_amount($table, $where,$order1, $order2)
    {
        $this->db->select('ADD_FEES_AMOUNT.*,CLASSES.CLASSES,SECTIONS.NAME,FEES_TYPE.FEES_NAME');
        $this->db->from('ADD_FEES_AMOUNT');
        $this->db->join('CLASSES', 'CLASSES.ID = ADD_FEES_AMOUNT.CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ADD_FEES_AMOUNT.SECTION');
        $this->db->join('FEES_TYPE', 'FEES_TYPE.ID = ADD_FEES_AMOUNT.FEES_TYPE');

        //$this->db->join('STUDENTS',  'STUDENTS.ADMISSION_NO = ADD_FEES_AMOUNT.S_ADMISSION_NO');
        
        $this->db->where($where);
        
         //$this->db->where("CLASS",$where ); 
        $this->db->order_by('ADD_FEES_AMOUNT.ID', $order2);

        return $this->db->get()->result();


    }

    /*public function Get_student_fees_list_form_add_fees_amount($table, $where,$order1, $order2)
    {
        $this->db->select('ADD_FEES_AMOUNT.*,STUDENTS.*,CLASSES.CLASSES,SECTIONS.NAME,FEES_TYPE.FEES_NAME');
        $this->db->from('ADD_FEES_AMOUNT');
        $this->db->join('CLASSES', 'CLASSES.ID = ADD_FEES_AMOUNT.CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ADD_FEES_AMOUNT.SECTION');
        $this->db->join('FEES_TYPE', 'FEES_TYPE.ID = ADD_FEES_AMOUNT.FEES_TYPE');

        $this->db->join('STUDENTS',  'STUDENTS.ADMISSION_NO = ADD_FEES_AMOUNT.ADMISSION_NO');
        
        $this->db->where($where);
        
         //$this->db->where("CLASS",$where ); 
        $this->db->order_by('ADD_FEES_AMOUNT.ID', $order2);

        return $this->db->get()->result();


    }*/

    public function check_data_in_add_fees_amount($table, $where,$order1, $order2)
    {

        $this->db->select('*');
        $this->db->from($table);
        
        $this->db->where($where);
        $this->db->order_by($order1, $order2);
        $r=$this->db->get()->row();
        
        if($r)
        {
            return $r;
        } 
        else
        {
            return FALSE;
        }

    }
   public function view_fees_amount($table,$order1, $order2)
   {
        $this->db->select('FEES_AMOUNT.*,CLASSES.CLASSES,SECTIONS.NAME,FEES_TYPE.FEES_NAME,SESSIONS.SESSIONS');
        $this->db->from($table);

         $this->db->join('CLASSES', 'CLASSES.ID = FEES_AMOUNT.STUDENT_CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = FEES_AMOUNT.STUDENT_SECTION');
        $this->db->join('FEES_TYPE', 'FEES_TYPE.ID = FEES_AMOUNT.FEES_TYPE_ID');
        $this->db->join('SESSIONS', 'SESSIONS.ID = FEES_AMOUNT.ADMISSION_SESSION');

        $this->db->order_by('FEES_AMOUNT.ID', $order2);
        return $this->db->get()->result();
   }



   public function getfees($table, $where,$order1, $order2)
   {
    $this->db->select('*');
        $this->db->from($table);
        
        $this->db->where('ID',$where);
        $this->db->order_by($order1, $order2);
        $r= $this->db->get()->row(); 
        if($r)
        {
          return $r;  
        }
        else
        {
            return FALSE;
        }
        

   }
   public function get_student_from_add_fees_amount($table, $where,$order1, $order2)
   {
    $this->db->select('*');
        $this->db->from($table);
        
        $this->db->where($where);
        $this->db->order_by($order1, $order2);
        $r=$this->db->get()->result();
        if($r)
        {
            return $r;
        } 
        else
        {
            return FALSE;
        }

   }

   public function view_data2($table, $where,$order1, $order2)
   {
    $this->db->select('FEES_AMOUNT.*,CLASSES.CLASSES,SECTIONS.NAME,FEES_TYPE.FEES_NAME');
        $this->db->from($table);
        $this->db->join('CLASSES', 'CLASSES.ID = FEES_AMOUNT.STUDENT_CLASS');
        $this->db->join('SECTIONS', 'SECTIONS.ID = FEES_AMOUNT.STUDENT_SECTION');
        $this->db->join('FEES_TYPE', 'FEES_TYPE.ID = FEES_AMOUNT.FEES_TYPE_ID');
        
        $this->db->where('FEES_AMOUNT.ID',$where);
        $this->db->order_by('FEES_AMOUNT.ID', $order2);
        $r= $this->db->get()->result();; 
        if($r)
        {
          return $r;  
        }
        else
        {
            return FALSE;
        }


   }
   public function edit_fees($table, $data, $admission,$f_type,$month,$year) {
         /*echo $table;
          print_r($data);
          echo $where;
          exit();*/
         

        $this->db->where('ADMISSION_NO', $admission);
        $this->db->where('FEES_TYPE', $f_type);
        $this->db->where('MONTH', $month);
        $this->db->where('YEAR', $year);
        $this->db->update($table, $data);

        return TRUE;
    }
}
