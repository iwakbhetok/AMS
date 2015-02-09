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

class My_Basic_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('media_model');
        $this->load->model('mail_model');
		$this->load->model('menu_model');
        $employee_id = $this->session->userdata('employee_id');
		$group_id = $this->session->userdata('user_group_id');
        $this->data['mail_approval'] = $this->mail_model->get_max_mail_approval($employee_id);
        $this->data['mail_inbox_disposition'] = $this->mail_model->get_max_mail_inbox_disposition($employee_id);
        $this->data['mail_outbox_disposition'] = $this->mail_model->get_max_mail_outbox_disposition($employee_id);
        $this->data['mail_inbox'] = $this->mail_model->get_max_mail_inbox($employee_id);
        $this->data['mail_outbox'] = $this->mail_model->get_max_mail_outbox($employee_id);
		
		$this->data['menu_headers'] = $this->menu_model->get_header_menu($group_id);
		$this->data['list_menu'] = $this->menu_model->get_list_menu();
		$this->data['list_group'] = $this->menu_model->get_list_group();
		$this->data['list_menu_access'] = $this->menu_model->get_list_menu_access();
        //$this->data['menu_header'] = $this->media_model->get_menu_header($employee_id);
        //$this->data['menu_role'] = $this->media_model->get_menu_role($employee_id);
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            return false;
        } else {
            return true;
        }
    }

}