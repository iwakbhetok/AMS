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

class User extends MY_Basic_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('master_model');
        $this->load->model('department_model');
        $this->load->model('division_model');
        $this->load->model('subdivision_model');
        $this->load->model('jobtitle_model');
        $this->load->model('unit_model');
        $this->load->model('user_model');
    }

    public function account() {
        $page = $this->uri->segment(3);
        $param = $this->uri->segment(4);
        $this->data['data_user'] = $this->user_model->get_account_list();
        $this->data['data_user_group'] = $this->user_model->get_group_list();
        $this->data['data_job_title'] = $this->master_model->get_jobtitle();
        $this->data['data_unit'] = $this->master_model->get_unit();
        $this->data['data_subdivision'] = $this->master_model->get_subdivision();
        $this->data['data_division'] = $this->master_model->get_division();
        $this->data['data_department'] = $this->master_model->get_department();

        if ($page == 'add') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('user/account/add', $this->data);
                } else {
                    $this->layout->displays('user/account/add', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'create') {
            $data = array();
            $values = $this->input->post('val');
            foreach ($values as $k => $v) {
                if ($k == 'user_password') {
                    $v = md5($v);
                }
                $data[$k] = $v;
            }

            if ($this->user_model->create_account($data)) {
                redirect('user/account/list');
            }
        } else if ($page == 'delete') {
            if ($this->media_model->delete_data_by_id("employee", $param)) {
                redirect('user/account/list');
            }
        } else if ($page == 'detail') {
            $dev = $this->user_model->get_user_account_detail($param);
            $this->data['employee_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('user/account/detail', $this->data);
                } else {
                    $this->layout->displays('user/account/detail', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'edit') {
            $dev = $this->media_model->get_data_by_id('employee', $param);
            $this->data['employee_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('user/account/edit', $this->data);
                } else {
                    $this->layout->displays('user/account/edit', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'list') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('user/account/list', $this->data);
                } else {
                    $this->layout->displays('user/account/list', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'update') {
            $employee_id = $this->input->post('id');
            $values = $this->input->post('val');
            $data = array();
            foreach ($values as $key => $val) {
                $data[$key] = $val;
            }

            if ($this->media_model->update_data_by_id('employee', $employee_id, $data)) {
                redirect('user/account/list');
            }
        } else {
            $this->load->view('media/404');
        }
    }

    public function group() {
        $page = $this->uri->segment(3);
        $param = $this->uri->segment(4);
        $this->data['data_user'] = $this->user_model->get_group_list();

        if ($page == 'add') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('user/group/add', $this->data);
                } else {
                    $this->layout->displays('user/group/add', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'create') {
            $data = array();
            $values = $this->input->post('val');
            foreach ($values as $k => $v) {
                $data[$k] = $v;
            }

            if ($this->department_model->create($data)) {
                redirect('master/department/list');
            }
        } else if ($page == 'delete') {
            if ($this->media_model->delete_data_by_id("department", $param)) {
                redirect('master/department/list');
            }
        } else if ($page == 'detail') {
            $dev = $this->department_model->get_department_detail($param);
            $this->data['department_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/department/detail', $this->data);
                } else {
                    $this->layout->displays('master/department/detail', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'edit') {
            $dev = $this->media_model->get_data_by_id('department', $param);
            $this->data['department_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/department/edit', $this->data);
                } else {
                    $this->layout->displays('master/department/edit', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'list') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('user/group/list', $this->data);
                } else {
                    $this->layout->displays('user/group/list', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'update') {
            $department_id = $this->input->post('id');
            $values = $this->input->post('val');
            $data = array();
            foreach ($values as $key => $val) {
                $data[$key] = $val;
            }

            if ($this->media_model->update_data_by_id('department', $department_id, $data)) {
                redirect('master/department/list');
            }
        } else {
            $this->load->view('media/404');
        }
    }

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */