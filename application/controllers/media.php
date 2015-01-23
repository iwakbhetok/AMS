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

class Media extends MY_Basic_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('mail_model');
        $this->load->model('disposition_model');
        $this->load->helper(array('form', 'url'));
    }
	
	public function magnificpopup() {
        if ($this->session->userdata('is_logged_in') == true) {
            if ($this->session->userdata('user_group_level') == '1') {
                $this->layout->display('media/magnificpopup');
            } else {
                $this->layout->displays('media/magnificpopup');
            }
        } else {
            redirect('media/relogin');
        }
    }    

    public function dashboard() {
		$this->data['data_all_mail'] = $this->mail_model->get_all_mail_inbox();
        if ($this->session->userdata('is_logged_in') == true) {
            if ($this->session->userdata('user_group_level') == '1') {
                $this->layout->display('media/dashboard', $this->data);
            } else {
                $this->layout->displays('media/dashboard', $this->data);
            }
        } else {
            redirect('media/relogin');
        }
    }

    public function do_login() {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        if ($this->media_model->is_loggedIn($username, $password)) {
            $login_data = $this->media_model->get_user_login();
            foreach ($login_data as $r) {
                $data = array(
                    'is_logged_in' => TRUE,                                       
                    'employee_id' => $r->employee_id,
                    'user_group_level' => $r->user_group_level,
                    'department_id' => $r->department_id,
                    'division_id' => $r->division_id,
                    'sub_division_id' => $r->sub_division_id,
                    'unit_id' => $r->unit_id,
                    'job_title_id' => $r->job_title_id,
                    'employee_name' => $r->employee_name,
                    'gender' => $r->gender == 1 ? "Male" : "Female",
                    'user_name' => $r->user_name,
                    'user_group_name' => $r->user_group_name, 
                    'department_name' => $r->department_name,
                    'division_name' => $r->division_name,
                    'sub_division_name' => $r->sub_division_name,
                    'unit_name' => $r->unit_name,
                    'job_title_name' => $r->job_title_name,
                    'pangkat' => $r->pangkat,
                    'last_logged_in' => $r->last_logged_in,
                    'last_logged_out' => $r->last_logged_out,
                );

                $this->session->set_userdata($data);
                break;
            }

            $employee_id = $this->session->userdata('employee_id');

            $data1 = array(
                'last_logged_in' => get_current_date_time()
            );
            foreach ($data1 as $k => $v) {
                $data1[$k] = $v;
            }
            $this->media_model->update_data_by_id('employee', $employee_id, $data1);

            redirect('media/dashboard');
        } else {
            $this->session->set_flashdata('result_login', 'Incorrect username or password. Please try again!');
            redirect('media/relogin');
        }
    }

    public function help() {
        if ($this->session->userdata('is_logged_in') == true) {
            if ($this->session->userdata('user_group_level') == '1') {
                $this->layout->display('media/help');
            } else {
                $this->layout->displays('media/help');
            }
        } else {
            redirect('media/relogin');
        }
    }

    public function index() {
        $this->load->view('media/welcome');
    }

    public function login() {
        $this->load->view('media/login');
    }

    public function logout() {
        $employee_id = $this->session->userdata('employee_id');

        $data1 = array(
            'last_logged_out' => get_current_date_time()
        );
        foreach ($data1 as $k => $v) {
            $data1[$k] = $v;
        }
        $this->media_model->update_data_by_id('employee', $employee_id, $data1);

        $this->session->sess_destroy();
        redirect('media/login');
    }

    public function profile() {
        if ($this->session->userdata('is_logged_in') == true) {
            if ($this->session->userdata('user_group_level') == '1') {
                $this->layout->display('media/profile', $this->data);
            } else {
                $this->layout->displays('media/profile', $this->data);
            }
        } else {
            redirect('media/relogin');
        }
    }

    public function relogin() {
        $this->load->view('media/login');
    }

}

/* End of file media.php */
/* Location: ./application/controllers/media.php */