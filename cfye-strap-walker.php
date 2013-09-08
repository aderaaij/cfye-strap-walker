<?php
/*
Plugin Name: CFYE Strap Walker
Plugin URL: http://#
Description: A sexy nav menu based on Twitter Bootstrap, data-icon ready
Version: 0.1
Author: Arden de Raaij
Author URI: http://arden.nl
Contributors: arden012
Text Domain: 
Domain Path: languages
*/




class cfye_strap_walker {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {

		// load the plugin translation files
		add_action( 'init', array( $this, 'textdomain' ) );
		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'cfye_strap_add_custom_nav_fields' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'cfye_strap_update_custom_nav_fields'), 10, 3 );
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'cfye_strap_edit_walker'), 10, 2 );

	} // end constructor
	
 /* Load the plugin's text domain
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function textdomain() {
		load_plugin_textdomain( 'cfye_strap', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function cfye_strap_add_custom_nav_fields( $menu_item ) {
	
	    $menu_item->subtitle = get_post_meta( $menu_item->ID, '_menu_item_subtitle', true );
	    //Data icon after
	   	$menu_item->dataiconbefore = get_post_meta( $menu_item->ID, '_menu_item_dataiconbefore', true );
	   	//Data icon after
	   	$menu_item->dataiconafter = get_post_meta( $menu_item->ID, '_menu_item_dataiconafter', true );
	    return $menu_item; 
	}
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function cfye_strap_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
	    if ( is_array( $_REQUEST['menu-item-subtitle']) ) {
	        $subtitle_value = $_REQUEST['menu-item-subtitle'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_subtitle', $subtitle_value );
	    }
	    
	    if ( is_array( $_REQUEST['menu-item-dataiconbefore']) ) {
	        $dataiconbefore_value = $_REQUEST['menu-item-dataiconbefore'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_dataiconbefore', $dataiconbefore_value );
	    }

	    if ( is_array( $_REQUEST['menu-item-dataiconafter']) ) {
	        $dataiconafter_value = $_REQUEST['menu-item-dataiconafter'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_dataiconafter', $dataiconafter_value );
	    }
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function cfye_strap_edit_walker($walker,$menu_id) {
	
	    return 'Walker_Nav_Menu_Edit_Custom';
	    
	}

}

// instantiate plugin's class
$GLOBALS['cfye_strap_walker'] = new cfye_strap_walker();
include_once( 'edit_cfye_walker.php' );
include_once( 'cfye_walker.php' );

