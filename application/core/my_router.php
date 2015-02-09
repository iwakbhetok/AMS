<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  ------------------------------------------------------------------------------
  AMS Applications
  ------------------------------------------------------------------------------

  Author : abdul Gofur
  Email  : abdul.createit@gmail.com
  @2015

  ------------------------------------------------------------------------------
  Mabes Polri
  ------------------------------------------------------------------------------
 */

class My_Router extends CI_Router {

    function __construct() {
        parent::__construct();
    }

    public function _set_request($segments) {
        for ($i = 0; $i < 3; ++$i) {
            if (isset($segments[$i])) {
                $segments[$i] = str_replace('-', '_', $segments[$i]);
            }
        }
        parent::_set_request($segments);
    }

}