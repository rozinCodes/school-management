<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seconddbloder {
    public function __construct() {
        $this->second_db_lode();
}

        public function second_db_lode()
        {
            $CI =& get_instance();

           
            $CI->db2 = $CI->load->database('third', TRUE);
           
        }

        
}