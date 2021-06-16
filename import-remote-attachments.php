<?php
defined( 'ABSPATH' ) OR exit;
/**
 * Plugin Name:  Import Remote Attachments
 * Plugin URI:   https://github.com/jbwtech/import-remote-attachments
 * Description:  A Wordpress plugin to override default behavior of not allowing importing attachments from remote URL's.
 * Version:      0.0.2
 * Author:       Brent Williams
 * Author URI:   https://github.com/jbwtech/
 */

/*
 * add_filter( 'http_request_host_is_external', '__return_true' );
 */

function activate_import-remote-attachments() {
   /* create table of allowed hosts */
}
register_activation_hook( __FILE__, 'activate_import-remote-attachments' );

function deactivate_import-remote-attachments() {
   /* delete table of allowed hosts */
}
register_deactivation_hook( __FILE__, 'deactivate_import-remote-attachments' );

add_filter( 'http_request_host_is_external', 'allow_my_custom_host', 10, 3 );

function allow_my_custom_host( $allow, $host, $url ) {
  $exp = '/clas\.ufl\.edu/i';

  if ( preg_match( $exp, $host ) ) 
    $allow = true;
  return $allow;
}

?>
