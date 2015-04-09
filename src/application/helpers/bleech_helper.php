<?php
  function asset_url() {
    return base_url().'assets/';
  }

  function load_asset($asset) {
    return asset_url().$asset;
  }

  function get_template_part($part) {
    return 'application/views/templates/'.$part.'.php';
  }
?>