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

class Report extends MY_Basic_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mail_model');
    }

    public function inbox() {
        $page = $this->uri->segment(3);
        $this->data['data_all_mail'] = $this->mail_model->get_all_mail_inbox();
		
        if ($this->session->userdata('is_logged_in') == true) {
            if ($this->session->userdata('user_group_level') == '1') {
                $this->layout->display('report/inbox', $this->data);
            } else {
                $this->layout->displays('report/inbox', $this->data);
            }
        } else {
            redirect('media/relogin');
        }
    }

    function outbox() {
        $page = $this->uri->segment(3);
        
        if ($this->session->userdata('is_logged_in') == true) {
            if ($this->session->userdata('user_group_level') == '1') {
                $this->layout->display('report/outbox', $this->data);
            } else {
                $this->layout->displays('report/outbox', $this->data);
            }
        } else {
            redirect('media/relogin');
        }
    }

}

/* End of file report.php */
/* Location: ./application/controllers/report.php */