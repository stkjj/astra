<?php
/**
 * Rank Math Compatibility File.
 *
 * @package Astra
 * @since x.x.x
 */

// If plugin - 'RankMath' not exist then return.
if ( ! class_exists( 'RankMath' ) ) {
	return;
}

/**
 * Astra Rank Math Compatibility
 *
 * @since x.x.x
 */
class Astra_Rank_Math {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'rank_math_setup' ) );
	}

	/**
	 * Add theme support for Rankmath.
	 *
	 * @since x.x.x
	 * @return void
	 */
	public function rank_math_setup() {
		add_theme_support( 'rank-math-breadcrumbs' );
	}
}

/**
 * Kicking this off by 'new' object.
 */
new Astra_Rank_Math();
