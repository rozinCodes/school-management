<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        //  $mytype = $this->session->userdata("mytype");
    }

    
    /*public function index()
    {
        
   
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['allPdt']= $this->common_model->view_data("asset_type", "","id","DESC");
        $data['content'] = $this->load->view("admin/assets/add_asset_type", $data, TRUE);
        $this->load->view("admin/master", $data);
    }*/


    public function add_asset_type()
    {
      $this->load->helper("form");
      $this->load->library("form_validation");
      $this->form_validation->set_rules("asset_type_name", "Group Name", "required");

      if ($this->form_validation->run() == NULL) {

        $data = array();
        
        $data['active'] = "groups";

        $data['title'] = "groups";

        $this->load->helper("form");

        $data['allPdt']= $this->common_model->view_data("ASSET_TYPE", "","ID","DESC");
        
       
        $data['content'] = $this->load->view("admin/assets/add_asset_type", $data, TRUE);

        $this->load->view("admin/master", $data);

    } else {


        $data = array(

            "NAME" => $this->input->post("asset_type_name")
        );

        if ($this->common_model->save_data("ASSET_TYPE", $data)) {
            

            $sdata['msg'] = "Save Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Insert !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/assets/asset/add_asset_type", "refresh");
    }
}





public function delete_asset_type()
{
      $delete_id= $this->uri->segment('6');


        if ($this->common_model->delete("ASSET_TYPE",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/assets/asset/add_asset_type", "refresh");

      
}

 public function edit_asset_type()
    {


      $this->load->helper("form");
      $this->load->library("form_validation");
      $this->form_validation->set_rules("asset_type_name", "Group Name", "required");

      if ($this->form_validation->run() == NULL) {


        $edit_id= $this->uri->segment('6');
    //echo 
        $data = array();
        
        $data['active'] = "groups";
        $data['edit'] = $edit_id;

        $data['title'] = "groups";

        $this->load->helper("form");

              /*print_r($data);
                echo $edit_id;
                exit();
*/

        $data['allPdt']= $this->common_model->view_data("ASSET_TYPE", "","ID","DESC");
        
       
        $data['content'] = $this->load->view("admin/assets/add_asset_type", $data, TRUE);

        $this->load->view("admin/master", $data);

    } else {
        


        $data = array(

            "NAME" => $this->input->post("asset_type_name"),
            
        );
                $edit_id= $this->uri->segment('6');

/*                print_r($data);
                echo $edit_id;
                exit();
*/

       
        

        if ($this->common_model->edit("ASSET_TYPE", $data,$edit_id)) {



            $sdata['msg'] = "Edit Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Edit !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/assets/asset/add_asset_type", "refresh");
    }
}



public function add_asset()
{
    
  $this->load->helper("form");
  $this->load->library("form_validation");
  $this->form_validation->set_rules("asset_name", "Group Name", "required");

  if ($this->form_validation->run() == NULL) {
    $data = array();
    $data['active'] = "groups";
    $data['title'] = "groups";
    $this->load->helper("form");
    $data['allPdt']= $this->common_model->view_data("ASSET_TYPE", "","ID","DESC");
    $data['allPdt4']= $this->common_model->view_data("ASSET_NAME", "","ID","DESC");
    $data['content'] = $this->load->view("admin/assets/add_asset", $data, TRUE);
    $this->load->view("admin/master", $data);
} else {

    $assettypeid = $this->input->post("asset_type");
   $set_asset_id_and_type = (preg_split('#(?<=\d)(?=[a-z])#i', $assettypeid));

   $assetnameid = $this->input->post("asset_name");
    $set_asset_id_and_name = (preg_split('#(?<=\d)(?=[a-z])#i', $assetnameid));

    $ASSET_PURCHASE_DATE=$this->input->post("asset_purchase_date");
    $date=$this->oracle_onlydate($ASSET_PURCHASE_DATE);

  
   

    $data = array(


        "ASSET_TYPE" => $set_asset_id_and_type[1],
        "ASSET_TYPE_ID" => $set_asset_id_and_type[0],
        "ASSET_NAME" => $set_asset_id_and_name[1],
        "ASSET_NAME_ID" => $set_asset_id_and_name[0],
       // "asset_quantity" => $this->input->post("asset_quantity"),
        "ASSET_SERIAL" => $this->input->post("asset_serial"),
        "ASSET_PRICE" => $this->input->post("asset_price"),
        "ASSET_PURCHASE_DATE" => $date,
        "ASSET_PURCHASE_BY" => $this->input->post("asset_purchase_by"),
        "ASSET_DOCUMENT" => $this->input->post("asset_document"),
        "ASSET_DESCRIPTION" => $this->input->post("asset_description")

    );
    if ($this->common_model->save_data("ASSETS", $data)) {

        $sdata['msg'] = "Save Successful";
    } else {
        $sdata['msg'] = "Not Successfully Data Insert !!";
    }
    $this->session->set_userdata($sdata);
    redirect(base_url() . "admin/assets/asset/add_asset", "refresh");
}
}

public function asset_details(){

        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['allPdt']= $this->common_model->view_data("ASSET_TYPE", "","ID","DESC");
        $data['allPdt3']=0;///defolt product count
        $data['content'] = $this->load->view("admin/assets/asset_details", $data, TRUE);
        $this->load->view("admin/master", $data);

}
public function asset_search(){

        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
       // $data['allPdt']= $this->common_model->view_data("asset_type", "","id","DESC");
        $assettypeid = $this->input->post("ASSET_TYPE");
        /*print_r($assettypeid);
        exit();*/

        
     

        $data['allPdt2']=$this->asset_search_model->search_asset("ASSETS", $assettypeid,"ID","DESC");
        //$data['allPdt2']=$this->common_model->view_data("assets", "","id","DESC");
        $data['allPdt']= $this->common_model->view_data("ASSET_TYPE", "","ID","DESC");



        $data['allPdt3']=$this->asset_search_model->count_asset("ASSETS", $assettypeid,"ID","DESC");
       /* echo $count_asset;
        print_r($count_asset);
        exit();*/


        $data['content'] = $this->load->view("admin/assets/asset_details", $data, TRUE);
        $this->load->view("admin/master", $data);

}

public function edit_asset()
{
    $this->load->helper("form");
    $this->load->library("form_validation");
    $this->form_validation->set_rules("asset_name", "Group Name", "required");

    if ($this->form_validation->run() == NULL) {


      $edit_id= $this->uri->segment('6');
      
  //echo 
      $data = array();
      
      $data['active'] = "groups";
      $data['edit'] = $edit_id;

      $data['title'] = "groups";

      $this->load->helper("form");

            /*print_r($data);
              echo $edit_id;
              exit();
*/
      $data['allPdt']= $this->common_model->view_data("ASSET_TYPE", "","ID","DESC");
      $data['allPdt4']= $this->common_model->view_data("ASSET_NAME", "","ID","DESC");
      $data['allPdt5']= $this->common_model->view_data("ASSETS", "","ID","DESC");
    //   print_r($data['allPdt5']);
    //   exit();
      $data['content'] = $this->load->view("admin/assets/edit_asset", $data, TRUE);

      $this->load->view("admin/master", $data);

  } else {
      


    $assettypeid = $this->input->post("asset_type");
    $set_asset_id_and_type = (preg_split('#(?<=\d)(?=[a-z])#i', $assettypeid));
 
    $assetnameid = $this->input->post("asset_name");
     $set_asset_id_and_name = (preg_split('#(?<=\d)(?=[a-z])#i', $assetnameid));
 
     $ASSET_PURCHASE_DATE=$this->input->post("asset_purchase_date");
     $date=$this->oracle_onlydate($ASSET_PURCHASE_DATE);
 
   
    
 
     $data = array(
 
 
         "ASSET_TYPE" => $set_asset_id_and_type[1],
         "ASSET_TYPE_ID" => $set_asset_id_and_type[0],
         "ASSET_NAME" => $set_asset_id_and_name[1],
         "ASSET_NAME_ID" => $set_asset_id_and_name[0],
        // "asset_quantity" => $this->input->post("asset_quantity"),
         "ASSET_SERIAL" => $this->input->post("asset_serial"),
         "ASSET_PRICE" => $this->input->post("asset_price"),
         "ASSET_PURCHASE_DATE" => $date,
         "ASSET_PURCHASE_BY" => $this->input->post("asset_purchase_by"),
         "ASSET_DOCUMENT" => $this->input->post("asset_document"),
         "ASSET_DESCRIPTION" => $this->input->post("asset_description")
 
     );
              $edit_id= $this->uri->segment('6');


echo $edit_id;
exit();
     
      

      if ($this->common_model->edit("ASSET_NAME", $data,$edit_id)) {



          $sdata['msg'] = "Edit Successful";
      } else {
          $sdata['msg'] = "Not Successfully Data Edit !!";
      }
      $this->session->set_userdata($sdata);
    redirect(base_url() . "admin/assets/asset/asset_details", "refresh");
  }
}


public function add_asset_product(){

      $this->load->helper("form");
      $this->load->library("form_validation");
      $this->form_validation->set_rules("asset_product_name", "Group Name", "required");

      if ($this->form_validation->run() == NULL) {
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['allPdt']= $this->common_model->view_data("ASSET_NAME", "","ID","DESC");
        $data['content'] = $this->load->view("admin/assets/add_asset_product", $data, TRUE);
        $this->load->view("admin/master", $data);
    } else {

        $data = array(

            "NAME" => $this->input->post("asset_product_name")
        );
        if ($this->common_model->save_data("ASSET_NAME", $data)) {

            $sdata['msg'] = "Save Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Insert !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/assets/asset/add_asset_product", "refresh");
    }

}
public function edit_asset_product()
{
    $this->load->helper("form");
    $this->load->library("form_validation");
    $this->form_validation->set_rules("asset_product_name", "Group Name", "required");

    if ($this->form_validation->run() == NULL) {


      $edit_id= $this->uri->segment('6');
  //echo 
      $data = array();
      
      $data['active'] = "groups";
      $data['edit'] = $edit_id;

      $data['title'] = "groups";

      $this->load->helper("form");

            /*print_r($data);
              echo $edit_id;
              exit();
*/

      $data['allPdt']= $this->common_model->view_data("ASSET_NAME", "","ID","DESC");
      
     
      $data['content'] = $this->load->view("admin/assets/add_asset_product", $data, TRUE);

      $this->load->view("admin/master", $data);

  } else {
      


      $data = array(

        "NAME" => $this->input->post("asset_product_name")
          
      );
              $edit_id= $this->uri->segment('6');



     
      

      if ($this->common_model->edit("ASSET_NAME", $data,$edit_id)) {



          $sdata['msg'] = "Edit Successful";
      } else {
          $sdata['msg'] = "Not Successfully Data Edit !!";
      }
      $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/assets/asset/add_asset_product", "refresh");
  }
}

public function delete_asset_product()
{
   
    $delete_id= $this->uri->segment('6');


    if ($this->common_model->delete("ASSET_NAME",$delete_id)) {



        $sdata['msg'] = "Delete Successful";
    } else {
        $sdata['msg'] = "Not Successfully Data Delete !!";
    }
    $this->session->set_userdata($sdata);
    redirect(base_url() . "admin/assets/asset/add_asset_product", "refresh");
}


}
