import {
	createURL,
	createNewPost,
	publishPost,
	visitAdminPage,
} from '@wordpress/e2e-test-utils';
import { setCustomize } from '../../../utils/set-customize';
import { createUser } from '../../../utils/create-new-user';
import { deleteUser } from '../../../utils/delete-user';

describe( 'Related Posts correct Author Name', () => {
	it( 'Related Posts should display correct author name', async () => {
		const relatedPosts = {
			'enable-related-posts': true,
		};

		await setCustomize( relatedPosts );

		await createUser( 'teamAstra01', '', '', 'administrator' );
		await createUser( 'teamAstra02', '', '', 'administrator' );
		await createUser( 'teamAstra03', '', '', 'administrator' );
		await createUser( 'teamAstra04', '', '', 'administrator' );

		await createNewPost( { postType: 'post', title: 'Related Post - admin' } );
		await publishPost();

		await createNewPost( { postType: 'post', title: 'Related Post - teamAstra01' } );
		await publishPost();
		await visitAdminPage( 'edit.php' );

		const title1 = 'teamAstra01';

		const [ postLink1 ] = await page.$x(
			`//td[@data-colname="Title"]//a[contains(text(), "${ title1 }")]`
		);

		if ( ! postLink1 ) {
			await switchUserToTest();
			return;
		}

		// Focus to unveil actions
		await postLink1.focus();

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

		await page.keyboard.press( 'Enter' );

		await createNewPost( { postType: 'post', title: 'Related Post - teamAstra02' } );
		await publishPost();
		await visitAdminPage( 'edit.php' );

		const title2 = 'teamAstra02';

		const [ postLink2 ] = await page.$x(
			`//td[@data-colname="Title"]//a[contains(text(), "${ title2 }")]`
		);

		if ( ! postLink2 ) {
			await switchUserToTest();
			return;
		}

		// Focus to unveil actions
		await postLink2.focus();

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

		await page.keyboard.press( 'Enter' );

		await createNewPost( { postType: 'post', title: 'Related Post - teamAstra03' } );
		await publishPost();
		await visitAdminPage( 'edit.php' );

		const title3 = 'teamAstra03';

		const [ postLink3 ] = await page.$x(
			`//td[@data-colname="Title"]//a[contains(text(), "${ title3 }")]`
		);

		if ( ! postLink3 ) {
			await switchUserToTest();
			return;
		}

		// Focus to unveil actions
		await postLink3.focus();

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
		await page.keyboard.press( 'ArrowDown' );
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

		await page.keyboard.press( 'Enter' );

		await createNewPost( { postType: 'post', title: 'Related Post - teamAstra04' } );
		await publishPost();
		await visitAdminPage( 'edit.php' );

		const title4 = 'teamAstra04';

		const [ postLink4 ] = await page.$x(
			`//td[@data-colname="Title"]//a[contains(text(), "${ title4 }")]`
		);

		if ( ! postLink4 ) {
			await switchUserToTest();
			return;
		}

		// Focus to unveil actions
		await postLink4.focus();

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
		await page.keyboard.press( 'ArrowDown' );
		await page.keyboard.press( 'ArrowDown' );
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

		await page.keyboard.press( 'Enter' );

		await deleteUser( 'teamAstra01' );
		await deleteUser( 'teamAstra02' );
		await deleteUser( 'teamAstra03' );
		await deleteUser( 'teamAstra04' );
	});
} );
