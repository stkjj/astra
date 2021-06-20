import { createURL, createNewPost, setPostContent, publishPost } from '@wordpress/e2e-test-utils';
import { setCustomize } from '../../../utils/customize';
import { TPOGRAPHY_TEST_POST_CONTENT } from '../../../utils/post';
import { assertCSSValue } from '../../../utils/assertions';

/**
 * @jest-environment jsdom
 */
describe( 'Global Typography settings in the customizer', () => {
	it( 'Body typography should be applied correctly', async () => {
		const globalTypegraphy = {
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
		};

		await setCustomize( globalTypegraphy );

		await createNewPost( { postType: 'post', title: 'Typography Test' } );
		await setPostContent( TPOGRAPHY_TEST_POST_CONTENT );
		await publishPost();
		page.goto( createURL( '/typography-test/' ), { waitUntil: 'networkidle0' } );
		await page.waitForSelector( '.entry-content' );

		assertCSSValue( '.entry-content p', 'font-size', `${globalTypegraphy['font-size-body'].desktop}px` );
		assertCSSValue( '.entry-content p', 'font-family', `${globalTypegraphy['body-font-family']}` );
	} );
} );
