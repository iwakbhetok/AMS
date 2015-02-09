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

class Master_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_department() {
        $this->db
                ->select('department_id, department_name')
                ->from('department')
                ->where('status', 1)
                ->order_by('department_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_division() {
        $this->db
                ->select('di.division_id, di.division_name, di.description, de.department_id, de.department_name')
                ->from('division di')                
                ->join('department de', 'de.department_id = di.department_id')
                ->where('di.status', 1)
                ->order_by('di.division_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_subdivision() {
        $this->db
                ->select('sdi.sub_division_id, sdi.sub_division_name, di.division_name, de.department_name')
                ->from('sub_division sdi')
                ->join('division di', 'sdi.division_id = di.division_id')
                ->join('department de', 'sdi.department_id = de.department_id')
                ->where('sdi.status', 1)
                ->order_by('sdi.sub_division_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_unit() {
        $this->db
                ->select('un.unit_id, un.unit_name, sdi.sub_division_name, di.division_name, de.department_name')
                ->from('unit un')
                ->join('sub_division sdi', 'un.sub_division_id = sdi.sub_division_id')
                ->join('division di', 'un.division_id = di.division_id')
                ->join('department de', 'un.department_id = de.department_id')
                ->where('un.status', 1)
                ->order_by('un.unit_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_jobtitle() {
        $this->db
                ->select('*')
                ->from('job_title')
                ->where('status', 1)
                ->order_by('job_title_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_departmentx() {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox')
                ->where('mail_replied !=', 1);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }
	
	function get_record($table)
	{
		$this->db->select('*')
                ->from($table);
        $query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = true;
		}
		else {
			$res = false;
		}
		return $res;
	}

}
