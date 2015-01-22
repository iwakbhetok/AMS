<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  ------------------------------------------------------------------------------
  AMS Applications
  ------------------------------------------------------------------------------

  Author : Dadang Nurjaman
  Email  : mail.nurjaman@gmail.com
  @2014

  ------------------------------------------------------------------------------
  Mabes Polri
  ------------------------------------------------------------------------------
 */

class Division_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        if ($this->db->insert('division', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function get_division_detail($division_id) {
        $this->db
                ->select('di.division_id, di.division_name, di.description, di.created_by, di.created_date, di.updated_by, di.updated_date, de.department_name, u.employee_name created, ur.employee_name updated')
                ->from('division di')
                ->join('department de', 'de.department_id = di.department_id')
                ->join('employee u', 'u.employee_id = di.created_by')
                ->join('employee ur', 'ur.employee_id = di.updated_by')
                ->where('di.division_id', $division_id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

}
