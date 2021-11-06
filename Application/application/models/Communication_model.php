<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Communication_model extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    // mailbox compose
    public function mailbox_compose($data) {
        $id = '';
        // $branchID = $this->application_model->get_branch_id();
        $sender = $this->session->userdata('roles') . '-' . $this->session->userdata('id');
        $reciever = $data['role_id'] . '-' . $data['receiver'];
        $date2 = date('Y-m-d H:i:s',time());
        $arrayMsg = array(
            'SUBJECT' => $data['subject'],
            //'FILE_NAME'=>'gg',
            // 'enc_name' => $this->upload->data('file_name'),
            'SENDER' => $sender,
            'RECIEVER' => $reciever,
            "CREATED_AT" => $date2,
            'BODY' => $data['message_body'],
        );
        if ($_FILES["attachment_file"]['name'] != "") {


            // uploading file using codeigniter upload library

            $config = array();
            $config['upload_path'] = './upload/attachments/';
            $config['encrypt_name'] = true;
            $config['allowed_types'] = '*';
            $this->load->library('upload');
            $this->upload->initialize($config);
            // $this->load->library('upload', $config);
            if ($this->upload->do_upload("attachment_file")) {
                $arrayMsg['FILE_NAME'] = $this->upload->data('orig_name');
                $arrayMsg['ENC_NAME'] = $this->upload->data('file_name');
                //$arrayMsg['enc_name'] = "1";
            }
        }

        $this->db->insert('MESSAGE', $arrayMsg);
        // $id = $this->db->insert_id();
        /**
          // send new message received email
          $this->db->where(array('branch_id' => $branchID, 'template_id' => 4));
          $getTemplate = $this->db->get('email_templates_details')->row_array();
          if ($getTemplate['notified'] == 1) {
          $message = $getTemplate['template_body'];
          $message = str_replace("{institute_name}", get_global_setting('institute_name'), $message);
          $message = str_replace("{recipient}", $this->application_model->get_name_mode_by_id($data['role'], $data['receiver_id']), $message);
          $message = str_replace("{message}", $data['message_body'], $message);
          $message = str_replace("{message_url}", base_url('communication/mailbox/read?type=inbox&id=' . $id), $message);
          $msg_data['recipient'] = get_type_name_by_id($data['role'], $data['receiver_id'], 'email');
          $msg_data['subject'] = $getTemplate['subject'];
          $msg_data['message'] = $message;
          $this->load->model("email_model");
          $this->email_model->send_mail($msg_data);
          }
         * */
        //return $id;
    }

    // private unread message counter
    public function count_unread_message() {
        $active_user = $this->session->userdata('roles') . '-' . $this->session->userdata('id');
        $query = $this->db->select('ID')->where(array(
                    'RECIEVER' => $active_user,
                    'READ_STATUS' => 0,
                    'TRASH_INBOX' => 0,
                ))->get('MESSAGE');
        return $query->num_rows();
    }

    // unread message alert in topbar
    public function unread_message_alert() {

             $activeUser = $this->session->userdata('roles') . '-' . $this->session->userdata('id');
        $activeUser = $this->db->escape($activeUser);
       // $sql = "SELECT ID,BODY,CREATED_AT,IF(SENDER = " . $activeUser . ", 'SENT','INBOX') as `MSG_TYPE`,IF(SENDER = " . $activeUser . ", RECIEVER,SENDER) as `get_user` FROM MESSAGE WHERE (SENDER = " . $activeUser . " AND TRASH_SENT = 0 AND REPLY_STATUS = 1) OR (RECIEVER = " . $activeUser . " AND TRASH_INBOX = 0 AND READ_STATUS = 0) ORDER BY id DESC";
        //$sql = "SELECT ID,BODY,CREATED_AT,IF(SENDER = " . $activeUser  . ", 'sent','inbox') as `msg_type`,IF(SENDER = " . $activeUser . ", RECIEVER,SENDER) as `get_user` FROM MESSAGE WHERE (SENDER = " . $activeUser . " AND TRASH_SENT = 0 AND REPLY_STATUS = 1) OR (RECIEVER = " . $activeUser . " AND TRASH_INBOX = 0 AND READ_STATUS = 0) ORDER BY id DESC";
       // $sql = "SELECT ID,CREATED_AT,IF(SENDER = " . $activeUser  . ", 'sent','inbox') as `msg_type` FROM MESSAGE  ORDER BY ID DESC";
     $sql="SELECT ID,SUBJECT,CREATED_AT,BODY,  CASE WHEN SENDER = " . $activeUser . " THEN CONCAT('MESSAGE.SENT', 'MESSAGE.INBOX')  END  AS msg_type ,  CASE WHEN SENDER = " . $activeUser . " THEN CONCAT('MESSAGE.SENDER', 'MESSAGE.RECIEVER')  END  AS get_user   FROM MESSAGE  WHERE (SENDER =  " . $activeUser . " AND  TRASH_SENT=0  AND REPLY_STATUS = 1) OR (RECIEVER = " . $activeUser . "  AND TRASH_INBOX = 0 AND READ_STATUS= 0) ORDER BY id DESC";
        //$result = $this->db->query($sql);
        //$result = $result->result_array();
        // $result = $this->db->query($sql);
       $result = $this->db->query($sql)->result_array();
        foreach ($result as $key => $value) {
            $result[$key]['message_details'] = $this->getMessage_details($value['GET_USER']);
        }
        return $result;
    }

    public function reply_count_unread_message() {
        $activeUser = $this->session->userdata('roles') . '-' . $this->session->userdata('id');
        $query = $this->db->select('ID')->where(array(
                    'SENDER' => $activeUser,
                    'REPLY_STATUS' => 1,
                    'TRASH_SENT' => 0,
                ))->get('MESSAGE');
        return $query->num_rows();
    }

    public function mark_messages_read($message_id) {
        $activeUser = $this->session->userdata('roles') . '-' . $this->session->userdata('id');
        $this->db->where('RECIEVER', $activeUser);
        $this->db->where('ID', $message_id);
        $this->db->update('MESSAGE', array('READ_STATUS' => 1));

        $this->db->where('SENDER', $activeUser);
        $this->db->where('ID', $message_id);
        $this->db->update('MESSAGE', array('REPLY_STATUS' => 0));
    }

    public function getMessage_details($user_id) {
        $getUser = explode('-', $user_id);
        $userRoleID = $getUser[0];
         $userID =1;
       // $userID = $getUser['1'];
       
        $userType = '';
        if ($userRoleID == 4) {
            $userType = 'parent';
           // $getUSER = $this->db->query("SELECT name,image FROM parent WHERE id = " . $this->db->escape($userID))->row_array();
        } elseif ($userRoleID == 5) {
            $userType = 'STUDENTS';
            $getUSER = $this->db->query("SELECT STUDENTS.F_NAME AS FIRST_NAME,STUDENT_IMAGE FROM  STUDENTS WHERE ID = " . $this->db->escape($userID))->row_array();
        } else {
            $userType = 'STAFF';
            $getUSER = $this->db->query("SELECT STAFF.FIRST_NAME AS FIRST_NAME,PHOTO FROM STAFF WHERE ID = " . $this->db->escape($userID))->row_array();
        }
        
        $arrayData = array(
            // 'imgPath' => get_image_url($userType, $getUSER['image']), 
           //'userName' => $getUSER['FIRST_NAME']
        );
        return $arrayData;
    }

    public function getUserNameByRoleID($roleID, $userID = '') {
      if ($roleID == 5) {
            $sql = "SELECT STUDENTS.ID, STUDENTS.F_NAME AS FIRST_NAME  FROM STUDENTS INNER JOIN ENROLL ON ENROLL.STUDENT_ID = STUDENTS.ID WHERE STUDENTS.ID = " . $this->db->escape($userID);
            return $this->db->query($sql)->row_array();
        } else {
            $sql = "SELECT STAFF.ID,STAFF.FIRST_NAME AS FIRST_NAME ,EMAIL FROM STAFF WHERE ID = " . $this->db->escape($userID);
            return $this->db->query($sql)->row_array();
        }
    }

    public function getSingle($table, $id = NULL, $single = false) {
        if ($single == true) {
            $method = 'row';
        } else {
            $method = 'result';
        }
        $q = $this->db->query("SELECT * FROM " . $table . " WHERE id = " . $this->db->escape($id));
        return $q->$method();
    }

}
