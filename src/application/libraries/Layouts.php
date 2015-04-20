<?php

class Layouts
{
  private $CI;
  private $layout_title = null;
  private $layout_template = 'default';

  public function __construct()
  {
    $this->CI =& get_instance();
    $this->CI->config->load('app_stylesheets');
    $this->CI->config->load('app_scripts');
    $this->CI->config->load('app_meta_informations');
    $this->CI->config->load('app_templates');
  }

  public function set_title($title)
  {
    $this->layout_title = $title;
  }

  public function set_metainformations($metainfo = array())
  {
    $newConfig = array_replace($this->CI->config->item('metainformations'), $metainfo);
    $this->CI->config->set_item('metainformations', $newConfig);
  }

  public function add_templates($templates = array()) {
    $newTemplates = array_merge($this->CI->config->item('templates'), $templates);
    $this->CI->config->set_item('templates', $newTemplates);
  }

  private function returnArray($array, $type) {
    $output = '';
    foreach($array as $a) {
      if($type === 'css') {
        $output .= '<link rel="stylesheet" type="text/css" href="'.load_asset($a).'">';
      } elseif($type === 'js') {
        $output .= '<script src="'.load_asset($a).'" type="text/javascript"></script>';
      } else {
        $output .= '<meta ';
        foreach($a as $type => $value) {
          $output .= $type.'="'.$value.'"';
        }
        $output .= '/>';
      }
    }

    return $output;
  }

  private function getTemplates() {
    $templates = array();
    $entries = $this->CI->config->item('templates');
    foreach($entries as $entry) {
      foreach($entry as $template_key => $template_value) {
        $templates[$template_key] = $template_value;
      }
    }

    return $templates;
  }

  public function load_module($view, $params = array()) {
    return $this->CI->load->view($view, $params, true);
  }

  public function view($view_name = 'default', $layouts = array(), $params = array(), $default = true)
  {
    // Set Template Name
    $this->layout_template = $view_name;

    if($default)
    {
      // set default params
      $params['title'] = $this->layout_title;
      $params['meta_informations'] = $this->returnArray($this->CI->config->item('metainformations'), 'meta');
      $params['head_include_stylesheets'] = $this->returnArray($this->CI->config->item('stylesheets'), 'css');
      $params['head_include_scripts'] = $this->returnArray($this->CI->config->item('scripts_head'), 'js');
      $params['body_start_include_scripts'] = $this->returnArray($this->CI->config->item('scripts_body_start'), 'js');
      $params['body_end_include_scripts'] = $this->returnArray($this->CI->config->item('scripts_body_end'), 'js');
      $layouts = array_replace($layouts, $this->getTemplates());
    }

    if(is_array($layouts) && count($layouts) >= 1)
    {
      foreach($layouts as $layout_key => $layout)
      {
        $params[$layout_key] = $this->CI->load->view($layout, $params, true);
      }
    }

    // render views
    $this->CI->load->view('templates/'.$this->layout_template, $params);
  }
}