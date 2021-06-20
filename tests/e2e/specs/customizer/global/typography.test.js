import { createURL } from '@wordpress/e2e-test-utils';
import { setCustomize } from '../../../utils/customize';

/**
 * @jest-environment jsdom
 */
describe( 'Global Typography settings in the customizer', () => {
	it( 'Body typography should be applied correctly', async () => {
		await setCustomize( {
			"body-font-family": "'Open Sans', sans-serif",
			"body-font-variant": "800",
			"body-font-weight": "800",
			"body-text-transform": "",
			"font-size-body": {
				"desktop": 19,
				"tablet": "",
				"mobile": "",
				"desktop-unit": "px",
				"tablet-unit": "px",
				"mobile-unit": "px"
			},
			"body-line-height": 0.99,
			"para-margin-bottom": 1.68,
		} );

		page.goto( createURL( '/' ), { waitUntil: 'networkidle0' } );
	} );
} );
