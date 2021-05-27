<?php
/**
 * Customizer Control: Customizer Refresh
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2021, Astra
 * @link        https://wpastra.com/
 * @since       x.x.x
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Field overrides.
 */
if ( ! class_exists( 'Astra_Control_Customizer_Refresh' ) && class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Color control (alpha).
	 */
	class Astra_Control_Customizer_Refresh extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'ast-customizer-refresh';

		/**
		 * The color with opacity rgba type.
		 *
		 * @access public
		 * @var string
		 */
		public $class = '';

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();

			$this->json['title'] = esc_html( $this->title );
			$this->json['class'] = $this->class;
			$this->json['name']  = $this->name;
		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access protected
		 */
		protected function content_template() {
			?>
			<span class="customize-control-title"> {{{ data.label }}} </span>
			<a class="button {{{ data.class }}}" onclick="wp.customize.previewer.refresh();" href="#">{{{ data.title }}}</a>
			<?php
		}

		/**
		 * Render the control's content.
		 *
		 * @see WP_Customize_Control::render_content()
		 */
		protected function render_content() {}
	}

endif;
