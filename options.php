<?php
namespace EclipseComp\IRA;

add_action( 'admin_menu', 'EclipseComp\IRA\menu' );

function menu() {
   add_options_page( __('Import Remote Attachments Options', 'textdomain'), __('Import Remote Attachments', 'textdomain'), 'manage_options',
      'import-remote-attachments.php', 'EclipseComp\IRA\options');
}

function options() {
   if ( !current_user_can( 'manage_options' ) ) {
      wp_die( __( 'You do not have sufficient permissions to access this page.') );
   }
   echo '<div class="wrap">';
   echo '<h1>Import Remote Attachments</h1>';
   echo '<p>Here is where the formwould go if I actually had options.</p>';
   echo '</div>';
}

?>
