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

class Media_Model extends CI_Model {

    var $user_login;

    function __construct() {
        parent::__construct();
    }

    function delete_data_by_id($table_name, $id) {
        $this->db->where($table_name . '_id', $id);
        return $this->db->delete($table_name);
    }

    function get_data_by_id($table_name, $id) {
        $this->db->select('*')
                ->from($table_name)
                ->where($table_name . '_id', $id)->limit(1);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    function update_data_by_id($table_name, $id, $data) {
        $this->db->where($table_name . '_id', $id);
        return $this->db->update($table_name, $data);
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

    function create_data($table_name, $data) {
        return $this->db->insert($table_name, $data);
    }

    function get_user_login() {
        return $this->user_login;
    }

    function is_loggedIn($user, $password) {
        $result = FALSE;
        $user = anti_injection($user);
        $password = anti_injection($password);
        $this->db->
                select('u.*, jt.job_title_name, ug.user_group_id, ug.user_group_name, ug.user_group_level, dept.department_name, jt.id_department')
                ->from('employee u')
				->join('job_title jt', 'jt.job_title_id = u.id_job_title')
                ->join('user_group ug', 'ug.user_group_id = jt.id_user_group')
                ->join('department dept', 'dept.department_id = jt.id_department')
                //->join('division dv', 'dv.division_id = u.division_id')
                //->join('sub_division sdv', 'sdv.sub_division_id = u.sub_division_id')
                //->join('unit un', 'un.unit_id = u.unit_id')      
                ->where('u.user_name', $user)
                ->where('u.user_password', md5($password))
                ->limit(1);
        $query = $this->db->get();
        $res = $query->result();
		//print_r($this->db->last_query());
        if (count($res) > 0) {
            $this->user_login = $res;
            $result = TRUE;
        }
        return $result;
    }

    /* Function for Initializing Monitoring - Begin */

    function get_all_mail() {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox');
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_mail_inbox_by_staff($staff) {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox')
                ->where('created_by', $staff);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_mail_inbox_by_dept($dept) {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox')
                ->where('department_id', $dept);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_open_mail() {
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

    function get_open_mail_by_dept($dept) {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox')
                ->where('mail_replied !=', 1)
                ->where('department_id', $dept);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_closed_mail() {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox')
                ->where('mail_replied', 1);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_closed_mail_by_dept($dept) {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox')
                ->where('mail_replied', 1)
                ->where('department_id', $dept);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_outgoing_mail_all() {
        $this->db->select('count(outgoing_mail_id)n')
                ->from('outgoing_mail');
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_outgoing_mail_by_staff($staff) {
        $this->db->select('count(outgoing_mail_id)n')
                ->from('outgoing_mail')
                ->where('created_by', $staff);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_outgoing_mail_by_dept($dept) {
        $this->db->select('count(outgoing_mail_id)n')
                ->from('outgoing_mail')
                ->where('department_id', $dept);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_current_mail() {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox')
                ->where('mail_approved !=', 1)
                ->where('mail_replied !=', 1)
                ->where('received_date', get_current_date());
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_responded_mail_by_staff($staff) {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox')
                ->where('mail_replied_by', $staff);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_not_responded_mail() {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox')
                ->where('mail_approved !=', 1)
                ->where('mail_replied !=', 1)
                ->where('received_date !=', get_current_date());
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_not_responded_mail_by_staff($staff) {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox')
                ->where('mail_approved_to', $staff)
                ->where('mail_approved', 1)
                ->where('mail_replied !=', 1)
                ->where('received_date !=', get_current_date());
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_approved_mail() {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox')
                ->where('mail_approved', 1)
                ->where('mail_replied !=', 1);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_replied_mail() {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox')
                ->where('mail_approved', 1)
                ->where('mail_replied', 1);
        ;
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_government_mail() {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox');
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_agent_mail() {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox');
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_applicant_mail() {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox');
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_translator_mail() {
        $this->db->select('count(mail_inbox_id)n')
                ->from('mail_inbox');
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_active_project_patent() {
        $this->db->select('count(file_no)n')
                ->from('patent')
                ->where('status !=', 1);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_active_project_copyright() {
        $this->db->select('count(file_no)n')
                ->from('copyright')
                ->where('status !=', 1);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_active_project_design() {
        $this->db->select('count(file_no)n')
                ->from('design')
                ->where('status !=', 1);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_active_project_trademark() {
        $this->db->select('count(file_no)n')
                ->from('trademark')
                ->where('status !=', 1);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_closed_project_patent() {
        $this->db->select('count(file_no)n')
                ->from('patent')
                ->where('status', 1);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_closed_project_copyright() {
        $this->db->select('count(file_no)n')
                ->from('copyright')
                ->where('status', 1);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_closed_project_design() {
        $this->db->select('count(file_no)n')
                ->from('design')
                ->where('status', 1);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_closed_project_trademark() {
        $this->db->select('count(file_no)n')
                ->from('trademark')
                ->where('status', 1);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->n;
        }
        return n;
    }

    function get_partner_email($emp_id) {
        $this->db->select("*")
                ->from('partner')
                ->where('partner_id', $emp_id)->limit(1);
        $query = $this->db->get();
        $res = $query->result();
    }

    function get_partner_id_by_file_id($file_id) {
        $this->db->select('m.partner_id')
                ->from('mail_inbox_document df')
                ->join('mail_inbox m', 'm.mail_inbox_id = df.mail_inbox_id')
                ->where('df.mail_inbox_id', $file_id);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $r) {
            return $r->partner_id;
        }
        return 0;
    }

    function get_project_by_file_no($file_no) {
        $this->db
                ->select("id.*, ot.order_type_name, dept.department_name, di.division_name")
                ->from('mail_inbox_document id')
                ->join('mail_inbox im', 'im.mail_inbox_id = id.mail_inbox_id')
                ->join('department dept', 'dept.department_id = im.department_id')
                ->join('division di', 'di.division_id = im.division_id')
                ->join('order_type ot', 'ot.order_type_id = im.order_type_id')
                ->where('id.file_no', $file_no);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    function get_project_by_file_no_detail($file_no) {
        $this->db->select('m.mail_inbox_id mail_inbox_id, m.created_date entry_date, m.mail_date, m.received_date, m.other_info,
            part.partner_name, part.email,
            e.employee_name, rv.send_via_name receipt_via,
            part.partner_id, part.partner_name agent, part.address, part.phone phone_number,
            lt.letter_type_name mail_type,
            ot.order_type_name mail_category,
            ms.mail_subject_name mail_subject, ms.other_info subject_description,
            pd.file_name, pd.file_no, pd.app_no, pd.ref_no, pd.mail_inbox_document_id           
            ')
                ->from('mail_inbox_document pd')
                ->join('mail_inbox m', 'm.mail_inbox_id = pd.mail_inbox_id')
                ->join('send_via rv', 'rv.send_via_id = m.send_via_id')
                ->join('partner part', 'part.partner_id = m.partner_id')
                ->join('letter_type lt', 'lt.letter_type_id = m.partner_type_id')
                ->join('order_type ot', 'ot.order_type_id = m.order_type_id')
                ->join('mail_subject ms', 'ms.mail_subject_id = m.mail_subject_id')
                ->join('employee e', 'e.employee_id = m.created_by')
                ->where('pd.file_no', $file_no);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    function get_project_detail_by_file_no_detail($file_no) {
        $this->db->select('m.mail_inbox_id mail_inbox_id, m.created_date entry_date, m.mail_date, m.received_date, m.other_info,
            part.partner_name, part.email,
            e.employee_name, rv.send_via_name receipt_via,
            part.partner_id, part.partner_name agent, part.address, part.phone phone_number,
            lt.letter_type_name mail_type,
            ot.order_type_name mail_category,
            ms.mail_subject_name mail_subject, ms.other_info subject_description,
            pd.file_name, pd.file_no, pd.app_no, pd.ref_no, pd.mail_inbox_document_id           
            ')
                ->from('mail_inbox_document pd')
                ->join('mail_inbox m', 'm.mail_inbox_id = pd.mail_inbox_id')
                ->join('send_via rv', 'rv.send_via_id = m.send_via_id')
                ->join('partner part', 'part.partner_id = m.partner_id')
                ->join('letter_type lt', 'lt.letter_type_id = m.partner_type_id')
                ->join('order_type ot', 'ot.order_type_id = m.order_type_id')
                ->join('mail_subject ms', 'ms.mail_subject_id = m.mail_subject_id')
                ->join('employee e', 'e.employee_id = m.created_by')
                ->where('pd.file_no', $file_no);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    function get_document_file($mail_id) {
        $this->db->select('*')
                ->from('mail_inbox_document')
                ->where('file_no', $mail_id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    function get_reply_file($mail_id) {
        $this->db->select('id.*, mr.*')
                ->from('mail_inbox_document id')
                ->join('mail_reply mr', 'mr.mail_inbox_id = id.mail_inbox_id')
                ->where('id.file_no', $mail_id);
        $query = $this->db->get();
        $res = $query->result();

        return $res;
    }

    /* Function for Initializing Monitoring - End */
}
