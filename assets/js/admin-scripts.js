(function($) {
	$(document).on( 'click', '.klc-tabs a', function() {

		jQuery('#klc-message').hide(500);

		// Hide All sections
		$('.klc-section').hide();

		// Show the selcted one
		$('.klc-section').eq($(this).index()).show();

		// Highlight the Tab
		$('.klc-tabs a').attr( 'class', 'nav-tab' );
		$(this).attr( 'class', 'nav-tab nav-tab-active' );

		// Update current tab number, to highlight it after the form is submitted.
		$('#klc_current_tab').val( $(this).index() + 1 );

		if ( 2 === $(this).index() ) {
			$('#klc-instructions').hide();
		} else {
			$('#klc-instructions').show();
		}

		return false;
	})

	// Click first Tab
	$('.nav-tab-active').click();

})( jQuery );

function klc_copy_shortcode( id ) {
	var copyText = document.getElementById( id );

	/* Select the text field */
	copyText.select();
	copyText.setSelectionRange(0, 99999); /* For mobile devices */

	/* Copy the text inside the text field */
	navigator.clipboard.writeText(copyText.value);

	jQuery('#klc-message').html( '<div class="notice notice-success is-dismissible"><p>Shortcode Copied!</p></div>' ).show(500);
}

