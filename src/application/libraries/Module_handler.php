<?php
  class Module_Handler {

    private $CI = null;
    private $view = '';
    private $params = array();

    public function __construct() {
      $this->CI =& get_instance();
    }

    public function load_module($passed_params = array()) {
      $default_params = array('view' => '', 'template' => 'index', 'params' => array());
      $params = array_replace_recursive($default_params, $passed_params);
      $this->view = $params['view'];
      $this->params = $params['params'];

      if($params['view'] != '') {
        $this->get_module_controller();
        $module_name = ucfirst($params['view']).'_Module';
        return new $module_name($params['view'], $params['template'], $params['params']);
      }
      return '';
    }

    private function get_module_controller() {
      require_once(APPPATH . 'modules/' . $this->view . '/ci_facility.php');
    }

    public function generate_module_array($title, $type = 'textblock', $template = 'index', $params = array()) {
      return array(
        'title' => $title,
        'type' => $type,
        'template' => $template,
        'params' => $params
      );
    }
  }