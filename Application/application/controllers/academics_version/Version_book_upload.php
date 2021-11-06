<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Version_book_upload extends CI_Controller {

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
        $data = array();
        $data['active'] = "classes";
        $data['title'] = "classes";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("classes", "", "id", "asc");
        $data['allSdt'] = $this->common_model->Class_Sections();
        // $data['content'] = $this->load->view("academics_version/english_version", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function ebook_upload() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("page_no", "page_no", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "ebook_upload";
            $data['title'] = "ebook upload";
            $this->load->helper("form");
            $data['allLpdf'] = $this->academics_model->Subject_Book_Ebook();
            $data['allVdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
            $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
            $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "ID", "ASC");
            $data['content'] = $this->load->view("academics_version/ebook_upload", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
            //image upload
            $ext = "";
            if ($_FILES['pic']['name'] != "") {
                $ext = pathinfo($_FILES['pic']['name']);
                $ext = strtolower($ext['extension']);
            }


            $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
            $config['upload_path'] = "./upload/book/ebook/";
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload("pic");

            $date = date("Y-m-d");

            $data = array(
                "STAFFID" => $this->session->userdata('id'),
                "SUBJECTSID" => $this->input->post("subjectsid"),
                "VERSIONS" => $this->input->post("versions"),
                "PICTURE" => $this->upload->data('file_name'),
                "PAGE" => $this->input->post("page_no"),
                "ACTIVE" => 1,
                "CREATED_AT" => $this->oracle_onlydate($date)
            );
            if ($this->common_model->save_data("LECTURE_EBOOK", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "academics_version/version_book_upload/ebook_upload", "refresh");
        }
    }

    public function go_live() {


        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Title", "required");

        if ($this->form_validation->run() == NULL) {

            $data = array();
            $data['active'] = "go_live";
            $data['title'] = "go_live";
            $this->load->helper("form");
            $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
            $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
            $data['allGdt'] = $this->common_model->view_data("GO_LIVE", "", "ID", "desc");
            // print_r($data['allGdt']);
            // exit();
            $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "ID", "ASC");
            $data['allVdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['content'] = $this->load->view("academics_version/go_live", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
            $myname = $this->session->userdata('fname');
            //$url = "https://meet.jit.si/$myname";
            $url = "https://kotha.waltonbd.com/$myname";
            $date = date("Y-m-d H:i:s");
            $data = array(
                "STAFFID" => $this->session->userdata('id'),
                "TITLE" => $this->input->post("title"),
                "CLASSESID" => $this->input->post("classesid"),
                "SUBJECTSID" => $this->input->post("subjectsid"),
                "VERSIONSID" => $this->input->post("versions"),
                "URL" => $url,
                "STATUS" => 1,
                "DATETIME" => $this->oracle_date($date)
            );
            if ($this->common_model->save_data("GO_LIVE", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect($url);
        }
    }

    public function live_stop($id) {
        $date = date("Y-m-d H:i:s");
        $data = array(
            "STATUS" => 0,
            "ENDTIME" => $this->oracle_date($date)
        );
        if ($this->common_model->update("GO_LIVE", $data, array("ID" => $id))) {

            $sdata['msg'] = "update successfull";
        } else {
            $sdata['msg'] = "Product Err";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "academics_version/version_book_upload/go_live", "refresh");
    }

    public function lecture_video_upload() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "title", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "subjects";
            $data['title'] = "subjects";
            $this->load->helper("form");
            $data['allLpdf'] = $this->academics_model->Subject_Book_Video();
            $data['allVdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
            $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
            $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "ID", "ASC");
            $data['content'] = $this->load->view("academics_version/lecture_video_upload", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {


            $config['allowed_types'] = 'mp4|webm|mkv|avi';  //supported image
            $config['upload_path'] = "./upload/book/video/";
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload("upload_video");

            // $config['max_size'] = 9024;   //Maximum size in kilo bite -- '10000'
            //// $config['max_width'] = 9680;   // image width -- '2000'
            // $config['max_height'] = 9680;  // image height -- '1500'
            //$config['file_name'] = "english_version-{$id}.{$ext}";  // image file name in destination folder -- "2.jpg"
            //$this->upload->initialize($config); //upload image data
            //$this->upload->do_upload("pic"); // upload image file
            $str = $this->input->post("video_link");
		
            $date = date("Y-m-d");
            $data = array(
                "STAFFID" => $this->session->userdata('id'),
                "SUBJECTSID" => $this->input->post("subjectsid"),
                "TITLE" => $this->input->post("title"),
                "LECTURE_PART" => $this->input->post("lecture_part"),
                "LECTURE_BY" => $this->input->post("lecture_by"),
                "VERSIONS" => $this->input->post("versions"),
                "VIDEO_FILE" => $this->upload->data('file_name'),
                "ACTIVE" => 1,
                "DATE_TIME" => $this->oracle_onlydate($date),
                "VIDEO_TYPE" => $this->input->post("video_type"),
                
            );
	if($str==2){

            $h = explode("=", $str);
            $video_link = $h[1];
			$data['VIDEO_LINK'] = $video_link;
		}
            if ($this->common_model->save_data("LECTURE_VIDEO", $data)) {
                $id = $this->common_model->Id;

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "academics_version/version_book_upload/lecture_video_upload", "refresh");
        }
    }

    public function ebook_delete($id) {
        $dt = $this->common_model->view_data("LECTURE_EBOOK", array("ID" => $id), "ID", "ASC");
        if ($dt) {
            $this->academics_model->delete_data("LECTURE_EBOOK", array("ID" => $id));
            foreach ($dt as $pdt) {
                if (file_exists("upload/book/ebook/{$pdt->PICTURE}")) {
                    unlink("upload/book/ebook/{$pdt->PICTURE}");
                }
            }
            $sdata['msg'] = "Delete successfull";
        } else {
            $sdata['msg'] = "Delete Err";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "academics_version/version_book_upload/ebook_upload", "refresh");
    }

    public function video_delete($id) {
        $dt = $this->common_model->view_data("LECTURE_VIDEO", array("ID" => $id), "ID", "ASC");
        if ($dt) {
            $this->academics_model->delete_data("LECTURE_VIDEO", array("ID" => $id));
            foreach ($dt as $pdt) {
                if (file_exists("upload/book/video/{$value->VIDEO_FILE}")) {
                    unlink("upload/book/video/{$value->VIDEO_FILE}");
                }
            }
            $sdata['msg'] = "Delete successfull";
        } else {
            $sdata['msg'] = "Delete Err";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "academics_version/version_book_upload/lecture_video_upload", "refresh");
    }

    public function lecture_power_point_upload() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "title", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "upload_power_point";
            $data['title'] = "upload power point";
            $this->load->helper("form");
            $data['allLpdf'] = $this->academics_model->Subject_Book_PowerPoint();
            $data['allVdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
            $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
            $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "ID", "ASC");
            $data['content'] = $this->load->view("academics_version/lecture_power_point_upload", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {


            $config['allowed_types'] = 'pptx|ppt|ppsx|ppsm';  //supported image
            $config['upload_path'] = "./upload/book/power_point/";
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload("upload_power_point");

            // $config['max_size'] = 9024;   //Maximum size in kilo bite -- '10000'
            //// $config['max_width'] = 9680;   // image width -- '2000'
            // $config['max_height'] = 9680;  // image height -- '1500'
            //$config['file_name'] = "english_version-{$id}.{$ext}";  // image file name in destination folder -- "2.jpg"
            //$this->upload->initialize($config); //upload image data
            //$this->upload->do_upload("pic"); // upload image file
            $date = date("Y-m-d");

            $data = array(
                "STAFFID" => $this->session->userdata('id'),
                "SUBJECTSID" => $this->input->post("subjectsid"),
                "TITLE" => $this->input->post("title"),
                "CHAPTER_NAME" => $this->input->post("chapter_name"),
                "LECTURE_PART" => $this->input->post("lecture_part"),
                "LECTURE_BY" => $this->input->post("lecture_by"),
                "VERSIONS" => $this->input->post("versions"),
                "FILES_NAME" => $this->upload->data('file_name'),
                "ACTIVE" => 1,
                "DATE_TIME" => $this->oracle_onlydate($date)
            );
            if ($this->common_model->save_data("LECTURE_POWER_POINT", $data)) {
                $id = $this->common_model->Id;

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "academics_version/version_book_upload/lecture_power_point_upload", "refresh");
        }
    }

    public function lecture_pdf_upload() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("versions", "versions", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "subjects";
            $data['title'] = "lecture_pdf";
            $this->load->helper("form");
            $data['allLpdf'] = $this->academics_model->Subject_Book_Pdf();
            $data['allVdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
            $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
            $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "ID", "ASC");
            $data['content'] = $this->load->view("academics_version/lecture_pdf_upload", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {


            $config['allowed_types'] = 'pdf|avi';  //supported image
            $config['upload_path'] = "./upload/book/pdf/";
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload("upload_video");

            // $config['max_size'] = 9024;   //Maximum size in kilo bite -- '10000'
            //// $config['max_width'] = 9680;   // image width -- '2000'
            // $config['max_height'] = 9680;  // image height -- '1500'
            //$config['file_name'] = "english_version-{$id}.{$ext}";  // image file name in destination folder -- "2.jpg"
            //$this->upload->initialize($config); //upload image data
            //$this->upload->do_upload("pic"); // upload image file

            $date = date("Y-m-d");
            $data = array(
                "STAFFID" => $this->session->userdata('id'),
                "SUBJECTSID" => $this->input->post("subjectsid"),
                "VERSIONS" => $this->input->post("versions"),
                "FILES_NAME" => $this->upload->data('file_name'),
                "ACTIVE" => 1,
                "DATE_TIME" => $this->oracle_onlydate($date)
            );
            if ($this->common_model->save_data("LECTURE_PDF", $data)) {
                $id = $this->common_model->Id;

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "academics_version/version_book_upload/lecture_pdf_upload", "refresh");
        }
    }

    // file downloader
    public function download() {
        $encrypt_name = $this->input->get('file');
        $type = $this->input->get('type');
        //if ($type == 'reply') {
        //   $table = 'message_reply';
        //} else {
        $table = 'LECTURE_POWER_POINT';
        // }
        $file_name = $this->db->select('FILES_NAME')->where('FILES_NAME', $encrypt_name)->get($table)->row()->FILES_NAME;
        $this->load->helper('download');
        force_download($file_name, file_get_contents('upload/book/power_point/' . $encrypt_name));
    }

    public function lecture_pdf_delete() {

        $delete_id = $this->uri->segment('5');
        exit();


        if ($this->common_model->delete("LECTURE_PDF", $delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "academics_version/version_book_upload/lecture_pdf_upload", "refresh");
    }
    
    
    public function powerpoint_delete($id) {

    $dt = $this->common_model->view_data("LECTURE_POWER_POINT", array("ID" => $id), "ID", "ASC");
   
        if ($dt) {
            $this->common_model->delete_data("LECTURE_POWER_POINT", array("ID" => $id));
            foreach ($dt as $pdt) {
                if (file_exists("upload/book/power_point/{$pdt->FILES_NAME}")) {
                    unlink("upload/book/power_point/{$pdt->FILES_NAME}");
                }
            }
            $sdata['msg'] = "Delete successfull";
        } else {
            $sdata['msg'] = "Delete Err";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "academics_version/version_book_upload/lecture_power_point_upload", "refresh");
    }

}
