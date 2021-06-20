

/**
 * Assert the CSS Selector as the expected CSS property.
 *
 * @param {string} selector CSS Selected
 * @param {string} cssProperty CSS Property
 * @param {string} cssValue Expected CSS value.
 */
export const assertCSSValue = async ( selector, cssProperty, cssValue ) => {
	const value = await page.$eval(
		selector,
		(el, prop, pseudoEl) =>
			window
				.getComputedStyle(el, pseudoEl || null)
				.getPropertyValue(prop),
		cssProperty
	);

	expect( sanitizeValue( cssProperty, value ) ).toBe( cssValue );
}

/**
 * Sanitize the given css value for the property.
 *
 * @param {string} cssProperty CSS Property
 * @param {string} cssValue CSS Value for the property.
 * @returns
 */
const sanitizeValue = ( cssProperty, cssValue ) => {
	const SANITIZERS = {
		'font-family': sanitizeFontFamily
	};

	const sanitizer = SANITIZERS[ `${cssProperty}` ];

	if ( typeof sanitizer === 'function' ) {
		return sanitizer( cssValue );
	}

	return cssValue;
}

/**
 * Sanitize font family string.
 *
 * @param {string} fontFamily Font family string.
 * @returns
 */
const sanitizeFontFamily = ( fontFamily ) => {
	return fontFamily.replace( /\\/g, '' ).replace(/"/g, "'");;
}
