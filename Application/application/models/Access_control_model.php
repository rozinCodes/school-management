<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Access_control_model extends CI_Model
{

    public function view_access_control($table)
    {
        $this->db->select('MENU_PERMISSIONS.*,STAFF.FIRST_NAME,MENU.MENU_NAME');
        $this->db->from($table);
        $this->db->join('STAFF', 'MENU_PERMISSIONS.STAFF_ID = STAFF.ID');
        $this->db->join('MENU', 'MENU_PERMISSIONS.MENU_ID = MENU.MENU_ID');
        $r = $this->db->get()->result();
        return $r;
    }
    public function access($table,$staff_id,$roles_id,$manue_id)
    {
        $this->db->select('MENU_PERMISSIONS.*');
        $this->db->from($table);
        $this->db->where("STAFF_ID",$staff_id);
        $this->db->where("ROLES_ID",$roles_id);
        $this->db->where("MENU_ID",$manue_id);
        $this->db->where("PERMISSION_STATUS",1);
        if($this->db->get()->row())
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
}