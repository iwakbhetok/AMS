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

class Mail extends MY_Basic_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('mail_model');
        $this->load->model('disposition_model');
        $this->load->helper(array('form', 'url'));
    }

    public function approval() {
        $employee = $this->session->userdata('employee_id');
        $this->data['data_mail'] = $this->mail_model->get_mail_approval($employee);

        if ($this->session->userdata('is_logged_in') == true) {
            if ($this->session->userdata('user_group_level') == '1') {
                $this->layout->display('mail/approval/list', $this->data);
            } else {
                $this->layout->displays('mail/approval/list', $this->data);
            }
        } else {
            redirect('media/relogin');
        }
    }

    public function disposition() {
        $employee = $this->session->userdata('employee_id');
        $page = $this->uri->segment(3);
        $mail = $this->uri->segment(4);
        $this->data['data_disposition'] = $this->mail_model->get_mail_disposition($mail);
        $this->data['data_user'] = $this->user_model->get_employee($employee);

        if ($page == 'list') {
            $dev = $this->mail_model->get_mail_detail($mail);
            $this->data['mail_number'] = $mail;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('mail/disposition/list', $this->data);
                } else {
                    $this->layout->displays('mail/disposition/list', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'add') {
            $dev = $this->mail_model->get_mail_detail($mail);
            $this->data['mail_id'] = $mail;
            $this->data['mail_number'] = $mail;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    if ($param == 'edit') {
                        $this->layout->display('mail/disposition/add', $this->data);
                    }
                } else {
                    $this->layout->displays('mail/disposition/add', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'create') {
            $mail = $this->uri->segment(4);
            $data = array();
            $values = $this->input->post('val');
            foreach ($values as $k => $v) {
                $data[$k] = $v;
            }
            if ($this->mail_model->create_disposition($data)) {
                redirect('mail/disposition/list');
            }
        } else if ($page == 'edit') {
            $dev = $this->mail_model->get_mail_detail($mail);
            $this->data['mail_id'] = $mail;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    if ($param == 'edit') {
                        $this->layout->display('mail/disposition/edit', $this->data);
                    }
                } else {
                    $this->layout->displays('mail/disposition/edit', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else {
            $this->load->view('media/404');
        }
    }

    function do_upload() {
        $timex = time();
        $datex = date("ymmd");
        $config['upload_path'] = './upload/inbox/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $config['max_size'] = '20000';
        $config['max_width'] = '30000';
        $config['max_height'] = '30000';
        $config['file_name'] = $timex . $datex;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('dokumen')) {
            //echo "Gagal Upload";
            echo $this->upload->display_errors();
        } else {
            $file_data = $this->upload->data();
            $filenya = $timex . $datex . $file_data['file_ext'];
            $type_file = $file_data['file_ext'];
            $data = array(
                'attachment' => $filenya
            );
            $values = $this->input->post('val');
			$date = $this->input->post('mail_date');
			$date_arr = explode("-", $date);
			$date_new_format = $date_arr[2].'-'.$date_arr[1].'-'.$date_arr[0];
			$data['mail_date'] = $date_new_format;
            foreach ($values as $k => $v) {
                $data[$k] = $v;
            }
            if ($this->mail_model->create($data)) {
                redirect('mail/inbox/list');
                //echo "Berhasil Upload";
            }
        }
    }

    function do_upload2() {
        $timex = time();
        $datex = date("ymmd");
        $config['upload_path'] = './upload/inbox/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $config['max_size'] = '20000';
        $config['max_width'] = '30000';
        $config['max_height'] = '30000';
        $config['file_name'] = $timex . $datex;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('dokumen')) {
            $key = $this->input->post('id');
            $data = array();
            $values = $this->input->post('val');
            foreach ($values as $k => $v) {
                $data[$k] = $v;
            }
            if ($this->mail_model->update_mail_by_id($key, $data)) {
                redirect('mail/inbox/list');
                //echo "Berhasil Upload";
            }
            //echo "Gagal Upload";
            //echo $this->upload->display_errors();
        } else {
            $key = $this->input->post('id');
            $file_data = $this->upload->data();
            $filenya = $timex . $datex . $file_data['file_ext'];
            $type_file = $file_data['file_ext'];
            $data = array(
                'attachment' => $filenya
            );
            $values = $this->input->post('val');
            foreach ($values as $k => $v) {
                $data[$k] = $v;
            }
            if ($this->mail_model->update_mail_by_id($key, $data)) {
                redirect('mail/inbox/list');
                //echo "Berhasil Upload";
            }
        }
    }

    public function inbox() {
        $employee = $this->session->userdata('employee_id');
        $page = $this->uri->segment(3);
        $param = $this->uri->segment(4);
		$this->data['data_all_mail'] = $this->mail_model->get_all_mail_inbox();
        $this->data['data_mail'] = $this->mail_model->get_mail_inbox_by($employee);
        $this->data['data_user'] = $this->user_model->get_job_title();
		
		$last_no_reg = $this->mail_model->get_last_mail_registry_number();
		$no_reg_arr = explode("-", $last_no_reg);
		if (empty($last_no_reg)){
			$new_number_reg = date('y').'-'.'1';
		}
		else {
			if ($no_reg_arr[0] != date('y')){
				$new_number_reg = date('y').'-'.'1';
			}
			else {
				$new_number_reg = date('y').'-'.($no_reg_arr[1] + 1);
			}
		}		
		$this->data['no_reg'] = $new_number_reg;
		
        if ($page == 'list') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('mail/inbox/list', $this->data);
                } else {
                    $this->layout->displays('mail/inbox/list', $this->data);
                }
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
        } else if ($page == 'create') {
            $this->do_upload();
        } else if ($page == 'edit') {
            $dev = $this->mail_model->get_mail_inbox_by_id($param);
            $this->data['mail_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    if ($param == 'edit') {
                        $this->layout->display('mail/inbox/edit', $this->data);
                    }
                } else {
                    $this->layout->displays('mail/inbox/edit', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'update') {
            $this->do_upload2();
        } else if ($page == 'delete') {
            $this->data['data_disposition'] = $this->disposition_model->get_disposition_inbox();
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    if ($param == 'edit') {
                        $this->layout->display('disposition/inbox', $this->data);
                    }
                } else {
                    $this->layout->displays('disposition/inbox', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } 
		else if ($page == 'auto_number') {
		/*
    if (isset($_GET['term'])){
      $q = strtolower($_GET['term']);
      $this->birds_model->get_bird($q);
   
  } */
		}
		else {
            $this->load->view('media/404');
        }
    }

    function do_upload3() {
        $timex = time();
        $datex = date("ymmd");
        $config['upload_path'] = './upload/outbox/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $config['max_size'] = '20000';
        $config['max_width'] = '30000';
        $config['max_height'] = '30000';
        $config['file_name'] = $timex . $datex;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('dokumen')) {
            //echo "Gagal Upload";
            echo $this->upload->display_errors();
        } else {
            $file_data = $this->upload->data();
            $filenya = $timex . $datex . $file_data['file_ext'];
            $type_file = $file_data['file_ext'];
            $data = array(
                'attachment' => $filenya
            );
            $values = $this->input->post('val');
            foreach ($values as $k => $v) {
                $data[$k] = $v;
            }
            if ($this->mail_model->create_outbox($data)) {
                redirect('mail/outbox/list');
                //echo "Berhasil Upload";
            }
        }
    }

    function do_upload4() {
        $timex = time();
        $datex = date("ymmd");
        $config['upload_path'] = './upload/inbox/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $config['max_size'] = '20000';
        $config['max_width'] = '30000';
        $config['max_height'] = '30000';
        $config['file_name'] = $timex . $datex;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('dokumen')) {
            $key = $this->input->post('id');
            $data = array();
            $values = $this->input->post('val');
            foreach ($values as $k => $v) {
                $data[$k] = $v;
            }
            if ($this->mail_model->update_mail_outbox_by_id($key, $data)) {
                redirect('mail/outbox/list');
                //echo "Berhasil Upload";
            }
            //echo "Gagal Upload";
            //echo $this->upload->display_errors();
        } else {
            $key = $this->input->post('id');
            $file_data = $this->upload->data();
            $filenya = $timex . $datex . $file_data['file_ext'];
            $type_file = $file_data['file_ext'];
            $data = array(
                'attachment' => $filenya
            );
            $values = $this->input->post('val');
            foreach ($values as $k => $v) {
                $data[$k] = $v;
            }
            if ($this->mail_model->update_mail_outbox_by_id($key, $data)) {
                redirect('mail/outbox/list');
                //echo "Berhasil Upload";
            }
        }
    }

    public function outbox() {
        $employee = $this->session->userdata('employee_id');
        $page = $this->uri->segment(3);
        $param = $this->uri->segment(4);
        $id = $this->uri->segment(4);
        $this->data['data_mail'] = $this->mail_model->get_mail_outbox($employee);
        $this->data['data_user'] = $this->user_model->get_employee($employee);
        if ($page == 'list') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('mail/outbox/list', $this->data);
                } else {
                    $this->layout->displays('mail/outbox/list', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'add') {
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('mail/outbox/add', $this->data);
                } else {
                    $this->layout->displays('mail/outbox/add', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'create') {
            $this->do_upload3();
        } else if ($page == 'edit') {
            $dev = $this->mail_model->get_mail_outbox_by_id($param);
            $this->data['mail_id'] = $param;
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    if ($param == 'edit') {
                        $this->layout->display('mail/outbox/edit', $this->data);
                    }
                } else {
                    $this->layout->displays('mail/outbox/edit', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'update') {
            $this->do_upload4();
        } else if ($page == 'disposition') {
            $this->data['data_disposition'] = $this->disposition_model->get_disposition_inbox();
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    if ($param == 'edit') {
                        $this->layout->display('disposition/add', $this->data);
                    }
                } else {
                    $this->layout->displays('disposition/add', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'approval') {
            $this->data['mail_id'] = $param;
            $this->data['data_user1'] = $this->user_model->get_employee_all();
            $this->data['data_user2'] = $this->user_model->get_employee_all();
            $dav = $this->mail_model->get_mail_outbox_by_id($param);
            $dev = $this->mail_model->get_mail_outbox_approval_by_id($param);
            $this->data['data_form'] = $this->mail_model->get_form_by_mail($param);
            foreach ($dav as $valuesx) {
                foreach ($valuesx as $keyx => $valz) {
                    $this->data[$keyx] = $valz;
                }
            }
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('mail/approval/add', $this->data);
                } else {
                    $this->layout->displays('mail/approval/add', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'createapproval') {
            $key = $this->input->post('id');
            $data = array();
            $values = $this->input->post('val');
            foreach ($values as $k => $v) {
                $data[$k] = $v;
            }
            $data1 = array();
            $values = $this->input->post('form');
            foreach ($values as $k => $v) {
                $data1[$k] = $v;
            }
            $data2 = array();
            $values = $this->input->post('mail');
            foreach ($values as $k => $v) {
                $data2[$k] = $v;
            }
            if ($this->mail_model->createapproval($data)) {
                $this->mail_model->createform($data1);                
                $this->mail_model->update_mail_outbox_by_id($key, $data2);
                redirect('mail/outbox/list');
            }            
        } else if ($page == 'editapproval') {
            $this->data['mail_id'] = $param;
            $this->data['data_user1'] = $this->user_model->get_employee_all();
            $this->data['data_user2'] = $this->user_model->get_employee_all();
            $dav = $this->mail_model->get_mail_outbox_by_id($param);
            $dev = $this->mail_model->get_mail_outbox_approval_by_id($param);
            $this->data['data_form'] = $this->mail_model->get_form_by_mail($param);
            foreach ($dav as $valuesx) {
                foreach ($valuesx as $keyx => $valz) {
                    $this->data[$keyx] = $valz;
                }
            }
            foreach ($dev as $values) {
                foreach ($values as $key => $val) {
                    $this->data[$key] = $val;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('mail/approval/edit', $this->data);
                } else {
                    $this->layout->displays('mail/approval/edit', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else if ($page == 'updateapproval') {
            $key = $this->input->post('id');
            $data = array();
            $values = $this->input->post('val');
            foreach ($values as $k => $v) {
                $data[$k] = $v;
            }
            $data1 = array();
            $values = $this->input->post('form');
            foreach ($values as $k => $v) {
                $data1[$k] = $v;
            }
            if ($this->mail_model->updateapproval($key, $data)) {
                $this->mail_model->createform($data1);
                redirect('mail/outbox/list');
            }            
        } else if ($page == 'revision') {
            $key = $this->input->post('id');
            $dav = $this->mail_model->get_mail_outbox_by_id($param);
            $dev = $this->mail_model->get_mail_revision_by_id($param);
            foreach ($dav as $valuesx) {
                foreach ($valuesx as $keyx => $valz) {
                    $this->data[$keyx] = $valz;
                }
            }
            if ($this->session->userdata('is_logged_in') == true) {
                if ($this->session->userdata('user_group_level') == '1') {
                    $this->layout->display('mail/revision/add', $this->data);
                } else {
                    $this->layout->displays('mail/revision/add', $this->data);
                }
            } else {
                redirect('media/relogin');
            }
        } else {
            $this->load->view('media/404');
        }
    }

    public function revision() {
        $this->data['data_mail'] = $this->mail_model->get_mail_revision();

        if ($this->session->userdata('is_logged_in') == true) {
            if ($this->session->userdata('user_group_level') == '1') {
                $this->layout->display('mail/revision/list', $this->data);
            } else {
                $this->layout->displays('mail/revision/list', $this->data);
            }
        } else {
            redirect('media/relogin');
        }
    }
	
	public function report(){
		$employee = $this->session->userdata('employee_id');
        $page = $this->uri->segment(3);
        $param = $this->uri->segment(4);
		if ($page == 'inbox'){
			if ($this->session->userdata('is_logged_in') == true) {
				$this->layout->display('report/inbox', $this->data);
			}
			else {
				redirect('media/relogin');
			}
		}
		elseif ($page == 'outbox'){
			$this->layout->displays('report/outbox', $this->data);
		}
		else {
            $this->load->view('media/404');
        }
	}

}

/* End of file mail.php */
/* Location: ./application/controllers/mail.php */