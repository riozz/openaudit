<?php

/*
   This file is created by Ringo used in Open-Audit to staff staff id, ip of audit action

   @version 20170223
*/

class Z_oa_stafflog extends MY_Model {
  public function __construct() {
    parent::__construct();
    //$this->load->database();
    $this->hktp_db=$this->load->database('HKTP', TRUE);
  }

  public function add_stafflog($staffid, $ip) {
    $sql = "insert into z_stafflog (staffid,ip) values (?,?)";
    $sql = $this->clean_sql($sql);
    $data = array($staffid, $ip);
    $query = $this->db->query($sql, $data);
    $sql = "INSERT INTO `z_historylog` (`system_id`,`brand`,`serial`,`cpu`,`cpuspeed`,`memorysize`,`hdsize`,`monitor`,`ccc`,`location`,`department`,`staffid`,`purpose`, `po`,`base`,`purchaseon`,`username`,`remark`,`os`,`auditdate`,`uuid`,`ip`,`mac`) select s.id itemno, concat(s.manufacturer,' ',s.model) brand, s.serial, p.description cpu, concat(p.speed,'MHz') cpuspeed, concat(me.size,'MB') memorysize, concat(d.size, 'MB') hdsize, concat(mo.manufacturer,'/',mo.model,'/',mo.size) monitor, s.location_suite ccc,s.location_room location, 'HKT Premier' department,s.owner staffid,'User PC' purpose,'' PO,'HK' base,'' purchaseon, s.comments username,s.form_factor remark, s.os_name os, s.last_seen auditdate, s.uuid, s.ip, n.mac from system s left join processor p on s.id=p.system_id left join (SELECT system_id,sum(size) size FROM openaudit.memory group by system_id) me on s.id=me.system_id left join disk d on s.id=d.system_id left join monitor mo on s.id =mo.system_id left join windows w on s.id=w.system_id left join network n on s.id=n.system_id where s.owner=?";
    $sql = $this->clean_sql($sql);
    $data2 = array($staffid);
    $query = $this->db->query($sql, $data2);
    return 1;
  }

  public function check_staffid($staffid) {
    //change database
    $sql="select count(*) as `count` from staff where staffid=$staffid";
    $query = $this->hktp_db->query($sql);
    $row = $query->row();
    if (intval($row->count) > 0) 
      return 1;
    else
      return 0;
  }
     
} 
