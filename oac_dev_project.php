<?php
/*
Plugin Name: OAC Member Lookup 
Plugin URI: 
Description: Looks up member info and emails it to member or directs to sign up page. 
Version: 1.0
Authors: Dina 
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function add_lookup_form() {
    echo "<form action='".get_admin_url()."admin-post.php' method='post'>";
 //   echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
    echo '<p>';
    echo 'Email ';
    echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" />';
    echo '</p>';
    echo '<p><input type="submit" name="cf-submitted" value="Send"/></p>';
    echo '</form>';
}

register_activation_hook( __FILE__, 'oacmembership_pn_activation' );
register_deactivation_hook( __FILE__, 'oacmembership_pn_deactivate' );

function oacmembership_pn_activation () {
// does nothing at this time
}

function oacmembership_pn_deactivate () {
// does nothing for now
}

?>
