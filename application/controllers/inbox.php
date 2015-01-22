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

class Inbox extends MY_Basic_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mail_model');
    }

    public function add() {
        if ($this->session->userdata('is_logged_in') == true) {
            if ($this->session->userdata('user_group_level') == '1') {
                $this->layout->display('mail/inbox/add');
            } else {
                $this->layout->displays('mail/inbox/add');
            }
        } else {
            redirect('media/relogin');
        }
    }

    public function disposition() {
        $this->data['data_mail'] = $this->mail_model->get_mail_inbox();

        if ($this->session->userdata('is_logged_in') == true) {
            if ($this->session->userdata('user_group_level') == '1') {
                $this->layout->display('mail/inbox/disposition', $this->data);
            } else {
                $this->layout->displays('mail/inbox/disposition', $this->data);
            }
        } else {
            redirect('media/relogin');
        }
    }

    public function edit() {
        if ($this->session->userdata('is_logged_in') == true) {
            if ($this->session->userdata('user_group_level') == '1') {
                $this->layout->display('mail/inbox/edit');
            } else {
                $this->layout->displays('mail/inbox/edit');
            }
        } else {
            redirect('media/relogin');
        }
    }

}

/* End of file inbox.php */
/* Location: ./application/controllers/inbox.php */