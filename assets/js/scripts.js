function klc_calculate_to_current_date( random_number ) {
	var dob_year   = jQuery( '#birth-year-' + random_number ).val();
	var dob_months = jQuery( '#birth-month-' + random_number ).val();
	var dob_date   = jQuery( '#birth-date-' + random_number ).val();

	var now      = new Date();
	var to_date  = now.getDate();
	var to_month = now.getMonth() + 1;
	var to_year  = now.getFullYear();

	if( to_date < dob_date ) {
		to_date   = parseInt(to_date) + 30;
		to_month  = parseInt(to_month) - 1;
		var fdays = to_date - dob_date;
	} else {
		var fdays = to_date - dob_date;
	}

	if ( to_month < dob_months ) {
		to_month = parseInt( to_month ) + 12;
		to_year  = to_year - 1;
		var fmonths = to_month - dob_months;
	} else {
		var fmonths = to_month - dob_months;
	}

	var fyear = to_year - dob_year;

	jQuery( '#klc-message-' + random_number ).html( fyear+' years '+fmonths+' months '+fdays+' days' );
}

function klc_calculate_to_given_date( random_number ) {
	var dob_year   = jQuery( '#birth-year-' + random_number ).val();
	var dob_months = jQuery( '#birth-month-' + random_number ).val();
	var dob_date   = jQuery( '#birth-date-' + random_number ).val();

	var to_date   = jQuery( '#to-date-' + random_number ).val();
	var to_month  = jQuery( '#to-month-' + random_number ).val();
	var to_year   = jQuery( '#to-year-' + random_number ).val();

	if( to_date < dob_date ) {
		to_date   = parseInt(to_date) + 30;
		to_month  = parseInt(to_month) - 1;
		var fdays = to_date - dob_date;
	} else {
		var fdays = to_date - dob_date;
	}

	if ( to_month < dob_months ) {
		to_month = parseInt( to_month ) + 12;
		to_year  = to_year - 1;
		var fmonths = to_month - dob_months;
	} else {
		var fmonths = to_month - dob_months;
	}

	var fyear = to_year - dob_year;

	jQuery( '#klc-message-' + random_number ).html( fyear+' years '+fmonths+' months '+fdays+' days' );
}
