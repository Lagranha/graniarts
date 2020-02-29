<?php
  if (!defined('INITIALIZED'))
  	exit;

  if ($logged) {
    $layout_header .= "loginStatus=1; loginStatus='true';";
  } else {
    $layout_header .= "loginStatus=0; loginStatus='false';";
  };

  $layout_header .= "var activeSubmenuItem='".$subtopic."';  var IMAGES=0; IMAGES='".$config['server']['url']."/".$layout_name."/images'; var LINK_ACCOUNT=0; LINK_ACCOUNT='".$config['server']['url']."';</script>";
  
  include($layout_name."/layout.php");