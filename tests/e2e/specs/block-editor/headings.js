import { openCustomizer, setCustomize, openCustomizeSection } from '../../utils/customize';

/**
 * @jest-environment jsdom
 */
describe( 'Hello World', () => {
	it( 'Should load properly', async () => {
		await setCustomize( {
			'body-font-family': "'Open Sans', sans-serif",
			'body-font-weight': 600
		} );

	} );
} );
