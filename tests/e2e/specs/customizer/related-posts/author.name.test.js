import {
	createURL,
	createNewPost,
	publishPost,
	visitAdminPage,
	trashAllPosts,
} from '@wordpress/e2e-test-utils';
import { setCustomize } from '../../../utils/set-customize';
import { createUser } from '../../../utils/create-new-user';
import { deleteUser } from '../../../utils/delete-user';

describe( 'Related Posts correct Author Name', () => {
	it( 'Related Posts should display correct author name', async () => {
		const relatedPosts = {
			'enable-related-posts': true,
		};

		// Enable Related Posts.
		await setCustomize( relatedPosts );

		// Create New User.
		await createUser( 'teamAstra01', '', '', 'administrator' );

		// Create New Post.
		await createNewPost( { postType: 'post', title: 'Related Post - admin' } );
		await publishPost();

		// Create New Post.
		await createNewPost( { postType: 'post', title: 'Related Post - teamAstra01' } );
		await publishPost();
		await visitAdminPage( 'edit.php' );

		const title = 'teamAstra01';

		const [ postLink ] = await page.$x(
			`//td[@data-colname="Title"]//a[contains(text(), "${ title }")]`
		);

		if ( ! postLink ) {
			await switchUserToTest();
			return;
		}

		// Focus to unveil actions
		await postLink.focus();

		// Tab twice to focus 'Edit'
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );

		await page.keyboard.press( 'Enter' );

		// Tab twice to focus 'Edit'
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );

		await page.keyboard.press( 'ArrowDown' );

		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );
		await page.keyboard.press( 'Tab' );

		// Set Post Author to New User - teamAstra01.
		await page.keyboard.press( 'Enter' );

		await page.goto( createURL( '/related-post-admin/' ), {
			waitUntil: 'networkidle0',
		} );

		await page.waitForSelector( '.entry-content' );

		let currentPostAuthor = await page.$('.single-layout-1 .author-name');
		currentPostAuthor = await page.evaluate(el => el.textContent, currentPostAuthor);

		// Check if current author name correct or not. If not, throw error.
		await expect( currentPostAuthor ).toBe('admin');

		let relatedPostAuthor = await page.$( '.ast-related-post-content .author-name' );
		relatedPostAuthor = await page.evaluate( el => el.textContent, relatedPostAuthor );

		// Check if related post author name correct or not. If not, throw error.
		await expect( relatedPostAuthor ).toBe('teamAstra01');

		// Delete user teamAstra01.
		await deleteUser( 'teamAstra01' );

		// Delete all newly create posts.
		await trashAllPosts();
	});
} );
