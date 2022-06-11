// tonne, kg, gram, milligram, microgram, imperial ton, us ton, stone, pound, ounce
var conversion_table = [0.001, 1, 1000, 1000000, 1000000000, 0.000984207, 0.00110231, 0.157473, 2.20462, 35.274 ];

function klc_reset( random_number ) {
	jQuery( '#input1-' + random_number ).val('1');
	jQuery( '#option1-' + random_number ).val('Kilogram');

	jQuery( '#input2-' + random_number ).val('2.20462');
	jQuery( '#option2-' + random_number ).val('Pound');
}

function klc_convert( random_number, class_name ) {

	switch ( class_name ) {
		case 'klc-input1' :
			update_right_conversion( random_number );
			break;

		case 'klc-option1' :
			update_right_conversion( random_number );
			break;

		case 'klc-input2' :
			update_left_conversion( random_number );
			break;

		case 'klc-option2' :
			update_left_conversion( random_number );
			break;
	}
}

function update_right_conversion( random_number ) {
	var input1  = jQuery( '#input1-' + random_number ).val();
	var option1 = jQuery( '#option1-' + random_number ).val();
	var option2 = jQuery( '#option2-' + random_number ).val();

	input1 = Math.abs( jQuery.trim( input1 ) );

	if ( isNaN( input1 ) ) {
		jQuery( '#klc-message-' + random_number ).html( 'Invalid Input' );
	}

	var left_conversion  = conversion_table[ option1 ];
	var right_conversion = conversion_table[ option2 ];

	var kg_in_left_input_box      = input1 * ( Math.abs( 1 / left_conversion ) );
	var output_in_right_input_box = kg_in_left_input_box * right_conversion;

	jQuery( '#input2-' + random_number ).val( output_in_right_input_box );
}

function update_left_conversion( random_number ) {
	var input2  = jQuery( '#input2-' + random_number ).val();
	var option1 = jQuery( '#option1-' + random_number ).val();
	var option2 = jQuery( '#option2-' + random_number ).val();

	input2 = Math.abs( jQuery.trim( input2 ) );

	if ( isNaN( input2 ) ) {
		jQuery( '#klc-message-' + random_number ).html( 'Invalid Input' );
	}

	var left_conversion  = conversion_table[ option1 ];
	var right_conversion = conversion_table[ option2 ];

	var kg_in_right_input_box    = input2 * ( Math.abs( 1 / right_conversion ) );
	var output_in_left_input_box = kg_in_right_input_box * left_conversion;

	jQuery( '#input1-' + random_number ).val( output_in_left_input_box );
}
