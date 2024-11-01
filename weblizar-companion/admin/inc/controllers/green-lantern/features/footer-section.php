<?php

defined( 'ABSPATH' ) or die();

/**
 *  General options
 */
class wl_footer_customizer {
	
	public static function wl_green_lantern_footer_customizer( $wp_customize ) {
		
		/* Footer Options */
		$wp_customize->add_section(
			'footer_section',array(
				'title'=>__("Footer Options",WL_COMPANION_DOMAIN),
				'panel'=>'green_lantern_theme_option',
				'capability'=>'edit_theme_options',
			    'priority' => 50,
			)
		);

		$wp_customize->add_setting(
			'green_lantern_footer_customization',
			array(
				'default'			=>' © Copyright 2020. All Rights Reserved',
				'type'				=>'theme_mod',
				'sanitize_callback' =>'green_lantern_sanitize_text',
				'capability'		=>'edit_theme_options'
			)
		);

		$wp_customize->add_control( 'green_lantern_footer_customization', 
			array(
			'label'      => __( 'Footer Customization Text', WL_COMPANION_DOMAIN ),
			'type'		 =>'text',
			'section'    => 'footer_section',
			'settings'   => 'green_lantern_footer_customization'
			) 
		);

		$wp_customize->selective_refresh->add_partial( 'green_lantern_footer_customization', 
			array(
			    'selector' => '.weblizar_footer_customizations',
		    )
		);

		$wp_customize->add_setting(
		'green_lantern_develop_by',
			array(
			'default'			=>'',
			'type'				=>'theme_mod',
			'sanitize_callback' =>'green_lantern_sanitize_text',
			'capability'		=>'edit_theme_options'
			)
		);

		$wp_customize->add_control( 
			'green_lantern_develop_by', 
			array(
				'label'      => __( 'Footer developed by Text', WL_COMPANION_DOMAIN ),
				'type'		 =>'text',
				'section'    => 'footer_section',
				'settings'   => 'green_lantern_develop_by'
			) 
		);

		$wp_customize->selective_refresh->add_partial( 'green_lantern_develop_by', array(
			    'selector' => '.weblizar_footer_customizations a',
		    ));

		$wp_customize->add_setting(
		'green_lantern_deve_link',
			array(
			'default'			=>'',
			'type'				=>'theme_mod',
			'capability'		=>'edit_theme_options',
			'sanitize_callback' =>'esc_url_raw'
			)
		);

		$wp_customize->add_control( 
			'green_lantern_deve_link', 
			array(
				'label'      => __( 'Footer developed by link', WL_COMPANION_DOMAIN ),
				'type'		 =>'url',
				'section'    => 'footer_section',
				'settings'   => 'green_lantern_deve_link'
			) 
		);
	}
}

?>