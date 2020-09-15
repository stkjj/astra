<?php
/**
 * Astra Builder Base Dynamic CSS.
 *
 * @package astra-builder
 */

if ( ! class_exists( 'Astra_Builder_Base_Dynamic_CSS' ) ) {

	/**
	 * Class Astra_Builder_Base_Dynamic_CSS.
	 */
	final class Astra_Builder_Base_Dynamic_CSS {

		/**
		 * Member Variable
		 *
		 * @var instance
		 */
		private static $instance = null;


		/**
		 *  Initiator
		 */
		public static function get_instance() {

			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			add_filter( 'astra_dynamic_theme_css', array( $this, 'footer_dynamic_css' ) );
		}

		/**
		 * Prepare Advanced Margin / Padding Dynamic CSS.
		 *
		 * @param string $section_id section id.
		 * @param string $selector selector.
		 * @return array
		 */
		public static function prepare_advanced_margin_padding_css( $section_id, $selector ) {

			if ( isset( $section_id ) && isset( $selector ) ) {

				$padding = astra_get_option( $section_id . '-padding' );
				$margin  = astra_get_option( $section_id . '-margin' );

				// Desktop CSS.
				$css_output_desktop = array(

					$selector => array(

						// Padding CSS.
						'padding-top'    => astra_responsive_spacing( $padding, 'top', 'desktop' ),
						'padding-bottom' => astra_responsive_spacing( $padding, 'bottom', 'desktop' ),
						'padding-left'   => astra_responsive_spacing( $padding, 'left', 'desktop' ),
						'padding-right'  => astra_responsive_spacing( $padding, 'right', 'desktop' ),

						// Margin CSS.
						'margin-top'     => astra_responsive_spacing( $margin, 'top', 'desktop' ),
						'margin-bottom'  => astra_responsive_spacing( $margin, 'bottom', 'desktop' ),
						'margin-left'    => astra_responsive_spacing( $margin, 'left', 'desktop' ),
						'margin-right'   => astra_responsive_spacing( $margin, 'right', 'desktop' ),
					),
				);

				// Tablet CSS.
				$css_output_tablet = array(

					$selector => array(

						// Padding CSS.
						'padding-top'    => astra_responsive_spacing( $padding, 'top', 'tablet' ),
						'padding-bottom' => astra_responsive_spacing( $padding, 'bottom', 'tablet' ),
						'padding-left'   => astra_responsive_spacing( $padding, 'left', 'tablet' ),
						'padding-right'  => astra_responsive_spacing( $padding, 'right', 'tablet' ),

						// Margin CSS.
						'margin-top'     => astra_responsive_spacing( $margin, 'top', 'tablet' ),
						'margin-bottom'  => astra_responsive_spacing( $margin, 'bottom', 'tablet' ),
						'margin-left'    => astra_responsive_spacing( $margin, 'left', 'tablet' ),
						'margin-right'   => astra_responsive_spacing( $margin, 'right', 'tablet' ),
					),
				);

				// Mobile CSS.
				$css_output_mobile = array(

					$selector => array(

						// Padding CSS.
						'padding-top'    => astra_responsive_spacing( $padding, 'top', 'mobile' ),
						'padding-bottom' => astra_responsive_spacing( $padding, 'bottom', 'mobile' ),
						'padding-left'   => astra_responsive_spacing( $padding, 'left', 'mobile' ),
						'padding-right'  => astra_responsive_spacing( $padding, 'right', 'mobile' ),

						// Margin CSS.
						'margin-top'     => astra_responsive_spacing( $margin, 'top', 'mobile' ),
						'margin-bottom'  => astra_responsive_spacing( $margin, 'bottom', 'mobile' ),
						'margin-left'    => astra_responsive_spacing( $margin, 'left', 'mobile' ),
						'margin-right'   => astra_responsive_spacing( $margin, 'right', 'mobile' ),
					),
				);

				$css_output  = astra_parse_css( $css_output_desktop );
				$css_output .= astra_parse_css( $css_output_tablet, '', astra_get_tablet_breakpoint() );
				$css_output .= astra_parse_css( $css_output_mobile, '', astra_get_mobile_breakpoint() );

				return $css_output;
			}

			return '';
		}

		/**
		 * Prepare Advanced Margin / Padding Dynamic CSS.
		 *
		 * @param string $section_id section id.
		 * @param string $selector selector.
		 * @return array
		 */
		public static function prepare_advanced_typography_css( $section_id, $selector ) {

			$font_family    = astra_get_option( 'font-family-' . $section_id, 'inherit' );
			$font_weight    = astra_get_option( 'font-weight-' . $section_id, 'inherit' );
			$font_size      = astra_get_option( 'font-size-' . $section_id );
			$text_transform = astra_get_option( 'text-transform-' . $section_id );
			$line_height    = astra_get_option( 'line-height-' . $section_id );

			/**
			 * Typography CSS.
			 */
			$css_output_desktop = array(

				$selector => array(

					// Typography.
					'font-family'    => astra_get_css_value( $font_family, 'font' ),
					'font-weight'    => astra_get_css_value( $font_weight, 'font' ),
					'font-size'      => astra_responsive_font( $font_size, 'desktop' ),
					'line-height'    => esc_attr( $line_height ),
					'text-transform' => esc_attr( $text_transform ),
				),
			);

			$css_output_tablet = array(

				$selector => array(

					'font-size' => astra_responsive_font( $font_size, 'tablet' ),
				),
			);

			$css_output_mobile = array(

				$selector => array(

					'font-size' => astra_responsive_font( $font_size, 'mobile' ),
				),
			);

			/* Parse CSS from array() */
			$css_output  = astra_parse_css( $css_output_desktop );
			$css_output .= astra_parse_css( $css_output_tablet, '', astra_get_tablet_breakpoint() );
			$css_output .= astra_parse_css( $css_output_mobile, '', astra_get_mobile_breakpoint() );

			return $css_output;
		}

		/**
		 * Prepare Footer Dynamic CSS.
		 *
		 * @param string $dynamic_css Appended dynamic CSS.
		 * @param string $dynamic_css_filtered Filtered dynamic CSS.
		 * @return array
		 */
		public static function footer_dynamic_css( $dynamic_css, $dynamic_css_filtered = '' ) {

			/**
			 * Tablet CSS.
			 */
			$css_output_tablet = array(
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-5-equal .ast-builder-grid-row' => array(
					'grid-template-columns' => 'repeat( 5, 1fr )',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-4-equal .ast-builder-grid-row' => array(
					'grid-template-columns' => 'repeat( 4, 1fr )',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-4-lheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '2fr 1fr 1fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-4-rheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 1fr 1fr 2fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-equal .ast-builder-grid-row' => array(
					'grid-template-columns' => 'repeat( 3, 1fr )',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-lheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '2fr 1fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-rheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 1fr 2fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-cheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 2fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-cwide .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 3fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-firstrow .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-firstrow .ast-builder-grid-row > *:first-child' => array(
					'grid-column' => '1 / -1',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-lastrow .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-lastrow .ast-builder-grid-row > *:last-child' => array(
					'grid-column' => '1 / -1',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-2-equal .ast-builder-grid-row' => array(
					'grid-template-columns' => 'repeat( 2, 1fr )',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-2-lheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '2fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-2-rheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 2fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-tablet-full .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr',
				),
			);

			$css_output_mobile = array(
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-5-equal .ast-builder-grid-row' => array(
					'grid-template-columns' => 'repeat( 5, 1fr )',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-4-equal .ast-builder-grid-row' => array(
					'grid-template-columns' => 'repeat( 4, 1fr )',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-4-lheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '2fr 1fr 1fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-4-rheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 1fr 1fr 2fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-equal .ast-builder-grid-row' => array(
					'grid-template-columns' => 'repeat( 3, 1fr )',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-lheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '2fr 1fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-rheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 1fr 2fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-cheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 2fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-cwide .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 3fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-firstrow .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-firstrow .ast-builder-grid-row > *:first-child' => array(
					'grid-column' => '1 / -1',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-lastrow .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-lastrow .ast-builder-grid-row > *:last-child' => array(
					'grid-column' => '1 / -1',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-2-equal .ast-builder-grid-row' => array(
					'grid-template-columns' => 'repeat( 2, 1fr )',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-2-lheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '2fr 1fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-2-rheavy .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr 2fr',
				),
				'.ast-builder-grid-row-container.ast-builder-grid-row-mobile-full .ast-builder-grid-row' => array(
					'grid-template-columns' => '1fr',
				),
			);

			/* Parse CSS from array() */
			$css_output  = astra_parse_css( $css_output_tablet, '', astra_get_tablet_breakpoint() );
			$css_output .= astra_parse_css( $css_output_mobile, '', astra_get_mobile_breakpoint() );

			$dynamic_css .= $css_output;

			return $dynamic_css;
		}
	}

	/**
	 *  Prepare if class 'Astra_Builder_Base_Dynamic_CSS' exist.
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Astra_Builder_Base_Dynamic_CSS::get_instance();
}
