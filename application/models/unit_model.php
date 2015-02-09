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

class Unit_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        if ($this->db->insert('unit', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function get_unit_detail($unit_id) {
        $this->db
                ->select('un.unit_id, un.unit_name, un.description, un.created_by, un.created_date, un.updated_by, un.updated_date, sdi.sub_division_name, di.division_name, de.department_name, u.employee_name created, ur.employee_name updated')
                ->from('unit un')
                ->join('sub_division sdi', 'sdi.sub_division_id = un.sub_division_id')
                ->join('division di', 'di.division_id = un.division_id')
                ->join('department de', 'de.department_id = un.department_id')
                ->join('employee u', 'u.employee_id = un.created_by')
                ->join('employee ur', 'ur.employee_id = un.updated_by')
                ->where('un.unit_id', $unit_id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

}