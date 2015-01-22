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

class User_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }   
        
    function create_account($data) {
        if ($this->db->insert('employee', $data)) {
            return true;
        } else {
            return false;
        }
    }
    
    function get_user_account_detail($employee_id) {
        $this->db
                ->select('em.nrp, em.employee_id, em.employee_name, em.user_name, em.user_password, em.description, un.unit_id, un.unit_name, un.description, un.created_by, un.created_date, un.updated_by, un.updated_date, sdi.sub_division_name, di.division_name, de.department_name, u.employee_name created, ur.employee_name updated')
                ->from('employee em')                
                ->join('unit un', 'un.unit_id = em.unit_id')
                ->join('sub_division sdi', 'sdi.sub_division_id = em.sub_division_id')
                ->join('division di', 'di.division_id = em.division_id')
                ->join('department de', 'de.department_id = em.department_id')
                ->join('employee u', 'u.employee_id = em.created_by')
                ->join('employee ur', 'ur.employee_id = em.updated_by')
                ->where('em.employee_id', $employee_id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    /* Function for Account - Begin */

    function get_account_list() {
        $this->db
                ->select('em.employee_id, em.nrp, em.employee_name, em.user_name, em.status, em.last_logged_in, em.last_logged_out, dept.department_name, di.division_name, sdi.sub_division_name, job.job_title_name, ug.user_group_name')
                ->from('employee em')
                ->join('department dept', 'dept.department_id = em.department_id')
                ->join('division di', 'di.division_id = em.division_id')
                ->join('sub_division sdi', 'sdi.sub_division_id = em.sub_division_id')
                ->join('job_title job', 'job.job_title_id = em.job_title_id')
                ->join('user_group ug', 'ug.user_group_id = em.user_group_id')
                ->where('em.status', 1)
                ->order_by('em.employee_name');
        $query = $this->db->get();
        return $query->result();
    }
	
	function get_job_title() {
        $this->db
                ->select('*')
                ->from('job_title')                
                ->where('status =', 1)
                ->order_by('job_title_name');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_employee($employee) {
        $this->db
                ->select('*')
                ->from('employee')                
                ->where('employee_id !=', 1)
                ->where('employee_id !=', $employee)
                ->order_by('employee_name');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_employee_all() {
        $this->db
                ->select('*')
                ->from('employee')
                ->order_by('employee_name');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_max_account_id() {
        $q = $this->db->query("select MAX(user_account_id) as kd_max from user_account");
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
            }
        } else {
            $tmp = "1";
        }
        return $tmp;
    }

    /* Function for Account - End */

    /* Function for Group Begin */

    function get_group_list() {
        $this->db
                ->select('user_group_id, user_group_name, user_group_level')
                ->from('user_group')
                ->where('user_group_id !=', 1)
                ->order_by('user_group_level');
        $query = $this->db->get();
        return $query->result();
    }

    function get_max_group_id() {
        $q = $this->db->query("select MAX(user_group_id) as kd_max from user_group");
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
            }
        } else {
            $tmp = "1";
        }
        return $tmp;
    }

    /* Function for Group - End */
}