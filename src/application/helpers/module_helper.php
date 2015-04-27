<?php

  class Module_Helper {
    private $name = '';
    public $template = '';
    private $params = array();
    public $html = '';
    private $CI = null;

    public function __construct($name = 'no-module', $template = 'index', $params = array()) {
      $this->CI =& get_instance();
      $this->name = $name;
      $this->template =$template;
      $this->params = array_replace_recursive($this->params, $params);
    }

    public function get_html() {
      $path = 'modules/' . $this->name . '/' . $this->template;
      $this->html = $this->CI->load->view($path, $this->params, true);
      return $this->html;
    }

  }