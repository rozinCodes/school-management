<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Communication extends CI_Controller {

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
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['content'] = $this->load->view("admin/dashboard", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function mailbox($action = 'inbox') {
        $data = array();
        $data['active'] = "mailbox";
        $data['title'] = "mailbox";
        $this->load->helper("form");
        $this->load->library("form_validation");
        $data['active_user'] = $this->session->userdata('roles') . '-' . $this->session->userdata('id');
        $data['allRoles'] = $this->common_model->view_data("ROLES", "", "ID", "ASC");
        $data['allCat'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allScat'] = $this->common_model->view_data("STUDENTS", "", "ID", "ASC");
        if ($action == 'compose') {
            /**
              if ($this->input->post('submit') == 'send') {
              $this->form_validation->set_rules('message_body', 'Message', 'trim|required');
              if ($this->form_validation->run() == true) {
              $post = $this->input->post();
              $message_id = $this->communication_model->mailbox_compose($post);
              set_alert('success', translate('message_sent_successfully'));
              redirect(base_url('communication/mailbox/sent'));
              } else {
              set_alert('error', translate('message_send_failed'));
              redirect(base_url('communication/mailbox/compose'));
              }
              }
             * * */
            $data['inside_subview'] = $this->load->view("communication/message_compose", $data, TRUE);
            //  $this->data['inside_subview'] = 'message_compose';
        } elseif ($action == 'inbox') {
           $data['inside_subview'] = $this->load->view("communication/message_inbox", $data, TRUE);
        } elseif ($action == 'sent') {
            $data['inside_subview'] = $this->load->view("communication/message_sent", $data, TRUE);
        } elseif ($action == 'important') {
            $this->data['inside_subview'] = 'message_important';
        } elseif ($action == 'trash') {
                   $data['inside_subview'] = $this->load->view("communication/message_trash", $data, TRUE);
            
        } elseif ($action == 'read') {
            $id = $this->input->get('id');
            $response = $this->communication_model->mark_messages_read($id);
            $this->data['message_id'] = $id;
            $data['inside_subview'] = $this->load->view("communication/message_read", $data, TRUE);
        }
        //$this->data['active_user'] = loggedin_role_id() . '-' . get_loggedin_user_id();
        //$this->data['branch_id'] = $this->application_model->get_branch_id();
        //  $this->data['title'] = translate('mailbox');
        /**
          $this->data['sub_page'] = 'communication/message';
          $this->data['main_menu'] = 'message';
          $this->data['headerelements'] = array(
          'css' => array(
          'vendor/summernote/summernote.css',
          'vendor/bootstrap-fileupload/bootstrap-fileupload.min.css',
          ),
          'js' => array(
          'vendor/summernote/summernote.js',
          'vendor/bootstrap-fileupload/bootstrap-fileupload.min.js',
          ),
          );
          $this->load->view('layout/index', $this->data);
         * 
         * * */
        $data['content'] = $this->load->view("communication/message", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function message_send() {
        $this->load->library("form_validation");
        if ($_POST) {
            //$this->form_validation->set_rules("receiver", "receiver", "trim|required");
            // $this->form_validation->set_rules('role_id', translate('role'), 'trim|required');
            // $this->form_validation->set_rules('receiver_id',"receiver", 'trim|required');
            $this->form_validation->set_rules('subject', "subject", 'trim|required');
            // $this->form_validation->set_rules('message_body', translate('message'), 'trim|required');
            // $this->form_validation->set_rules('attachment_file', translate('attachment'), 'callback_handle_upload');
            if ($this->form_validation->run() !== false) {
                $post = $this->input->post();


                $message_id = $this->communication_model->mailbox_compose($post);
                // set_alert('success', translate('message_sent_successfully'));
                // $array = array('status' => 'success');
                redirect(base_url() . "communication/mailbox/inbox", "refresh");
            } else {
                print_r($message_id);
                // $error = $this->form_validation->error_array();
                // $array = array('status' => 'fail', 'url' => '', 'error' => $error);
            }
            // echo json_encode($array);
        }
    }
    /* message delete */
    public function delete(){
       $arrayID = $this->input->post('checked_id');
      // print_r($arrayID);
       if (count($arrayID)) {
            foreach ($arrayID as $value) {
                $this->db->where('ID', $value);
                $this->db->update('MESSAGE', array('TRASH_INBOX'=>1));
            }
            redirect(base_url() . "communication/mailbox/inbox", "refresh");
            //set_alert('success', translate('message_has_been_deleted'));
        } else {
              redirect(base_url() . "communication/mailbox/inbox", "refresh");
           // set_alert('error', 'Please Select a Message to Delete');
        }
    }
    
     public function delete_sent(){
       $arrayID = $this->input->post('checked_id');
      // print_r($arrayID);
       if (count($arrayID)) {
            foreach ($arrayID as $value) {
                $this->db->where('ID', $value);
                $this->db->update('MESSAGE', array('TRASH_SENT'=>1));
            }
            redirect(base_url() . "communication/mailbox/sent", "refresh");
            //set_alert('success', translate('message_has_been_deleted'));
        } else {
              redirect(base_url() . "communication/mailbox/sent", "refresh");
           // set_alert('error', 'Please Select a Message to Delete');
        }
    }

  
    // file downloader
    public function download() {
        $encrypt_name = $this->input->get('file');
        $type = $this->input->get('type');
        //if ($type == 'reply') {
         //   $table = 'message_reply';
        //} else {
            $table = 'MESSAGE';
       // }
        $file_name = $this->db->select('FILE_NAME')->where('ENC_NAME', $encrypt_name)->get($table)->row()->FILE_NAME;
        $this->load->helper('download');
        force_download($file_name, file_get_contents('upload/attachments/' . $encrypt_name));
    }

    public function getStafflistRole() {
        $html = "";
        // $branch_id = $this->application_model->get_branch_id();
        $myid = $this->session->userdata('id');
        $role_id = $this->input->post('role_id');

        $selected_id = (isset($_POST['staff_id']) ? $_POST['staff_id'] : 0);
        $this->db->select('STAFF.ID,STAFF.ROLES_ID,STAFF.FIRST_NAME');
        $this->db->from('STAFF');
        // $this->db->join('login_credential as lc', 'lc.user_id = staff.id AND lc.role != 4 AND lc.role != 3', 'inner');
        $this->db->where('STAFF.ROLES_ID', $role_id);
        // $this->db->where('staff.branch_id', $branch_id);
        $this->db->order_by('STAFF.ID', 'ASC');
        $result = $this->db->get()->result_array();
        if (count($result)) {
            $html .= "<option value=''>" . select . "</option>";
            foreach ($result as $staff) {
                if ($staff['ID'] == $myid) {
                    continue;
                }
                $selected = ($staff['ID'] == $selected_id ? 'selected' : '');
                $html .= "<option value='" . $staff['ID'] . "' " . $selected . ">" . $staff['FIRST_NAME'] . " (" . $staff['ID'] . ")</option>";
            }
        } else {
            $html .= '<option value="">' . no_information_available . '</option>';
        }

        echo $html;
    }

    public function getStudentByClass() {
        $html = "";
        $class_id = $this->input->post('class_id');
        //$branch_id = $this->application_model->get_branch_id();
        $myid = $this->session->userdata('id');
        if (!empty($class_id)) {

            $this->db->select('ENROLL.ID,ENROLL.STUDENT_ID, ENROLL.ROLL,STUDENTS.F_NAME ');
            $this->db->from('ENROLL');
            $this->db->join('STUDENTS', 'STUDENTS.ID = ENROLL.STUDENT_ID');
            // $this->db->join('login_credential as l', 'l.user_id = e.student_id and l.role = 7', 'left');
            // $this->db->where('l.active', 1);
            // $this->db->where('e.session_id', get_session_id());
            $this->db->where('ENROLL.CLASS_ID', $class_id);
            // $this->db->where('e.branch_id', $branch_id);
            $result = $this->db->get()->result_array();
            if (count($result)) {
                $html .= "<option value=''>" . select . "</option>";
                foreach ($result as $row) {
                    if ($row['STUDENT_ID'] == $myid) {
                        continue;
                    }
                    $html .= '<option value="' . $row['STUDENT_ID'] . '">' . $row['F_NAME'] . ' ( Roll : ' . $row['ROLL'] . ')</option>';
                }
            } else {
                $html .= '<option value="">' . no_information_available . '</option>';
            }
        } else {
            $html .= '<option value="">' . select_class_first . '</option>';
        }

        echo $html;
    }
    
        public function autoload(){
       
                                            $unreadMessage = $this->communication_model->unread_message_alert();
                                            if (count($unreadMessage) > 0) {
                                                echo '<span class="badge">' . count($unreadMessage) . '</span>';
                                            }
                                            
                                            }
        public function autoload2(){
            $unreadMessage = $this->communication_model->unread_message_alert();
      
   if (count($unreadMessage) > 0) {
                                                    foreach ($unreadMessage as $message) :
                                                        ?>
                                                        <a href="<?php echo base_url('communication/mailbox/read?type=' . $message['MSG_TYPE'] . '&id=' . $message['ID']); ?>" class="list-group-item list-group-item-action active">
                                                            <div class="notification-info">
                                                                <div class="notification-list-user-img"><img src="<?php echo base_url(); ?>assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                                <div class="notification-list-user-block"><span class="notification-list-user-name"><?php echo $message['SUBJECT']; ?></span><br><?php echo mb_strimwidth(strip_tags($message['BODY']), 0, 35, "..."); ?>
                                                                    <div class="notification-date"><?php echo get_nicetime($message['CREATED_AT']); ?></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <?php
                                                    endforeach;
                                                } else {
                                                    echo '<div class="notification-list-user-block"><span class="notification-list-user-name">You do not have any new messages
                                                           
                                                        </div>';
                                                    //echo '<li class="text-center">You do not have any new messages</li>';
                                                }

        }

  
      // $data['a']=count($data['allLoad']);
      // echo json_encode($data);
    

}
