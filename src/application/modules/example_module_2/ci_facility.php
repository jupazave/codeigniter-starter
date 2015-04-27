<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Example_Module_2_Controller {

    private $default_params = array(
      'prefix' => 'prefix_',
      'data' => array(
        'key1' => 'value1',
        'key2' => 'value2',
        'key3' => 'value3')
    );

    public function __construct($passed_params = array()) {
      $this->passed_params = $passed_params;

      $this->params = array_replace_recursive($this->default_params, $this->passed_params);

      $this->add_prefix();
    }

    private function add_prefix() {
      foreach ($this->params['data'] as $key => $value) {
        $this->params['data'][$key] = $this->params['prefix'] . $value;
      }
    }

    public function get_value($index) {
      return $this->params['data'][$index];
    }
  }