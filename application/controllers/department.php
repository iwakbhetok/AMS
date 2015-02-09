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

class Department extends MY_Basic_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('department_model');
    }    

    function lookup_department() {
        $keyword = $this->input->post('term');
        $data['response'] = 'false';
        $query = $this->department_model->lookup($keyword);
        if (!empty($query)) {
            $data['response'] = 'true';
            $data['message'] = array();
            foreach ($query as $row) {
                $data['message'][] = array(
                    'id' => $row->department_id,
                    'value' => $row->department_name,
                );
            }
        }
        echo json_encode($data);
    }

}

/* End of file department.php */
/* Location: ./application/controllers/department.php */