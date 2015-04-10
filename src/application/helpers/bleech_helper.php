<?php
  function asset_url() {
    return base_url().'assets/';
  }

  function load_asset($asset) {
    return asset_url().$asset;
  }
?>