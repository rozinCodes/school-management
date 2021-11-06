<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Income extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('download_center_model');
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        if (!$this->session->userdata('authenticated')) {
            redirect("login");
        }
    }

    
    public function index(){
        $data = array();
        $data['active'] = "income";
        $data['title'] = "Expense";
        $this->load->helper("form");


        $data['allPdt'] = $this->common_model->view_data("INCOME_CATEGORY", "", "ID", "DESC");

        $data['content'] = $this->load->view("admin/income/income_category", $data, true);
        $this->load->view("admin/master", $data);
    }

    public function add_income_category(){

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("income_category_name", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {

            $data = array();

            $data['active'] = "add_incm_category";

            $data['title'] = "Add Income Category";

            $this->load->helper("form");

            $data['allPdt'] = $this->common_model->view_data("INCOME_CATEGORY", "", "ID", "DESC");


            $data['content'] = $this->load->view("admin/income/income_category", $data, TRUE);

            $this->load->view("admin/master", $data);
        } else {


            $data = array(

                "CAT_NAME" => $this->input->post("income_category_name"),
                "DESCRIPTION"=>$this->input->post("income_description")
            );

            if ($this->common_model->save_data("INCOME_CATEGORY", $data)) {


                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/income/income", "refresh");
        }

    }

    public function edit_income_category()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("income_category_name", "Group Name", "required");
  
        if ($this->form_validation->run() == NULL) {
  
  
          $edit_id= $this->uri->segment('6');
      
          $data = array();
          
          $data['active'] = "groups";
          $data['edit'] = $edit_id;
  
          $data['title'] = "groups";
  
          $this->load->helper("form");
  
   
          $data['allPdt']= $this->common_model->view_data("INCOME_CATEGORY", "","ID","DESC");
          
         
          $data['content'] = $this->load->view("admin/income/income_category", $data, TRUE);
  
          $this->load->view("admin/master", $data);
  
      } else {
          
  
  
        $data = array(
            "CAT_NAME" => $this->input->post("income_category_name"),
            "DESCRIPTION"=>$this->input->post("income_description")
        );
                  $edit_id= $this->uri->segment('6');
  

  
          if ($this->common_model->edit("INCOME_CATEGORY", $data,$edit_id)) {
  
  
  
              $sdata['msg'] = "Edit Successful";
          } else {
              $sdata['msg'] = "Not Successfully Data Edit !!";
          }
          $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/income/income", "refresh");
      }
    }

    public function delete_income_category()
    {
        $delete_id= $this->uri->segment('6');


        if ($this->common_model->delete("INCOME_CATEGORY",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/income/income", "refresh");
    }

    public function add_income(){

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("income_name", "Group Name", "required");
      
        if ($this->form_validation->run() == NULL) {
          $data = array();
          $data['active'] = "add_income";
          $data['title'] = "Add Income";
          $this->load->helper("form");
          $data['allPdt']= $this->common_model->view_data("INCOME_CATEGORY", "","ID","DESC");
          $data['content'] = $this->load->view("admin/income/add_income", $data, TRUE);
          $this->load->view("admin/master", $data);
      } else {
            //---start
            $dataInfo = array();
            $files = $_FILES;
            $cpt = count($_FILES['pic']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['pic']['name'] = $files['pic']['name'][$i];
                $_FILES['pic']['type'] = $files['pic']['type'][$i];
                $_FILES['pic']['tmp_name'] = $files['pic']['tmp_name'][$i];
                $_FILES['pic']['error'] = $files['pic']['error'][$i];
                $_FILES['pic']['size'] = $files['pic']['size'][$i];


                $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
                $config['upload_path'] = "./uploads/expense/";
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                $this->upload->do_upload("pic");
                $dataInfo[] = $this->upload->data();
            }
      
      
          $EXPENSE_PURCHASE_DATE=$this->input->post("income_purchase_date");
          $date=$this->oracle_only_date_by_user($EXPENSE_PURCHASE_DATE);
      
      
      
          $data = array(
      
      
            
              "NAME" => $this->input->post("income_name"),
              "INVOICE_NO" => $this->input->post("invoice_no"),
              "INCOME_DATE" => $date,
              "AMOUNT" => $this->input->post("amount"),
              "ATTACHMENT" =>  $dataInfo[0]['file_name'],
              "INCOME_CAT_ID" => $this->input->post("income_category")
              
      
          );
          if ($this->common_model->save_data("ADD_INCOME", $data)) {
      
              $sdata['msg'] = "Save Successful";
          } else {
              $sdata['msg'] = "Not Successfully Data Insert !!";
          }
          $this->session->set_userdata($sdata);
          redirect(base_url() . "admin/income/income/add_income", "refresh");
      }
    }

    public function search_income(){
       

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
            $this_month= $this->income_model->get_income_by_period("ADD_INCOME", $from_date,$to_date,$specific_date,"ID","DESC");
            if($this_month){
                $data['allPdt']=$this_month;
            }
          
        }

       
    

        $data['content'] = $this->load->view("admin/income/search_income", $data, TRUE);
        $this->load->view("admin/master", $data);

    }

    public function edit_income()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("income_name", "Group Name", "required");
      
        if ($this->form_validation->run() == NULL) {
          $data = array();
          $data['active'] = "edit_income";
          $data['title'] = "Edit Income";
          $this->load->helper("form");

          $edit_id= $this->uri->segment('6');
          $where=array(
              "ID"=>$edit_id,
          );
          $data['edit'] = $edit_id;
          


          $data['allPdt']= $this->common_model->view_data("INCOME_CATEGORY", "","ID","DESC");
          $data['allPdt2']= $this->common_model->view_data2("ADD_INCOME",$where ,"ID","DESC");
        //   print_r( $data['allPdt2']);
        //   exit();


          $data['content'] = $this->load->view("admin/income/edit_income", $data, TRUE);
          $this->load->view("admin/master", $data);
      } else {
        $edit_id= $this->uri->segment('6');

       

       
            //---start
            $dataInfo = array();
            $files = $_FILES;
            $cpt = count($_FILES['pic']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['pic']['name'] = $files['pic']['name'][$i];
                $_FILES['pic']['type'] = $files['pic']['type'][$i];
                $_FILES['pic']['tmp_name'] = $files['pic']['tmp_name'][$i];
                $_FILES['pic']['error'] = $files['pic']['error'][$i];
                $_FILES['pic']['size'] = $files['pic']['size'][$i];


                $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
                $config['upload_path'] = "./uploads/expense/";
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                $this->upload->do_upload("pic");
                $dataInfo[] = $this->upload->data();
            }
      
      
          $EXPENSE_PURCHASE_DATE=$this->input->post("income_purchase_date");
          $date=$this->oracle_only_date_by_user($EXPENSE_PURCHASE_DATE);
      
      
      
          $data = array(
      
      
            
              "NAME" => $this->input->post("income_name"),
              "INVOICE_NO" => $this->input->post("invoice_no"),
              "INCOME_DATE" => $date,
              "AMOUNT" => $this->input->post("amount"),
              "ATTACHMENT" =>  $dataInfo[0]['file_name'],
              "INCOME_CAT_ID" => $this->input->post("income_category")
              
      
          );
          if ($this->common_model->edit("ADD_INCOME", $data,$edit_id)) { 
      
              $sdata['msg'] = "Edit Successful";
          } else {
              $sdata['msg'] = "Not Successfully Data Edit !!";
          }
          $this->session->set_userdata($sdata);
          redirect(base_url() . "admin/income/income/search_income", "refresh");
      }
    }

    public function delete_income()
    {
        $delete_id= $this->uri->segment('6');


        if ($this->common_model->delete("ADD_INCOME",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/income/income/search_income", "refresh");
    }

}