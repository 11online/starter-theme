jQuery(function( $ ){
	// on initial page load, blacklist our admin links
	blacklist();
	// on an instant click page load, blacklist our admin links
 	InstantClick.on('change', blacklist);

	function blacklist() {
		/* blacklist the wp-admin links */
	 	$('a[href*="wp-admin"]').attr('data-no-instant', true);
	}
});

	
