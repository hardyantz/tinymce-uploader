<?php
// setting configuration

// setup base url
$config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$config['base_url'] .= "://".$_SERVER['HTTP_HOST'];
$config['base_url'] .= preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME'])).'/';

$config['base_url_image']   = $config['base_url']."uploads/";	// setup base url image
$config['upload_path']      = dirname(__FILE__).'/uploads/';                      // setup upload path
$config['allowed_types']    = 'gif|jpg|png';                    // setup allowed file add/remove extension file
$config['max_size']	    = '100';                            // setup maximum file to upload
$config['max_width']        = '1024';                           // setup maximum width file upload
$config['max_height']       = '768';                            // setup maximum height file upload
?>
