( function( api ) {

	// Extends our custom "business-theme-info" section.
	api.sectionConstructor['business-theme-info'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

	// Extends our custom "business-theme-info-sectionsections" section.
	api.sectionConstructor['business-theme-info-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
