<?php

class Common_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function save_data($table, $data) {
        if ($this->db->insert($table, $data)) {
            //$this->Id = $this->db->insert_id();

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function admin_login($email, $password) {
        $this->db->where("EMAIL", $email);
        $this->db->where("PASSWORD", $this->Encryptor('encrypt', $password));
        $this->db->where("ACTIVE", 1);
        $query = $this->db->get('STAFF');
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        return FALSE;
    }

    public function Encryptor($action, $string) {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        //pls set your unique hashing key
        $secret_key = 'hitenVkuld%:bTXz,3r>6|FW#!7eSs>vM~n+48~{Mh$#A4p).)#wV3^_y-B.6WCar=b4.';
        $secret_iv = '3w8XD|r@n:nxp|oml]nw$-KEc|rT$H).(~ &`gnV!vD0vs|?r]#Zdr-qRlOV@&#6';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        //do the encyption given text/string/number
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

}