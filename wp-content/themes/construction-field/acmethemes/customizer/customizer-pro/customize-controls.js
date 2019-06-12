( function( api ) {

	// Extends our custom "construction-field" section.
	api.sectionConstructor['construction-field'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );