<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Certificates_model extends CI_Model {

    public function getSchool_info(){
        $sql = "SELECT * FROM GENERAL_SETTINGS ";
        $query = $this->db->query($sql);
        $r =  $query->row();
        return $r;

    }

}