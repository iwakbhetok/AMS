<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  ------------------------------------------------------------------------------
  AMS Applications
  ------------------------------------------------------------------------------

  Author : Abdul Gofur
  Email  : abdul.createit@gmail.com
  @2015

  ------------------------------------------------------------------------------
  Mabes Polri
  ------------------------------------------------------------------------------
 */

class Jobtitle_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        if ($this->db->insert('job_title', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function get_jobtitle_detail($job_title_id) {
        $this->db
                ->select('jt.job_title_id, jt.job_title_name, jt.description, jt.created_by, jt.created_date, jt.updated_by, jt.updated_date, u.employee_name created, ur.employee_name updated')
                ->from('job_title jt')                
                ->join('employee u', 'u.employee_id = jt.created_by')
                ->join('employee ur', 'ur.employee_id = jt.updated_by')
                ->where('jt.job_title_id', $job_title_id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

}
