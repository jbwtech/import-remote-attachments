<?php
namespace EclipseComp\IRA;
defined( 'ABSPATH' ) OR exit;

require_once('options.php');

/**
 * Plugin Name:        Import Remote Attachments
 * Plugin URI:         https://github.com/jbwtech/import-remote-attachments
 * Description:        Overrides the default behavior for importing attachments from remote URL's.
 * Version:            0.0.5
 * Requires at least:  3.5
 * Author:             Brent Williams
 * Author URI:         https://github.com/jbwtech/
 * Network:            True
 */

/*
 * add_filter( 'http_request_host_is_external', '__return_true' );
 */

function activate() {
   install();
}
register_activation_hook( __FILE__, 'EclipseComp\IRA\activate' );

function uninstall() {
   cleanup();
}
register_uninstall_hook( __FILE__, 'EclipseComp\IRA\uninstall' );

add_filter( 'http_request_host_is_external', 'EclipseComp\IRA\allow_custom_host', 10, 3 );

function allow_custom_host( $allow, $host, $url ) {
  $exp = '/clas\.ufl\.edu/i';

  if ( preg_match( $exp, $host ) )
    $allow = true;
  return $allow;
}

function install() {

   global $wpdb;

   $charset_collate = $wpdb->get_charset_collate();
   $table_name = $wpdb->prefix . "import_allowed_hosts";

   $sql = "CREATE TABLE " . $table_name . " (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      hostname varchar(75) NOT NULL,
      PRIMARY KEY (id)
   ) " . $charset_collate . ";";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );
}

function cleanup() {

   global $wpdb;

   $table_name = $wpdb->prefix . "import_allowed_hosts";

   $sql = "DROP TABLE " . $table_name . ";";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   $wpdb->query( $sql );
}
?>
