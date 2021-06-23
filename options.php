<?php
namespace EclipseComp\IRA;

echo '<div class="wrap">';
echo '<h1>Import Remote Attachments</h1>';

add_action( 'admin_menu', 'EclipseComp\IRA\menu' );

function menu() {
   add_options_page( 'Import Remote Attachments Options', 'Import Remote Attachments', 'manage_options',
      'import-remote-attachments-options', 'import_remote_attachments_options');
}

function import_remote_attachments_options() {
   if ( !current_user_can( 'manage_options' ) ) {
      wp_die( __( 'You do not have sufficient permissions to access this page.') );
   }
   echo '<p>Here is where the formwould go if I actually had options.</p>';
   echo '</div>';
}

?>
