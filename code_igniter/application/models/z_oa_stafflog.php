<?php

/*
   This file is created by Ringo used in Open-Audit to staff staff id, ip of audit action

   @version 20170223
*/

class Z_oa_stafflog extends MY_Model {
  public function __construct() {
    parent::__construct();
    //$this->load->database();
  }

  public function add_stafflog($staffid, $ip) {
    $sql = "insert into z_stafflog (staffid,ip) values (?,?)";
    $sql = $this->clean_sql($sql);
    $data = array($staffid, $ip);
    $query = $this->db->query($sql, $data);
  }
     
} 
