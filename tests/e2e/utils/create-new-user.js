/**
 * WordPress dependencies.
 */
import {
	switchUserToAdmin,
	switchUserToTest,
	visitAdminPage,
} from '@wordpress/e2e-test-utils';

/**
 * Create a new user account.
 *
 * @param {string}  username           User name.
 * @param {Object?} object             Optional Settings for the new user account.
 * @param {string}  [object.firstName] First name.
 * @param {string}  [object.lastName]  Last name.
 * @param {string}  [object.role]      Role. Defaults to Administrator.
 * @return {string} Password for the newly created user account.
 */
export async function createUser(
	username,
	{ firstName, lastName, role } = {},
) {
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
	if ( role ) {
		await page.select( '#role', role );
	}

	await page.click( '#send_user_notification' );

	const password = await page.$eval( `#pass1`, ( element ) => element.value );

	await Promise.all( [
		page.click( '#createusersub' ),
		page.waitForNavigation( { waitUntil: 'networkidle0' } ),
	] );
	await switchUserToTest();
	return password;
}
