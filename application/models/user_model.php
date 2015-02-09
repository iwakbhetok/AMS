<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  ------------------------------------------------------------------------------
  AMS Applications
  ------------------------------------------------------------------------------

  Author : Abdul GOfur
  Email  : abdul.createit@gmail.com
  @2015

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
                ->from('job_title jt')
				->join('employee emp', 'emp.id_job_title = jt.job_title_id')
                ->where('emp.status =', '1')
                ->order_by('jt.job_title_name');
        $query = $this->db->get();
		//echo $this->db->last_query();
        return $query->result();
    }
	
	function get_job_title_by_employee($mail_disposition_to) {
        $this->db
                ->select('*')
                ->from('job_title jt')
				->join('employee emp', 'emp.id_job_title = jt.job_title_id')
				->where('emp.status =', '1')
				->where('emp.employee_id !=', $mail_disposition_to)
                ->order_by('jt.job_title_name');
        $query = $this->db->get();
		//echo $this->db->last_query();
        return $query->result();
    }
    
	function get_employee_with_sub($employee) {
        $this->db
                ->select('emp.*,dept.department_name')
                ->from('employee emp')
				->join('job_title jt', 'emp.id_job_title = jt.job_title_id')
				->join('department dept', 'jt.id_department = dept.department_id')
				->where('emp.status !=', '0')
                ->where('dept.status !=', '0')
                ->where('emp.employee_id !=', $employee)
                ->order_by('emp.employee_name');
        $query = $this->db->get();
		//echo $this->db->last_query();
        return $query->result();
    }
	
    function get_employee($employee) {
        $this->db
                ->select('*')
                ->from('employee')                
                ->where('status !=', '0')
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
	
	function get_distribution_inbox()
	{
		$id = array(503,504);
		$this->db
                ->select('emp.employee_id, jt.job_title_name')
                ->from('job_title jt')
				->join('employee emp', 'emp.id_job_title = jt.job_title_id')
                ->where_in('jt.id_user_group', $id);
        $query = $this->db->get();
        return $query->result();
	}
		
	function get_user_one_level_down($employee)
	{
		$query = $this->db->query(" SELECT emp.employee_id, jt.job_title_name
				FROM user_group ug
				JOIN job_title jt ON jt.id_user_group = ug.user_group_id
				JOIN employee emp ON emp.id_job_title = jt.job_title_id
				WHERE ug.user_group_level = 
				(SELECT ug.user_group_level 
				FROM employee emp
				JOIN job_title jt ON jt.job_title_id = emp.id_job_title
				JOIN user_group ug ON ug.user_group_id = jt.id_user_group
				 WHERE emp.employee_id = ".$employee.") + 1");
		//echo $this->db->last_query();
		return $query->result() ;
	}
	
	function get_next_level($employee)
	{
		$query = $this->db->query("SELECT jt.id_department, (ug.user_group_level + 1) as group_level  FROM  job_title jt
				JOIN employee emp ON  emp.id_job_title = jt.job_title_id
				JOIN user_group ug ON ug.user_group_id = jt.id_user_group
				WHERE emp.employee_id = ".$employee."
				LIMIT 1");
		return $query->result() ;
	}
	
	function get_user_one_level_child($group_level, $id_department)
	{
		$query = $this->db->query("SELECT * FROM job_title jt 
				JOIN user_group ug ON jt.id_user_group = ug.user_group_id
				JOIN department dept ON jt.id_department = dept.department_id
				JOIN employee emp ON emp.id_job_title = jt.job_title_id
				WHERE jt.id_department =".$id_department."
				AND  ug.user_group_level = ".$group_level."
				");
		//echo $this->db->last_query();
		return $query->result() ;
	}
	
	function get_parent_level($employee_id)
	{
		$query = $this->db->query("SELECT * FROM job_title jt 
				JOIN user_group ug ON jt.id_user_group = ug.user_group_id
				JOIN department dept ON jt.id_department = dept.department_id
				JOIN employee emp ON emp.id_job_title = jt.job_title_id
				WHERE jt.id_department =".$id_department."
				AND  ug.user_group_level = ".$group_level."
				");
		//echo $this->db->last_query();
		return $query->result() ;
	}
	
	function get_user_parent_level($employee_id, $id_department)
	{
		$query = $this->db->query("SELECT * 
			FROM job_title jt
			JOIN employee emp ON emp.id_job_title = jt.job_title_id
			JOIN user_group ug ON jt.id_user_group = ug.user_group_id
			WHERE ug.user_group_level = ( 
			SELECT ug.user_group_level -1 AS 
			LEVEL 
			FROM employee emp
			JOIN job_title jt ON emp.id_job_title = jt.job_title_id
			JOIN user_group ug ON jt.id_user_group = ug.user_group_id
			WHERE emp.employee_id =".$employee_id." )
			AND
			jt.id_department = ".$id_department."");
		//echo $this->db->last_query();
		return $query->result() ;
	}
	
	function get_user_parent_sub_level($employee_id)
	{
		$query = $this->db->query("SELECT * 
			FROM job_title jt
			JOIN employee emp ON emp.id_job_title = jt.job_title_id
			JOIN user_group ug ON jt.id_user_group = ug.user_group_id
			WHERE ug.user_group_level = ( 
			SELECT ug.user_group_level -1 AS 
			LEVEL 
			FROM employee emp
			JOIN job_title jt ON emp.id_job_title = jt.job_title_id
			JOIN user_group ug ON jt.id_user_group = ug.user_group_id
			WHERE emp.employee_id =".$employee_id." )
			AND
			jt.id_department = (SELECT
			dept.id_parent_dept
			FROM employee emp
			JOIN job_title jt ON jt.job_title_id = emp.id_job_title
			JOIN department dept ON dept.department_id = jt.id_department
			WHERE emp.employee_id = 
			".$employee_id.")");
		//echo $this->db->last_query();
		return $query->result() ;
	}

    /* Function for Group - End */
}