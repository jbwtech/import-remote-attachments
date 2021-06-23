<?php
namespace EclipseComp\IRA;

add_action( 'network_admin_menu', 'EclipseComp\IRA\menu' );

function menu() {
   add_submenu_page( 'settings.php', 'Import Remote Attachments Options', 'Import Remote Attachments', 'manage_options', 'import-remote-attachments', 'EclipseComp\IRA\options' );
}

function options() {
   if ( !current_user_can( 'manage_options' ) ) {
      wp_die( __( 'You do not have sufficient permissions to access this page.') );
   }
?>
<div class="wrap">
<h1>Import Remote Attachments</h1>
<p>Here is where the form would go if I actually had options.</p>
<form method="post" action="<?php __FILE__ ?>">
<?php submit_button(); ?>
</form>
</div>
<?php
}

?>
