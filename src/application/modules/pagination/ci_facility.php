<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Pagination_Module extends Module_Helper {
    public function __construct($name = 'no-module', $template = 'index', $params = array()) {
      parent::__construct($name, $template, $params);
      //var_dump($params);
      //$this->generate_pagination($params['d']['from'], $params['d']['to']);
    }

    private function generate_pagination($from, $to = 10) {
      $link_list = '';
      for($i = $from; $i <= $to; $i++) {
        $link_list .= '<a href="#" class="btn btn-default">'.$i.'</a>';
      }
      $this->params['link_list'] = $link_list;
    }
  }