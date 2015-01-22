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

class Disposition_Model extends CI_Model {

    var $user_login;

    function __construct() {
        parent::__construct();
    }
    
    function get_disposition_inbox($staff) {
        $this->db
                ->select('md.*, mi.mail_id, mi.mail_number, mi.mail_date, mi.mail_subject, mi.mail_type, mi.attachment, em.employee_name, em.nrp, jt.job_title_name')
                ->from('mail_disposition md')
                ->join('mail_inbox mi', 'md.mail_id = mi.mail_id')
                ->join('employee em', 'md.created_by = em.employee_id')
                ->join('job_title jt', 'em.job_title_id = jt.job_title_id')
                ->where('md.mail_disposition_to', $staff)                
                ->order_by('md.mail_id', 'desc');
        $query = $this->db->get();
		//var_dump($query);
        return $query->result();
    }
    
    function get_disposition_outbox($staff) {
        $this->db
                ->select('md.*, mi.mail_id, mi.mail_number, mi.mail_date, mi.mail_subject, mi.mail_type, mi.attachment, em.employee_name, em.nrp, jt.job_title_name')
                ->from('mail_disposition md')
                ->join('mail_inbox mi', 'md.mail_id = mi.mail_id')
                ->join('employee em', 'md.mail_disposition_to = em.employee_id')
                ->join('job_title jt', 'em.job_title_id = jt.job_title_id')
                ->where('md.created_by', $staff)                
                ->order_by('md.mail_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

}