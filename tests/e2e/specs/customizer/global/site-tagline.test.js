import { createURL } from '@wordpress/e2e-test-utils';
import { setCustomize } from '../../../utils/set-customize';

describe( 'Site Tagline Typography settings and color settings in the customizer', () => {
	it( 'site Tagline  typography and color should apply corectly', async () => {
		const sitetitleTypography = {
			'font-family-site-title': "'Raleway', sans-serif",
			'site-title-font-variant': '800',
			'site-title-font-weight': '800',
			'site-title-text-transform': '',
			'font-size-site-title': {
				desktop: 18,
				tablet: '16',
				mobile: '12',
				'desktop-unit': 'px',
				'tablet-unit': 'px',
				'mobile-unit': 'px',
			},
			'site-title-line-height': 0.99,
			'header-color-site-title': 'rgb(240, 0, 0)',
		};

		await setCustomize( sitetitleTypography );

		await page.goto( createURL( '/' ), {
			waitUntil: 'networkidle0',
		} );

		await expect( {
			selector: '.site-title',
			property: 'font-size',
		} ).cssValueToBe(
			`${ sitetitleTypography[ 'font-size-site-title' ].desktop }${ sitetitleTypography[ 'font-size-site-title' ][ 'desktop-unit' ] }`,
		);

		await expect( {
			selector: '.ast-site-identity .site-title a',
			property: 'color',
		} ).cssValueToBe(
			`${ sitetitleTypography[ 'header-color-site-title' ] }`,
		);

		await expect( {
			selector: '.site-title, .site-title a',
			property: 'font-family',
		} ).cssValueToBe(
			`${ sitetitleTypography[ 'font-family-site-title' ] }`,
		);
	} );
} );
