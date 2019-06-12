( function( $ , api ) {


    // Site Title
    wp.customize( 'blogname', function( value ) {
        value.bind( function( value ) {
            $( '.site-title span' ).text( value );
        } );
    } );
	
	wp.customize( 'blogdescription', function( value ) {
        value.bind( function( value ) {
            $( '.site-description' ).text( value );
        } );
    } );
	

} )( jQuery , wp.customize );

