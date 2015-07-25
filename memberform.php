<?php
/*
Plugin Name: Member Lookup 
Plugin URI: 
Description: 
Version: 1.0
Authors: 
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

?>
