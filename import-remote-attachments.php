<?php
namespace EclipseComp\IRA;
defined( 'ABSPATH' ) OR exit;

/**
 * Plugin Name:        Import Remote Attachments
 * Plugin URI:         https://github.com/jbwtech/import-remote-attachments
 * Description:        Overrides the default behavior for importing attachments from remote URL's.
 * Version:            0.0.5
 * Requires at least:  3.5
 * Author:             Brent Williams
 * Author URI:         https://github.com/jbwtech/
 */

/*
 * add_filter( 'http_request_host_is_external', '__return_true' );
 */

function activate_import_remote_attachments() {
   /* create table of allowed hosts */
   ira_install();
}
register_activation_hook( __FILE__, 'activate_import_remote_attachments' );

function deactivate_import_remote_attachments() {
   /* delete table of allowed hosts */
   ira_cleanup();
}
register_deactivation_hook( __FILE__, 'deactivate_import_remote_attachments' );

add_filter( 'http_request_host_is_external', 'allow_custom_host', 10, 3 );

function allow_custom_host( $allow, $host, $url ) {
  $exp = '/clas\.ufl\.edu/i';

  if ( preg_match( $exp, $host ) ) 
    $allow = true;
  return $allow;
}

function ira_install() {
     
   global $wpdb;

   $charset_collate = $wpdb->get_charset_collate();
   $table_name = $wpdb->prefix . "import_allowed_hosts";

   $sql = "CREATE TABLE " . $table_name . " (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      blog_id int NOT NULL, n
      slug varchar(75) NOT NULL,
      hostname varchar(75) NOT NULL,
      PRIMARY KEY (id)
   ) " . $charset_collate . ";";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );
}

function ira_cleanup() {

   global $wpdb;

   $table_name = $wpdb->prefix . "import_allowed_hosts";

   $sql = "DROP TABLE " . $table_name . ";";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   $wpdb->query( $sql );
}
?>
