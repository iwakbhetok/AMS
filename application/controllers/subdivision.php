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

class Subdivision extends MY_Basic_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('subdivision_model');
        $this->load->model('division_model');
        $this->load->model('department_model');
    }    

    function lookup_subdivision() {
        $keyword = $this->input->post('term');
        $data['response'] = 'false';
        $query = $this->subdivision_model->lookup($keyword);
        if (!empty($query)) {
            $data['response'] = 'true';
            $data['message'] = array();
            foreach ($query as $row) {
                $data['message'][] = array(
                    'id' => $row->sub_division_id,
                    'value' => $row->sub_division_name,
                );
            }
        }
        echo json_encode($data);
    }

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */