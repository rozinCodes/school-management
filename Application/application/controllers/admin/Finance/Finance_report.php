<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_report extends CI_Controller {
    


	public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
      $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

	

	public function index ()
	{
        //echo "hello";
	
   
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");

    
        $data['allPdt1'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt2']= $this->common_model->view_data("CLASSES", "","ID","ASC");
        $data['allPdt3'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS");
        $data['allPdt4']= $this->common_model->view_data("SESSIONS", "","ID","ASC");
        $data['allPdt5']= $this->finance_model->get_student();
        $data['allPdt6']= $this->common_model->view_data("FEES_TYPE", "","ID","ASC");
        // echo "<pre>";
        // print_r( $data['allPdt5']);
        // echo "<pre>";
        // exit();
        $data['content'] = $this->load->view("admin/finance/finance_report", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    
    public function fees_statement()
    {
        
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");

        $data['allPdt1'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt2']= $this->common_model->view_data("CLASSES", "","ID","ASC");
        $data['allPdt3'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS");
        $data['allPdt4']= $this->common_model->view_data("SESSIONS", "","ID","ASC");
        $data['allPdt5']= $this->finance_model->get_student();
        $data['allPdt6']= $this->common_model->view_data("FEES_TYPE", "","ID","ASC");
        


        $version=$this->input->post("version");
        $class=$this->input->post("class");
        $section=$this->input->post("section");
        $session=$this->input->post("session");
        $student=$this->input->post("student_lists");
        $feestype=$this->input->post("fees_type");

        $where=array(
            "CLASS"=>$class,
            "STUDENT_ID"=>$student,
            "ADMISSION_SESSION"=>$session,
            "FEES_TYPE"=>$feestype
        );

        $data['feesstatement']=$this->finance_model->get_std_fees_statement($where);
        $data['student'] = $this->finance_model->get_student_by_sid("STUDENTS", $student);

        // print_r($data['feesstatement']);
        // exit();

        
        $data['content'] = $this->load->view("admin/finance/finance_report", $data, TRUE);
        $this->load->view("admin/master", $data);



    }
    public function balance_fees_report()
    {
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");

        $data['allPdt1'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt2']= $this->common_model->view_data("CLASSES", "","ID","ASC");
        $data['allPdt3'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS");
        $data['allPdt4']= $this->common_model->view_data("SESSIONS", "","ID","ASC");
        $data['allPdt5']= $this->finance_model->get_student();
        $data['allPdt6']= $this->common_model->view_data("FEES_TYPE", "","ID","ASC");
        


        $version=$this->input->post("version");
        $class=$this->input->post("class");
        $section=$this->input->post("section");
        $session=$this->input->post("session");
        $student=$this->input->post("student_lists");
        $feestype=$this->input->post("fees_type");

        $where=array(
            "CLASS"=>$class,
            "SECTION"=>$section,
            "ADMISSION_SESSION"=>$session
            
        );
       

        $data['alltypeFeesStatement']=$this->finance_model->get_std_all_typeof_fees_statement($where);
        $data['studentsinfo']=$this->finance_model->students_info($where);
     
        // echo "<pre>";
        // print_r($data['studentsinfo']);
        // exit();

        
        $data['content'] = $this->load->view("admin/finance/finance_report", $data, TRUE);
        $this->load->view("admin/master", $data);


    }

    public function fees_statement_history()
    {
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");

        $data['allPdt1'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt2']= $this->common_model->view_data("CLASSES", "","ID","ASC");
        $data['allPdt3'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS");
        $data['allPdt4']= $this->common_model->view_data("SESSIONS", "","ID","ASC");
        $data['allPdt5']= $this->finance_model->get_student();
        $data['allPdt6']= $this->common_model->view_data("FEES_TYPE", "","ID","ASC");
        


        $version=$this->input->post("version");
        $class=$this->input->post("class");
        $section=$this->input->post("section");
        $session=$this->input->post("session");
        $student=$this->input->post("student_lists");
        $feestype=$this->input->post("fees_type");

        $where=array(
            "CLASS"=>$class,
            "STUDENT_ID"=>$student,
            "ADMISSION_SESSION"=>$session,
            "FEES_TYPE"=>$feestype
        );

        $data['feeshistory']=$this->finance_model->get_std_fees_statement_history($where);
        $data['sumofallfees'] = $this->finance_model->sum_of_allfees_std_wise($where);
        $data['student2'] = $this->finance_model->get_student_by_sid("STUDENTS", $student);

        // echo"<pre>";
        // print_r($data['sumofallfees']);
        // exit();

        
        $data['content'] = $this->load->view("admin/finance/finance_report", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    
}