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

class Master extends MY_Basic_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('master_model');
        $this->load->model('department_model');
        $this->load->model('division_model');
        $this->load->model('subdivision_model');
        $this->load->model('jobtitle_model');
        $this->load->model('unit_model');
        $this->load->model('mail_model');
        $this->load->model('user_model');
    }

    public function department() {
        $employee = $this->session->userdata('employee_id');
        $page = $this->uri->segment(3);
        $param = $this->uri->segment(4);
        $this->data['data_master'] = $this->master_model->get_department();
        $this->data['data_mail'] = $this->mail_model->get_mail_inbox();
        $this->data['data_user'] = $this->user_model->get_employee($employee);
        if ($page == 'add') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/department/add', $this->data);
                } else {
                    $this->layout->displays('master/department/add', $this->data);
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
                    $this->layout->display('master/department/list', $this->data);
                } else {
                    $this->layout->displays('master/department/list', $this->data);
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

    public function division() {
        $employee = $this->session->userdata('employee_id');
        $page = $this->uri->segment(3);
        $param = $this->uri->segment(4);
        $this->data['data_master'] = $this->master_model->get_division();
        $this->data['data_department'] = $this->master_model->get_department();
        $this->data['data_mail'] = $this->mail_model->get_mail_inbox();
        $this->data['data_user'] = $this->user_model->get_employee($employee);
        if ($page == 'add') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/division/add', $this->data);
                } else {
                    $this->layout->displays('master/division/add', $this->data);
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

            if ($this->division_model->create($data)) {
                redirect('master/division/list');
            }
        } else if ($page == 'delete') {
            if ($this->media_model->delete_data_by_id("division", $param)) {
                redirect('master/division/list');
            }
        } else if ($page == 'detail') {
            $dev = $this->division_model->get_division_detail($param);
            $this->data['division_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/division/detail', $this->data);
                } else {
                    $this->layout->displays('master/division/detail', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'edit') {
            $dev = $this->media_model->get_data_by_id('division', $param);
            $this->data['division_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/division/edit', $this->data);
                } else {
                    $this->layout->displays('master/division/edit', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'list') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/division/list', $this->data);
                } else {
                    $this->layout->displays('master/division/list', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'update') {
            $division_id = $this->input->post('id');
            $values = $this->input->post('val');
            $data = array();
            foreach ($values as $key => $val) {
                $data[$key] = $val;
            }

            if ($this->media_model->update_data_by_id('division', $division_id, $data)) {
                redirect('master/division/list');
            }
        } else {
            $this->load->view('media/404');
        }
    }

    public function subdivision() {
        $employee = $this->session->userdata('employee_id');
        $page = $this->uri->segment(3);
        $param = $this->uri->segment(4);
        $this->data['data_master'] = $this->master_model->get_subdivision();
        $this->data['data_division'] = $this->master_model->get_division();
        $this->data['data_department'] = $this->master_model->get_department();
        $this->data['data_mail'] = $this->mail_model->get_mail_inbox();
        $this->data['data_user'] = $this->user_model->get_employee($employee);
        if ($page == 'add') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/subdivision/add', $this->data);
                } else {
                    $this->layout->displays('master/subdivision/add', $this->data);
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

            if ($this->subdivision_model->create($data)) {
                redirect('master/subdivision/list');
            }
        } else if ($page == 'delete') {
            if ($this->media_model->delete_data_by_id("sub_division", $param)) {
                redirect('master/subdivision/list');
            }
        } else if ($page == 'detail') {
            $dev = $this->subdivision_model->get_subdivision_detail($param);
            $this->data['subdivision_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/subdivision/detail', $this->data);
                } else {
                    $this->layout->displays('master/subdivision/detail', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'edit') {
            $dev = $this->media_model->get_data_by_id('sub_division', $param);
            $this->data['subdivision_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/subdivision/edit', $this->data);
                } else {
                    $this->layout->displays('master/subdivision/edit', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'list') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/subdivision/list', $this->data);
                } else {
                    $this->layout->displays('master/subdivision/list', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'update') {
            $sub_division_id = $this->input->post('id');
            $values = $this->input->post('val');
            $data = array();
            foreach ($values as $key => $val) {
                $data[$key] = $val;
            }

            if ($this->media_model->update_data_by_id('sub_division', $sub_division_id, $data)) {
                redirect('master/subdivision/list');
            }
        } else {
            $this->load->view('media/404');
        }
    }

    public function unit() {
        $employee = $this->session->userdata('employee_id');
        $page = $this->uri->segment(3);
        $param = $this->uri->segment(4);
        $this->data['data_master'] = $this->master_model->get_unit();
        $this->data['data_subdivision'] = $this->master_model->get_subdivision();
        $this->data['data_division'] = $this->master_model->get_division();
        $this->data['data_department'] = $this->master_model->get_department();
        $this->data['data_mail'] = $this->mail_model->get_mail_inbox();
        $this->data['data_user'] = $this->user_model->get_employee($employee);
        if ($page == 'add') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/unit/add', $this->data);
                } else {
                    $this->layout->displays('master/unit/add', $this->data);
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

            if ($this->unit_model->create($data)) {
                redirect('master/unit/list');
            }
        } else if ($page == 'delete') {
            if ($this->media_model->delete_data_by_id("unit", $param)) {
                redirect('master/unit/list');
            }
        } else if ($page == 'detail') {
            $dev = $this->unit_model->get_unit_detail($param);
            $this->data['unit_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/unit/detail', $this->data);
                } else {
                    $this->layout->displays('master/unit/detail', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'edit') {
            $dev = $this->media_model->get_data_by_id('unit', $param);
            $this->data['unit_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/unit/edit', $this->data);
                } else {
                    $this->layout->displays('master/unit/edit', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'list') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/unit/list', $this->data);
                } else {
                    $this->layout->displays('master/unit/list', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'update') {
            $unit_id = $this->input->post('id');
            $values = $this->input->post('val');
            $data = array();
            foreach ($values as $key => $val) {
                $data[$key] = $val;
            }

            if ($this->media_model->update_data_by_id('unit', $unit_id, $data)) {
                redirect('master/unit/list');
            }
        } else {
            $this->load->view('media/404');
        }
    }

    public function jobtitle() {
        $employee = $this->session->userdata('employee_id');
        $page = $this->uri->segment(3);
        $param = $this->uri->segment(4);
        $this->data['data_master'] = $this->master_model->get_jobtitle();
        $this->data['data_mail'] = $this->mail_model->get_mail_inbox();
        $this->data['data_user'] = $this->user_model->get_employee($employee);
        if ($page == 'add') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/jobtitle/add', $this->data);
                } else {
                    $this->layout->displays('master/jobtitle/add', $this->data);
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

            if ($this->jobtitle_model->create($data)) {
                redirect('master/jobtitle/list');
            }
        } else if ($page == 'delete') {
            if ($this->media_model->delete_data_by_id("job_title", $param)) {
                redirect('master/jobtitle/list');
            }
        } else if ($page == 'detail') {
            $dev = $this->jobtitle_model->get_jobtitle_detail($param);
            $this->data['job_title_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/jobtitle/detail', $this->data);
                } else {
                    $this->layout->displays('master/jobtitle/detail', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'edit') {
            $dev = $this->media_model->get_data_by_id('job_title', $param);
            $this->data['jobtitle_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/jobtitle/edit', $this->data);
                } else {
                    $this->layout->displays('master/jobtitle/edit', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'list') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('master/jobtitle/list', $this->data);
                } else {
                    $this->layout->displays('master/jobtitle/list', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'update') {
            $jobtitle_id = $this->input->post('id');
            $values = $this->input->post('val');
            $data = array();
            foreach ($values as $key => $val) {
                $data[$key] = $val;
            }

            if ($this->media_model->update_data_by_id('job_title', $jobtitle_id, $data)) {
                redirect('master/jobtitle/list');
            }
        } else {
            $this->load->view('media/404');
        }
    }
	
	public function previllages(){
	$page = $this->uri->segment(3);
	if ($this->session->userdata('is_logged_in') == true) {
		$this->layout->display('master/previllages/list', $this->data);
		} else {
			redirect('media/relogin');
		}
	if ($page == 'update') {
		if ($this->session->userdata('is_logged_in') == true) {
			$menu_access = $this->menu_model->get_list_previllages();
			foreach ($menu_access as $key => $value) {
				$check = 'checkbox'.$value->id_user_menu.''.$value->id_user_group;
				if ($this->input->post($check) != '')
				{
					$data = array(
						'menu_access' => '1'
					);
					$this->menu_model->update($data, $value->id_user_group, $value->id_user_menu, 'user_menu_access');
				}
				else
				{
					$data = array(
						'menu_access' => '0'
					);
					$this->menu_model->update($data, $value->id_user_group, $value->id_user_menu, 'user_menu_access');
				}
			}
		}else {
			redirect('media/relogin');
		}
		redirect('master/previllages');
	}
	if ($page == 'add') {
	echo 'HERE';
	}
	
	}

}

/* End of file master.php */
/* Location: ./application/controllers/master.php */