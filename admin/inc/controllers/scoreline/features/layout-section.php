<?php

defined( 'ABSPATH' ) or die();

/**
 *  General options
 */
class wl_layout_customizer {
	
	public static function wl_scoreline_layout_customizer( $wp_customize ) {
		
		// home layout //
	    $wp_customize->add_section( 'Home_Page_Layout', array(
		    'title'      => __( "Home Page Layout Option", WL_COMPANION_DOMAIN ),
		    'panel'      => 'scoreline_theme_option',
		    'capability' => 'edit_theme_options',
		    'priority'   => 60,
	    ) );
	    $wp_customize->add_setting( 'home_reorder',
		    array(
			    'type'              => 'theme_mod',
			    'sanitize_callback' => 'sanitize_json_string',
			    'capability'        => 'edit_theme_options',
		    )
	    );

	    require( WL_COMPANION_PLUGIN_DIR_PATH . 'admin/inc/controllers/scoreline/functions/sortable.php' );

	    $wp_customize->add_control( new scoreline_Custom_sortable_Control( $wp_customize, 'home_reorder', array(
		    'label'    => __( 'Front Page Layout Option', WL_COMPANION_DOMAIN ),
		    'section'  => 'Home_Page_Layout',
		    'type'     => 'home-sortable',
		    'choices'  => array(
			    'service'  => __( 'Home Services', WL_COMPANION_DOMAIN ),
			    'extra' => __( 'Home Extra', WL_COMPANION_DOMAIN ),
			    'blog'      => __( 'Home Blog', WL_COMPANION_DOMAIN ),
		    ),
		    'settings' => 'home_reorder',
	    ) ) );

	    $wp_customize->add_setting('box_layout',
	        array(
				'default'           => '1',
	            'sanitize_callback' => 'scoreline_sanitize_integer',
				'capability'        => 'edit_theme_options',
	        )
	    );
	
	}
}
?>