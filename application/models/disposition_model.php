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

class Disposition_Model extends CI_Model {

    var $user_login;

    function __construct() {
        parent::__construct();
    }
    
    function get_disposition_inbox($staff) {
        $this->db
                ->select('md.*, mi.mail_inbox_id, mi.mail_number, mi.mail_date, mi.mail_subject, mi.mail_type, mi.attachment, em.employee_name, em.nrp, jt.job_title_name')
                ->from('mail_disposition md')
                ->join('mail_inbox mi', 'md.id_mail_inbox = mi.mail_inbox_id')
                ->join('employee em', 'md.created_by = em.employee_id')
                ->join('job_title jt', 'em.id_job_title = jt.job_title_id')
                ->where('md.mail_disposition_to', $staff)                
                ->order_by('md.id_mail_inbox', 'desc');
        $query = $this->db->get();
		//var_dump($this->db->last_query());
        return $query->result();
    }
    
    function get_disposition_outbox($staff) {
        $this->db
                ->select('md.*, mi.mail_inbox_id, mi.mail_number, mi.mail_date, mi.mail_subject, mi.mail_type, mi.attachment, em.employee_name, em.nrp, jt.job_title_name')
                ->from('mail_disposition md')
                ->join('mail_inbox mi', 'md.id_mail_inbox = mi.mail_inbox_id')
                ->join('employee em', 'md.mail_disposition_to = em.employee_id')
                ->join('job_title jt', 'em.id_job_title = jt.job_title_id')
                ->where('md.created_by', $staff)                
                ->order_by('md.id_mail_inbox', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
	
	function check_mail_id_in_disposition($mail_id, $employee) {
        $this->db
                ->select('id_mail_inbox')
                ->from('mail_disposition')
				->where('id_mail_inbox', $mail_id)
				->where('mail_disposition_to', $employee)
                ->where('mail_disposition_status', 1);
        $query = $this->db->get();
		//echo $this->db->last_query();
        return $query->result();
    }
	
	function get_disposition_detail($disposition_id){
		$this->db
                ->select('md.mail_disposition_subject, md.*, em.employee_name, em.nrp, jt.job_title_name')
                ->from('mail_disposition md')
                ->join('mail_inbox mi', 'md.id_mail_inbox = mi.mail_inbox_id')
                ->join('employee em', 'md.mail_disposition_to = em.employee_id')
                ->join('job_title jt', 'em.id_job_title = jt.job_title_id')
                ->where('md.mail_disposition_id', $disposition_id) 
                ->order_by('md.id_mail_inbox', 'desc');
        $query = $this->db->get();
		//echo $this->db->last_query();
        return $query->result();
	}

}