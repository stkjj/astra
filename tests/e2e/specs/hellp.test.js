/**
 * WordPress dependencies
 */
 import { visitAdminPage } from '@wordpress/e2e-test-utils';

 /**
 * @jest-environment jsdom
 */
 describe( 'Hello World', () => {
	 it( 'Should load properly', async () => {
		 await visitAdminPage( '/' );
		 const nodes = await page.$x(
			 '//h2[contains(text(), "Welcome to WordPress!")]'
		 );
		 expect( nodes.length ).not.toEqual( 0 );
	 } );
 } );
