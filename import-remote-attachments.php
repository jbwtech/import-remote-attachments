<?php
/**
 * Plugin Name:  Import Remote Attachments
 * Plugin URI:   https://github.com/jbwtech/import-remote-attachments
 * Description:  A Wordpress plugin to override default behavior of not allowing importing attachments from remote URL's.
 * Version:      0.0.1
 * Author:       Brent Williams
 * Author URI:   https://github.com/jbwtech/
 */

add_filter( 'http_request_host_is_external', '__return_true' );

?>
