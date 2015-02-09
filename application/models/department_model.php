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

class Department_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        if ($this->db->insert('department', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function get_department_detail($department_id) {
        $this->db
                ->select('de.department_id, de.department_name, de.description, de.created_by, de.created_date, de.updated_by, de.updated_date, u.employee_name created, ur.employee_name updated')
                ->from('department de')                
                ->join('employee u', 'u.employee_id = de.created_by')
                ->join('employee ur', 'ur.employee_id = de.updated_by')
                ->where('de.department_id', $department_id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

}
