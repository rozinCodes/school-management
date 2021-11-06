<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index() {
        $data = array();
        $data['active'] = "classes";
        $data['title'] = "classes";
        $this->load->helper("form");
		$sequence=1;
		$data['allCdt'] = $this->common_model->insert_id();
		
        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['allPdt2'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['content'] = $this->load->view("classes/classes-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    
        public function login_info() {
        $data = array();
        $data['active'] = "login_info";
        $data['title'] = "login info";
        $this->load->helper("form");
         $data['allPdt'] = $this->common_model->view_data("USER_LOGINS", "", "ID", "ASC");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['allPdt2'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['content'] = $this->load->view("admin/reports/login-info", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
	
	 public function log($message=NULL,$record_id= NULL,$action= NULL)
    {
    	$user_id= 1;

        $ip = $this->input->ip_address();

        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser() . ' ' . $this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {

            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }

        $platform = $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)

        $insert = array(
            'message'    => $message,
            'user_id'    => $user_id,
            'record_id'    => $record_id,
            'ip_address' => $ip,
            'platform'   => $platform,
            'agent'      => $agent,
            'action'     => $action,
        );
		
		print_r($insert);
		

       // $this->db->insert('logs', $insert);
    }
    public function onlineexam_reports() {
        $data = array();
        $data['active'] = "onlineexam_reports";
        $data['title'] = "Onlineexam Reports";
        $this->load->helper("form");


        // $data['allPdt'] = $this->common_model->view_data("USER_LOGINS", "", "ID", "ASC");
                 $data['allVdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
            $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
            $data['allQcd'] = $this->common_model->view_data("QUESTIONS_CORRECT", "", "ID", "ASC");
        $data['allCat'] = $this->common_model->view_data("ONLINEEXAM", "", "ID", "ASC");
        $sub = $this->input->post("search");
        if ($sub != NULL) {
            $data['allPdt'] = $this->reports_model->onlineexam_reports(
                     $this->input->post("exam_title")
            );
         
                }
           
        
        $data['content'] = $this->load->view("admin/reports/onlineexam_reports", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function ins_rep(){
            $data = array();
            $data['active'] = "search_income";
            $data['title'] = "Search Incom";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/reports/income_expense_report", $data, TRUE);
            $this->load->view("admin/master", $data);

    }

    public function income_expense_report(){

    
            $data = array();
            $data['active'] = "search_income";
            $data['title'] = "Search Incom";
            $this->load->helper("form");
    
            $search_type= $this->input->post("search_type");
            $specific_date="";
            $from_date="";
            $to_date="";

            if($search_type=="period"){
    
                $f = $this->input->post("from_date");
                $t =  $this->input->post("to_date");
                $from_date = $this->oracle_only_date_by_user($f);
                $to_date = $this->oracle_only_date_by_user($t);
                $period =  $this->income_model->get_income_by_period("ADD_INCOME", $from_date,$to_date,$specific_date,"ID","DESC");
                
                if($period){
                    $data['allPdt']=$period;
                }
               // $data['allPdt']= $this->expense_model->get_expense_by_period("ADD_EXPENSE", $from_date,$to_date,$specific_date,"ID","DESC");
                // echo '<pre>';
                // print_r($data['allPdt']);
                // echo '</pre>';
                // exit();
                
            }
            else if($search_type=="today"){
                $specific_date="today";
                $today = $this->income_model->get_income_by_period("ADD_INCOME", $from_date,$to_date,$specific_date,"ID","DESC");
                if($today){
                    $data['allPdt']= $today;
                }
              
               
               
            }else if($search_type=="this_week"){
                $specific_date="this_week";
                $this_week= $this->income_model->get_income_by_period("ADD_INCOME", $from_date,$to_date,$specific_date,"ID","DESC");
                if($this_week){
                    $data['allPdt']= $this_week;
                }
                
             
    
            }else if($search_type=="last_week"){
    
                $specific_date="last_week";
                $last_week = $this->income_model->get_income_by_period("ADD_INCOME", $from_date,$to_date,$specific_date,"ID","DESC");
                if($last_week){
                    $data['allPdt']=$last_week;
                }
               
              
    
            }else if($search_type=="this_month"){
                $specific_date="this_month";
                $this_month= $this->income_model->get_income_by_period_report("ADD_INCOME", $from_date,$to_date,$specific_date,"ID","DESC");
                if($this_month){
                    $data['allPdt']=$this_month;
                    // print_r($data['allPdt']);
                    // exit();
                }
              
            }
    
            $data['content'] = $this->load->view("admin/reports/income_expense_report", $data, TRUE);
            $this->load->view("admin/master", $data);
    
    

    } 

    public function income_expense_report2(){
       

        $data = array();
        $data['active'] = "search_expense";
        $data['title'] = "Search Expense";
        $this->load->helper("form");

        $search_type= $this->input->post("search_type");
        $specific_date="";
        $from_date="";
        $to_date="";
        if($search_type=="period"){

            $f = $this->input->post("from_date");
            $t =  $this->input->post("to_date");
            $from_date = $this->oracle_only_date_by_user($f);
            $to_date = $this->oracle_only_date_by_user($t);
            $period =  $this->expense_model->get_expense_by_period("ADD_EXPENSE", $from_date,$to_date,$specific_date,"ID","DESC");
            if($period){
                $data['allPdt2']=$period;
            }
           // $data['allPdt']= $this->expense_model->get_expense_by_period("ADD_EXPENSE", $from_date,$to_date,$specific_date,"ID","DESC");
            // echo '<pre>';
            // print_r($data['allPdt']);
            // echo '</pre>';
            // exit();
            
        }
        else if($search_type=="today"){
            $specific_date="today";
            $today = $this->expense_model->get_expense_by_period("ADD_EXPENSE", $from_date,$to_date,$specific_date,"ID","DESC");
            if($today){
                $data['allPdt2']= $today;
            }
          
           
           
        }else if($search_type=="this_week"){
            $specific_date="this_week";
            $this_week= $this->expense_model->get_expense_by_period("ADD_EXPENSE", $from_date,$to_date,$specific_date,"ID","DESC");
            if($this_week){
                $data['allPdt2']= $this_week;
            }
            
         

        }else if($search_type=="last_week"){

            $specific_date="last_week";
            $last_week = $this->expense_model->get_expense_by_period("ADD_EXPENSE", $from_date,$to_date,$specific_date,"ID","DESC");
            if($last_week){
                $data['allPdt2']=$last_week;
            }
           
          

        }else if($search_type=="this_month"){
            $specific_date="this_month";
            $this_month= $this->expense_model->get_expense_by_period("ADD_EXPENSE", $from_date,$to_date,$specific_date,"ID","DESC");
            if($this_month){
                $data['allPdt2']=$this_month;
            }
          
        }

       
    

        $data['content'] = $this->load->view("admin/reports/income_expense_report", $data, TRUE);
            $this->load->view("admin/master", $data);

    }
}
