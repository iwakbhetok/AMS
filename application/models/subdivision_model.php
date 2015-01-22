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

class Subdivision_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        if ($this->db->insert('sub_division', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function get_subdivision_detail($subdivision_id) {
        $this->db
                ->select('sdi.sub_division_id, sdi.sub_division_name, sdi.description, sdi.created_by, sdi.created_date, sdi.updated_by, sdi.updated_date, di.division_name, de.department_name, u.employee_name created, ur.employee_name updated')
                ->from('sub_division sdi')
                ->join('division di', 'di.division_id = sdi.division_id')
                ->join('department de', 'de.department_id = sdi.department_id')
                ->join('employee u', 'u.employee_id = sdi.created_by')
                ->join('employee ur', 'ur.employee_id = sdi.updated_by')
                ->where('sdi.sub_division_id', $subdivision_id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

}
