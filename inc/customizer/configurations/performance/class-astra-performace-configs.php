<?php
/**
 * Performance Options for Astra Theme.
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2021, Astra
 * @link        https://wpastra.com/
 * @since       Astra x.x.x
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Performance_Configs' ) ) {

	/**
	 * Register Astra Performance Configurations.
	 */
	class Astra_Performance_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Astra Performance Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since x.x.x
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array(

				/**
				 * Option: Load Google fonts locally.
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[load-google-fonts-locally]',
					'default'  => astra_get_option( 'load-google-fonts-locally' ),
					'type'     => 'control',
					'control'  => 'ast-toggle-control',
					'title'    => __( 'Load Google Fonts Locally', 'astra' ),
					'section'  => 'section-performance',
					'priority' => 10,
				),

				/**
				 * Option: Preload local fonts.
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[preload-local-fonts]',
					'default'  => astra_get_option( 'preload-local-fonts' ),
					'type'     => 'control',
					'control'  => 'ast-toggle-control',
					'title'    => __( 'Preload Local Fonts', 'astra' ),
					'divider'    => array( 'ast_class' => 'ast-top-divider ast-bottom-divider' ),
					'section'  => 'section-performance',
					'priority' => 20,
					'context'   => array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[load-google-fonts-locally]',
							'operator' => '==',
							'value'    => true,
						),
					),
				),

				/**
				 * Option: Regenerate Font Files
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[flush-local-font-files]',
					'type'     => 'control',
					'control'  => 'ast-customizer-refresh',
					'section'  => 'section-performance',
					'default'  => astra_get_option( 'flush-local-font-files' ),
					'priority' => 30,
					'description' => __( 'Click the button to reset the local fonts cache.', 'astra-addon' ),
					'title'    => __( 'Flush Local Font Files', 'astra-addon' ),
					'context'   => array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[load-google-fonts-locally]',
							'operator' => '==',
							'value'    => true,
						),
					),
				),

				/**
				 * Option: Enable CSS preload.
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[enable-css-preload]',
					'default'  => astra_get_option( 'enable-css-preload' ),
					'type'     => 'control',
					'control'  => 'ast-toggle-control',
					'title'    => __( 'Enable CSS Preload', 'astra' ),
					'divider'    => array( 'ast_class' => 'ast-top-divider' ),
					'section'  => 'section-performance',
					'priority' => 40,
				),
			);

			return array_merge( $configurations, $_configs );
		}
	}
}

new Astra_Performance_Configs();
