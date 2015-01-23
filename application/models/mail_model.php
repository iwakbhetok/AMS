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

class Mail_Model extends CI_Model {

    var $user_login;

    function __construct() {
        parent::__construct();
    }

    function get_mail_inbox() {
        $this->db
                ->select('*')
                ->from('mail_inbox')
                ->order_by('mail_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_mail_inbox_by($staff) {
        $this->db
                ->select('mi.*, mi.description as descrip, jt.job_title_name')
                ->from('mail_inbox mi')
				->join('job_title jt', 'jt.job_title_id = mi.mail_approved_by')
                ->where('mi.mail_approved_by', $staff)
                ->or_where('mi.created_by', $staff)
                ->order_by('mi.mail_id desc');
        $query = $this->db->get();
		//echo $this->db->last_query();
        return $query->result();
    }

    function get_mail_inbox_by_id($mail) {
        $this->db
                ->select('mail_id, mail_number, mail_date, mail_subject, mail_type, mail_approved_by, description, attachment')
                ->from('mail_inbox')
                ->or_where('mail_id', $mail)
                ->order_by('mail_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_mail_outbox($employee) {
        $this->db
                ->select('im.*')
                ->from('mail_outbox im')
                ->where('created_by', $employee)
                ->order_by('im.mail_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_mail_outbox_approval() {
        $this->db
                ->select('im.*, ma.mail_approval_status')
                ->from('mail_outbox im')
                ->join('mail_approval ma', 'im.mail_id = ma.mail_id')
                ->order_by('im.mail_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_mail_outbox_by($staff) {
        $this->db
                ->select('*')
                ->from('mail_outbox')
                ->where('mail_approved_by', $staff)
                ->or_where('created_by', $staff)
                ->order_by('mail_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_mail_outbox_by_id($mail) {
        $this->db
                ->select('mail_id, mail_number, mail_date, mail_subject, mail_type, mail_to, description, attachment')
                ->from('mail_outbox')
                ->or_where('mail_id', $mail)
                ->order_by('mail_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_mail_outbox_approval_by_id($mail) {
        $this->db
                ->select('*')
                ->from('mail_approval')
                ->or_where('mail_id', $mail)
                ->order_by('mail_approval_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_form_by_mail($mail) {
        $this->db
                ->select('c, em1.employee_name too, em2.employee_name assigns, mail_id')
                ->from('form fr')
                ->join('employee em1', 'fr.to = em1.employee_id')
                ->join('employee em2', 'fr.assign = em2.employee_id')
                ->or_where('mail_id', $mail)
                ->order_by('form_id');
        $query = $this->db->get();
        return $query->result();
    }

    function update_mail_by_id($id, $data) {
        $this->db->where('mail_id', $id);
        return $this->db->update('mail_inbox', $data);
    }

    function updateapproval($id, $data) {
        $this->db->where('mail_id', $id);
        return $this->db->update('mail_approval', $data);
    }

    function update_mail_outbox_by_id($id, $data) {
        $this->db->where('mail_id', $id);
        return $this->db->update('mail_outbox', $data);
    }

    function create($data) {
        if ($this->db->insert('mail_inbox', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function create_outbox($data) {
        if ($this->db->insert('mail_outbox', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function create_disposition($data) {
        if ($this->db->insert('mail_disposition', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function createapproval($data) {
        if ($this->db->insert('mail_approval', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function createform($data) {
        if ($this->db->insert('form', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete_data($table_name, $id) {
        $this->db->where($table_name . '_id', $id);
        return $this->db->delete($table_name);
    }

    function get_selected_data($table_name, $data) {
        return $this->db->get_where($table_name, $data);
    }

    function insert_data($table, $data) {
        $this->db->insert($table, $data);
    }

    function update_data($table, $data, $field_key) {
        $this->db->update($table, $data, $field_key);
    }

    function get_data_all($table_name) {
        return $this->db->get($table_name);
    }

    function get_mail_approval($staff) {
        $this->db
                ->select('ma.*, mo.mail_number, mo.mail_date, mo.mail_subject, mo.attachment, em.employee_name, jt.job_title_name, em.nrp')
                ->from('mail_approval ma')
                ->join('mail_outbox mo', 'ma.mail_id = mo.mail_id')
                ->join('form fr', 'ma.mail_id = fr.mail_id')
                ->join('employee em', 'ma.created_by = em.employee_id')
                ->join('job_title jt', 'em.job_title_id = jt.job_title_id')
                ->where('fr.to', $staff)
                ->where('mo.mail_status', 1)
                ->order_by('ma.mail_approval_id', 'desc')
                ->limit(1);
        $query = $this->db->get();
        return $query->result();
    }        

    function get_max_mail_approval($staff) {
        $this->db->select('count(ma.mail_id)n')
                ->from('mail_approval ma')
                ->join('form fr', 'ma.mail_id = fr.mail_id')
                ->where('fr.to', $staff);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }
    
    function get_max_mail_revision($staff) {
        $this->db->select('count(ma.mail_id)n')
                ->from('mail_revision ma')
                ->join('form fr', 'ma.mail_id = fr.mail_id')
                ->where('fr.to', $staff);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }
    
    function get_max_mail_inbox_disposition($staff) {
        $this->db->select('count(md.mail_disposition_id)n')
                ->from('mail_disposition md')
				->join('mail_inbox mi', 'mi.mail_id = md.mail_id')
                ->where('md.mail_disposition_to', $staff);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }
    
    function get_max_mail_outbox_disposition($staff) {
        $this->db->select('count(md.mail_disposition_id)n')
                ->from('mail_disposition md')                
                ->where('md.created_by', $staff);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }
    
    function get_max_mail_inbox($staff) {
        $this->db->select('count(mail_id)n')
                ->from('mail_inbox')                
                ->where('mail_approved_by', $staff)
                ->or_where('created_by', $staff);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }
    
    function get_max_mail_outbox($staff) {
        $this->db->select('count(mail_id)n')
                ->from('mail_outbox')                
                ->where('created_by', $staff);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_mail_disposition($mail) {
        $this->db
                ->select('md.*, mi.mail_id, mi.mail_number, mi.mail_date, mi.mail_subject, mi.mail_type, mi.attachment, em.employee_name, em.nrp, jt.job_title_name')
                ->from('mail_disposition md')
                ->join('mail_inbox mi', 'md.mail_id = mi.mail_id')
                ->join('employee em', 'md.mail_disposition_to = em.employee_id')
                ->join('job_title jt', 'em.job_title_id = jt.job_title_id')
                ->where('md.mail_id', $mail)
                ->order_by('md.mail_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function get_mail_detail($mail_id) {
        $this->db
                ->select('*')
                ->from('mail_inbox')
                ->where('mail_id', $mail_id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    function get_mail_dispositionxxxxx($staff) {
        $this->db
                ->select('mi.*, md.mail_disposition_status, em.employee_name, em.nrp, jt.job_title_name')
                ->from('mail_inbox mi')
                ->join('mail_disposition md', 'mi.mail_id = md.mail_id')
                ->join('employee em', 'mi.created_by = em.employee_id')
                ->join('job_title jt', 'em.job_title_id = jt.job_title_id')
                ->where('mi.mail_approved_by', $staff)
                ->order_by('mi.mail_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function get_mail_revision() {
        $this->db
                ->select('mr.*, mo.mail_number, mo.mail_date, mo.mail_subject, em.employee_name, jt.job_title_name, em.nrp')
                ->from('mail_revision mr')
                ->from('mail_outbox mo', 'ma.mail_id = mo.mail_id')
                ->join('employee em', 'mr.created_by = em.employee_id')
                ->join('job_title jt', 'em.job_title_id = jt.job_title_id')
                ->order_by('mr.mail_revision_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_mail_revision_by_id($key) {
        $this->db
                ->select('*')    
                ->from('mail_revision')
                ->where('mail_id', $key);
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_mail_revision_by_staff($staff) {
        $this->db
                ->select('ma.*, mo.mail_number, mo.mail_date, mo.mail_subject, mo.attachment, em.employee_name, jt.job_title_name, em.nrp')
                ->from('mail_approval ma')
                ->join('mail_outbox mo', 'ma.mail_id = mo.mail_id')
                ->join('form fr', 'ma.mail_id = fr.mail_id')
                ->join('employee em', 'ma.created_by = em.employee_id')
                ->join('job_title jt', 'em.job_title_id = jt.job_title_id')
                ->where('fr.to', $staff)
                ->where('mo.mail_status', 1)
                ->order_by('ma.mail_approval_id', 'desc')
                ->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    function get_mail_by_staff($staff) {
        $this->db
                ->select('im.*')
                ->from('mail_inbox im')
                ->join('division di', 'di.division_id = im.division_id')
                ->where('im.mail_approved', 1)
                ->where('im.mail_replied', 0)
                ->where('im.mail_approved_date', get_current_date())
                ->where('im.mail_approved_to', $staff)
                ->order_by('im.mail_inbox_id');
        $query = $this->db->get();
        return $query->result();
    }
	
	function get_last_mail_registry_number(){
		$this->db
				->select('im.mail_registry_number')
                ->from('mail_inbox im')
                ->order_by('im.mail_registry_number desc');
        $query = $this->db->get();
        $res = $query->result();
		foreach ($res as $r) {
            return $r->mail_registry_number;
        }
	}
	
	function get_all_mail_inbox() {
        $this->db
                ->select('mi.*, mi.description as descrip, jt.job_title_name')
                ->from('mail_inbox mi')
				->join('job_title jt', 'jt.job_title_id = mi.mail_approved_by')
                ->order_by('mi.mail_id desc');
        $query = $this->db->get();
        return $query->result();
    }
	
	function get_mail_inbox_number() {
        $this->db
                ->select('mi.mail_number')
                ->from('mail_inbox mi')
                ->order_by('mi.mail_number desc');
        $query = $this->db->get();
		foreach ($query->result_array() as $row){
			$new_set['id'] = htmlentities(stripslashes($row['mail_id']));
			$new_set['value'] = htmlentities(stripslashes($row['mail_number']));
			$row_set[] = $new_set;
		}
		echo json_encode($row_set);
        //return $query->result();
    }

}
