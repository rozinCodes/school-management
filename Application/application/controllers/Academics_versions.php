<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Academics_versions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        if (!$this->session->userdata('authenticated')) {
            redirect("login");
        }
    }

    public function index() {

        if (!$this->rbac->hasPrivilege('income', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('top_menu', 'Income');
        $this->session->set_userdata('sub_menu', 'income/index');
        $data['title'] = 'Add Income';
        $data['title_list'] = 'Recent Incomes';
        $this->form_validation->set_rules('inc_head_id', $this->lang->line('income_head'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('amount', $this->lang->line('amount'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('date', $this->lang->line('date'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('documents', $this->lang->line('documents'), 'callback_handle_upload');
        if ($this->form_validation->run() == false) {
            
        } else {
            $data = array(
                'inc_head_id' => $this->input->post('inc_head_id'),
                'name' => $this->input->post('name'),
                'date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                'amount' => $this->input->post('amount'),
                'invoice_no' => $this->input->post('invoice_no'),
                'note' => $this->input->post('description'),
                'documents' => $this->input->post('documents'),
            );
            $insert_id = $this->income_model->add($data);
            if (isset($_FILES["documents"]) && !empty($_FILES['documents']['name'])) {
                $fileInfo = pathinfo($_FILES["documents"]["name"]);
                $img_name = $insert_id . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["documents"]["tmp_name"], "./uploads/school_income/" . $img_name);
                $data_img = array('id' => $insert_id, 'documents' => 'uploads/school_income/' . $img_name);
                $this->income_model->add($data_img);
            }
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/income/index');
        }

        $income_result = $this->income_model->get();
        $data['incomelist'] = $income_result;
        $incomeHead = $this->incomehead_model->get();
        $data['incheadlist'] = $incomeHead;
        $this->load->view('layout/header', $data);
        $this->load->view('admin/income/incomeList', $data);
        $this->load->view('layout/footer', $data);
    }

    

    public function bangla() {
        $data = array();
        $data['active'] = "classes";
        $data['title'] = "classes";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("classes", "", "id", "asc");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['content'] = $this->load->view("academics_version/bangla_version", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function class_book() {
           $data = array();
        $data['active'] = "classes";
        $data['title'] = "classes";
        $this->load->helper("form");
        $code=$this->input->get("code");
          $data['allCdt'] = $this->common_model->view_data("subjects", "", "id", "asc");
        $data['allPdt'] = $this->common_model->view_data("classes", "", "id", "asc");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['content'] = $this->load->view("academics_version/class_book", $data, TRUE);
        $this->load->view("admin/master", $data);
       
    }

   public function flip_book() {
           $data = array();
        $data['active'] = "classes";
        $data['title'] = "classes";
        $this->load->helper("form");
          $data['allCdt'] = $this->common_model->view_data("subjects", "", "id", "asc");
        $data['allPdt'] = $this->common_model->view_data("classes", "", "id", "asc");
          $data['allEbook'] = $this->common_model->view_data("ebook", "", "page", "asc");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['content'] = $this->load->view("academics_version/flip_book", $data, TRUE);
        $this->load->view("admin/master", $data);
       
    }



    public function video() {
        if (!$this->rbac->hasPrivilege('bangla', 'bangla_version')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'academics_version');
        $this->session->set_userdata('sub_menu', 'academics_version/chapter_part');
        $data['title'] = 'academics version';
        $data['title_list'] = 'academics_version';
        $income_result = $this->income_model->get();
        $data['incomelist'] = $academics_version;
        $incomeHead = $this->incomehead_model->get();
        $vehicle_result = $this->section_model->get();
        $data['vehiclelist'] = $vehicle_result;

        $vehroute_result = $this->classsection_model->getByID();

        $data['vehroutelist'] = $vehroute_result;
        $data['incheadlist'] = $academics_version;
        $this->load->view('layout/header', $data);
        $this->load->view('academics_version/bangla/chapter_video', $data);
        $this->load->view('layout/footer', $data);
    }

    public function book_upload() {
        if (!$this->rbac->hasPrivilege('bangla', 'bangla_version')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'tsc');
        $this->session->set_userdata('sub_menu', 'tsc/book_upload');
        $data['title'] = 'book_upload';
        $data['title_list'] = 'book_upload';
        $income_result = $this->income_model->get();
        $data['incomelist'] = $academics_version;
        $incomeHead = $this->incomehead_model->get();
        $vehicle_result = $this->section_model->get();
        $data['vehiclelist'] = $vehicle_result;

        $vehroute_result = $this->classsection_model->getByID();

        $data['vehroutelist'] = $vehroute_result;
        $data['incheadlist'] = $academics_version;
        $this->load->view('layout/header', $data);
        $this->load->view('academics_version/book_upload', $data);
        $this->load->view('layout/footer', $data);
    }
    
       public function ebook_upload() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("page_no", "page_no", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "subjects";
            $data['title'] = "subjects";
            $this->load->helper("form");
            $data['allCls'] = $this->common_model->view_data("classes", "", "id", "asc");
            $data['allSub'] = $this->common_model->view_data("subjects", "", "id", "asc");
            $data['allPdt'] = $this->common_model->view_data("sections", "", "id", "desc");
            $data['content'] = $this->load->view("academics/ebook_upload", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
            //image upload
            $ext = "";
            if ($_FILES['pic']['name'] != "") {
                $ext = pathinfo($_FILES['pic']['name']);
                $ext = strtolower($ext['extension']);
            }


            $data = array(
                "staffid" =>$this->session->userdata('id'),
                "subjectsid" => $this->input->post("subjectsid"),
                 "picture" => $ext,
                "page" => $this->input->post("page_no"),
                "active" => 1,
                
            );
            if ($this->common_model->save_data("ebook", $data)) {
                $id = $this->common_model->Id;

                if ($ext != "") {
                    $config = array();
                    $config['upload_path'] = "./upload/book/ebook/";   //destination of image folder --'./product/'
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
                    $config['max_size'] = 9024;   //Maximum size in kilo bite -- '10000'
                    $config['max_width'] = 9680;   // image width -- '2000'
                    $config['max_height'] = 9680;  // image height -- '1500'
                    $config['file_name'] = "bangla_version-{$id}.{$ext}";  // image file name in destination folder -- "2.jpg"
                    $this->load->library('upload');
                    $this->upload->initialize($config); //upload image data
                    $this->upload->do_upload("pic"); // upload image file
                }
                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "academics_version/ebook_upload", "refresh");
        }
    }

}
