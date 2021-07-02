 /**
  * Internal dependencies
  */
 import { switchUserToAdmin } from '@wordpress/e2e-test-utils';
 import { switchUserToTest } from '@wordpress/e2e-test-utils';
 import { visitAdminPage } from '@wordpress/e2e-test-utils';

/**
 * Create a new user account.
 *
 * @param {string}  username  User name.
 * @param {string?} firstName First name.
 * @param {string?} lastName  Larst name.
 */
 export async function createUser( username, firstName, lastName ) {
	 console.log(username);
	await switchUserToAdmin();
	await visitAdminPage( 'user-new.php' );

	await page.type( '#user_login', username );
	await page.type( '#email', username + '@example.com' );
	if ( firstName ) {
		await page.type( '#first_name', firstName );
	}
	if ( lastName ) {
		await page.type( '#last_name', lastName );
	}
	await page.click( '#send_user_notification' );

	await Promise.all( [
		page.click( '#createusersub' ),
		page.waitForNavigation( { waitUntil: 'networkidle0' } ),
	] );
	await switchUserToTest();
}
