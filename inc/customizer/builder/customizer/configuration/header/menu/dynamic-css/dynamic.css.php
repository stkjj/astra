<?php
/**
 * Heading Colors - Dynamic CSS
 *
 * @package astra-builder
 * @since x.x.x
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Heading Colors
 */
add_filter( 'astra_dynamic_theme_css', 'astra_hb_menu_dynamic_css' );

/**
 * Dynamic CSS
 *
 * @param  string $dynamic_css          Astra Dynamic CSS.
 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
 * @return String Generated dynamic CSS for Heading Colors.
 *
 * @since x.x.x
 */
function astra_hb_menu_dynamic_css( $dynamic_css, $dynamic_css_filtered = '' ) {

	for ( $index = 1; $index <= Astra_Builder_Loader::$num_of_header_menu; $index++ ) {

		if ( ! Astra_Builder_Helper::is_component_loaded( 'header', 'menu-' . $index ) ) {
			continue;
		}

		$_prefix  = 'menu' . $index;
		$_section = 'section-hb-menu-' . $index;

		$selector = '.astra-hfb-header .ast-builder-menu-' . $index . ' .main-header-menu';

		// Sub Menu.
		$sub_menu_border              = astra_get_option( 'header-' . $_prefix . '-submenu-border' );
		$sub_menu_divider_toggle      = astra_get_option( 'header-' . $_prefix . '-submenu-item-border' );
		$sub_menu_divider_color       = astra_get_option( 'header-' . $_prefix . '-submenu-item-b-color' );
		$submenu_resp_color           = astra_get_option( 'header-' . $_prefix . '-submenu-color-responsive' );
		$submenu_resp_bg_color        = astra_get_option( 'header-' . $_prefix . '-submenu-bg-color-responsive' );
		$submenu_resp_color_hover     = astra_get_option( 'header-' . $_prefix . '-submenu-h-color-responsive' );
		$submenu_resp_bg_color_hover  = astra_get_option( 'header-' . $_prefix . '-submenu-h-bg-color-responsive' );
		$submenu_resp_color_active    = astra_get_option( 'header-' . $_prefix . '-submenu-a-color-responsive' );
		$submenu_resp_bg_color_active = astra_get_option( 'header-' . $_prefix . '-submenu-a-bg-color-responsive' );

		$submenu_resp_color_desktop = ( isset( $submenu_resp_color['desktop'] ) ) ? $submenu_resp_color['desktop'] : '';
		$submenu_resp_color_tablet  = ( isset( $submenu_resp_color['tablet'] ) ) ? $submenu_resp_color['tablet'] : '';
		$submenu_resp_color_mobile  = ( isset( $submenu_resp_color['mobile'] ) ) ? $submenu_resp_color['mobile'] : '';

		$submenu_resp_bg_color_desktop = ( isset( $submenu_resp_bg_color['desktop'] ) ) ? $submenu_resp_bg_color['desktop'] : '';
		$submenu_resp_bg_color_tablet  = ( isset( $submenu_resp_bg_color['tablet'] ) ) ? $submenu_resp_bg_color['tablet'] : '';
		$submenu_resp_bg_color_mobile  = ( isset( $submenu_resp_bg_color['mobile'] ) ) ? $submenu_resp_bg_color['mobile'] : '';

		$submenu_resp_color_hover_desktop = ( isset( $submenu_resp_color_hover['desktop'] ) ) ? $submenu_resp_color_hover['desktop'] : '';
		$submenu_resp_color_hover_tablet  = ( isset( $submenu_resp_color_hover['tablet'] ) ) ? $submenu_resp_color_hover['tablet'] : '';
		$submenu_resp_color_hover_mobile  = ( isset( $submenu_resp_color_hover['mobile'] ) ) ? $submenu_resp_color_hover['mobile'] : '';

		$submenu_resp_bg_color_hover_desktop = ( isset( $submenu_resp_bg_color_hover['desktop'] ) ) ? $submenu_resp_bg_color_hover['desktop'] : '';
		$submenu_resp_bg_color_hover_tablet  = ( isset( $submenu_resp_bg_color_hover['tablet'] ) ) ? $submenu_resp_bg_color_hover['tablet'] : '';
		$submenu_resp_bg_color_hover_mobile  = ( isset( $submenu_resp_bg_color_hover['mobile'] ) ) ? $submenu_resp_bg_color_hover['mobile'] : '';

		$submenu_resp_color_active_desktop = ( isset( $submenu_resp_color_active['desktop'] ) ) ? $submenu_resp_color_active['desktop'] : '';
		$submenu_resp_color_active_tablet  = ( isset( $submenu_resp_color_active['tablet'] ) ) ? $submenu_resp_color_active['tablet'] : '';
		$submenu_resp_color_active_mobile  = ( isset( $submenu_resp_color_active['mobile'] ) ) ? $submenu_resp_color_active['mobile'] : '';

		$submenu_resp_bg_color_active_desktop = ( isset( $submenu_resp_bg_color_active['desktop'] ) ) ? $submenu_resp_bg_color_active['desktop'] : '';
		$submenu_resp_bg_color_active_tablet  = ( isset( $submenu_resp_bg_color_active['tablet'] ) ) ? $submenu_resp_bg_color_active['tablet'] : '';
		$submenu_resp_bg_color_active_mobile  = ( isset( $submenu_resp_bg_color_active['mobile'] ) ) ? $submenu_resp_bg_color_active['mobile'] : '';

		// Menu.
		$menu_resp_color           = astra_get_option( 'header-' . $_prefix . '-color-responsive' );
		$menu_resp_bg_color        = astra_get_option( 'header-' . $_prefix . '-bg-obj-responsive' );
		$menu_resp_color_hover     = astra_get_option( 'header-' . $_prefix . '-h-color-responsive' );
		$menu_resp_bg_color_hover  = astra_get_option( 'header-' . $_prefix . '-h-bg-color-responsive' );
		$menu_resp_color_active    = astra_get_option( 'header-' . $_prefix . '-a-color-responsive' );
		$menu_resp_bg_color_active = astra_get_option( 'header-' . $_prefix . '-a-bg-color-responsive' );

		$menu_resp_color_desktop = ( isset( $menu_resp_color['desktop'] ) ) ? $menu_resp_color['desktop'] : '';
		$menu_resp_color_tablet  = ( isset( $menu_resp_color['tablet'] ) ) ? $menu_resp_color['tablet'] : '';
		$menu_resp_color_mobile  = ( isset( $menu_resp_color['mobile'] ) ) ? $menu_resp_color['mobile'] : '';

		$menu_resp_bg_color_desktop = ( isset( $menu_resp_bg_color['desktop'] ) ) ? $menu_resp_bg_color['desktop'] : '';
		$menu_resp_bg_color_tablet  = ( isset( $menu_resp_bg_color['tablet'] ) ) ? $menu_resp_bg_color['tablet'] : '';
		$menu_resp_bg_color_mobile  = ( isset( $menu_resp_bg_color['mobile'] ) ) ? $menu_resp_bg_color['mobile'] : '';

		$menu_resp_color_hover_desktop = ( isset( $menu_resp_color_hover['desktop'] ) ) ? $menu_resp_color_hover['desktop'] : '';
		$menu_resp_color_hover_tablet  = ( isset( $menu_resp_color_hover['tablet'] ) ) ? $menu_resp_color_hover['tablet'] : '';
		$menu_resp_color_hover_mobile  = ( isset( $menu_resp_color_hover['mobile'] ) ) ? $menu_resp_color_hover['mobile'] : '';

		$menu_resp_bg_color_hover_desktop = ( isset( $menu_resp_bg_color_hover['desktop'] ) ) ? $menu_resp_bg_color_hover['desktop'] : '';
		$menu_resp_bg_color_hover_tablet  = ( isset( $menu_resp_bg_color_hover['tablet'] ) ) ? $menu_resp_bg_color_hover['tablet'] : '';
		$menu_resp_bg_color_hover_mobile  = ( isset( $menu_resp_bg_color_hover['mobile'] ) ) ? $menu_resp_bg_color_hover['mobile'] : '';

		$menu_resp_color_active_desktop = ( isset( $menu_resp_color_active['desktop'] ) ) ? $menu_resp_color_active['desktop'] : '';
		$menu_resp_color_active_tablet  = ( isset( $menu_resp_color_active['tablet'] ) ) ? $menu_resp_color_active['tablet'] : '';
		$menu_resp_color_active_mobile  = ( isset( $menu_resp_color_active['mobile'] ) ) ? $menu_resp_color_active['mobile'] : '';

		$menu_resp_bg_color_active_desktop = ( isset( $menu_resp_bg_color_active['desktop'] ) ) ? $menu_resp_bg_color_active['desktop'] : '';
		$menu_resp_bg_color_active_tablet  = ( isset( $menu_resp_bg_color_active['tablet'] ) ) ? $menu_resp_bg_color_active['tablet'] : '';
		$menu_resp_bg_color_active_mobile  = ( isset( $menu_resp_bg_color_active['mobile'] ) ) ? $menu_resp_bg_color_active['mobile'] : '';

		// Typography.
		$menu_font_family    = astra_get_option( 'header-' . $_prefix . '-font-family' );
		$menu_font_size      = astra_get_option( 'header-' . $_prefix . '-font-size' );
		$menu_font_weight    = astra_get_option( 'header-' . $_prefix . '-font-weight' );
		$menu_text_transform = astra_get_option( 'header-' . $_prefix . '-text-transform' );
		$menu_line_height    = astra_get_option( 'header-' . $_prefix . '-line-height' );

		$menu_font_size_desktop      = ( isset( $menu_font_size['desktop'] ) ) ? $menu_font_size['desktop'] : '';
		$menu_font_size_tablet       = ( isset( $menu_font_size['tablet'] ) ) ? $menu_font_size['tablet'] : '';
		$menu_font_size_mobile       = ( isset( $menu_font_size['mobile'] ) ) ? $menu_font_size['mobile'] : '';
		$menu_font_size_desktop_unit = ( isset( $menu_font_size['desktop-unit'] ) ) ? $menu_font_size['desktop-unit'] : '';
		$menu_font_size_tablet_unit  = ( isset( $menu_font_size['tablet-unit'] ) ) ? $menu_font_size['tablet-unit'] : '';
		$menu_font_size_mobile_unit  = ( isset( $menu_font_size['mobile-unit'] ) ) ? $menu_font_size['mobile-unit'] : '';

		$sub_menu_font_family    = astra_get_option( 'header-font-family-' . $_prefix . '-sub-menu' );
		$sub_menu_font_size      = astra_get_option( 'header-font-size-' . $_prefix . '-sub-menu' );
		$sub_menu_font_weight    = astra_get_option( 'header-font-weight-' . $_prefix . '-sub-menu' );
		$sub_menu_text_transform = astra_get_option( 'header-text-transform-' . $_prefix . '-sub-menu' );
		$sub_menu_line_height    = astra_get_option( 'header-line-height-' . $_prefix . '-sub-menu' );

		$sub_menu_font_size_desktop      = ( isset( $sub_menu_font_size['desktop'] ) ) ? $sub_menu_font_size['desktop'] : '';
		$sub_menu_font_size_tablet       = ( isset( $sub_menu_font_size['tablet'] ) ) ? $sub_menu_font_size['tablet'] : '';
		$sub_menu_font_size_mobile       = ( isset( $sub_menu_font_size['mobile'] ) ) ? $sub_menu_font_size['mobile'] : '';
		$sub_menu_font_size_desktop_unit = ( isset( $sub_menu_font_size['desktop-unit'] ) ) ? $sub_menu_font_size['desktop-unit'] : '';
		$sub_menu_font_size_tablet_unit  = ( isset( $sub_menu_font_size['tablet-unit'] ) ) ? $sub_menu_font_size['tablet-unit'] : '';
		$sub_menu_font_size_mobile_unit  = ( isset( $sub_menu_font_size['mobile-unit'] ) ) ? $sub_menu_font_size['mobile-unit'] : '';

		$mega_menu_heading_font_family    = astra_get_option( 'header-' . $_prefix . '-header-megamenu-heading-font-family' );
		$mega_menu_heading_font_size      = astra_get_option( 'header-' . $_prefix . '-header-megamenu-heading-font-size' );
		$mega_menu_heading_font_weight    = astra_get_option( 'header-' . $_prefix . '-header-megamenu-heading-font-weight' );
		$mega_menu_heading_text_transform = astra_get_option( 'header-' . $_prefix . '-header-megamenu-heading-text-transform' );

		$mega_menu_heading_font_size_desktop      = ( isset( $mega_menu_heading_font_size['desktop'] ) ) ? $mega_menu_heading_font_size['desktop'] : '';
		$mega_menu_heading_font_size_tablet       = ( isset( $mega_menu_heading_font_size['tablet'] ) ) ? $mega_menu_heading_font_size['tablet'] : '';
		$mega_menu_heading_font_size_mobile       = ( isset( $mega_menu_heading_font_size['mobile'] ) ) ? $mega_menu_heading_font_size['mobile'] : '';
		$mega_menu_heading_font_size_desktop_unit = ( isset( $mega_menu_heading_font_size['desktop-unit'] ) ) ? $mega_menu_heading_font_size['desktop-unit'] : '';
		$mega_menu_heading_font_size_tablet_unit  = ( isset( $mega_menu_heading_font_size['tablet-unit'] ) ) ? $mega_menu_heading_font_size['tablet-unit'] : '';
		$mega_menu_heading_font_size_mobile_unit  = ( isset( $mega_menu_heading_font_size['mobile-unit'] ) ) ? $mega_menu_heading_font_size['mobile-unit'] : '';

		// Spacing.
		$menu_spacing              = astra_get_option( 'header-' . $_prefix . '-menu-spacing' );
		$sub_menu_spacing          = astra_get_option( 'header-' . $_prefix . '-submenu-spacing' );
		$mega_menu_heading_spacing = astra_get_option( 'header-' . $_prefix . '-header-megamenu-heading-space' );

		$sub_menu_divider_color = ( true === $sub_menu_divider_toggle ) ? $sub_menu_divider_color : '';

		$sub_menu_border_top = ( isset( $sub_menu_border ) && ! empty( $sub_menu_border['top'] ) ) ? $sub_menu_border['top'] : 0;

		$sub_menu_border_bottom = ( isset( $sub_menu_border ) && ! empty( $sub_menu_border['bottom'] ) ) ? $sub_menu_border['bottom'] : 0;

		$sub_menu_border_right = ( isset( $sub_menu_border ) && ! empty( $sub_menu_border['right'] ) ) ? $sub_menu_border['right'] : 0;

		$sub_menu_border_left = ( isset( $sub_menu_border ) && ! empty( $sub_menu_border['left'] ) ) ? $sub_menu_border['left'] : 0;

		// Menu Spacing.

		// - Desktop
		$menu_desktop_spacing_top = ( isset( $menu_spacing['desktop']['top'] ) && ! empty( $menu_spacing['desktop']['top'] ) ) ? $menu_spacing['desktop']['top'] : '';

		$menu_desktop_spacing_bottom = ( isset( $menu_spacing['desktop']['bottom'] ) && ! empty( $menu_spacing['desktop']['bottom'] ) ) ? $menu_spacing['desktop']['bottom'] : '';

		$menu_desktop_spacing_right = ( isset( $menu_spacing['desktop']['right'] ) && ! empty( $menu_spacing['desktop']['right'] ) ) ? $menu_spacing['desktop']['right'] : '';

		$menu_desktop_spacing_left = ( isset( $menu_spacing['desktop']['left'] ) && ! empty( $menu_spacing['desktop']['left'] ) ) ? $menu_spacing['desktop']['left'] : '';

		$menu_desktop_spacing_unit = ( isset( $menu_spacing['desktop-unit'] ) && ! empty( $menu_spacing['desktop-unit'] ) ) ? $menu_spacing['desktop-unit'] : '';

		// - Tablet.
		$menu_tablet_spacing_top = ( isset( $menu_spacing['tablet']['top'] ) && ! empty( $menu_spacing['tablet']['top'] ) ) ? $menu_spacing['tablet']['top'] : '';

		$menu_tablet_spacing_bottom = ( isset( $menu_spacing['tablet']['bottom'] ) && ! empty( $menu_spacing['tablet']['bottom'] ) ) ? $menu_spacing['tablet']['bottom'] : '';

		$menu_tablet_spacing_right = ( isset( $menu_spacing['tablet']['right'] ) && ! empty( $menu_spacing['tablet']['right'] ) ) ? $menu_spacing['tablet']['right'] : '';

		$menu_tablet_spacing_left = ( isset( $menu_spacing['tablet']['left'] ) && ! empty( $menu_spacing['tablet']['left'] ) ) ? $menu_spacing['tablet']['left'] : '';

		$menu_tablet_spacing_unit = ( isset( $menu_spacing['tablet-unit'] ) && ! empty( $menu_spacing['tablet-unit'] ) ) ? $menu_spacing['tablet-unit'] : '';

		// - Mobile.
		$menu_mobile_spacing_top = ( isset( $menu_spacing['mobile']['top'] ) && ! empty( $menu_spacing['mobile']['top'] ) ) ? $menu_spacing['mobile']['top'] : '';

		$menu_mobile_spacing_bottom = ( isset( $menu_spacing['mobile']['bottom'] ) && ! empty( $menu_spacing['mobile']['bottom'] ) ) ? $menu_spacing['mobile']['bottom'] : '';

		$menu_mobile_spacing_right = ( isset( $menu_spacing['mobile']['right'] ) && ! empty( $menu_spacing['mobile']['right'] ) ) ? $menu_spacing['mobile']['right'] : '';

		$menu_mobile_spacing_left = ( isset( $menu_spacing['mobile']['left'] ) && ! empty( $menu_spacing['mobile']['left'] ) ) ? $menu_spacing['mobile']['left'] : '';

		$menu_mobile_spacing_unit = ( isset( $menu_spacing['mobile-unit'] ) && ! empty( $menu_spacing['mobile-unit'] ) ) ? $menu_spacing['mobile-unit'] : '';

		// SubMenu Spacing.

		// - Desktop
		$sub_menu_desktop_spacing_top = ( isset( $sub_menu_spacing['desktop']['top'] ) && ! empty( $sub_menu_spacing['desktop']['top'] ) ) ? $sub_menu_spacing['desktop']['top'] : '';

		$sub_menu_desktop_spacing_bottom = ( isset( $sub_menu_spacing['desktop']['bottom'] ) && ! empty( $sub_menu_spacing['desktop']['bottom'] ) ) ? $sub_menu_spacing['desktop']['bottom'] : '';

		$sub_menu_desktop_spacing_right = ( isset( $sub_menu_spacing['desktop']['right'] ) && ! empty( $sub_menu_spacing['desktop']['right'] ) ) ? $sub_menu_spacing['desktop']['right'] : '';

		$sub_menu_desktop_spacing_left = ( isset( $sub_menu_spacing['desktop']['left'] ) && ! empty( $sub_menu_spacing['desktop']['left'] ) ) ? $sub_menu_spacing['desktop']['left'] : '';

		$sub_menu_desktop_spacing_unit = ( isset( $sub_menu_spacing['desktop-unit'] ) && ! empty( $sub_menu_spacing['desktop-unit'] ) ) ? $sub_menu_spacing['desktop-unit'] : '';

		// - Tablet.
		$sub_menu_tablet_spacing_top = ( isset( $sub_menu_spacing['tablet']['top'] ) && ! empty( $sub_menu_spacing['tablet']['top'] ) ) ? $sub_menu_spacing['tablet']['top'] : '';

		$sub_menu_tablet_spacing_bottom = ( isset( $sub_menu_spacing['tablet']['bottom'] ) && ! empty( $sub_menu_spacing['tablet']['bottom'] ) ) ? $sub_menu_spacing['tablet']['bottom'] : '';

		$sub_menu_tablet_spacing_right = ( isset( $sub_menu_spacing['tablet']['right'] ) && ! empty( $sub_menu_spacing['tablet']['right'] ) ) ? $sub_menu_spacing['tablet']['right'] : '';

		$sub_menu_tablet_spacing_left = ( isset( $sub_menu_spacing['tablet']['left'] ) && ! empty( $sub_menu_spacing['tablet']['left'] ) ) ? $sub_menu_spacing['tablet']['left'] : '';

		$sub_menu_tablet_spacing_unit = ( isset( $sub_menu_spacing['tablet-unit'] ) && ! empty( $sub_menu_spacing['tablet-unit'] ) ) ? $sub_menu_spacing['tablet-unit'] : '';

		// - Mobile.
		$sub_menu_mobile_spacing_top = ( isset( $sub_menu_spacing['mobile']['top'] ) && ! empty( $sub_menu_spacing['mobile']['top'] ) ) ? $sub_menu_spacing['mobile']['top'] : '';

		$sub_menu_mobile_spacing_bottom = ( isset( $sub_menu_spacing['mobile']['bottom'] ) && ! empty( $sub_menu_spacing['mobile']['bottom'] ) ) ? $sub_menu_spacing['mobile']['bottom'] : '';

		$sub_menu_mobile_spacing_right = ( isset( $sub_menu_spacing['mobile']['right'] ) && ! empty( $sub_menu_spacing['mobile']['right'] ) ) ? $sub_menu_spacing['mobile']['right'] : '';

		$sub_menu_mobile_spacing_left = ( isset( $sub_menu_spacing['mobile']['left'] ) && ! empty( $sub_menu_spacing['mobile']['left'] ) ) ? $sub_menu_spacing['mobile']['left'] : '';

		$sub_menu_mobile_spacing_unit = ( isset( $sub_menu_spacing['mobile-unit'] ) && ! empty( $sub_menu_spacing['mobile-unit'] ) ) ? $sub_menu_spacing['mobile-unit'] : '';

		// Mega Menu heading Spacing.

		// - Desktop
		$mega_menu_desktop_spacing_top = ( isset( $mega_menu_heading_spacing['desktop']['top'] ) && ! empty( $mega_menu_heading_spacing['desktop']['top'] ) ) ? $mega_menu_heading_spacing['desktop']['top'] : '';

		$mega_menu_desktop_spacing_bottom = ( isset( $mega_menu_heading_spacing['desktop']['bottom'] ) && ! empty( $mega_menu_heading_spacing['desktop']['bottom'] ) ) ? $mega_menu_heading_spacing['desktop']['bottom'] : '';

		$mega_menu_desktop_spacing_right = ( isset( $mega_menu_heading_spacing['desktop']['right'] ) && ! empty( $mega_menu_heading_spacing['desktop']['right'] ) ) ? $mega_menu_heading_spacing['desktop']['right'] : '';

		$mega_menu_desktop_spacing_left = ( isset( $mega_menu_heading_spacing['desktop']['left'] ) && ! empty( $mega_menu_heading_spacing['desktop']['left'] ) ) ? $mega_menu_heading_spacing['desktop']['left'] : '';

		$mega_menu_desktop_spacing_unit = ( isset( $mega_menu_heading_spacing['desktop-unit'] ) && ! empty( $mega_menu_heading_spacing['desktop-unit'] ) ) ? $mega_menu_heading_spacing['desktop-unit'] : '';

		// - Tablet.
		$mega_menu_tablet_spacing_top = ( isset( $mega_menu_heading_spacing['tablet']['top'] ) && ! empty( $mega_menu_heading_spacing['tablet']['top'] ) ) ? $mega_menu_heading_spacing['tablet']['top'] : '';

		$mega_menu_tablet_spacing_bottom = ( isset( $mega_menu_heading_spacing['tablet']['bottom'] ) && ! empty( $mega_menu_heading_spacing['tablet']['bottom'] ) ) ? $mega_menu_heading_spacing['tablet']['bottom'] : '';

		$mega_menu_tablet_spacing_right = ( isset( $mega_menu_heading_spacing['tablet']['right'] ) && ! empty( $mega_menu_heading_spacing['tablet']['right'] ) ) ? $mega_menu_heading_spacing['tablet']['right'] : '';

		$mega_menu_tablet_spacing_left = ( isset( $mega_menu_heading_spacing['tablet']['left'] ) && ! empty( $mega_menu_heading_spacing['tablet']['left'] ) ) ? $mega_menu_heading_spacing['tablet']['left'] : '';

		$mega_menu_tablet_spacing_unit = ( isset( $mega_menu_heading_spacing['tablet-unit'] ) && ! empty( $mega_menu_heading_spacing['tablet-unit'] ) ) ? $mega_menu_heading_spacing['tablet-unit'] : '';

		// - Mobile.
		$mega_menu_mobile_spacing_top = ( isset( $mega_menu_heading_spacing['mobile']['top'] ) && ! empty( $mega_menu_heading_spacing['mobile']['top'] ) ) ? $mega_menu_heading_spacing['mobile']['top'] : '';

		$mega_menu_mobile_spacing_bottom = ( isset( $mega_menu_heading_spacing['mobile']['bottom'] ) && ! empty( $mega_menu_heading_spacing['mobile']['bottom'] ) ) ? $mega_menu_heading_spacing['mobile']['bottom'] : '';

		$mega_menu_mobile_spacing_right = ( isset( $mega_menu_heading_spacing['mobile']['right'] ) && ! empty( $mega_menu_heading_spacing['mobile']['right'] ) ) ? $mega_menu_heading_spacing['mobile']['right'] : '';

		$mega_menu_mobile_spacing_left = ( isset( $mega_menu_heading_spacing['mobile']['left'] ) && ! empty( $mega_menu_heading_spacing['mobile']['left'] ) ) ? $mega_menu_heading_spacing['mobile']['left'] : '';

		$mega_menu_mobile_spacing_unit = ( isset( $mega_menu_heading_spacing['mobile-unit'] ) && ! empty( $mega_menu_heading_spacing['mobile-unit'] ) ) ? $mega_menu_heading_spacing['mobile-unit'] : '';

		// If Astra-Pro is active or not.
		$is_astra_addon_active = defined( 'ASTRA_EXT_VER' );

		$css_output_desktop = array(

			// Menu.
			$selector . ' .menu-item > .menu-link'       => array(
				'color'          => $menu_resp_color_desktop,
				'font-family'    => astra_get_font_family( $menu_font_family ),
				'font-weight'    => esc_attr( $menu_font_weight ),
				'font-size'      => astra_get_font_css_value( $menu_font_size_desktop, $menu_font_size_desktop_unit ),
				'line-height'    => esc_attr( $menu_line_height ),
				'text-transform' => esc_attr( $menu_text_transform ),
				'padding-top'    => astra_get_css_value( $menu_desktop_spacing_top, $menu_desktop_spacing_unit ),
				'padding-bottom' => astra_get_css_value( $menu_desktop_spacing_bottom, $menu_desktop_spacing_unit ),
				'padding-left'   => astra_get_css_value( $menu_desktop_spacing_left, $menu_desktop_spacing_unit ),
				'padding-right'  => astra_get_css_value( $menu_desktop_spacing_right, $menu_desktop_spacing_unit ),
			),
			$selector . ' .menu-item > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_desktop,
			),
			$selector . '.ast-nav-menu .menu-item:hover > .menu-link' => array(
				'color'      => $menu_resp_color_hover_desktop,
				'background' => $menu_resp_bg_color_hover_desktop,
			),
			$selector . ' .menu-item:hover > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_hover_desktop,
			),
			$selector . '.ast-nav-menu .menu-item.current-menu-item > .menu-link' => array(
				'color'      => $menu_resp_color_active_desktop,
				'background' => $menu_resp_bg_color_active_desktop,
			),
			$selector . ' .menu-item.current-menu-item > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_active_desktop,
			),
			$selector . ' .menu-item.menu-item-heading > .menu-link' => array(
				'color'          => esc_attr( astra_get_option( 'header-' . $_prefix . '-header-megamenu-heading-color' ) ),
				'font-family'    => astra_get_font_family( $mega_menu_heading_font_family ),
				'font-weight'    => esc_attr( $mega_menu_heading_font_weight ),
				'font-size'      => astra_get_font_css_value( $mega_menu_heading_font_size_desktop, $mega_menu_heading_font_size_desktop_unit ),
				'text-transform' => esc_attr( $mega_menu_heading_text_transform ),
				'padding-top'    => astra_get_css_value( $mega_menu_desktop_spacing_top, $mega_menu_desktop_spacing_unit ),
				'padding-bottom' => astra_get_css_value( $mega_menu_desktop_spacing_bottom, $mega_menu_desktop_spacing_unit ),
				'padding-left'   => astra_get_css_value( $mega_menu_desktop_spacing_left, $mega_menu_desktop_spacing_unit ),
				'padding-right'  => astra_get_css_value( $mega_menu_desktop_spacing_right, $mega_menu_desktop_spacing_unit ),
			),
			$selector . ' .astra-megamenu-li .menu-item.menu-item-heading > .menu-link:hover, ' . $selector . ' .astra-megamenu-li .menu-item.menu-item-heading:hover > .menu-link' => array(
				'color' => esc_attr( astra_get_option( 'header-' . $_prefix . '-header-megamenu-heading-h-color' ) ),
			),
			// Sub Menu.
			$selector . ' .sub-menu, ' . $selector . '.submenu-with-border .astra-megamenu' => array(
				'background'          => $submenu_resp_bg_color_desktop,
				'border-top-width'    => astra_get_css_value( $sub_menu_border_top, 'px' ),
				'border-bottom-width' => astra_get_css_value( $sub_menu_border_bottom, 'px' ),
				'border-right-width'  => astra_get_css_value( $sub_menu_border_right, 'px' ),
				'border-left-width'   => astra_get_css_value( $sub_menu_border_left, 'px' ),
				'border-color'        => esc_attr( astra_get_option( 'header-' . $_prefix . '-submenu-b-color' ) ),
				'border-style'        => 'solid',
			),
			$selector . ' .sub-menu .menu-link'          => array(
				'color'          => $submenu_resp_color_desktop,
				'font-family'    => astra_get_font_family( $sub_menu_font_family ),
				'font-weight'    => esc_attr( $sub_menu_font_weight ),
				'font-size'      => astra_get_font_css_value( $sub_menu_font_size_desktop, $sub_menu_font_size_desktop_unit ),
				'line-height'    => esc_attr( $sub_menu_line_height ),
				'text-transform' => esc_attr( $sub_menu_text_transform ),
				'padding-top'    => astra_get_css_value( $sub_menu_desktop_spacing_top, $sub_menu_desktop_spacing_unit ),
				'padding-bottom' => astra_get_css_value( $sub_menu_desktop_spacing_bottom, $sub_menu_desktop_spacing_unit ),
				'padding-left'   => astra_get_css_value( $sub_menu_desktop_spacing_left, $sub_menu_desktop_spacing_unit ),
				'padding-right'  => astra_get_css_value( $sub_menu_desktop_spacing_right, $sub_menu_desktop_spacing_unit ),
			),
			$selector . ' .sub-menu .menu-item > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_desktop,
			),
			$selector . ' .sub-menu .menu-item .menu-link:hover' => array(
				'color'      => $submenu_resp_color_hover_desktop,
				'background' => $submenu_resp_bg_color_hover_desktop,
			),
			$selector . ' .sub-menu .menu-item:hover > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_desktop,
			),
			$selector . ' .sub-menu .current-menu-item > .menu-link' => array(
				'color'      => $submenu_resp_color_active_desktop,
				'background' => $submenu_resp_bg_color_active_desktop,
			),
			$selector . ' .sub-menu .current-menu-item > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_active_desktop,
			),
		);

		if ( $is_astra_addon_active ) {
			$css_output_desktop[ $selector . ' .menu-item.menu-item-has-children > .ast-menu-toggle' ] = array(
				'top'   => astra_responsive_spacing( $menu_spacing, 'top', 'desktop' ),
				'right' => astra_calc_spacing( astra_responsive_spacing( $menu_spacing, 'right', 'desktop' ), '-', '0.907', 'em' ),
			);
		}

		$css_output_desktop[ $selector ] = astra_get_background_obj( $menu_resp_bg_color_desktop );

		$css_output_tablet = array(

			$selector . ' .menu-item > .menu-link'       => array(
				'color'          => $menu_resp_color_tablet,
				'font-size'      => astra_get_font_css_value( $menu_font_size_tablet, $menu_font_size_tablet_unit ),
				'padding-top'    => astra_get_css_value( $menu_tablet_spacing_top, $menu_tablet_spacing_unit ),
				'padding-bottom' => astra_get_css_value( $menu_tablet_spacing_bottom, $menu_tablet_spacing_unit ),
				'padding-left'   => astra_get_css_value( $menu_tablet_spacing_left, $menu_tablet_spacing_unit ),
				'padding-right'  => astra_get_css_value( $menu_tablet_spacing_right, $menu_tablet_spacing_unit ),
			),
			$selector . ' .menu-item > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_tablet,
			),
			$selector . '.ast-nav-menu .menu-item:hover > .menu-link' => array(
				'color'      => $menu_resp_color_hover_tablet,
				'background' => $menu_resp_bg_color_hover_tablet,
			),
			$selector . ' .menu-item:hover > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_hover_tablet,
			),
			$selector . '.ast-nav-menu .menu-item.current-menu-item > .menu-link' => array(
				'color'      => $menu_resp_color_active_tablet,
				'background' => $menu_resp_bg_color_active_tablet,
			),
			$selector . ' .menu-item.current-menu-item > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_active_tablet,
			),
			$selector . ' .menu-item.menu-item-heading > .menu-link' => array(
				'font-size'      => astra_get_font_css_value( $mega_menu_heading_font_size_tablet, $mega_menu_heading_font_size_tablet_unit ),
				'padding-top'    => astra_get_css_value( $mega_menu_tablet_spacing_top, $mega_menu_tablet_spacing_unit ),
				'padding-bottom' => astra_get_css_value( $mega_menu_tablet_spacing_bottom, $mega_menu_tablet_spacing_unit ),
				'padding-left'   => astra_get_css_value( $mega_menu_tablet_spacing_left, $mega_menu_tablet_spacing_unit ),
				'padding-right'  => astra_get_css_value( $mega_menu_tablet_spacing_right, $mega_menu_tablet_spacing_unit ),
			),
			$selector . '.ast-nav-menu .sub-menu, ' . $selector . '.submenu-with-border .astra-megamenu' => array(
				'background' => $submenu_resp_bg_color_tablet,
			),
			$selector . '.ast-nav-menu .sub-menu .menu-item .menu-link' => array(
				'color'          => $submenu_resp_color_tablet,
				'background'     => $submenu_resp_bg_color_tablet,
				'font-size'      => astra_get_font_css_value( $sub_menu_font_size_tablet, $sub_menu_font_size_tablet_unit ),
				'padding-top'    => astra_get_css_value( $sub_menu_tablet_spacing_top, $sub_menu_tablet_spacing_unit ),
				'padding-bottom' => astra_get_css_value( $sub_menu_tablet_spacing_bottom, $sub_menu_tablet_spacing_unit ),
				'padding-left'   => astra_get_css_value( $sub_menu_tablet_spacing_left, $sub_menu_tablet_spacing_unit ),
				'padding-right'  => astra_get_css_value( $sub_menu_tablet_spacing_right, $sub_menu_tablet_spacing_unit ),
			),
			$selector . ' .sub-menu .menu-item > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_tablet,
			),
			$selector . '.ast-nav-menu .sub-menu .menu-item .menu-link:hover' => array(
				'color'      => $submenu_resp_color_hover_tablet,
				'background' => $submenu_resp_bg_color_hover_tablet,
			),
			$selector . ' .sub-menu .menu-item:hover > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_hover_tablet,
			),
			$selector . '.ast-nav-menu .sub-menu .current-menu-item > .menu-link' => array(
				'color'      => $submenu_resp_color_active_tablet,
				'background' => $submenu_resp_bg_color_active_tablet,
			),
			$selector . ' .sub-menu .current-menu-item > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_active_tablet,
			),
		);

		if ( $is_astra_addon_active ) {
			$css_output_tablet[ $selector . ' .menu-item.menu-item-has-children > .ast-menu-toggle' ] = array(
				'top'   => astra_responsive_spacing( $menu_spacing, 'top', 'tablet' ),
				'right' => astra_calc_spacing( astra_responsive_spacing( $menu_spacing, 'right', 'tablet' ), '-', '0.907', 'em' ),
			);
		}

		$css_output_tablet[ $selector ] = astra_get_background_obj( $menu_resp_bg_color_tablet );

		$css_output_mobile = array(

			$selector . ' .menu-item > .menu-link'        => array(
				'color'          => $menu_resp_color_mobile,
				'font-size'      => astra_get_font_css_value( $menu_font_size_mobile, $menu_font_size_mobile_unit ),
				'padding-top'    => astra_get_css_value( $menu_mobile_spacing_top, $menu_mobile_spacing_unit ),
				'padding-bottom' => astra_get_css_value( $menu_mobile_spacing_bottom, $menu_mobile_spacing_unit ),
				'padding-left'   => astra_get_css_value( $menu_mobile_spacing_left, $menu_mobile_spacing_unit ),
				'padding-right'  => astra_get_css_value( $menu_mobile_spacing_right, $menu_mobile_spacing_unit ),
			),
			$selector . ' .menu-item  > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_mobile,
			),
			$selector . '.ast-nav-menu .menu-item:hover > .menu-link' => array(
				'color'      => $menu_resp_color_hover_mobile,
				'background' => $menu_resp_bg_color_hover_mobile,
			),
			$selector . ' .menu-item:hover  > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_hover_mobile,
			),
			$selector . '.ast-nav-menu .menu-item.current-menu-item > .menu-link' => array(
				'color'      => $menu_resp_color_active_mobile,
				'background' => $menu_resp_bg_color_active_mobile,
			),
			$selector . ' .menu-item.current-menu-item  > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_active_mobile,
			),
			$selector . ' .menu-item.menu-item-heading > .menu-link' => array(
				'font-size'      => astra_get_font_css_value( $mega_menu_heading_font_size_mobile, $mega_menu_heading_font_size_mobile_unit ),
				'padding-top'    => astra_get_css_value( $mega_menu_mobile_spacing_top, $mega_menu_mobile_spacing_unit ),
				'padding-bottom' => astra_get_css_value( $mega_menu_mobile_spacing_bottom, $mega_menu_mobile_spacing_unit ),
				'padding-left'   => astra_get_css_value( $mega_menu_mobile_spacing_left, $mega_menu_mobile_spacing_unit ),
				'padding-right'  => astra_get_css_value( $mega_menu_mobile_spacing_right, $mega_menu_mobile_spacing_unit ),
			),
			$selector . '.ast-nav-menu .sub-menu, ' . $selector . '.submenu-with-border .astra-megamenu' => array(
				'background' => $submenu_resp_bg_color_mobile,
			),
			$selector . '.ast-nav-menu .sub-menu .menu-item .menu-link' => array(
				'color'          => $submenu_resp_color_mobile,
				'background'     => $submenu_resp_bg_color_mobile,
				'font-size'      => astra_get_font_css_value( $sub_menu_font_size_mobile, $sub_menu_font_size_mobile_unit ),
				'padding-top'    => astra_get_css_value( $sub_menu_mobile_spacing_top, $sub_menu_mobile_spacing_unit ),
				'padding-bottom' => astra_get_css_value( $sub_menu_mobile_spacing_bottom, $sub_menu_mobile_spacing_unit ),
				'padding-left'   => astra_get_css_value( $sub_menu_mobile_spacing_left, $sub_menu_mobile_spacing_unit ),
				'padding-right'  => astra_get_css_value( $sub_menu_mobile_spacing_right, $sub_menu_mobile_spacing_unit ),
			),
			$selector . ' .sub-menu .menu-item  > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_mobile,
			),
			$selector . '.ast-nav-menu .sub-menu .menu-item .menu-link:hover' => array(
				'color'      => $submenu_resp_color_hover_mobile,
				'background' => $submenu_resp_bg_color_hover_mobile,
			),
			$selector . ' .sub-menu .menu-item:hover  > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_hover_mobile,
			),
			$selector . '.ast-nav-menu .sub-menu .current-menu-item > .menu-link' => array(
				'color'      => $submenu_resp_color_active_mobile,
				'background' => $submenu_resp_bg_color_active_mobile,
			),
			$selector . ' .sub-menu .current-menu-item  > .ast-menu-toggle' => array(
				'color' => $submenu_resp_color_active_mobile,
			),
		);

		if ( $is_astra_addon_active ) {
			$css_output_mobile[ $selector . ' .menu-item.menu-item-has-children > .ast-menu-toggle' ] = array(
				'top'   => astra_responsive_spacing( $menu_spacing, 'top', 'mobile' ),
				'right' => astra_calc_spacing( astra_responsive_spacing( $menu_spacing, 'right', 'mobile' ), '-', '0.907', 'em' ),
			);
		}

		$css_output_mobile[ $selector ] = astra_get_background_obj( $menu_resp_bg_color_mobile );

		if ( true === $sub_menu_divider_toggle ) {

			// Sub Menu Divider.
			$css_output_desktop['.astra-hfb-header .ast-builder-menu .menu-item .sub-menu .menu-link']                                        = array(
				'border-bottom-width' => '1px',
				'border-color'        => $sub_menu_divider_color,
				'border-style'        => 'solid',
			);
			$css_output_desktop['.astra-hfb-header .ast-builder-menu .menu-item .sub-menu .menu-item:last-child .menu-link']                  = array(
				'border-style' => 'none',
			);
			$css_output_mobile['.astra-hfb-header.ast-header-break-point .ast-builder-menu .main-navigation .menu-item .sub-menu .menu-link'] = array(
				'border-bottom-width' => '1px',
				'border-color'        => $sub_menu_divider_color,
				'border-style'        => 'solid',
			);
			$css_output_mobile['.astra-hfb-header.ast-header-break-point .ast-builder-menu .main-navigation .menu-item .sub-menu .menu-item:last-child .menu-link'] = array(
				'border-style' => 'none',
			);
			$css_output_mobile['.astra-hfb-header.ast-header-break-point .ast-builder-menu .main-navigation li.menu-item .menu-link']                               = array(
				'border-bottom-width' => '1px',
				'border-color'        => $sub_menu_divider_color,
				'border-style'        => 'solid',
			);
			$css_output_mobile['.astra-hfb-header.ast-header-break-point .ast-builder-menu .main-navigation li.menu-item:last-child .menu-link']                    = array(
				'border-style' => 'none',
			);
		} else {

			$css_output_desktop['.astra-hfb-header .ast-builder-menu .menu-item .sub-menu .menu-link'] = array(
				'border-style' => 'none',
			);
		}

		/* Parse CSS from array() */
		$css_output  = astra_parse_css( $css_output_desktop );
		$css_output .= astra_parse_css( $css_output_tablet, '', astra_get_tablet_breakpoint() );
		$css_output .= astra_parse_css( $css_output_mobile, '', astra_get_mobile_breakpoint() );

		$dynamic_css .= $css_output;

		$selector = '.astra-hfb-header .ast-builder-menu-' . $index . ' .main-header-bar-navigation .main-header-menu, .astra-hfb-header.ast-header-break-point .ast-builder-menu-' . $index . ' .main-header-bar-navigation .main-header-menu';
		
		$dynamic_css .= Astra_Builder_Base_Dynamic_CSS::prepare_advanced_margin_padding_css( $_section, $selector );
	}

	return $dynamic_css;
}
