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

class Layout {

    protected $_ci;

    function __construct() {
        $this->_ci = &get_instance();
    }

    function display($layout, $data = null) {
        if (!$this->is_ajax()) {
            $data['_header'] = $this->_ci->load->view('layout/header', $data, true);
            $data['_content'] = $this->_ci->load->view($layout, $data, true);
            $data['_sidebar'] = $this->_ci->load->view('layout/sidebar', $data, true);
            $this->_ci->load->view('layout/layout.php', $data);
        } else {
            $this->_ci->load->view($layout, $data);
        }
    }

    function displays($layout, $data = null) {
        if (!$this->is_ajax()) {
            $data['_header'] = $this->_ci->load->view('layout/headers', $data, true);
            $data['_content'] = $this->_ci->load->view($layout, $data, true);
            $data['_sidebar'] = $this->_ci->load->view('layout/sidebar', $data, true);			
            $this->_ci->load->view('layout/layout.php', $data);
        } else {
            $this->_ci->load->view($layout, $data);
        }
    }

    function is_ajax() {
        return (
        $this->_ci->input->server('HTTP_X_REQUESTED_WITH') &&
        ($this->_ci->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest'));
    }

}