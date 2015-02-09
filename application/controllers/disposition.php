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

class Disposition extends MY_Basic_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('disposition_model');
        $this->load->model('mail_model');
        $this->load->model('user_model');
    }

    public function inbox() {
        $employee = $this->session->userdata('employee_id');
        $page = $this->uri->segment(3);
        $param = $this->uri->segment(4);
        $this->data['data_disposition'] = $this->disposition_model->get_disposition_inbox($employee);
        $this->data['data_mail'] = $this->mail_model->get_mail_inbox();
        $this->data['data_user'] = $this->user_model->get_employee($employee);
        if ($page == 'list') {
            if ($this->session->userdata('is_logged_in') == true) {
                    $this->layout->display('disposition/inbox/list', $this->data);
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'add') {
            if ($this->session->userdata('is_logged_in') == true) {
                    $this->layout->display('mail/inbox/add', $this->data);
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'edit') {
            $this->data['data_disposition'] = $this->disposition_model->get_disposition_inbox();
            if ($this->session->userdata('is_logged_in') == true) {
                    if ($param == 'edit') {
                        $this->layout->display('mail/inbox/edit', $this->data);
                    }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'delete') {
            $this->data['data_disposition'] = $this->disposition_model->get_disposition_inbox();
            if ($this->session->userdata('is_logged_in') == true) {
                    if ($param == 'edit') {
                        $this->layout->display('disposition/inbox', $this->data);
                    }
            } else {
                redirect('media/relogin');
            }
        } else {
            $this->load->view('media/404');
        }
    }

    public function outbox() {
        $employee = $this->session->userdata('employee_id');
        $page = $this->uri->segment(3);
        $param = $this->uri->segment(4);
        $this->data['data_disposition'] = $this->disposition_model->get_disposition_outbox($employee);
        $this->data['data_mail'] = $this->mail_model->get_mail_inbox();
        $this->data['data_user'] = $this->user_model->get_employee($employee);
        if ($page == 'list') {
            if ($this->session->userdata('is_logged_in') == true) {
                    $this->layout->display('disposition/outbox/list', $this->data);
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'add') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('mail/inbox/add', $this->data);
                } else {
                    $this->layout->displays('mail/inbox/add', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'edit') {
            $this->data['data_disposition'] = $this->disposition_model->get_disposition_inbox();
            if ($this->session->userdata('is_logged_in') == true) {
                    if ($param == 'edit') {
                        $this->layout->display('mail/inbox/edit', $this->data);
                    }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'delete') {
            $this->data['data_disposition'] = $this->disposition_model->get_disposition_inbox();
            if ($this->session->userdata('is_logged_in') == true) {
                    if ($param == 'edit') {
                        $this->layout->display('disposition/inbox', $this->data);
                    }
            } else {
                redirect('media/relogin');
            }
        } else {
            $this->load->view('media/404');
        }
    }

    public function add() {
        if ($this->session->userdata('is_logged_in') == true) {
                $this->layout->display('disposition/add', $this->data);
        } else {
            redirect('media/relogin');
        }
    }

    public function inboxc() {
        $this->data['data_disposition'] = $this->disposition_model->get_disposition_inbox();

        if ($this->session->userdata('is_logged_in') == true) {
                $this->layout->display('disposition/inbox', $this->data);
        } else {
            redirect('media/relogin');
        }
    }

    public function outboxz() {
        $this->data['data_disposition'] = $this->disposition_model->get_disposition_outbox();

        if ($this->session->userdata('is_logged_in') == true) {
                $this->layout->display('disposition/outbox', $this->data);
        } else {
            redirect('media/relogin');
        }
    }

}

/* End of file disposition.php */
/* Location: ./application/controllers/disposition.php */