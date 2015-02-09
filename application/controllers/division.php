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

class Division extends MY_Basic_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('division_model');
        $this->load->model('department_model');
    }    

    function lookup_division() {
        $keyword = $this->input->post('term');
        $data['response'] = 'false';
        $query = $this->division_model->lookup($keyword);
        if (!empty($query)) {
            $data['response'] = 'true';
            $data['message'] = array();
            foreach ($query as $row) {
                $data['message'][] = array(
                    'id' => $row->division_id,
                    'value' => $row->division_name,
                );
            }
        }
        echo json_encode($data);
    }

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */