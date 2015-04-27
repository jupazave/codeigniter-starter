<?php
  class Area_Helper {

    private $area_name = 'default_area';
    private $module_list = array();
    private $modules = array();
    private $CI = null;

    public function __construct($area_name, $module_list) {
      $this->area_name = $area_name;
      $this->module_list = $module_list;
      $this->CI =& get_instance();
      $this->generate_modules();
    }

    public function show_area() {
      foreach($this->modules as $module) {
        echo $module->get_html();
      }
    }

    private function generate_modules() {
      foreach($this->module_list as $module) {
        if(!isset($module['template'])) {
          $this->modules[$module['title']] = $this->CI->module_handler->load_module(array('view' => $module['type'], 'params' => array('d' => $module['params'])));
        } else {        
          $this->modules[$module['title']] = $this->CI->module_handler->load_module(array('view' => $module['type'], 'template' => $module['template'], 'params' => array('d' => $module['params'])));
        }
      }
    }

    public function add_module($params = array()) {
      array_push($this->module_list, $params);
      $this->generate_modules();
    }
  }