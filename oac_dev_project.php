<?php
/*
Plugin Name: OAC Member Lookup 
Plugin URI: 
Description: Looks up member info and emails it to member or directs to sign up page. 
Version: 1.0
Authors: Dina 
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// admin functions for creating admin menu

function oacmembsearch_admin_actions() {
	add_options_page("Member Search Options","Member Search Options",1,"Member Search Options",oacmembsearch_admin);
}

add_action('admin_menu','oacmembsearch_admin_actions');

if(!class_exists('OAC_Member_Search'))
{

  class OAC_Member_Search
  {

    public function __construct()
        {
        // register actions
	add_action('admin_init', array(&$this, 'admin_init'));
	add_action('admin_menu', array(&$this, 'add_menu'));
        
	} // END public function __construct
    
    public function add_lookup_form() {
      	echo "<form action='".get_admin_url()."admin-post.php' method='post'>";
      	//   echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
      	echo '<p>';
    	echo 'Email ';
    	echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" />';
    	echo '</p>';
    	echo '<p><input type="submit" name="cf-submitted" value="Send"/></p>';
    	echo '</form>';
    }   

    public function oacmembership_pn_activation () {
	// does nothing at this time
    }

    public function oacmembership_pn_deactivate () {
	// does nothing for now
    }
  } // end of class OAC_Member_Search  

  // Installation and uninstallation hooks
  register_activation_hook( __FILE__, 'oacmembership_pn_activation' );
  register_deactivation_hook( __FILE__, 'oacmembership_pn_deactivate' );

  // Instantiate the OAC_Member_Search class
  $wp_oac_member_search = new OAC_Member_Search();

} // end of if class exists

?>
