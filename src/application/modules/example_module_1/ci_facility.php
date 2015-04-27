<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Example_Module_1_Controller {

    public function __construct($passed_params = array()) {
      $default_params = array();
      $this->params = array_merge_recursive($default_params, $passed_params);
    }

  }