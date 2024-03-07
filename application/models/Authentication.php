<?php

class Authentication extends CI_Model {
    function tambahuser($table, $data){
        $this->db->insert($table, $data);
    }
}