<?php

defined( 'ABSPATH' ) or die();

/**
 *  Service Section 
 */
class wl_service_customizer {
	
	public static function wl_explora_service_customizer( $wp_customize ) {

		/* Service Section */
		$wp_customize->add_section(
	        'service_sec',
	        array(
	            'title' 		  => __('Service Options',WL_COMPANION_DOMAIN),
				'panel'			  => 'explora_theme_option',
	            'description' 	  => __('Here you can add your services',WL_COMPANION_DOMAIN),
				'capability'	  => 'edit_theme_options',
	            'priority' 		  => 36,
				'active_callback' => 'is_front_page',
	        )
	    );

	    $wp_customize->add_setting(
		'service_home',
		array(
			'type'    => 'theme_mod',
			'default'=>1,
			'sanitize_callback'=>'explora_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
		);
		$wp_customize->add_control( 'service_home', array(
			'label'        => __( 'Enable service Section on Home', WL_COMPANION_DOMAIN ),
			'type'=>'checkbox',
			'section'    => 'service_sec',
			'settings'   => 'service_home'
		) );

	    $wp_customize->add_setting(
			'explora_service_title',
			array(
				'type'              => 'theme_mod',
				'default'           => 'Our Service',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'explora_sanitize_text'
			)
		);
		$wp_customize->add_control( 'explora_service_title', array(
			'label'    => 'Service section title',
			'type'     =>'text',
			'section'  => 'service_sec',
			'settings' => 'explora_service_title'
		) );

		$wp_customize->selective_refresh->add_partial( 'explora_service_title', array(
				'selector' => '.explora_heading_title h3',
			) );

		
		require( WL_COMPANION_PLUGIN_DIR_PATH . 'admin/inc/controllers/explora/functions/service-functions.php' );
		if ( class_exists( 'explora_Customizer_service_fields') ) {

			// logo height width //
			$wp_customize->add_setting(
				'explora_services',
				array(
					'type'              => 'theme_mod',
					'default'           => 90,
					'sanitize_callback' => 'explora_sanitize_text',
					'capability'        => 'edit_theme_options',
				)
			);

		$wp_customize->add_control( new explora_Customizer_service_fields( $wp_customize, 'service_arr', array(
			'type'        => 'text',
			'section'     => 'service_sec',
			'settings'    => 'explora_services',
			'label'       => __( 'Services', WL_COMPANION_DOMAIN ),
			'description' => __( 'Here you can add all your services.', WL_COMPANION_DOMAIN ),
			)));
		}

		$wp_customize->add_setting(
			'explora_service_data',
			array(
				'type'              => 'theme_mod',
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'explora_sanitize_text'
			)
		);
		$wp_customize->add_control( 'explora_service_data', array(
			'label'    => '',
			'type'     =>'hidden',
			'section'  => 'service_sec',
			'settings' => 'explora_service_data'
		) );

	}
}

?>