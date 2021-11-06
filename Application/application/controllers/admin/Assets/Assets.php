<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Assets extends CI_Controller
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

    

            // echo '<pre>';
            // print_r($data['allPdt']);
            // echo '</pre>';
            // exit();

    public function index(){
       
        $data = array();
        $data['active'] = "assets";
        $data['title'] = "Assets";
        $this->load->helper("form");


        $data['allPdt'] = $this->common_model->view_data("ASSET_CATEGORY", "", "ID", "DESC");

        $data['content'] = $this->load->view("admin/assets/assets_category", $data, true);
        $this->load->view("admin/master", $data);
    }

    public function add_assets_category(){

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("assets_category_name", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {

            $data = array();

            $data['active'] = "add_assets_category";

            $data['title'] = "Add Assets Category";

            $this->load->helper("form");

            $data['allPdt'] = $this->common_model->view_data("ASSET_CATEGORY", "", "ID", "DESC");


            $data['content'] = $this->load->view("admin/assets/assets_category", $data, TRUE);

            $this->load->view("admin/master", $data);
        } else {


            $data = array(

                "CAT_NAME" => $this->input->post("assets_category_name"),
                "DESCRIPTION"=>$this->input->post("assets_description")
            );

            if ($this->common_model->save_data("ASSET_CATEGORY", $data)) {


                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/assets/assets", "refresh");
        }

    }

    public function edit_assets_category()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("assets_category_name", "Group Name", "required");
  
        if ($this->form_validation->run() == NULL) {
  
  
          $edit_id= $this->uri->segment('6');
      
          $data = array();
          
          $data['active'] = "groups";
          $data['edit'] = $edit_id;
  
          $data['title'] = "groups";
  
          $this->load->helper("form");
  
   
          $data['allPdt']= $this->common_model->view_data("ASSET_CATEGORY", "","ID","DESC");
          
         
          $data['content'] = $this->load->view("admin/assets/assets_category", $data, TRUE);
  
          $this->load->view("admin/master", $data);
  
      } else {
          
  
  
        $data = array(

            "CAT_NAME" => $this->input->post("assets_category_name"),
            "DESCRIPTION"=>$this->input->post("assets_description")
        );
                  $edit_id= $this->uri->segment('6');
  

  
          if ($this->common_model->edit("ASSET_CATEGORY", $data,$edit_id)) {
  
  
  
              $sdata['msg'] = "Edit Successful";
          } else {
              $sdata['msg'] = "Not Successfully Data Edit !!";
          }
          $this->session->set_userdata($sdata);
          redirect(base_url() . "admin/assets/assets", "refresh");
      }
    }

    public function delete_assets_category()
    {
        $delete_id= $this->uri->segment('6');


        if ($this->common_model->delete("ASSET_CATEGORY",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/assets/assets", "refresh");
    }

    public function add_assets(){

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("assets_name", "Group Name", "required");
      
        if ($this->form_validation->run() == NULL) {
          $data = array();
          $data['active'] = "add_assets";
          $data['title'] = "Add Assets";
          $this->load->helper("form");
          $data['allPdt']= $this->common_model->view_data("ASSET_CATEGORY", "","ID","DESC");
          $data['content'] = $this->load->view("admin/assets/add_assets", $data, TRUE);
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
      
      
          $EXPENSE_PURCHASE_DATE=$this->input->post("assets_purchase_date");
          $date=$this->oracle_only_date_by_user($EXPENSE_PURCHASE_DATE);
      
      
      
          $data = array(
      
      
            
              "NAME" => $this->input->post("assets_name"),
              "INVOICE_NO" => $this->input->post("invoice_no"),
              "ISSUE_DATE" => $date,
              "AMOUNT" => $this->input->post("amount"),
              "ATTACHMENT" =>  $dataInfo[0]['file_name'],
              "CAT_ID" => $this->input->post("assets_category")
              
      
          );
          if ($this->common_model->save_data("ADD_ASSET", $data)) {
      
              $sdata['msg'] = "Save Successful";
          } else {
              $sdata['msg'] = "Not Successfully Data Insert !!";
          }
          $this->session->set_userdata($sdata);
          redirect(base_url() . "admin/assets/assets/add_assets", "refresh");
      }
    }
    public function edit_assets()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("assets_name", "Group Name", "required");
      
        if ($this->form_validation->run() == NULL) {
          $data = array();
          $data['active'] = "edit_assets";
          $data['title'] = "Edit Assets";
          $this->load->helper("form");

          $edit_id= $this->uri->segment('6');
          $where=array(
              "ID"=>$edit_id,
          );
          $data['edit'] = $edit_id;
          


          $data['allPdt']= $this->common_model->view_data("ASSET_CATEGORY", "","ID","DESC");
          $data['allPdt2']= $this->common_model->view_data2("ADD_ASSET",$where ,"ID","DESC");
        //   print_r( $data['allPdt2']);
        //   exit();


          $data['content'] = $this->load->view("admin/assets/edit_assets", $data, TRUE);
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
      
      
          $EXPENSE_PURCHASE_DATE=$this->input->post("expense_purchase_date");
          $date=$this->oracle_only_date_by_user($EXPENSE_PURCHASE_DATE);
      
      
      
          $data = array(
      
      
            
              "NAME" => $this->input->post("assets_name"),
              "INVOICE_NO" => $this->input->post("invoice_no"),
              "ISSUE_DATE" => $date,
              "AMOUNT" => $this->input->post("amount"),
              "ATTACHMENT" =>  $dataInfo[0]['file_name'],
              "CAT_ID" => $this->input->post("assets_category")
              
      
          );
          if ($this->common_model->edit("ADD_ASSET", $data,$edit_id)) { 
      
              $sdata['msg'] = "Edit Successful";
          } else {
              $sdata['msg'] = "Not Successfully Data Edit !!";
          }
          $this->session->set_userdata($sdata);
          redirect(base_url() . "admin/assets/assets/search_assets", "refresh");
      }
    }

    public function delete_assets()
    {
        $delete_id= $this->uri->segment('6');


        if ($this->common_model->delete("ADD_ASSET",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
          redirect(base_url() . "admin/assets/assets/search_assets", "refresh");

    }

    public function search_assets(){
       

        $data = array();
        $data['active'] = "search_assets";
        $data['title'] = "Search Assets";
        $this->load->helper("form");

        $data['asset_cat']=$this->common_model->view_data("ASSET_CATEGORY","","ID","DESC");

        $assettypeid = $this->input->post("search_type");
      
        

        if($assettypeid>-1)
        {
            
            $data['allPdt']=$this->asset_search_model->search_asset("ADD_ASSET", $assettypeid,"ID","DESC");

            $data['allPdtCount']=$this->asset_search_model->count_asset("ADD_ASSET", $assettypeid,"ID","DESC");
        }
        else if($assettypeid==-1)
        {
       
            $data['allPdt']=$this->asset_search_model->search_asset("ADD_ASSET", "" ,"ID","DESC");

            $data['allPdtCount']=$this->asset_search_model->count_asset("ADD_ASSET", "" ,"ID","DESC");
        }

        

      






        
        $data['content'] = $this->load->view("admin/assets/search_assets", $data, TRUE);
          $this->load->view("admin/master", $data);


    }
}