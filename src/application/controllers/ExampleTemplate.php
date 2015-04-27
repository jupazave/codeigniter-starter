<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExampleTemplate extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
    $data = array();
    $module_1_params = array('data' => array('key1' => 'value1', 'key2' => 'value2'));
    $module_2_params = array('data' => array('key1' => 'value1', 'key2' => 'value2'));
    $module_1 = $this->module->load_module(array('view' => 'example_module_1', 'params' => $module_1_params));
    $module_2 = $this->module->load_module(array('view' => 'example_module_2', 'params' => $module_2_params));
    $data['modules']['example_module_1'] = $module_1->html;
    $data['modules']['example_module_2'] = $module_2->html;

    echo $module_2->module->get_value('key1');

    $this->layouts->set_title('Example Template: Index');
    $this->layouts->set_metainformations(array(
      array('name' => 'description', 'content' => 'Example Template: Index description')
    ));
    $this->layouts->view('default/index', array('content' => 'page_templates/example_template/index'), $data);
  }

  public function edit()
  {
    $this->layouts->set_title('Example Template: edit');
    $this->layouts->set_metainformations(array(
      array('name' => 'description', 'content' => 'Example Template: edit description')
    ));
    $this->layouts->view('default/index', array('content' => 'page_templates/example_template/edit'));
  }
}