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

class My_Controller extends My_Basic_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->is_logged_in()) {
            redirect('media/relogin', 'refresh');
            die;
        }
    }

}