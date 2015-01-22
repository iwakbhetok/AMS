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

class Outbox extends MY_Basic_Controller {

    public function add() {
        if ($this->session->userdata('is_logged_in') == true) {
            if ($this->session->userdata('user_group_level') == '1') {
                $this->layout->display('mail/outbox/add', $this->data);
            } else {
                $this->layout->displays('mail/outbox/add', $this->data);
            }
        } else {
            redirect('media/relogin');
        }
    }

}

/* End of file outbox.php */
/* Location: ./application/controllers/outbox.php */